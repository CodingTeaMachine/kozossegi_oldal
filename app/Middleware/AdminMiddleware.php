<?php

namespace App\Middleware;

use App\Helpers\UserSession;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware implements Middleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if(UserSession::isAdmin())
            return $next($request);

        return Redirect::route('loginView');
    }
}
