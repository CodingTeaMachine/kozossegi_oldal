<?php

namespace App\Models\Admin;

use App\Http\Requests\PReactionCreateRequest;

class PReactionCreateDTO
{
    public function __construct(
        public int $userId,
        public int $pictureId,
        public int $reaction,
    ) {}

    public static function getFromRequest(PReactionCreateRequest $request): self
    {
        return (new self(
            intval($request->input('userId')),
            intval($request->input('pictureId')),
            intval($request->input('reaction')),
        ));
    }

}
