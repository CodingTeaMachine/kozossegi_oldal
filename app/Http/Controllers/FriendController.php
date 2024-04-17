<?php

namespace App\Http\Controllers;

use App\Enums\SessionKey;
use App\Helpers\UserSession;
use App\Http\Requests\DeleteFriendRequest;
use App\Http\Requests\DeleteRequest;
use App\Http\Requests\FriendCreateRequest;
use App\Http\Requests\FriendEditRequest;
use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RegisterPostRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Admin\FriendCreateDTO;
use App\Models\Admin\FriendEditDTO;
use App\Models\Admin\UserEditDTO;
use App\Models\DTO\User\LoginRequestDTO;
use App\Models\DTO\User\RegisterRequestDTO;
use App\Models\Errors\DatabaseException;
use App\Services\FriendService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

final readonly class FriendController
{

    public function __construct(private FriendService $friendService)
    {}

    public function create(FriendCreateRequest $request): RedirectResponse
    {
        $registerDTO = FriendCreateDTO::getFromRequest($request);

        try {
            $this->friendService->create($registerDTO);
        } catch (DatabaseException $exception) {
            Session::flash(SessionKey::ERROR->value, $exception->getMessage());
            return Redirect::back();
        }

        Session::flash(SessionKey::SUCCESSFUL_REGISTRATION->value);
        return Redirect::route('adminGroup.adminFriendsView');
    }

    public function editFriend(FriendEditRequest $request): View|RedirectResponse
    {
        $editDTO = FriendEditDTO::getFromRequest($request);

        try {
            $this->friendService->updateFriend($editDTO);
        } catch (DatabaseException $exception) {
            Session::flash(SessionKey::ERROR->value, $exception->getMessage());
            return Redirect::back();
        }

        Session::flash(SessionKey::SUCCESSFUL_REGISTRATION->value);
        return Redirect::route('adminGroup.adminFriendsView');
    }

    public function deleteFriend(DeleteFriendRequest $request): RedirectResponse
    {
        $this->friendService->deleteById(
            intval($request->input('senderId')),
            intval($request->input('receiverId'))
        );
        return Redirect::route('adminGroup.adminFriendsView');
    }
}
