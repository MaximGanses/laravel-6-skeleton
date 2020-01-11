<form action="{{route('users.create')}}" method="post">
    @csrf
    <button type="button" class="btn btn-success" data-toggle="modal"
            data-target="#add-user">
        Add user
    </button>
    <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="text" class="form-control" name="email" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label for="password"></label>
                        <input type="password" class="form-control" name="password" placeholder="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>