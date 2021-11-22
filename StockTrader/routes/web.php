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

Route::get('/stockexchange/',[StockMarketController::class, 'index']);
Route::get('/company/search',[StockMarketController::class, 'search']);
Route::get('/company/info',[StockMarketController::class, 'info']);
Route::post('/company/{symbol}/buy', [StockMarketController::class, 'buy']);

Route::post('portfolio/{symbol}/sell',[MyStockPortfolioController::class, 'sell']);
Route::get('portfolio/transactions',[MyStockPortfolioController::class, 'transactionHistory']);
Route::post('portfolio/balance',[MyStockPortfolioController::class, 'increaseBalance']);


require __DIR__.'/auth.php';
