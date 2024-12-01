<?php

namespace Modules\Contapass\Providers;

use Illuminate\Support\ServiceProvider;

class ContapassServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(base_path('modules/contapass/Views'), 'contapass');
        $this->loadRoutesFrom(base_path('modules/contapass/routes/web.php'));
    }
}