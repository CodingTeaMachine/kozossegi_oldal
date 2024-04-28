<?php

namespace App\Models\Admin;

use App\Http\Requests\GroupEditRequest;

class GroupEditDTO
{
    public function __construct(
        public int $groupId,
        public string $name,
        public int $ownerId,
    ) {}

    public static function getFromRequest(GroupEditRequest $request): self
    {
        return (new self(
            intval($request->input('groupId')),
            intval($request->input('name')),
            intval($request->input('ownerId')),
        ));
    }

}
