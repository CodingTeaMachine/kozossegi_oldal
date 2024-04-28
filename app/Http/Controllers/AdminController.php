<?php

namespace App\Http\Controllers;

use App\Services\FriendService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

readonly final class AdminController
{
    public function __construct(
        private UserService $userService,
        private FriendService $friendService,
    ) {}

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

    public function friendsView(): View
    {
        $friends = $this->friendService->getForAdminTable();
        return view('protected.admin.friends', compact('friends'));
    }

    public function friendNewView(): View
    {
        $users = $this->userService->getAllForDropdown();
        return view('protected.admin.friend_new', compact('users'));
    }

    public function friendEditView(int $senderId, int $receiverId): View|RedirectResponse
    {
        $users = $this->userService->getAllForDropdown();
        return view('protected.admin.friend_edit', compact('senderId', 'receiverId', 'users'));
    }

}
