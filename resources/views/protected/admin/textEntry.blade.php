@php  @endphp
@extends('layouts.admin')

@php
    use App\Models\Admin\TextEntryTableDTO;

    /**
     * @var array<TextEntryTableDTO> $texts
     */

@endphp

@section('admin-content')
    <button class="btn btn-primary mb-3">
        <a href="/admin/textEntry/new">NEW Gruop</a>
    </button>

    <table class="admin-table">
        <tr>
            <th>Actions</th>
            <th>Text Entry (id)</th>
            <th>Text</th>
        </tr>
        @foreach($texts as $text)
            <tr>
                <td class="action-col">
                    <button class="btn btn-active">
                        <a href="/admin/textEntry/edit/{{$text->textId}}">EDIT</a>
                    </button>
                    <form action="/admin/textEntry" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="groupId" value="{{$text->textId}}}"/>
                        <button
                            type="submit"
                            class="btn btn-danger"
                        >
                            DELETE
                        </button>
                    </form>
                </td>
                <td>{{$text->textId}}</td>
                <td>{{$text->text}}</td>
            </tr>
        @endforeach
    </table>
@endsection
