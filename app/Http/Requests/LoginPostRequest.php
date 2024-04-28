<?php

namespace App\Http\Requests;

use App\Helpers\ValidationBuilder;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginPostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => (new ValidationBuilder())
                ->required()
                ->email()
                ->make(),
            'password' => (new ValidationBuilder())
                ->required()
                ->make()
        ];
    }
}
