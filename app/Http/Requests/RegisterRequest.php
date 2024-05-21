<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TecsupEmailRule; 

class RegisterRequest extends FormRequest
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
            'email' => ['required', 'email', new TecsupEmailRule, 'unique:usuarios,email'],
            'username' => 'required|max:10|unique:usuarios,username',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
        ];
    }
}
