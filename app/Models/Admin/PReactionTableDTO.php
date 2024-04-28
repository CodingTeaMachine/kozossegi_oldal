<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\PReactionRole;
use Carbon\Carbon;

class PReactionTableDTO
{

    public function __construct(
        public int $userId,
        public int $pictureId,
        public int $reaction,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->userId,
            $result->pictureId,
            $result->reaction,
        ));
    }

}
