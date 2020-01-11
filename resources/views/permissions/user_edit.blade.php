<div class="modal fade" id="user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{$user->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" value="{{$user->id}}">

                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" class="form-control" name="name" placeholder="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="text" class="form-control" name="email" placeholder="{{$user->email}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>

            </div>
        </div>
</div>
