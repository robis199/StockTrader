<?php

use App\Http\Controllers\MyStockPortfolioController;
use App\Http\Controllers\StockMarketController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/stocks',[StockMarketController::class, 'index'])->middleware('auth')->name('stocks.index');
Route::get('/stocks/search',[StockMarketController::class, 'search'])->middleware('auth')->name('stocks.search');
Route::get('/stocks/{company}/info',[StockMarketController::class, 'info'])->middleware('auth')->name('stocks.info');


Route::post('/stock/{symbol}/buy',[StockMarketController::class, 'buy'])->middleware('auth')->name('stock.buy');

Route::get('portfolio/transactions',[MyStockPortfolioController::class, 'transactions'])->name('portfolio.transactions');

Route::post('stock/{symbol}sell',[MyStockPortfolioController::class, 'sell'])->middleware('auth')->name('stock.sell');;

Route::post('portfolio/balance',[MyStockPortfolioController::class, 'increaseBalance'])->name('portfolio.account');


require __DIR__.'/auth.php';
