<php?

public function boot()
{
    View::composer('layouts.sidebar', function ($view) {
        $view->with('menuItems', \App\Services\MenuService::getMenuItems());
    });
}