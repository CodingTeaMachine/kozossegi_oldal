<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\UserRole;
use Carbon\Carbon;

class UserTableDTO
{

    public function __construct(
        public int $id,
        public string $name,
        public string|null $nickname,
        public string $email,
        public UserRole $role,
        public string $birthday,
        public string|null $workplace,
        public string|null $school,
        public string|null $placeOfLiving,
        public string|null $phone,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->azonosito,
            $result->keresztnev . " " . $result ->vezeteknev,
            $result->becenev,
            $result->email,
            UserRole::tryFrom($result->szerep),
            Carbon::parse($result->szuletesi_datum)->format(DBConstants::DATE_FORMAT),
            $result->munkahely,
            $result->iskola,
            $result->lakhely,
            $result->telefonszam
        ));
    }

}
