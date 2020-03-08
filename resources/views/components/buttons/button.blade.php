@isset($href)
@else
    {{$href = null}}
@endisset
@isset($text)
@else
    {{$text= null}}
@endisset

@isset($type)
@else
    @php $type = 'primary' @endphp
@endisset

@isset($icon)
@else
    @php $icon = null @endphp
@endisset
<a {{$href !== null ? 'href=' . $href : '' }}
   class="{{'btn btn-' . $type}}">
    @if($icon !== null)
        <i class="{{'fas fa-' . $icon}}"></i>
    @endif
    @if($text !== null)
        <span class="{{$icon === null ? '': 'd-none d-md-inline'}}">
          {{$text}}
        </span>
    @endif
</a>