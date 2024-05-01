<?php

namespace App\Models\Domain;

use Carbon\Carbon;

class Comment
{
    public function __construct(
        public int $commentId,
        public string $postId,
        public int $userId,
        public string $userName,
        public string $content,
        public Carbon $createdAt,
    )
    {}

    public static function createFromDBResult($result): self
    {
        return new self(
            $result->commentid,
            $result->postid,
            $result->userid,
            $result->username,
            $result->content,
            Carbon::parse($result->createdat),
        );
    }
}
