<?php
namespace App\Services;


use App\Repositories\ApiRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;


class Profits
{
    private ApiRepositoryInterface $apiRepository;

    public function __construct(ApiRepositoryInterface $apiRepository)
    {
        $this->apiRepository = $apiRepository;
    }

    public function profitFormula(int $amount,float $priceBought, float $currentPrice): float
    {
        return round(($currentPrice - $priceBought) * $amount, 1);
    }

    public function myStockProfits (Collection $stocks): Collection
    {
        foreach ($stocks as $stock) {

            $symbol = $stock->company_symbol;
            $currentPrice = $this->apiRepository->getPrice($symbol);
            $profit = $this->profitFormula($stock->amount_acquired, $stock->buying_price, $currentPrice);

            $stock->profit = $profit;
            $stock->current_price = $currentPrice;
        }

        return $stocks;
    }



}
