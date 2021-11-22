<?php
namespace App\Repositories;

use App\Models\Collections\StockCollection;
use App\Models\Company;
use App\Models\Quote;
use Finnhub\Api\DefaultApi;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class FinnhubApiRepository implements ApiRepositoryInterface
{
   private DefaultApi $apiClient;

    public function __construct(DefaultApi $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function searchCompany(string $symbol): Company
    {
        $companies= $this->apiClient->symbolSearch($symbol);

        $collection = new StockCollection(Company::class);
        foreach ($companies['search'] as $company)
        {
            $collection->add(
                new Company(
                    $company['description'],
                    $symbol,
                    $company['logo']
                ));
        }
        return $collection;

    }

    public function getQuote(Company $company): Quote
    {
        $responseData = $this->apiClient->quote($company->getSymbol());
        return new Quote(
            $responseData['o'],
            $responseData['pc'],
            $responseData['c'],
        );
    }

    public function getCompanyInfo(string $symbol): Company
    {
        $responseData = $this->apiClient->companyProfile2($symbol);

        return new Company(

        );
    }

}
