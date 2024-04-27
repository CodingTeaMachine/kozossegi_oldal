<?php

namespace App\Models\Admin;

use App\Http\Requests\PictureEntryEditRequest;

class PictureEntryEditDTO
{
    public function __construct(
        public int $pictureId,
        public String $picture,
        public string $time,
        public string $userID,
    ) {}

    public static function getFromRequest(PictureEntryEditRequest $request): self
    {
        return (new self(
            intval($request->input('pictureId')),
            intval($request->input('picture')),
            intval($request->input('time')),
            intval($request->input('userID')),
        ));
    }

}
