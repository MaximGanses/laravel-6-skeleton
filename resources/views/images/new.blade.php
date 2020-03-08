@extends('layouts.app')

@section('content')

    <form action="{{route('images.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name of file</label>
            <input type="text" name="name" class="form-control" placeholder="name of file">
        </div>

        <div class="form-group">
            <label for=""></label>
            <input type="file" name="image" class="form-control file-input">
        </div>

        <button type="submit" class="btn btn-success">
            Save image
        </button>
    </form>
@endsection
