<?php

namespace App\Models\DTO\User;

use App\Models\DTO\RequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequestDTO implements RequestDTO
{
    private function __construct(
        public string $email,
        public string $password,
    ) {}

    public static function fromRequest(FormRequest $request): LoginRequestDTO
    {
        return (new self(
            $request->input('email'),
            $request->input('password'),
        ));
    }
}
