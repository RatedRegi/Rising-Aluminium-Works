<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check(); // Ensure the user is logged in
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::id()], // Ignore current user email
            'phone_number' => ['nullable', 'regex:/^(\+?\d{1,3})?\d{10}$/'],
            'address_line' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:100'],
            'province' => ['required', 'string', 'max:100'],
            'zip' => ['required', 'digits:4'],
            'current_password' => ['nullable', 'current_password'], // Ensure current password matches
            'new_password' => ['nullable', 'confirmed', Password::min(8)->letters()->numbers()], // Confirmed means a matching 'new_password_confirmation' is required

        ];
    }
}
