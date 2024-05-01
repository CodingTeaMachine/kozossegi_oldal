<?php

namespace App\Http\Controllers;

use App\Models\Domain\SessionUser;
use App\Models\DTO\Post\PostsForUserDTO;
use App\Services\PostService;

readonly class PostController
{

    public function __construct(private PostService $postService)
    {}

    /**
     * @return PostsForUserDTO[]
     */
    public function list(): array
    {
        $userId = SessionUser::getFromSession()->id;
        return $this->postService->listForUser($userId);
    }

}
