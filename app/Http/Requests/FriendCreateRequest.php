<?php

namespace App\Http\Requests;

use App\Helpers\ValidationBuilder;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FriendCreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'senderId' => (new ValidationBuilder())
                ->required()
                ->make(),
            'receiverId' => (new ValidationBuilder())
                ->required()
                ->different('senderId')
                ->make(),
        ];
    }
}
