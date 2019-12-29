@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Permission list</h1>
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($info as $permission)
                    <tr>
                        <td>{{$permission['name']}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

        <div class="container mt-3">
            @include('permissions.permission_input')
        </div>
    </div>
@endsection
