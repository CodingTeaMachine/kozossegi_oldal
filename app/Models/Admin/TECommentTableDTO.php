<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\TECommentRole;
use Carbon\Carbon;

class TECommentTableDTO
{

    public function __construct(
        public int $commentId,
        public int $comment,
        public string $time,
        public string $senderId,
        public int $TEId,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->commentId,
            $result->comment,
            $result->time,
            $result->senderId,
            $result->TEId,
        ));
    }

}
