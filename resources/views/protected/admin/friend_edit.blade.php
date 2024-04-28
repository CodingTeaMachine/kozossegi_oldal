@extends('layouts.admin')

@php
    use App\Models\Admin\UserDropdownDTO;
    use App\Enums\SessionKey
    /**
     * @var array<UserDropdownDTO> $users
     * @var int $senderId
     * @var int $receiverId
     */

@endphp

@section('admin-content')
    <div class="mx-auto border border-white w-1/3">
        <div class="text-center text-2xl uppercase font-bold mt-5">Editing Friend</div>

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

        <form action="/admin/friend/edit" method="POST" class="flex flex-col justify-center gap-2 my-5">
            @csrf
            @method('PUT')

            <div class="input-field">
                <label for="sender">Sender</label>
                <select id="sender" name="senderId">
                    @foreach($users as $user)
                        <option
                            value="{{$user->id}}"
                            @if($user->id === $senderId) selected @endif
                        >
                            {{$user->name}} ({{$user->id}})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-field">
                <label for="receiver">Receiver</label>
                <select id="receiver" name="receiverId">
                    @foreach($users as $user)
                        <option
                            value="{{$user->id}}"
                            @if($user->id === $receiverId) selected @endif
                        >
                            {{$user->name}} ({{$user->id}})
                        </option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="initialSenderId" value="{{$senderId}}">
            <input type="hidden" name="initialReceiverId" value="{{$receiverId}}">

            <input
                type="submit"
                class="btn btn-primary w-[80%] mx-auto cursor-pointer"
                value="SUBMIT"
            />
        </form>
    </div>
@endsection
