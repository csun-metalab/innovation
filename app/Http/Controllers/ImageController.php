<?php

namespace Helix\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Helix\Http\Controllers\Controller;
use Helix\Models\Project;
use Helix\Models\Image;
use Illuminate\Http\Request;
use Exception;
use Image as InterventionImage;

/**
 * This class handles the photo uploads for project banners. This closely
 * follows the same conventions as faculty. An issue that we ran into was the
 * caching of images on the server. The process is to save the image local to
 * the application, crop the image, give it a unique id, and then add it to the
 * CDN.
 *
 * @package Helix\Http\Controllers
 */
class ImageController extends Controller
{
    /**
     * This displays the form to upload an image to a project.
     *
     * @param string $projectId The project id.
     * @return Illuminate\Http\Response
     */
    public function create($projectId)
    {
        $project = Project::with('image')->where('project_id', $projectId)->first();
        return view('pages.project.upload', compact('project'));
    }

    /**
     * This will store the photo and save the file location in the database.
     *
     * @param string $projectId The project id
     * @return Illuminate\Http\Response
     */
    public function store($projectId)
    {
        // Takes the image from the upload form
        $image = request()->file('image');
        $data = [
            'image' => $image
        ];

        // This section will validate the data
        $rules = [
            'image' => 'required|mimes:jpeg,jpg,png| max:1000',
        ];

        $validator = Validator::make($data, $rules);

        // A message is sent back to the page if the validation fails
        if ($validator->fails()) {
            return redirect()->route('project.photo-upload', $projectId)->withErrors($validator);
        }

        //Obfuscate the image file name for privacy reasons.
        $idUsedToSaveImage = explode(':', $projectId);
        $obfuscatedFileName = $idUsedToSaveImage[1] . '_' . time();

        //Append the file extension.
        $extension = $image->getClientOriginalExtension(); // getting image extension
        $completeFileName = "${obfuscatedFileName}.${extension}";
        $destinationPath = env("IMAGE_TEMP_UPLOAD_LOCATION");

        // Create the new image file
        Input::file('image')->move($destinationPath, $completeFileName); // uploading file to given path
        $this->deleteOldTempImages();

        // Add the uploaded file to the session
        session()->put('newImageId', $completeFileName);
        session()->put('newImageExtension', $extension);

        // This should take you to the crop page
        return redirect(route('project.photo-crop', ['id' => $projectId]));
    }

    /**
     * This is the function that sets up the cropping. This will make sure that
     * the picture isn't hilariously large.
     *
     * @param string $projectId The project id
     * @return Illuminate\Http\Response
     */
    public function crop($projectId)
    {
        // Initialize the variables needed
        $imageSavePath = env('IMAGE_UPLOAD_LOCATION') . session('newImageId');
        $imagePath = asset('imgs/temp/' . session('newImageId'));

        // Makes image and shrinks it if need be. Then it stores it.
        $img = InterventionImage::make(env('IMAGE_TEMP_UPLOAD_LOCATION') . session('newImageId'))->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(env('IMAGE_TEMP_UPLOAD_LOCATION') . session('newImageId'));

        // Parameters for Jcrop
        $defaultWidth = $img->width();
        $defaultHeight = $img->height();

        // We will then go to the crop page
        return view('pages.project.crop', compact('defaultWidth', 'defaultHeight', 'imagePath', 'imageSavePath', 'projectId'));
    }

    /**
     * Handles the image after the user has cropped it.
     *
     * @param Request $request The request from the crop page. This includes photo url and parameters from JCrop.
     * @return Illuminate\Http\Response
     */
    public function postCrop(Request $request)
    {
        // Image path to be saved
        $imagePath = $request->input('imagePath');
        $projectId = $request->input('projectId');

        // This will take in the parameters from JCrop
        $xval = intval($request->input('x'));
        $yval = intval($request->input('y'));
        $width = intval($request->input('w'));
        $height = intval($request->input('h'));

        // Now, we're going to save the cropped image
        $img = InterventionImage::make(asset('imgs/temp/'.session('newImageId')))
            ->crop($width, $height, $xval, $yval)
            ->save(env('IMAGE_UPLOAD_LOCATION').session('newImageId'));


        // This will check if there is an old image to delete
        $oldImage = Image::where('imageable_id', $projectId)->first();
        if ($oldImage) {
            File::delete(env("IMAGE_UPLOAD_LOCATION")."/".$oldImage->src);
        }

        // The Laravel way of updateOrCreate for new project image
        $image = Image::firstOrNew(['imageable_id' => $projectId]);
        if ($image->src == null) {
            $image->imageable_id = $projectId;
        }
        $image->src = session('newImageId');
        $image->imageable_type = session('newImageExtension');
        $image->save();

        // Delete the old temp file
        File::delete('imgs/temp/' . session('newImageId'));

        // Forget the session variables used
        session()->forget([
            'newImageId',
            'newImageExtension',
        ]);

        // Then, we're going to go back to the project page
        return redirect('/project/'.$projectId);
    }

    /**
     * See if there is an old image, and if there is, delete it.
     *
     * @param string $projectId The project id
     * @return Illuminate\Http\Response
     */
    public function destroy($projectId)
    {
        // Query to see if there is an old image
        $oldImage = Image::where('imageable_id', $projectId)->first();

        // If there is one, delete it
        if ($oldImage) {
            try {
                // Delete from file system and DB
                File::delete(env('IMAGE_UPLOAD_LOCATION').$oldImage->src);
                $oldImage->delete();
            } catch (\Exception $e) {
                Log::error($e);
                Session::flash('error', 'There was a problem deleting the image.');
            }
        } else { // Toss an error
            Session::flash('error', 'There was a problem deleting the image.');
        }

        // Takes you back to the project page
        return redirect('/project/'.$projectId);
    }

    /**
     * Deletes all temporary images from the filesystem that were created more
     * than five minutes before the current time.
     *
     * @return void
     */
    public function deleteOldTempImages()
    {
        // This upper limit in time before we start deleting old temp images
        $timeLimitInMinutes = 5;

        // This is the location of the temp folder
        $uploadPath = public_path() . '/imgs/temp/';

        // Grab all the files from the directory
        $files = scandir($uploadPath);

        foreach ($files as $file) {
            // Calculates time since file was created
            $minutesSinceCreation = (time() - filectime($uploadPath . $file)) / 60;
            if ($minutesSinceCreation > $timeLimitInMinutes) {
                File::delete($uploadPath . $file);
            }
        }
    }

    /**
     * Returns the faculty image.
     *
     * @param string $email The faculty member's email
     * @return string
     */
    public function getFacultyProfileImage($email)
    {
        //TODO: The contents of this helper will eventually go here, after we change all the profile images to AJAX.
        return getProfileImage($email);
    }
}
