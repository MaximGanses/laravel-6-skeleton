@can('edit')
    <a href="{{$href}}"
       class="btn btn-danger">
        <i class="fas fa-trash "></i>
        <span class="d-none d-md-inline">
            @isset($text)
                {{$text}}
            @else
                Delete
            @endisset
        </span>
    </a>
@endcan