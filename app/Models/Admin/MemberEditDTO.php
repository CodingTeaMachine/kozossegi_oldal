<?php

namespace App\Models\Admin;

use App\Http\Requests\MemberEditRequest;

class MemberEditDTO
{
    public function __construct(
        public int    $senderId,
        public int $receiverId,
        public int    $groupId,
    ) {}

    public static function getFromRequest(MemberEditRequest $request): self
    {
        return (new self(
            intval($request->input('senderId')),
            intval($request->input('receiverId')),
            intval($request->input('groupId')),
        ));
    }

}
