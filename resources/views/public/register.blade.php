@extends('layouts.login')

@php
    use App\Enums\SessionKey;use Illuminate\Support\Facades\Session;
@endphp

@section('content')
    <div class="container">

        <div class="about">
            <h1>Welcome to <span>Visage!</span></h1>
            <div class="description">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur officiis voluptate quod modi
                    asperiores nemo, nisi architecto repudiandae corrupti, deserunt esse praesentium aliquam itaque
                    fugiat cumque aperiam, eos reprehenderit et.</p>
            </div>
        </div>

        <div class="reg">
            <h1>Visage</h1>
            <div class="from-container">
                <h2>Create a new account</h2>

                @if(Session::has(SessionKey::ERROR->value))
                    <div class="mb-5 text-red-500">{{Session::get(SessionKey::ERROR->value)}}</div>
                @endif

                @if ($errors->any())
                    <ul class="mb-5">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form action="/register" method="POST">
                    @csrf

                    <div class="input-field">
                        <input
                            type="text"
                            id='lastname'
                            name='lastname'
                            placeholder='lastname'
                            class="@error('lastname') input-error @enderror"
                            value="{{old('lastname')}}"
                        >
                        <input
                            type="text"
                            id='firstname'
                            name='firstname'
                            placeholder='firstname'
                            class="@error('firstname') input-error @enderror"
                            value="{{old('firstname')}}"
                        >
                    </div>

                    <div class="input-field">
                        <input
                            type="email"
                            id='email'
                            name='email'
                            placeholder='email'
                            class="@error('email') input-error @enderror"
                            value="{{old('email')}}"
                        >
                    </div>
                    <div class="input-field">
                        <input
                            type="password"
                            id='password'
                            name='password'
                            placeholder='password'
                            class="@error('password') input-error @enderror"
                            value="{{old('password')}}"
                        >
                    </div>
                    <div class="input-field">
                        <input
                            type="password"
                            id='password_again'
                            name='password_again'
                            placeholder='password again'
                            class="@error('password_again') input-error @enderror"
                            value="{{old('password')}}"
                        >
                    </div>

                    <div class="input-field">
                        <input
                            type="date"
                            id='birthday'
                            name='birthday'
                            class="@error('birthday') input-error @enderror"
                            value="{{old('birthday')}}"
                        >
                    </div>

                    <div class="text-left w-[90%] mx-auto px-3 pb-2">
                        The password must...
                        <ul class="list-disc ml-5">
                            <li>be at least 8 characters long</li>
                            <li>contain at least 1 uppercase letter</li>
                            <li>contain at least 1 lowercase letter</li>
                            <li>contain at least 1 number</li>
                        </ul>
                    </div>

                    <div class="input-field">
                        <input type="submit" id='signUp' name='signUp' value="Sign up">
                    </div>
                </form>
                <p>You already have an account? <a href="{{route('loginView')}}">Click here</a></p>
            </div>
        </div>
    </div>

@endsection
