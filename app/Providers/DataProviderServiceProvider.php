<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataProviderServiceProvider extends ServiceProvider
{
    /**
     * Register data provider service provider on the app.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DataProviderServiceProvider::class, function ($app) {
            return new TeamleaderDataProvider();
        });
    }
}