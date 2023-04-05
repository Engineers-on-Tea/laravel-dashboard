<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">{{ ('Navigation') }}</div>
        <ul class="pcoded-item pcoded-left-item">
            @php
                $nav = require_once resource_path('views/admin/includes/nav.php');
            @endphp
            @foreach ($nav as $item)
                @php
                    $url = request()->url();
                    $active = '';
                    $active = $url == $item['route'] ? 'active' : '';
                    $hasMenu = '';
                    $trigger = '';

                    if (count($item['children']) > 0) {
                        $hasMenu = 'pcoded-hasmenu';

                        $children = array_column($item['children'], 'route');
                        if (in_array($url, $children)) {
                            $trigger = 'pcoded-trigger';
                        }
                    }
                @endphp
                <li class="{{ $active }} {{ $hasMenu }} {{ $trigger }}">
                    <a href="{{ $item['route'] }}">
                        <span class="pcoded-micon"><i class="icofont {{ $item['icon'] }}"></i></span>
                        <span class="pcoded-mtext">{{ $item['label'] }}</span>
                    </a>
                    @if (count($item['children']) > 0)
                        <ul class="pcoded-submenu">
                            @foreach ($item['children'] as $child)
                                <li class="@if ($url == $child['route']) active @endif">
                                    <a href="{{ $child['route'] }}">
                                        <span class="pcoded-micon"><i class="icofont {{ $child['icon'] }}"></i></span>
                                        <span class="pcoded-mtext">{{ $child['label'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</nav>
