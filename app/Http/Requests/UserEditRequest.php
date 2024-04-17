<?php

namespace App\Http\Requests;

use App\Helpers\ValidationBuilder;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => (new ValidationBuilder())
                ->required()
                ->make(),
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
            'birthday' => (new ValidationBuilder())
                ->required()
                ->date()
                ->beforeToday()
                ->make(),
            'workplace' => (new ValidationBuilder())->nullable()->string()->make(),
            'school' => (new ValidationBuilder())->nullable()->string()->make(),
            'placeOfLiving' => (new ValidationBuilder())->nullable()->string()->make(),
            'placeOfBirth' => (new ValidationBuilder())->nullable()->string()->make(),
            'phone' => (new ValidationBuilder())->nullable()->string()->make(),
        ];
    }
}
