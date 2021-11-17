<?php

namespace App\Providers;

use App\Events\StockBought;
use App\Events\StockPurchaseEvent;
use App\Listeners\StockBoughtNotification;
use App\Listeners\StockPurchaseNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        /*StockBought::class => [
            StockBoughtNotification::class
        ],*/
        StockPurchaseEvent::class => [
            StockPurchaseNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
