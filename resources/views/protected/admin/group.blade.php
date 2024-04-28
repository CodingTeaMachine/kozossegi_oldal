@php  @endphp
@extends('layouts.admin')

@php
    use App\Models\Admin\GroupTableDTO;

    /**
     * @var array<GroupTableDTO> $groups
     */

@endphp

@section('admin-content')
    <button class="btn btn-primary mb-3">
        <a href="/admin/group/new">NEW Gruop</a>
    </button>

    <table class="admin-table">
        <tr>
            <th>Actions</th>
            <th>Group Name (id)</th>
            <th>Member Name (id)</th>
        </tr>
        @foreach($groups as $group)
            <tr>
                <td class="action-col">
                    <button class="btn btn-active">
                        <a href="/admin/group/edit/{{$group->groupId}}">ADD Member</a>
                    </button>
                    <form action="/admin/group" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="groupId" value="{{$group->groupId}}}"/>
                        <button
                            type="submit"
                            class="btn btn-danger"
                        >
                            DELETE
                        </button>
                    </form>
                </td>
                <td>{{$group->name}} ({{$group->groupId}})</td>
                <td>{{$group->ownerId}} ({{$group->groupId}})</td>
            </tr>
        @endforeach
    </table>
@endsection
