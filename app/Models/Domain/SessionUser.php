<?php

namespace App\Models\Domain;

use App\Enums\SessionKey;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Session;

class SessionUser
{
    public function __construct(
        public int $id,
        public string $lastname,
        public string $firstname,
        public string $email,
        public string|null $nickname,
        public UserRole $role,
    ) {}

    public static function fromDBResult(object $result): self
    {
        return (new self(
            $result->azonosito,
            $result->vezeteknev,
            $result->keresztnev,
            $result->email,
            $result->becenev,
            UserRole::tryFrom($result->szerep)
        ));
    }

    public static function getFromSession(): self
    {
        $sessionData = json_decode(Session::get(SessionKey::USER->value));

        return (new self(
            $sessionData->id,
            $sessionData->lastname,
            $sessionData->firstname,
            $sessionData->email,
            $sessionData->nickname,
            UserRole::tryFrom($sessionData->role)
        ));
    }
}
