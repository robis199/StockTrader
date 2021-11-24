<?php

namespace App\Repositories;

use App\Models\Company;
use Ramsey\Collection\Collection;

interface ApiRepositoryInterface
{
        public function searchCompany(string $name): Collection;
        public function getPrice(string $symbol): float;
        public function getCompanyInfo(string $symbol): Company;
}
