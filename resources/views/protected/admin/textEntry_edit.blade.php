@extends('layouts.admin')

@php
    use App\Models\Admin\TextEntryDropdownDTO;
    use App\Enums\SessionKey
    /**
     * @var array<TextEntryDropdownDTO> $texts
     * @var  $textId
     */

@endphp

@section('admin-content')
    <div class="mx-auto border border-white w-1/3">
        <div class="text-center text-2xl uppercase font-bold mt-5">Editing Text</div>

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
                <label for="text">Text</label>
                <textarea
                    type="text"
                    id='text'
                    name='text'
                    placeholder='Text'
                    value="{{$texts->$text}}"
                    class="@error('text') input-error @enderror"
                ></textarea>
            </div>
            <input type="hidden" value="{{$texts->$textId}}}">
            <input
                type="submit"
                class="btn btn-primary w-[80%] mx-auto cursor-pointer"
                value="SUBMIT"
            />
        </form>
    </div>
@endsection
