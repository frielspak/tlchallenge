<?php

namespace App\Providers;

use App\Logic\Interfaces\DiscountProcessorInterface;
use App\Logic\Processors\TeamleaderDiscountProcessor;
use Illuminate\Support\ServiceProvider;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class DiscountsServiceProvider extends ServiceProvider
{
    /**
     * Register discounts service provider on the app.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DiscountProcessorInterface::class, function ($app) {
            return new TeamleaderDiscountProcessor(config('api.enabled_discounts_rules'));
        });
    }
}