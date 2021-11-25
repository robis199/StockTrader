<?php
namespace App\Services;


use Illuminate\Database\Eloquent\Collection;

class RealTimeInfo
{
    private Collection $stocks;
    private array $currentPrices;

    public function __construct(Collection $stocks, array $currentPrices)
    {
        $this->stocks = $stocks;
        $this->currentPrices = $currentPrices;

    }

    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function getCurrentQuote(): array
    {
        return $this->currentPrices;
    }

}
