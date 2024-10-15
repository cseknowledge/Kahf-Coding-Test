<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\VaccinationCenter;
use App\Rules\BangladeshiPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'nid' => 'required|numeric|digits:17|unique:users,nid',
            'email' => 'required|string|email|lowercase|unique:users,email',
            'phone' => ['required', 'numeric', 'digits:11', 'unique:' . User::class, new BangladeshiPhoneNumber()],
            'vaccine_center' => 'required|exists:vaccination_centers,id',
            'email_verified_at' => 'nullable|date',
            'password' => 'required|confirmed|string|min:6',
        ];

    }

    public function messages()
    {
        return [
            'nid.digits' => 'National ID must be 17 digits.',
            'nid.unique' => 'You/Someone registered before this nid.',
            'vaccine_center.required' => 'Vaccine center is required.',
            'vaccine_center.exists' => 'Vaccine center does not exist.',
            'email.unique' => 'Email already exists.',
            'phone.digits' => 'Phone must be 11 digits.',
            'phone.unique' => 'Phone already exists.',
            'password.min' => 'Password must be at least 6 characters.',
        ];
    }
}
