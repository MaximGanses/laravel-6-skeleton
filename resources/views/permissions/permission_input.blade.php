<form action="{{route('permission.permission.create')}}" method="post">
    @csrf
    <input class="form-control" type="text" name="name" id="name" placeholder="Permission name">
    <button class="btn btn-primary" type="submit">Save</button>
</form>