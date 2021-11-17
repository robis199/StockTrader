<?php

namespace App\Listeners;

use App\Events\StockBought;
use App\Mail\MailStockBought;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class StockBoughtNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  StockBought  $event
     * @return void
     */
    public function handle(StockBought $event)
    {
       Mail::to('lislll@gmail.com')->send(new MailStockBought());
    }
}
