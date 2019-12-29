@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Role list</h1>
        {{--        <div class="d-flex justify-content-between">--}}
        {{--            @foreach($info as $tab)--}}
        {{--                <div class="card col-4 p-0">--}}
        {{--                    <div class="card-header">--}}
        {{--                        {{$tab['name']}}--}}
        {{--                        <p class="text-muted small">{{$tab['created']}}</p>--}}
        {{--                    </div>--}}
        {{--                    <div class="card-body">--}}
        {{--                        <p class="text-bold">Roles</p>--}}
        {{--                        <p>{{$tab['total']}}</p>--}}
        {{--                        <p class="text-bold">Permissions</p>--}}
        {{--                        @if(count($tab['permission_list']) > 0)--}}
        {{--                            @foreach($tab['permission_list'] as $permission)--}}
        {{--                                <p>{{$permission}}</p>--}}
        {{--                            @endforeach--}}
        {{--                        @endif--}}
        {{--                    </div>--}}
        {{--                    <div class="card-footer">--}}
        {{--                        <div class="row">--}}
        {{--                            <div class="col-6">--}}
        {{--                                @if(count($tab['add']) > 0)--}}
        {{--                                    <p>Add user</p>--}}
        {{--                                    <select name="career" id="career" onchange="location = this.value;">--}}
        {{--                                        <option value="/" selected disabled> Select user</option>--}}
        {{--                                        @foreach($tab['add'] as $url)--}}
        {{--                                            <option value="{{$url['url']}}">{{$url['name']}}</option>--}}
        {{--                                        @endforeach--}}
        {{--                                    </select>--}}
        {{--                                @endif--}}
        {{--                            </div>--}}
        {{--                            <div class="col-6">--}}
        {{--                                @if(count($tab['delete']) > 0)--}}
        {{--                                    <p>Delete user</p>--}}
        {{--                                    <select name="career" id="career" onchange="location = this.value;">--}}
        {{--                                        <option value="/" selected disabled> Select user</option>--}}
        {{--                                        @foreach($tab['delete'] as $url)--}}
        {{--                                            <option value="{{$url['url']}}">{{$url['name']}}</option>--}}
        {{--                                        @endforeach--}}
        {{--                                    </select>--}}
        {{--                                @endif--}}
        {{--                            </div>--}}
        {{--                            <div class="col-6">--}}
        {{--                                @if(count($tab['permissions']) > 0)--}}
        {{--                                    <p>Add permission</p>--}}
        {{--                                    <select name="career" id="career" onchange="location = this.value;">--}}
        {{--                                        <option value="/" selected> Select user</option>--}}
        {{--                                        @foreach($tab['permissions'] as $url)--}}
        {{--                                            <option value="{{$url['url']}}">{{$url['name']}}</option>--}}
        {{--                                        @endforeach--}}
        {{--                                    </select>--}}
        {{--                                @endif--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            @endforeach--}}
        {{--        </div>--}}

        <div class="container">
            <div class="table">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Role
                        </th>
                        <th>
                            Permissions
                        </th>
                        <th>Add permission</th>
                        <th>Remove permission</th>
                        <th>Remove role</th>
                    </tr>
                    </thead>
                    @foreach($info as $row)
                        <tr>
                            <td>{{$row['name']}}</td>
                            <td>
                                @foreach($row['permission_list'] as $permission)
                                    {{$permission}} ,
                                @endforeach
                            </td>
                            <td>
                                @if(count($row['permissions']) > 0)
                                    <select name="career" id="career" onchange="location = this.value;">
                                        <option value="/" selected disabled> Select permission</option>
                                        @foreach($row['permissions'] as $url)
                                            <option value="{{$url['url']}}">{{$url['name']}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </td>
                            <td>
                                @if(count($row['delete']) > 0)
                                    <select name="career" id="career" onchange="location = this.value;">
                                        <option value="/" selected disabled> Select permission</option>
                                        @foreach($row['delete'] as $url)
                                            <option value="{{$url['url']}}">{{$url['name']}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('permission.roles.delete',['role'=>$row['id']])}}" class="btn btn-danger"> <i class="fa fas-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="container mt-3">
            @include('permissions.role_input')
        </div>
    </div>
@endsection
