<?php

namespace App\Http\Controllers;

use App\Events\StockWasPurchased;
use App\Models\Company;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MyStockPortfolioController extends Controller
{

    public function sell(Stock $stock): RedirectResponse
    {
        $stock->delete();

        return redirect()->route('portfolio.transactions');
    }


    public function transactions()
    {

        $myStocks = Stock::where('user_id',auth()->user()->id)
            ->orderBy('created_at' , 'DESC')
            ->get();

         Stock::paginate(5);

        return view('portfolio.transactions',['stocks' => $myStocks]);
    }


    public function increaseBalance(Request $request)
    {
        $increaseBalance = $request->validate([
            'amount' => ['required', 'numeric']
        ]);

        $user = User::find(Auth::id());
        $total = $user->cash_balance + (int) $increaseBalance['amount'];
        $user->update(['cash_balance' => $total]);

    }

}
