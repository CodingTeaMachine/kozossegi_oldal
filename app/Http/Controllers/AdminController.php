<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

readonly final class AdminController
{
    public function index(): View
    {
        return view('protected.admin.landing');
    }
}
