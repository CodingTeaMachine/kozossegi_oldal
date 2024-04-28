<?php

namespace App\Models\Admin;

use App\Http\Requests\FriendEditRequest;

class FriendEditDTO
{
    public function __construct(
        public int $senderId,
        public int $receiverId,
        public int $initialSenderId,
        public int $initialReceiverId,
    ) {}

    public static function getFromRequest(FriendEditRequest $request): self
    {
        return (new self(
            intval($request->input('senderId')),
            intval($request->input('receiverId')),
            intval($request->input('initialSenderId')),
            intval($request->input('initialReceiverId')),
        ));
    }

}
