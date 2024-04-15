<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $userData = (new TestController())->getFelhasznaloList();

    return view('welcome', ['response' => compact('userData')]);
});
