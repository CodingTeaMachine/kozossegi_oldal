<?php

namespace App\Http\Controllers;

use App\Enums\SessionKey;
use App\Helpers\UserSession;
use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RegisterPostRequest;
use App\Models\DTO\User\LoginRequestDTO;
use App\Models\DTO\User\RegisterRequestDTO;
use App\Models\Errors\DatabaseException;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

final readonly class UserController
{

    public function __construct(private UserService $userService)
    {}

    public function loginView(): View
    {
        return view('login');
    }

    public function registerView(): View
    {
        return view('register');
    }

    public function register(RegisterPostRequest $request): RedirectResponse
    {
        $registerDTO = RegisterRequestDTO::fromRequest($request);

        try {
            $this->userService->createUser($registerDTO);
        } catch (DatabaseException $exception) {
            Session::flash(SessionKey::ERROR->value, $exception->getMessage());
            return Redirect::back();
        }

        Session::flash(SessionKey::SUCCESSFUL_REGISTRATION->value);
        return Redirect::route('loginView');
    }

    public function login(LoginPostRequest $request): RedirectResponse
    {
        $loginDTO = LoginRequestDTO::fromRequest($request);

        try {
            $sessionUser = $this->userService->login($loginDTO);
            UserSession::login($sessionUser);
        } catch (DatabaseException $exception) {
            Session::flash(SessionKey::ERROR->value, $exception->getMessage());
            return Redirect::back();
        }

        return Redirect::route('landingView');
    }

    public function logout(): RedirectResponse
    {
        UserSession::logout();
        return Redirect::route('loginView');
    }
}
