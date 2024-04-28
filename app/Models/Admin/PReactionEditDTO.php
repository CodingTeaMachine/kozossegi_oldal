<?php

namespace App\Models\Admin;

use App\Http\Requests\PReactionEditRequest;

class PReactionEditDTO
{
    public function __construct(
        public int $userId,
        public int $pictureId,
        public int $reaction,
    ) {}

    public static function getFromRequest(PReactionEditRequest $request): self
    {
        return (new self(
            intval($request->input('userId')),
            intval($request->input('pictureId')),
            intval($request->input('reaction')),
        ));
    }

}
