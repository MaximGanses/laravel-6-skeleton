<form action="{{route('permission.roles.create')}}" method="post">
    @csrf
    <input class="form-control" type="text" name="name" id="name" placeholder="Role name">
    <button class="btn btn-primary" type="submit">Save</button>
</form>