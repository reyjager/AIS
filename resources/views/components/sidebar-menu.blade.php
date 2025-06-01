@props(['menuItems'])

<ul class="list-unstyled">
    <li>
        <hr class="dropdown-divider text-white">
    </li>

    @foreach ($menuItems as $item)
        @if ($item['submenu'])
            <li class="mb-2">
                <a href="{{ $item['url'] }}" 
                   class="d-flex align-items-center text-decoration-none text-white p-2 {{ request()->is($item['active']) ? 'active' : '' }}"
                   data-bs-toggle="collapse"
                   aria-expanded="{{ request()->is($item['active']) ? 'true' : 'false' }}">
                    <i class="bi {{ $item['icon'] }} pe-2"></i> 
                    {{ $item['title'] }}
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="collapse list-unstyled ps-4 {{ request()->is($item['active']) ? 'show' : '' }}" 
                    id="{{ str_replace('#', '', $item['url']) }}">
                    @foreach ($item['submenu'] as $subItem)
                        @if (!isset($subItem['show']) || $subItem['show'])
                            <li>
                                <a href="{{ $subItem['url'] }}" 
                                   class="text-decoration-none text-white py-3 {{ request()->is($subItem['active']) ? 'active' : '' }}">
                                    @if (isset($subItem['icon']))
                                        <i class="{{ $subItem['icon'] }} pe-2"></i>
                                    @endif
                                    {{ $subItem['title'] }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @else
            <li class="mb-2">
                <a href="{{ $item['url'] }}" 
                   class="d-flex align-items-center text-decoration-none text-white p-2 {{ request()->is($item['active']) ? 'active' : '' }}">
                    <i class="bi {{ $item['icon'] }} pe-2"></i> 
                    {{ $item['title'] }}
                </a>
            </li>
        @endif
    @endforeach
</ul>