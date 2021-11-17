<?php

use App\Http\Controllers\StockTradingController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/trade', [StockTradingController::class, 'index']);


require __DIR__.'/auth.php';
