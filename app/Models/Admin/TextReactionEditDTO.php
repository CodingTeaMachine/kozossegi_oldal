<?php

namespace App\Models\Admin;

use App\Http\Requests\TextReactionEditRequest;

class TextReactionEditDTO
{
    public function __construct(
        public int $userId,
        public int $TEId,
        public int $reaction,
    ) {}

    public static function getFromRequest(TextReactionEditRequest $request): self
    {
        return (new self(
            intval($request->input('userId')),
            intval($request->input('TEId')),
            intval($request->input('reaction')),
        ));
    }

}
