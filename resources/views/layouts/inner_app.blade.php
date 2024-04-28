@php use App\Helpers\UserSession;use App\Models\Domain\SessionUser;use Illuminate\Support\Facades\Request; @endphp
@extends('layouts.app')

@php

    /**
    * @type SessionUser $loggedInUser
     */
    $loggedInUser = UserSession::get();

@endphp

<nav class="flex justify-between p-3">
    <a href="{{route('landingView')}}" class="text-2xl">Visage!</a>

    <div class="middle">
        @if(UserSession::isAdmin())
            <button class="btn {{ str_starts_with(Route::currentRouteName(), 'adminGroup') ? 'btn-active': 'btn-primary'}}">
                <a href="{{route('adminGroup.adminView')}}">Admin</a>
            </button>
        @endif
    </div>

    <div class="leftSide flex flex-row items-center gap-3">
        <div>
            {{$loggedInUser->firstname}} @if($loggedInUser->nickname !== null)
                {{$loggedInUser->nickname}}
            @endif {{$loggedInUser->lastname}}
        </div>

        <form action="/logout" method="POST">
            @method('PUT')
            @csrf

            <input type="submit" class="btn btn-primary" value="Logout">
        </form>
    </div>
</nav>

<div class="container">
    @yield('inner-content')
</div>
