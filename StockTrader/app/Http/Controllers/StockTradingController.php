<?php

namespace App\Http\Controllers;

use App\Events\StockBought;
use Illuminate\Http\Request;

class StockTradingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        Event::listen(new StockBought(1));
        return view('index');
    }
}
