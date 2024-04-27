<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\GroupMRole;
use Carbon\Carbon;

class GroupMTableDTO
{

    public function __construct(
        public int $Id,
        public string $text,
        public int $senderId,
        public int $groupId,
        public string $time,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->Id,
            $result->text,
            $result->senderId,
            $result->groupId,
            $result->time,

        ));
    }

}
