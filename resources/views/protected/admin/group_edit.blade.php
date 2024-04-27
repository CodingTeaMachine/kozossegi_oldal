@extends('layouts.admin')

@php
use App\Models\Admin\UserDropdownDTO;
use App\Enums\SessionKey
/**
* @var array<UserDropdownDTO> $users
    * @var int $senderId
    * @var int new_memberId
    */

    @endphp

    @section('admin-content')
    <div class="mx-auto border border-white w-1/3">
        <div class="text-center text-2xl uppercase font-bold mt-5">Editing Groups</div>

        @if(Session::has(SessionKey::ERROR->value))
        <div class="mt-5 text-red-500">{{Session::get(SessionKey::ERROR->value)}}</div>
        @endif

        @if ($errors->any())
        <ul class="mt-5">
            @foreach ($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form action="/admin/group/edit" method="POST" class="flex flex-col justify-center gap-2 my-5">
            @csrf
            @method('PUT')

            <div class="input-field">
                <label for="group">Group Name</label>
                <select id="group" name="groupId">
                    @foreach($groups as $group)
                    <option
                        value="{{$group->id}}"
                        @if($group->id === $groupId) selected @endif
                        >
                        {{$group->name}} ({{$group->id}})
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="input-field">
                <label for="new_member">New Member</label>
                <select id="new_member" name="new_memberId">
                    @foreach($users as $user)
                    <option
                        value="{{$user->id}}"
                        @if($user->id === $new_memberId) selected @endif
                        >
                        {{$user->name}} ({{$user->id}})
                    </option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="initialSenderId" value="{{$groupId}}">
            <input type="hidden" name="initialReceiverId" value="{{$new_memberId}}">

            <input
                type="submit"
                class="btn btn-primary w-[80%] mx-auto cursor-pointer"
                value="SUBMIT"
            />
        </form>
    </div>
    @endsection
