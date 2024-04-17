<?php

namespace App\Models\DTO\User;

use App\Consntants\DBConstants;
use App\Models\DTO\RequestDTO;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UserEditRequestDTO implements RequestDTO
{
    private function __construct(
        public string $lastname,
        public string $firstname,
        public string $email,
        public string $password,
        public string $passwordAgain,
        public Carbon $birthday
    ) {}

    public static function fromRequest(FormRequest $request): UserEditRequestDTO
    {
        return (new self(
            $request->input('lastname'),
            $request->input('firstname'),
            $request->input('email'),
            $request->input('password'),
            $request->input('password_again'),
            Carbon::createFromFormat(DBConstants::DATE_FORMAT, $request->input('birthday')),
        ));
    }
}
