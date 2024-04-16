<?php

use App\Helpers\UserSession;
use App\Http\Controllers\AdminController;
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

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('admin', [AdminController::class, 'index'])->name('adminView');
    });
});
