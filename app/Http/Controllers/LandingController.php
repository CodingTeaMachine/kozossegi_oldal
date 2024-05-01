<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

readonly class LandingController
{

    public function __construct(private PostController $postController)
    {}

    public function index(): View
    {
        return view('protected.index', ['response' =>['posts' => $this->postController->list()]]);
    }

}
