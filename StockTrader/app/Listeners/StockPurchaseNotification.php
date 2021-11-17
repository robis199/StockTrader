<?php

namespace App\Listeners;

use App\Events\StockPurchaseEvent;
use App\Mail\StockPurchasedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class StockPurchaseNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StockPurchaseEvent  $event
     * @return void
     */
    public function handle(StockPurchaseEvent $event)
    {
        Mail::to('exampleTrader@gmail.com')->send(new StockPurchasedMail());
    }
}
