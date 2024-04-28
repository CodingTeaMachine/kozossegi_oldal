<?php

namespace App\Models\Admin;

use App\Http\Requests\TECommentCreateRequest;

class TECommentCreateDTO
{
    public function __construct(
        public int $commentId,
        public string $comment,
        public string $time,
        public int $senderId,
        public int $TEId,
    ) {}

    public static function getFromRequest(TECommentCreateRequest $request): self
    {
        return (new self(
            intval($request->input('commentId')),
            intval($request->input('comment')),
            intval($request->input('time')),
            intval($request->input('senderId')),
            intval($request->input('TEId')),
        ));
    }

}
