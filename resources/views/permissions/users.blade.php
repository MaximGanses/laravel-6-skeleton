@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add new user</h1>

        <table class="table table-sm">
            <thead>
            <tr>
                <th>Id</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Roles</th>
                <th class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if(count($user->roles) === 0)
                            <form action="{{route('users.add.roles')}}" method="POST">
                                @csrf
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#user-role{{$user->id}}">
                                    Add roles
                                </button>
                                @include('permissions.user_role',['roles'=> $roles])
                            </form>
                        @else
                            @foreach($user->roles as $role)
                                <div class="p-2 d-flex align-items-center justify-content-between">
                                    <p class="m-0">{{$role->name}}</p>
                                    <a class="fas fa-times-circle text-danger"
                                       href="{{route('users.remove.roles',['role'=>$role,'user'=>$user])}}"></a>
                                </div>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <div class="row pr-2 d-flex justify-content-end">
                            <form action="{{route('users.edit')}}" method="POST">
                                @csrf
                                <button type="button" class="btn btn-warning mr-1" data-toggle="modal"
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
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{ $users->links() }}
        @include('permissions.user_input')
    </div>
@endsection
