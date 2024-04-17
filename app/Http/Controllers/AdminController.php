<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

readonly final class AdminController
{
    public function __construct(private UserService $userService)
    {}

    public function index(): View
    {
        return view('protected.admin.landing');
    }

    public function usersView(): View
    {
        $users = $this->userService->getForAdminTable();
        return view('protected.admin.users', compact('users'));
    }

    public function userEditView(int $id): View|RedirectResponse
    {
        $user = $this->userService->getForAdminEdit($id);

        if($user === null)
            return Redirect::route('adminGroup.adminUsersView');

        return view('protected.admin.user_edit', compact('user'));
    }
}
