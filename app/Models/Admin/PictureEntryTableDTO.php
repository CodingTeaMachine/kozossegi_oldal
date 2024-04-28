<?php

namespace App\Models\Admin;

use App\Consntants\DBConstants;
use App\Enums\PictureEntryRole;
use Carbon\Carbon;

class PictureEntryTableDTO
{

    public function __construct(
        public int $pictureId,
        public String $picture,
        public string $time,
        public string $userID,
    ) {}


    public static function getFromDBResult(object $result): self
    {
        return (new self(
            $result->pictureId,
            $result->picture,
            $result->time,
            $result->userID,
        ));
    }

}
