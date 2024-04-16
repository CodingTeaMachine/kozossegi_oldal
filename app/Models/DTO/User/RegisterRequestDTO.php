<?php

namespace App\Models\DTO\User;

use App\Models\DTO\RequestDTO;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequestDTO implements RequestDTO
{
    private function __construct(
        public string $lastname,
        public string $firstname,
        public string $email,
        public string $password,
        public string $passwordAgain,
        public Carbon $birthday
    ) {}

    public static function fromRequest(FormRequest $request): RegisterRequestDTO
    {
        return (new self(
            $request->input('lastname'),
            $request->input('firstname'),
            $request->input('email'),
            $request->input('password'),
            $request->input('password_again'),
            Carbon::createFromFormat('Y-m-d',$request->input('birthday')),
        ));
    }
}
