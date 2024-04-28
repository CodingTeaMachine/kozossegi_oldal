<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\UserRole;
use Carbon\Carbon;

class FriendTableDTO
{

    public function __construct(
        public int $senderId,
        public int $receiverId,
        public string $senderName,
        public string $receiverName,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->kerelmezo_azonosito,
            $result->fogado_azonosito,
            $result->sender_firstname . " " . $result->sender_lastname,
            $result->receiver_firstname . " " . $result->receiver_lastname,
        ));
    }

}
