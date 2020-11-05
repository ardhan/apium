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
        $this->app->bind('api-pegawai', function() { return new Pegawai();});
        $this->app->bind('api-mahasiswa', function() { return new Mahasiswa();});
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
