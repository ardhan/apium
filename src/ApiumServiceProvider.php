<?php

namespace Ardhan\Apium;

use Illuminate\Support\ServiceProvider;

class ApiumServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('api-pegawai', function() {
            return new Pegawai();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
