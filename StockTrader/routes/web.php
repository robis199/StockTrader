<?php

use App\Http\Controllers\StockTraderController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/stocks/search',[StockTraderController::class, 'search']);
Route::get('/stocks/{symbol}',[StockTraderController::class, 'index']);

Route::post('/stocks/buy', [StockTraderController::class, 'buy'])->name('stocks.buy');

require __DIR__.'/auth.php';
