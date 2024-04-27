<?php

namespace App\Models\Admin;

use App\Http\Requests\MemberCreateRequest;

class MemberCreateDTO
{
    public function __construct(
        public int    $senderId,
        public int $receiverId,
        public int    $groupId,
    ) {}

    public static function getFromRequest(MemberCreateRequest $request): self
    {
        return (new self(
            intval($request->input('senderId')),
            intval($request->input('receiverId')),
            intval($request->input('groupId')),
        ));
    }

}
