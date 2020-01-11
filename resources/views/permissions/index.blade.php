@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Role dashboard</h1>

        <div class="d-flex justify-content-between">
            {{--List all info--}}
            @foreach($info as $tab)
                <div class="card col-4 p-0">
                    <div class="card-header">
                        {{$tab['title']}}
                        <p class="text-muted">{{$tab['desc']}}</p>
                    </div>
                    <div class="card-body">
                        {{$tab['total']}}
                    </div>
                    <div class="card-footer">
                        <a href="{{$tab['url']}}">view all</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
