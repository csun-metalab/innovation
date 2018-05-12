<?php

declare(strict_types=1);

namespace Helix\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UniversityEvent extends FormRequest
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
            'event_name' => 'required|min:3|max:256',
            'start_date' => 'required|date',
            'end_data'   => 'after:start_date',
        ];
        return $rules;
    }
}
