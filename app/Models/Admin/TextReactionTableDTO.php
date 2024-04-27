<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\TReactionRole;
use Carbon\Carbon;

class TextReactionTableDTO
{

    public function __construct(
        public int $userId,
        public int $TEId,
        public int $reaction,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->felhasznaloId,
            $result->szovegesbejegyzesId,
            $result->reaction,
        ));
    }

}
