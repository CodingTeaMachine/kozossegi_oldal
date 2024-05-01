<?php

namespace App\Helpers;

use App\Enums\SessionKey;
use App\Enums\UserRole;
use App\Models\Domain\SessionUser;
use Illuminate\Support\Facades\Session;

class UserSession
{
    public static function isLoggedIn(): bool
    {
        return Session::has(SessionKey::USER->value);
    }

    public static function login(SessionUser $user): void
    {
        Session::put(SessionKey::USER->value, json_encode($user));
    }

    public static function logout(): void
    {
        Session::forget(SessionKey::USER->value);
    }

    public static function get(): SessionUser|null
    {
        return self::isLoggedIn()
            ? SessionUser::getFromSession()
            : null;
    }

    public static function isAdmin(): bool
    {
        return self::get()->role->value === UserRole::ADMIN->value;
    }

    public static function isCurrentUser(int $id): bool
    {
        return self::get()->id === $id;
    }


}
