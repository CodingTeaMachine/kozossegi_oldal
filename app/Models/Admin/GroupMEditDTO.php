<?php

namespace App\Models\Admin;

use App\Http\Requests\GroupMEditRequest;

class GroupMEditDTO
{
    public function __construct(
        public int $Id,
        public string $text,
        public int $senderId,
        public int $groupId,
        public string $time,
    ) {}

    public static function getFromRequest(GroupMEditRequest $request): self
    {
        return (new self(
            intval($request->input('Id')),
            intval($request->input('text')),
            intval($request->input('senderId')),
            intval($request->input('groupId')),
            intval($request->input('time')),
        ));
    }

}
