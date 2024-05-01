<?php

namespace App\Repositories;

use App\Enums\PostType;
use App\Models\Domain\Comment;
use App\Models\DTO\Post\PostForUserDTO;
use Illuminate\Support\Facades\DB;

class PostRepository
{
    /**
     * @param int $userId
     * @return PostForUserDTO[]
     */
    public function getRecommendationsForUser(int $userId): array
    {
        $rawRequest =
            /** @lang Oracle */ '
                SELECT * FROM TABLE ( GET_POST_RECOMMENDATIONS_FOR_USER(:userId))
            ';

        $result = DB::select($rawRequest, ['userId' => $userId]);

        $posts = [];

        foreach ($result as $post) {
            $posts[] = PostForUserDTO::getFromDBResult($post)
                ->setComments($this->getCommentsForPost($post->postid, $post->posttype));
        }

        return $posts;
    }

    private function getCommentsForPost(int $postId, string $postType): array
    {
        $rawRequest =
            /** @lang Oracle */ '
                SELECT * FROM TABLE ( GET_COMMENTS(:postId, :postType))
            ';

        $result = DB::select($rawRequest, compact('postId', 'postType'));

        $comments = [];

        foreach ($result as $comment) {
            $comments[] = Comment::createFromDBResult($comment);
        }

        return $comments;
    }
}
