
<div class="text-white p-3 min-vh-100">
    @php
        $menuItems = App\Services\MenuService::getMenuItems();
    @endphp
    
    <x-sidebar-menu :menuItems="$menuItems" />
</div>