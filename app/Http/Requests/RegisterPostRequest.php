<?php

namespace App\Http\Requests;

use App\Helpers\ValidationBuilder;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'lastname' => (new ValidationBuilder())
                ->required()
                ->minLength(3)
                ->maxLength(20)
                ->make(),
            'firstname' => (new ValidationBuilder())
                ->required()
                ->minLength(3)
                ->maxLength(20)
                ->make(),
            'email' => (new ValidationBuilder())
                ->required()
                ->minLength(5)
                ->maxLength(100)
                ->email()
                ->make(),
            'password' => (new ValidationBuilder())
                ->required()
                ->password()
                ->same('password_again')
                ->make(),
            'password_again' => (new ValidationBuilder())
                ->requiredWith('password')
                ->password()
                ->make(),
            'birthday' => (new ValidationBuilder())
                ->required()
                ->date()
                ->beforeToday()
                ->make(),
        ];
    }
}
