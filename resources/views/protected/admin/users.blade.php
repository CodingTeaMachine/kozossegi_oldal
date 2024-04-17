@php  @endphp
@extends('layouts.admin')

@php
    use App\Helpers\UserSession;
    use App\Models\Admin\UserEditDTO;

    /**
     * @var array<UserEditDTO> $users
     */

@endphp

@section('admin-content')
    <table class="admin-table">
        <tr>
            <th>Actions</th>
            <th>Id</th>
            <th>Name</th>
            <th>Nickname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Birthday</th>
            <th>Workplace</th>
            <th>School</th>
            <th>Place of living</th>
            <th>Phone</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td class="action-col">

                    <button class="btn btn-active">
                        <a href="/admin/user/edit/{{$user->id}}">EDIT</a>
                    </button>

                    <form action="/admin/user" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$user->id}}}"/>
                        <button
                            type="submit"
                            class="btn btn-danger"
                            @if(UserSession::isCurrentUser($user->id)) disabled @endif>
                            DELETE
                        </button>
                    </form>

                </td>
                <td class="text-center">{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->nickname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td class="text-center">{{$user->birthday}}</td>
                <td>{{$user->workplace}}</td>
                <td>{{$user->school}}</td>
                <td>{{$user->placeOfLiving}}</td>
                <td>{{$user->phone}}</td>
            </tr>
        @endforeach
    </table>
@endsection
