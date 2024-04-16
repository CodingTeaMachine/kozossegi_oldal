@php use App\Helpers\UserSession;use App\Models\Domain\SessionUser; @endphp
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
            <button class="btn-primary">
                <a href="/admin">Admin</a>
            </button>
        @endif
    </div>

    <div class="leftSide flex flex-row items-center gap-3">
        <div>
            {{$loggedInUser->firstname}} @if($loggedInUser->nickname !== null) {{$loggedInUser->nickname}} @endif {{$loggedInUser->lastname}}
        </div>

        <form action="/logout" method="POST">
            @method('PUT')
            @csrf

            <input type="submit" class="btn-primary" value="Logout">
        </form>
    </div>
</nav>

<div class="container">
    @section('inner-content')
    @show
</div>
