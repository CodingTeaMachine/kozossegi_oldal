<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\PECommentRole;
use Carbon\Carbon;

class PECommentTableDTO
{

    public function __construct(
        public int $peCommentId,
        public int $comment,
        public string $time,
        public string $userId,
        public string $peId,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->peCommentId,
            $result->comment,
            $result->time,
            $result->userId,
            $result->peId,
        ));
    }

}
