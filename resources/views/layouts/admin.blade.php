@extends('layouts.inner_app')

@section('css')
    @vite('resources/css/admin.css')
@endsection

@section('inner-content')
    <nav>
        <button class="btn {{ Route::currentRouteName() === 'adminGroup.adminUsersView' ? 'btn-active': 'btn-primary '}}">
            <a href="{{route('adminGroup.adminUsersView')}}">Users</a>
        </button>
    </nav>
    <div class="mt-10">
        @yield('admin-content')
    </div>
@stop
