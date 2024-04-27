@extends('layouts.admin')

@php
    use App\Enums\SessionKey;
    use App\Models\Admin\UserDropdownDTO;

    /**
    * @var array<UserDropdownDTO> $users
     */
;@endphp

@section('admin-content')
    <div class="mx-auto border border-white w-1/3">
        <div class="text-center text-2xl uppercase font-bold mt-5">Create Group</div>

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

        <form action="/admin/group" method="POST" class="flex flex-col justify-center gap-2 my-5">
            @csrf

            <div class="input-field">
                <label for="group_name">Group Name</label>
                <input
                    type="text"
                    id='group_name'
                    name='group_name'
                    placeholder='Group name'
                    class="@error('group_name') input-error @enderror"
                >
            </div>
            <input type="hidden" value="{{$group->tulaj}}}">

            <input
                type="submit"
                class="btn btn-primary w-[80%] mx-auto cursor-pointer"
                value="CREATE"
            />
        </form>
    </div>
@endsection
