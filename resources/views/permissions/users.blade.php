@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Add new user</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="{{route('users.edit')}}" method="POST">
                            @csrf
                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#user{{$user->id}}">
                                Edit user
                            </button>
                            @include('permissions.user_edit',['user'=>$user])
                        </form>
                        <form action="{{route('users.delete')}}" method="GET">
                            @csrf
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#user-delete{{$user->id}}">
                                Delete user
                            </button>
                            @include('permissions.user_delete',['user'=>$user])
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $users->links() }}

        @include('permissions.user_input')
    </div>
@endsection
