<?php

namespace App\Providers;

use App\Events\OrderCreated;
use App\Listeners\DecrementQuantity;
use App\Listeners\EmptyCart;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public $listen = [
        OrderCreated::class => [
            DecrementQuantity::class,
            EmptyCart::class,
           
        ]
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
