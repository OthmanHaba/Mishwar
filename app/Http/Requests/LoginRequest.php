<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        return [
            'phone_number' => 'required|exists:users,phone_number',
            'otp' => 'required'
        ];
    }
    public function authinticate(): ?User
    {
        $data = $this->validated();
        $user = User::where('phone_number', $data['phone_number'])->first();
        if ($user->otp == $data['otp']) {
            $user->update(['otp' => null]);
            return $user;
        }
        return null;
    }
}
