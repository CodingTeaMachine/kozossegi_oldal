<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\PrivateRole;
use Carbon\Carbon;

class PrivateTableDTO
{

    public function __construct(
        public int $privateId,
        public string $text,
        public int $senderId,
        public int $receiverId,
        public string $time,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->privateId,
            $result->text,
            $result->senderId,
            $result->receiverId,
            $result->time,
        ));
    }

}
