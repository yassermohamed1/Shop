<li class="sidebar-list">
    @foreach($items as $t)
    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
        <i class="{{$t['icon']}}"></i>
        <span>{{$t['title']}}</span>
    </a>

    @if(!empty($t['children']))
    <ul class="sidebar-submenu">
        @foreach($t['children'] as $child)
        <li>
            @if(isset($child['route']))
            <a href="{{ route($child['route']) }}">{{ $child['title'] }}</a>
            @elseif(isset($child['url']))
            <a href="{{ $child['url'] }}">{{ $child['title'] }}</a>
            @endif
        </li>
        @endforeach
    </ul>
    @endif
    @endforeach
</li>