<?php

namespace App\Http\Controllers;

use App\Events\StockWasPurchased;
use App\Models\Company;
use App\Repositories\ApiRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StockMarketController extends Controller
{
    private ApiRepositoryInterface $apiRepository;

    public function __construct(ApiRepositoryInterface $apiRepository)
    {
        $this->apiRepository = $apiRepository;

    }

    public function index(string $symbol)
    {

        $company = $this->apiRepository->searchBySymbol($symbol);
        $quote = $this->apiRepository->getQuote($company);


        return view('portfolio.transactions', [
            'company' => $company,
            'quote' => $quote
        ]);

    }

    public function search(Request $request)
    {
        $companyName = strtolower($request->get('query'));
        $cachedKey = 'companies.search' . Str::snake($companyName);
    }

    public function companyInfo(string $symbol)
    {

    }

    public function buy()
    {
        $company = $this->apiRepository->searchBySymbol('AAPL');

        event(new StockWasPurchased($company));

    }


}
