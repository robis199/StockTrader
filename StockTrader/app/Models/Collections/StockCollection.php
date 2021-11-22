<?php
namespace App\Models\Collections;

use App\Models\Company;


class StockCollection
{
    private $stocks = [];

    public function __construct($stocks)
    {
        foreach ($stocks as $item)
        {
            if($item instanceof Company) $this->add($item);
        }
    }


    public function add(Company $item): void
    {
        $this->stocks[] = $item;
    }

    public function getStocks(): array
    {
        return $this->stocks;
    }
}
