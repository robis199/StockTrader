<?php

namespace App\Listeners;

use App\Events\StockWasPurchased;
use App\Mail\StockPurchaseConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPurchaseConfirmation implements ShouldQueue
{
    use InteractsWithQueue;
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
     * @param  \App\Events\StockWasPurchased  $event
     * @return void
     */
    public function handle(StockWasPurchased $event)
    {
        Mail::to(new StockPurchaseConfirmationMail($event->getCompany()));
    }
}
