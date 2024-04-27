<?php

namespace App\Models\Admin;

use App\Http\Requests\TextEntryEditRequest;

class TextEntryEditDTO
{
    public function __construct(
        public int $textId,
        public int $text,
        public int $date,
        public int $senderId,
    ) {}

    public static function getFromRequest(TextEntryEditRequest $request): self
    {
        return (new self(
            intval($request->input('textId')),
            intval($request->input('text')),
            intval($request->input('date')),
            intval($request->input('senderId')),
        ));
    }

}
