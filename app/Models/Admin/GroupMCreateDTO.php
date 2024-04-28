<?php

namespace App\Models\Admin;

use App\Http\Requests\GroupMCreateRequest;

class GroupMCreateDTO
{
    public function __construct(
        public int $Id,
        public string $text,
        public int $senderId,
        public int $groupId,
        public string $time,
    ) {}

    public static function getFromRequest(GroupMCreateRequest $request): self
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
