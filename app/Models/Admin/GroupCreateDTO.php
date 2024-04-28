<?php

namespace App\Models\Admin;

use App\Http\Requests\GroupCreateRequest;

class GroupCreateDTO
{
    public function __construct(
        public int $groupId,
        public string $name,
        public int $ownerId,
    ) {}

    public static function getFromRequest(GroupCreateRequest $request): self
    {
        return (new self(
            intval($request->input('groupId')),
            intval($request->input('name')),
            intval($request->input('ownerId')),
        ));
    }

}
