<?php

namespace Modules\AdminPanel\Providers;

use Illuminate\Support\ServiceProvider;

class AdminPanelServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(base_path('modules/adminpanel/Views'), 'adminpanel');
        $this->loadRoutesFrom(base_path('modules/adminpanel/routes/web.php'));
    }
}