<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\GroupRole;
use Carbon\Carbon;

class GroupTableDTO
{

    public function __construct(
        public int $groupId,
        public string $name,
        public int $ownerId,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->groupid,
            $result->name,
            $result->owner,
        ));
    }

}
