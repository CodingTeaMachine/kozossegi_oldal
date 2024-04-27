<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\TextEntryRole;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

class TextEntryTableDTO
{


    public function __construct(
        public int $textId,
        public String $text,
        public String $date,
        public int $senderId,
    ) {

    }


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->szoveges_bejegyzesId,
            $result->szoveges_bejegyzes,
            $result->ido,
            $result->kuldo,
        ));
    }

}
