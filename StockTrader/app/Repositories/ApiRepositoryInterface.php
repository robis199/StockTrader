<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Quote;

interface ApiRepositoryInterface
{
        public function searchBySymbol(string $symbol): Company;
        public function getQuote(Company $company): Quote;
}
