<?php

declare(strict_types=1);

namespace Helix\Http\Requests\Project;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProjectCreate extends FormRequest
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
            'title' => 'required|min:3|max:256',
            'description' => 'required',
            'url' => 'nullable|url',
            'youtube' => ['nullable', 'regex' => 'regex:#(https?://(?:www\.)?youtube\.com/watch\?v=([^&]+?))|((https?://(?:www\.)?)(youtu\.be){1})|((https?://(?:www\.)?(vimeo\.com){1}))#']
        ];
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
            'title.required' => 'A title for the project is required.',
            'title.min' => 'The project title requires a minimum of 3 characters.',
            'title.max' => 'The project title may not be greater than 256 characters.',
            'description.required' => 'A description of the project is required.',
            'url.url' => 'The website URL is not in the correct format.',
            'youtube.regex' => 'The video URL is not in the correct format. Currently supported video hosting sites: YouTube, Vimeo'
        ];
    }
}
