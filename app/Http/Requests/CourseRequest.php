<?php

namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'course_type' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'course_type.required' => 'The course_type field is required.',
            // Add more custom messages as needed
        ];
    }
}
