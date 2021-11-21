<?php

namespace App\Models;


class Company
{
    private string $name;
    private string $logoUrl;
    private string $symbol;

    public function __construct(string $name, string $symbol, string $logoUrl)
    {
        $this->name = $name;
        $this->symbol = $symbol;
        $this->logoUrl = $logoUrl;
    }

    public function getName(): string
    {
        return $this->name;
    }

   public function getSymbol(): string
   {
       return $this->symbol;
   }

    public function getLogoUrl(): string
    {
        return $this->logoUrl;
    }

}
