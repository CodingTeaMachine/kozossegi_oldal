@php use App\Enums\UserRole;use App\Models\Admin\UserEditDTO; @endphp
@extends('layouts.admin')

@php

    /**
     * @var UserEditDTO $user
     */

@endphp

@section('admin-content')
    <div class="mx-auto border border-white w-1/3">
        <div class="text-center text-2xl uppercase font-bold mt-5">Editing User</div>

        @if ($errors->any())
            <ul class="mt-5">
                @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="/admin/user/edit" method="POST" class="flex flex-col justify-center gap-2 my-5">
            @csrf
            @method('PUT')

            <div class="input-field">
                <input
                    type="text"
                    id='firstname'
                    name='firstname'
                    placeholder='firstname'
                    class="@error('firstname') input-error @enderror"
                    value="{{$user->firstname}}"
                >
            </div>

            <div class="input-field">
                <input
                    type="text"
                    id='lastname'
                    name='lastname'
                    placeholder='lastname'
                    class="@error('lastname') input-error @enderror"
                    value="{{$user->lastname}}"
                >
            </div>

            <div class="input-field">
                <input
                    type="text"
                    id='nickname'
                    name='nickname'
                    placeholder='nickname'
                    class="@error('nickname') input-error @enderror"
                    value="{{$user->nickname}}"
                >
            </div>

            <div class="input-field">
                <input
                    type="email"
                    id='email'
                    name='email'
                    placeholder='email'
                    class="@error('email') input-error @enderror"
                    value="{{$user->email}}"
                >
            </div>

            <div class="input-field">
                <input
                    type="date"
                    id='birthday'
                    name='birthday'
                    class="@error('birthday') input-error @enderror"
                    value="{{$user->birthday}}"
                >
            </div>

            <div class="w-[90%] mx-auto">
                <input
                    id="role-admin"
                    type="radio"
                    name='Role'
                    value="{{UserRole::ADMIN->value}}"
                    @if($user->role->value === UserRole::ADMIN->value) checked @endif
                >
                <label for="role-admin">{{UserRole::ADMIN->name}}</label>
                <input
                    id="role-user"
                    type="radio"
                    name='Role'
                    value="{{UserRole::USER->value}}"
                    @if($user->role->value === UserRole::USER->value) checked @endif
                >
                <label for="role-user">{{UserRole::USER->name}}</label>
            </div>

            <div class="input-field">
                <input
                    type="text"
                    id='workplace'
                    name='workplace'
                    placeholder='workplace'
                    class="@error('workplace') input-error @enderror"
                    value="{{$user->workplace}}"
                >
            </div>

            <div class="input-field">
                <input
                    type="text"
                    id='school'
                    name='school'
                    placeholder='school'
                    class="@error('school') input-error @enderror"
                    value="{{$user->school}}"
                >
            </div>

            <div class="input-field">
                <input
                    type="text"
                    id='placeOfLiving'
                    name='placeOfLiving'
                    placeholder='place of living'
                    class="@error('placeOfLiving') input-error @enderror"
                    value="{{$user->placeOfLiving}}"
                >
            </div>

            <div class="input-field">
                <input
                    type="text"
                    id='placeOfBirth'
                    name='placeOfBirth'
                    placeholder='place of birth'
                    class="@error('placeOfBirth') input-error @enderror"
                    value="{{$user->placeOfBirth}}"
                >
            </div>

            <div class="input-field">
                <input
                    type="text"
                    id='phone'
                    name='phone'
                    placeholder='phone'
                    class="@error('phone') input-error @enderror"
                    value="{{$user->phone}}"
                >
            </div>

            <input type="hidden" name="id" value="{{$user->id}}}"/>
            <input
                type="submit"
                class="btn btn-primary w-[80%] mx-auto cursor-pointer"
                value="EDIT"
            />
        </form>
    </div>
@endsection
