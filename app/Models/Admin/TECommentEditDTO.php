<?php

namespace App\Models\Admin;

use App\Http\Requests\TECommentEditRequest;

class TECommentEditDTO
{
    public function __construct(
        public int $commentId,
        public int $comment,
        public string $time,
        public string $senderId,
        public int $TEId,
    ) {}

    public static function getFromRequest(TECommentEditRequest $request): self
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
