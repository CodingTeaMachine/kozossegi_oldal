@php  @endphp
@extends('layouts.admin')

@php
    use App\Models\Admin\FriendTableDTO;

    /**
     * @var array<FriendTableDTO> $friends
     */

@endphp

@section('admin-content')
    <button class="btn btn-primary mb-3">
        <a href="/admin/friend/new">NEW FRIEND</a>
    </button>

    <table class="admin-table">
        <tr>
            <th>Actions</th>
            <th>Sender Name (id)</th>
            <th>Receiver Name (id)</th>
        </tr>
        @foreach($friends as $friend)
            <tr>
                <td class="action-col">
                    <button class="btn btn-active">
                        <a href="/admin/friend/edit/{{$friend->senderId}}/{{$friend->receiverId}}">EDIT</a>
                    </button>
                    <form action="/admin/friend" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="senderId" value="{{$friend->senderId}}}"/>
                        <input type="hidden" name="receiverId" value="{{$friend->receiverId}}}"/>
                        <button
                            type="submit"
                            class="btn btn-danger"
                        >
                            DELETE
                        </button>
                    </form>
                </td>
                <td>{{$friend->senderName}} ({{$friend->senderId}})</td>
                <td>{{$friend->receiverName}} ({{$friend->receiverId}})</td>
            </tr>
        @endforeach
    </table>
@endsection
