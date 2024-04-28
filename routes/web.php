<?php

use App\Helpers\UserSession;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserController;
use App\Middleware\AdminMiddleware;
use App\Middleware\LoggedOutOnlyMiddleware;
use App\Middleware\PrivateMiddleware;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(UserSession::isLoggedIn())
        return Redirect::route('landingView');

    return Redirect::route('loginView');
});

Route::middleware(LoggedOutOnlyMiddleware::class)->group(function () {
    Route::get('login', [UserController::class, 'loginView'])->name('loginView');
    Route::post('login', [UserController::class, 'login']);

    Route::get('register', [UserController::class, 'registerView'])->name('registerView');
    Route::post('register', [UserController::class, 'register']);
});

Route::middleware(PrivateMiddleware::class)->group(function() {
    Route::get('landing', [LandingController::class, 'index'])->name('landingView');
    Route::put('logout', [UserController::class, 'logout']);

    Route::prefix('admin')->middleware(AdminMiddleware::class)->name('adminGroup.')->group(function () {
        Route::get('', [AdminController::class, 'index'])->name('adminView');

        Route::get('users', [AdminController::class, 'usersView'])->name('adminUsersView');
        Route::get('user/edit/{id}', [AdminController::class, 'userEditView'])->name('adminUserEditView')->where(['id'=> '[0-9]+']);
        Route::put('user/edit', [UserController::class, 'editUser']);
        Route::delete('user', [UserController::class, 'deleteUser']);

        Route::get('friends', [AdminController::class, 'friendsView'])->name('adminFriendsView');
        Route::get('friend/new', [AdminController::class, 'friendNewView'])->name('friendNewView');
        Route::post('friend', [FriendController::class, 'create']);
        Route::get('friend/edit/{senderId}/{receiverId}', [AdminController::class, 'friendEditView'])
            ->name('adminUserEditView')
            ->where(['senderId'=> '[0-9]+','receiverId'=> '[0-9]+']);
        Route::put('friend/edit', [FriendController::class, 'editFriend']);
        Route::delete('friend', [FriendController::class, 'deleteFriend']);
    });
});
