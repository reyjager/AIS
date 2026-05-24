@props(['menuItems'])

<ul class="list-unstyled">
    <li>
        <hr class="dropdown-divider text-white">
    </li>

    @foreach ($menuItems as $item)
        @if ($item['submenu'])
            @php
                // Check if any submenu item is active
                $hasActiveSubmenu = false;
                foreach ($item['submenu'] as $subItem) {
                    if (request()->is($subItem['active'])) {
                        $hasActiveSubmenu = true;
                        break;
                    }
                }
                // Determine if either parent or any child is active
                $shouldShowSubmenu = request()->is($item['active']) || $hasActiveSubmenu;
                // Generate unique ID for the submenu
                $submenuId = 'submenu-' . $loop->index;
            @endphp
            
            <li class="mb-2">
                <a href="#{{ $submenuId }}" 
                   class="d-flex align-items-center text-decoration-none text-white p-2 {{ $shouldShowSubmenu ? 'active' : '' }}"
                   data-bs-toggle="collapse"
                   data-bs-parent=".list-unstyled"
                   aria-expanded="{{ $shouldShowSubmenu ? 'true' : 'false' }}"
                   @if($shouldShowSubmenu) aria-current="page" @endif>
                    <i class="bi {{ $item['icon'] }} pe-2"></i> 
                    {{ $item['title'] }}
                    <i class="bi bi-chevron-down ms-auto transition-transform" 
                       ></i>
                </a>
                <ul class="collapse list-unstyled ps-4 {{ $shouldShowSubmenu ? 'show' : '' }}" 
                    id="{{ $submenuId }}"
                    data-bs-parent=".list-unstyled">
                    @foreach ($item['submenu'] as $subItem)
                        @if (!isset($subItem['show']) || $subItem['show'])
                            <li class="py-2">
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

@push('scripts')
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle menu collapse/expand behavior
        console.log("DOM fully loaded!"); // Should appear in console
    
    const menuParents = document.querySelectorAll('[data-bs-toggle="collapse"]');
    console.log(`Found ${menuParents.length} menu items`); // Log count
    
    if (menuParents.length === 0) {
        console.error("No menu items found! Check your selectors.");
        return;
    }
     console.log('DOM loaded'); // Verify this appears
    const menuParents = document.querySelectorAll('[data-bs-toggle="collapse"]');
  
    menuParents.forEach(parent => {
        // Initialize chevron state on page load
        const chevron = parent.querySelector('.bi-chevron-down');
        const targetId = parent.getAttribute('href');
        const targetMenu = document.querySelector(targetId);
        const isExpanded = targetMenu.classList.contains('show');
        chevron.style.transform = isExpanded ? 'rotate(270deg)' : 'rotate(0deg)';
        
        parent.addEventListener('click', function() {
            const targetId = this.getAttribute('href');
            const targetMenu = document.querySelector(targetId);
            const isShowing = targetMenu.classList.contains('show');

            console.log('is showing ?' + isShowing );
            
            // Toggle chevron rotation immediately
            const chevron = this.querySelector('.bi-chevron-down');
            if (isShowing) {
                // Menu is open, will be closing - rotate to 90deg
                chevron.style.transform = 'rotate(90deg)';
            } else {
                // Menu is closed, will be opening - rotate to 180deg
                chevron.style.transform = 'rotate(180deg)';
            }
            
            // If clicking an already open menu, don't do anything else
            if (isShowing) return;
            
            // Close all other open menus
            document.querySelectorAll('.collapse.show').forEach(openMenu => {
                if (openMenu.id !== targetId.substring(1)) {
                    const bsCollapse = bootstrap.Collapse.getInstance(openMenu);
                    if (bsCollapse) {
                        bsCollapse.hide();
                        // Rotate their chevrons to 90deg when closing
                        const otherParent = document.querySelector(`[href="#${openMenu.id}"]`);
                        if (otherParent) {
                            otherParent.querySelector('.bi-chevron-down').style.transform = 'rotate(90deg)';
                        }
                    }
                }
            });
        });
    });
});
</script>
@endpush