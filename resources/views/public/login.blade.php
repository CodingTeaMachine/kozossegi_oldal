@php use App\Enums\SessionKey; @endphp
@extends('layouts.login')

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
        <div class="log">
            <h1>Visage</h1>
            <div class="from-container">
                <h2>Sing into your account</h2>

                @if(Session::has(SessionKey::SUCCESSFUL_REGISTRATION->value))
                    <div class="mb-5 text-green-500">Successful registration</div>
                @elseif(Session::has(SessionKey::ERROR->value))
                    <div class="mb-5 text-red-500">{{Session::get(SessionKey::ERROR->value)}}</div>
                @endif


                @if ($errors->any())
                    <ul class="mb-5">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form action="/login" method="POST">
                    @csrf

                    <div class="input-field">
                        <input
                            type="email"
                            id='email'
                            name='email'
                            placeholder='email'
                            class="@error('email') input-error @enderror"
                        >
                    </div>
                    <div class="input-field">
                        <input
                            type="password"
                            id='password'
                            name='password'
                            placeholder='password'
                            class="@error('password') input-error @enderror"
                        >
                    </div>
                    <div class="input-field">
                        <input type="submit" id='signUp' name='signUp' value="Sign in">
                    </div>
                </form>
                <p>You want to create a new account? <a href="{{route('registerView')}}">Click here</a></p>
            </div>
        </div>
    </div>
@endsection
