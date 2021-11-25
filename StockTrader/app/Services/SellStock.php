<?php
namespace App\Services;

use App\Models\Stock;
use App\Models\Transactions;
use App\Models\User;
use App\Repositories\ApiRepositoryInterface;
use App\Services\Profits;

class SellStock
{
    private ApiRepositoryInterface $apiRepository;
    private Profits $profits;

    public function __construct(ApiRepositoryInterface $apiRepository, Profits $profits)
    {
        $this->apiRepository = $apiRepository;
        $this->profits= $profits;
    }

    public function handle(Stock $stock): void
    {
        $sellingPrice = $this->apiRepository->getPrice($stock->company_symbol);
        $profit = $this->profits->profitFormula($stock->amount_acquired, $stock->buying_price, $sellingPrice);

        Transactions::create([
            'user_id' => $stock->user_id,
            'company' => $stock->company,
            'company_symbol' => $stock->company_symbol,
            'buying_price' => $stock->buying_price,
            'amount_acquired' => $stock->amount_acquired,
            'profit' => $profit,
            'sold_at' => now()->toDateTime(),
            'selling_price' => $sellingPrice,
            'bought_at' => $stock->created_at
        ]);
        $stockAmount = request()->validate([
            'amount' => ['required','numeric' ]
        ]);


        if ($stock->amount_bought === $stockAmount) {
            $stock->delete();
        } else {
            $change = $stock->amount_bought - $stockAmount['amount'];
            $stock->update(['amount_bought' => $change]);
        }

        $user = User::find(auth()->user()->id);
        $user->update(['cash_balance' => $user->cash_balance + $stockAmount['amount'] * $sellingPrice]);

    }
}
