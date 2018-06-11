<?php

namespace App\Providers;

use App\Logic\Interfaces\DataProviderInterface;
use Illuminate\Support\ServiceProvider;
use App\Logic\DataProvider\EloquentDataProvider;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class DataProviderServiceProvider extends ServiceProvider
{
    /**
     * Register data provider service provider on the app.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DataProviderInterface::class, function ($app) {
            return new EloquentDataProvider();
        });
    }
}