<?php

namespace App\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

interface Middleware
{
    public function handle(Request $request, Closure $next): Response;
}
