<?php

namespace App\Models;

class Trade
{
    private $stock;

    public function __construct(string $stock)
    {
        $this->stock = $stock;
    }

    public function getStock(): string
    {
        return $this->stock;
    }
}
