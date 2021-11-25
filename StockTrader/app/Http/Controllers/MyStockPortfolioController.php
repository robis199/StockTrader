<?php

namespace App\Http\Controllers;

use App\Events\DepositMade;
use App\Models\Stock;
use App\Models\User;
use App\Services\SellStock;
use App\Services\TransactionsMade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MyStockPortfolioController extends Controller
{

    private TransactionsMade $transactions;
    private SellStock $sellStock;

    public function __construct(TransactionsMade $transactions, SellStock $sellStock)
    {
        $this->transactions = $transactions;
        $this->sellStock = $sellStock;

    }

    public function stock(Stock $stock)
    {
        return view('portfolio.sellPage',
            ['user' => auth()->user(),
                'stock' => $stock]
        );
    }

    public function sell(Stock $stock): RedirectResponse
    {
        $this->sellStock->handle($stock);
        $stock->delete();

        return redirect()->route('portfolio.transactions');
    }


    public function transactions()
    {
        $response = $this->transactions
            ->handle(auth()->user()->id);

        return view('portfolio.transactions', [
            'stocks' => $response->getStocks(),
            'currentPrices' => $response->getCurrentQuote(),
        ]);

    }

    public function account()
    {
        return view('portfolio.account',
            ['user' => auth()->user()]
        );
    }


    public function increaseBalance(Request $request): RedirectResponse
    {
        $user = User::find(Auth::id());

        $increaseBalance = $request->validate([
            'amount' => ['required', 'numeric']
        ]);


        $totalBalance = $user->cash_balance + (int)$increaseBalance['amount'];
        $user->update(['cash_balance' => $totalBalance]);

        event(new DepositMade($increaseBalance['amount']));

        return redirect('/portfolio/account');

    }

}
