<?php

namespace App\Models\Admin;

use App\Http\Requests\PrivateCreateRequest;

class PrivateCreateDTO
{
    public function __construct(
        public int $privateId,
        public string $text,
        public int $senderId,
        public int $receiverId,
        public string $time,
    ) {}

    public static function getFromRequest(PrivateCreateRequest $request): self
    {
        return (new self(
            intval($request->input('privateId')),
            intval($request->input('text')),
            intval($request->input('senderId')),
            intval($request->input('receiverId')),
            intval($request->input('time')),
        ));
    }

}
