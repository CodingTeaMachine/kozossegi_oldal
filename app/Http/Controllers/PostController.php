<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\JsonResponse;

class PostController
{

    public function __construct(private readonly PostService $postService)
    {}

    public function list(): JsonResponse
    {
        $userId = 1;

        $currentUsersPosts = $this->postService->listForUser($userId);

        return response()->json(['posts' => $currentUsersPosts]);
    }

}
