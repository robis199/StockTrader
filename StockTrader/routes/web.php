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

Route::get('/portfolio/transactions',[MyStockPortfolioController::class, 'transactions'])->name('portfolio.transactions');

Route::get('/portfolio/{stock}',[MyStockPortfolioController::class, 'stock'])->middleware('auth')->name('portfolio.stock');
Route::post('portfolio/{stock}/sell',[MyStockPortfolioController::class, 'sell'])->middleware('auth')->name('stock.sell');

Route::get('/portfolio/account',[MyStockPortfolioController::class, 'account'])->name('portfolio.account');
Route::post('/portfolio/account',[MyStockPortfolioController::class, 'increaseBalance'])->middleware('auth')->name('portfolio.increaseBalance');;


require __DIR__.'/auth.php';
