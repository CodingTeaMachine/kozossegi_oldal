@section('css')
    @vite('resources/css/styles.css')
@endsection
@section('js')
    @vite('resources/js/main.js')
    @vite('resources/js/externalLibs/fontawesome.js')
@endsection
@php use App\Helpers\UserSession;use App\Models\Domain\SessionUser;use Illuminate\Support\Facades\Request; @endphp
@extends('layouts.app')

@php

    /**
    * @type SessionUser $loggedInUser
     */
    $loggedInUser = UserSession::get();

@endphp

<div class="container">
    @yield('inner-content')
</div>
