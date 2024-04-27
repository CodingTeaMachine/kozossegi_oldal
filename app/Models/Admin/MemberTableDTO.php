<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\MemberRole;
use Carbon\Carbon;

class MemberTableDTO
{

    public function __construct(
        public int    $senderId,
        public int $receiverId,
        public int    $groupId,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->senderId,
            $result->receiverId,
            $result->groupId,
        ));
    }

}
