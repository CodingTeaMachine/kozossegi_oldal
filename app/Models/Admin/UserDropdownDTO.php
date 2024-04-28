<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\UserRole;
use App\Http\Requests\UserEditRequest;
use Carbon\Carbon;

class UserDropdownDTO
{

    public function __construct(
        public int $id,
        public string $name,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->azonosito,
            $result->keresztnev . " " . $result->vezeteknev
        ));
    }
}
