<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'phone_number' => ['required', 'string', 'unique:users'],
            //the user should provide the email or a phone number
            'email' => ['required_without:phone_number', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'type' => ['required', 'string', 'in:rider,driver'],

        ];
    }
}
