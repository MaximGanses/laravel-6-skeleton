@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Add new user</h1>
    @include('permissions.user_input')
</div>
@endsection
