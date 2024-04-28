<?php

namespace App\Models\Admin;

use App\Http\Requests\TReactionCreateRequest;

class TextReactionCreateDTO
{
    public function __construct(
        public int $userId,
        public int $TEId,
        public int $reaction,
    ) {}

    public static function getFromRequest(TReactionCreateRequest $request): self
    {
        return (new self(
            intval($request->input('userId')),
            intval($request->input('TEId')),
            intval($request->input('reaction')),
        ));
    }

}
