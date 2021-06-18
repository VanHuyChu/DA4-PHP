<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Harimayco\Menu\Models\Menus;

class ViewSiteProviderService extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.master.master', function ($view) {
            //pass the data to the view
            $menu = Menus::find(1);
            $view
                ->with('public_menu', $menu->items);
        });
    }
}
