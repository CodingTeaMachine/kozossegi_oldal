@extends('layouts.inner_app')

@section('css')
    @vite('resources/css/admin.css')
@endsection

@section('inner-content')
    <nav class="flex flex-row gap-3">
        <button class="btn {{ Route::currentRouteName() === 'adminGroup.adminUsersView' ? 'btn-active': 'btn-primary '}}">
            <a href="{{route('adminGroup.adminUsersView')}}">Users</a>
        </button>
        <button class="btn {{ Route::currentRouteName() === 'adminGroup.adminFriendsView' ? 'btn-active': 'btn-primary '}}">
            <a href="{{route('adminGroup.adminFriendsView')}}">Friends</a>
        </button>
    </nav>
    <div class="mt-10">
        @yield('admin-content')
    </div>
@stop
