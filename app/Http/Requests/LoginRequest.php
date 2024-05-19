<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;


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
            'Username' => 'required|max:10',
            'Pass' => 'required|min:8'
        ];
    }

    public function getCredentials(){
        $username = $this->get('username');

        if($this->isEmail($username)){
            return [
                'email' => $username,
                'pass' => $this->get('pass')
            ];
        }
        return $this->only('username', 'pass');
    }

    public function isEmail($value){
        $factory = $this->container->make(ValidationFactory::class);

        return !$factory->make(['email' => $value], ['email' => 'email'])->fails();
    }
}
