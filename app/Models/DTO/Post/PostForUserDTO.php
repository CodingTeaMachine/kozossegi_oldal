<?php

namespace App\Models\DTO\Post;

use App\Enums\PostType;
use App\Models\Domain\Comment;
use Carbon\Carbon;

class PostForUserDTO
{
    /**
     * @var Comment[] $comments
     */
    public array $comments = [];

    /**
     * @param int $postId
     * @param int $userId
     * @param string $userName
     * @param string $content
     * @param PostType $postType
     * @param Carbon $createdAt
     * @param int $likesCount
     * @param int $dislikesCount
     */
    private function __construct(
        public int $postId,
        public int $userId,
        public string $userName,
        public string $content,
        public PostType $postType,
        public Carbon $createdAt,
        public int $likesCount,
        public int $dislikesCount,
    ){}

    public static function getFromDBResult($dbResult): self
    {
        return new PostForUserDTO(
            intval($dbResult->postid),
            intval($dbResult->userid),
            $dbResult->username,
            $dbResult->content ?? $dbResult->image,
            PostType::tryFrom($dbResult->posttype === 'TEXT' ? 0 : 1),
            Carbon::parse($dbResult->createdat),
            $dbResult->likecount,
            $dbResult->dislikecount
        );
    }

    /**
     * @param Comment[] $comments
     * @return $this
     */
    public function setComments(array $comments): self
    {
        $this->comments = $comments;
        return $this;
    }

}
