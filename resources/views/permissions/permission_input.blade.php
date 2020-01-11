<div class="container p-0 m-0">
    <form action="{{route('permission.permission.create')}}" method="post" class="d-flex flex-row justify-content-end" style="width: 100%;">
        @csrf
        <input class="form-control" type="text" name="name" id="name" placeholder="Permission name">
        <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>