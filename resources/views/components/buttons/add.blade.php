@can('write')
    <a href="{{$href}}"
       class="btn btn-warning">
        <i class="fas fa-plus "></i>
        <span class="d-none d-md-inline">
            @isset($text)
                {{$text}}
            @else
                Add
            @endisset
        </span>
    </a>
@endcan