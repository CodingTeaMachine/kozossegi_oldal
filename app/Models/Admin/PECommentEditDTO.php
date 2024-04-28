<?php

namespace App\Models\Admin;

use App\Http\Requests\PECommentEditRequest;

class PECommentEditDTO
{
    public function __construct(
        public int $peCommentId,
        public int $comment,
        public string $time,
        public string $userId,
        public string $peId,
    ) {}

    public static function getFromRequest(PECommentEditRequest $request): self
    {
        return (new self(
            intval($request->input('peCommentId')),
            intval($request->input('comment')),
            intval($request->input('time')),
            intval($request->input('userId')),
            intval($request->input('peId')),
        ));
    }

}
