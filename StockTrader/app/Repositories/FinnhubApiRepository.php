<?php

namespace App\Repositories;

use App\Models\Company;
use Finnhub\Api\DefaultApi;
use Ramsey\Collection\Collection;

class FinnhubApiRepository implements ApiRepositoryInterface
{
    private DefaultApi $apiClient;

    public function __construct(DefaultApi $apiClient)
    {
        $this->apiClient = $apiClient;
    }


    public function searchCompany(string $name): Collection
    {
        $companies = $this->apiClient->symbolSearch($name);

        $collection = new Collection(Company::class);

        foreach ($companies['result'] as $company)
        {
            $collection->add(
                new Company(
                    $company['description'],
                    $company['symbol'],
                    $company['type']
                ));
        }
        return $collection;

    }

    public function getPrice(string $symbol):float
    {
        return $this->apiClient->quote($symbol)['c'];
    }

    public function getCompanyInfo(string $symbol): Company
    {
        $companyProfile = $this->apiClient->companyProfile2($symbol);

        return new Company(
            $companyProfile->getName(),
            $symbol,
            null,
            $companyProfile,
            $this->getPrice($symbol),
        );
    }

}
