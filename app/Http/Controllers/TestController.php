<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\View\View;

readonly final class TestController
{
    public function __construct(private UserService $userService)
    {}

    public function index(): View
    {
        $userData  = $this->userService->getUsers();
        return view('landing.index', ["response" => compact('userData')]);
    }
}
