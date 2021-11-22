<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Quote;

interface ApiRepositoryInterface
{
        public function searchCompany(string $symbol): Company;
        public function getQuote(Company $company): Quote;
        public function getCompanyInfo(string $symbol): Company;
}
