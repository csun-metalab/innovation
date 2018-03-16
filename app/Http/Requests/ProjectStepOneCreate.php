<?php

namespace Helix\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStepOneCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'project_type' => 'required|in:institutional,showcase,stealth',
            'title'        => 'required|min:3|max:256',
            'start_date'   => 'date_format:m/d/Y|required',
            'end_date'     => 'nullable|date_format:m/d/Y|after:start_date',
            'description'  => 'required',
            'funding'      => 'numeric|min:0',
            'url'          => 'nullable|url',
            'youtube'      => ['nullable','re.gex' => 'regex:#(https?://(?:www\.)?youtube\.com/watch\?v=([^&]+?))|((https?://(?:www\.)?)(youtu\.be){1})|((https?://(?:www\.)?(vimeo\.com){1}))#']

        ];

        //This makes the title of a cayuse project required for only admins.
        //This prevents an admin from completely removing a title.
        if(session('new-project.project_general.cayuse_project') && !auth()->user()->hasRole('admin'))
        {
            $rules['title'] = 'min:3|max:256';
        }

        return $rules;
    }

    /**
    * Get the validation messages for the request.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'title.required'            => 'A title for the project is required.',
            'title.min'                 => 'The project title requires a minimum of 3 characters.',
            'title.max'                 => 'The project title may not be greater than 256 characters.',
            'description.required'      => 'A description of the project is required.',
            'start_date.date_format'    => 'The start date format must be mm/dd/yyyy',
            'end_date.date_format'      => 'The end date format must be mm/dd/yyyy',
            'end_date.after'            => 'The end date must be after your start date or left blank.',
            'funding.min'               => 'The funding amount must be empty or greater than $0.',
            'url.url'                   => 'The website URL is not in the correct format.',
            'youtube.regex'             => 'The video URL is not in the correct format. Currently supported video hosting sites: YouTube, Vimeo'
        ];
    }
}
