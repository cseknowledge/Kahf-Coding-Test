<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        $option = $this->input('options');
        Log::channel('single')->info("Job");

        switch ($option) {
            case 'nid':
                $rules['query'] = 'required|numeric|digits:17';
                break;

            case 'phone':
                $rules['query'] = 'required|numeric|digits:11|regex:/^01[3-9]\d{8}$/';
                break;

            case 'email':
                $rules['query'] = 'required|email';
                break;

            default:
                $rules['query'] = 'required';
                break;
        }

        return $rules;
    }

    /**
     * Custom error messages for validation.
     */
    public function messages(): array
    {
        return [
            'query.required' => 'Please enter a value to search.',

            // National ID messages
            'query.numeric' => 'The National ID must be a numeric value.',
            'query.digits' => 'The National ID must be exactly 17 digits.',

            // Phone number messages
            'query.regex' => 'The phone number format is invalid. It should start with 013 to 019 and contain 11 digits.',
            'query.digits' => 'The phone number must be exactly 11 digits.',

            // Email messages
            'query.email' => 'Please enter a valid email address.',
        ];
    }

}