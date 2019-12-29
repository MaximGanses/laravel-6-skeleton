@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Permission list</h1>
        <div class="d-flex justify-content-between">
            @foreach($info as $tab)
                <div class="card col-4 p-0">
                    <div class="card-header">
                        {{$tab['name']}}
                        <p class="text-muted">{{$tab['created']}}</p>
                    </div>
                    <div class="card-body">
                        {{$tab['total']}}
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                @if(count($tab['add']) > 0)
                                    <p>Add role</p>
                                    <select name="career" id="career" onchange="location = this.value;">
                                        <option value="/" selected> Select role</option>
                                        @foreach($tab['add'] as $url)
                                            <option value="{{$url['url']}}">{{$url['name']}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                            <div class="col-6">
                                @if(count($tab['delete']) > 0)
                                    <p>Delete role</p>
                                    <select name="career" id="career" onchange="location = this.value;">
                                        <option value="/" selected> Select role</option>
                                        @foreach($tab['delete'] as $url)
                                            <option value="{{$url['url']}}">{{$url['name']}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="container mt-3">
            @include('permissions.permission_input')
        </div>
    </div>
@endsection
