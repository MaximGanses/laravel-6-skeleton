@can('edit')
    <a href="{{$href}}"
       class="btn btn-warning">
        <i class="fas fa-edit "></i>
        <span class="d-none d-md-inline">
            @isset($text)
                {{$text}}
            @else
                Edit
            @endisset
        </span>
    </a>
@endcan