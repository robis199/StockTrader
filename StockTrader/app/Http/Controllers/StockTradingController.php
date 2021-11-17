<?php

namespace App\Http\Controllers;

use App\Events\StockBought;
use App\Events\StockPurchaseEvent;
use App\Models\Trade;
use Illuminate\Http\Request;

class StockTradingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //Event::listen(new StockBought(1));
        $trade = new Trade(
            'apple'
        );

        event(new StockPurchaseEvent($trade));

        //return view('index');
    }
}
