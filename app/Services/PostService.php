<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{

    public function __construct(private readonly PostRepository $postRepository)
    {}

    public function listForUser(int $userId)
    {

        return $this->postRepository->getRecommendationsForUser($userId);

    }
}
