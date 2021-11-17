<?php

namespace App\Mail;

use App\Events\StockBought;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailStockBought extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct()
    {

    }


    public function build()
    {
        return $this->from('example@example.com')->view('stock-bought')->with([
            'orderName' => $this->order->name,
            'orderPrice' => $this->order->price,
        ]);
    }
}
