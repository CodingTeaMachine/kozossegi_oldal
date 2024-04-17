<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\UserRole;
use App\Http\Requests\UserEditRequest;
use Carbon\Carbon;

class UserEditDTO
{

    public function __construct(
        public int $id,
        public string $firstname,
        public string $lastname,
        public string|null $nickname,
        public string $email,
        public UserRole $role,
        public string $birthday,
        public string|null $workplace,
        public string|null $school,
        public string|null $placeOfLiving,
        public string|null $placeOfBirth,
        public string|null $phone,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->azonosito,
            $result->keresztnev,
            $result->vezeteknev,
            $result->becenev,
            $result->email,
            UserRole::tryFrom($result->szerep),
            Carbon::parse($result->szuletesi_datum)->format(DBConstants::DATE_FORMAT),
            $result->munkahely,
            $result->iskola,
            $result->lakhely,
            $result->szulovaros,
            $result->telefonszam
        ));
    }

    public static function getFromRequest(UserEditRequest $request): self
    {
        return (new self(
            intval($request->input('id')),
            $request->input('firstname'),
            $request->input('lastname'),
            $request->input('nickname'),
            $request->input('email'),
            UserRole::tryFrom($request->input('role')),
            Carbon::createFromFormat(DBConstants::DATE_FORMAT, $request->input('birthday')),
            $request->input('workplace'),
            $request->input('school'),
            $request->input('placeOfLiving'),
            $request->input('placeOfBirth'),
            $request->input('phone'),
        ));
    }

}
