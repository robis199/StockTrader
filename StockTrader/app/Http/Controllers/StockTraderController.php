<?php

namespace App\Http\Controllers;

use App\Events\StockWasPurchased;
use App\Models\Company;
use App\Repositories\ApiRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StockTraderController extends Controller
{
    private ApiRepositoryInterface $apiRepository;

    public function __construct(ApiRepositoryInterface $apiRepository)
    {
        $this->apiRepository = $apiRepository;

    }

    public function search(Request $request)
    {
        $companyName = strtolower($request->get('query'));
        $cacheKey = 'companies.search' . Str::snake($companyName);
    }

    public function index(string $symbol)
    {
        // validate if needed
        // wrap it in try/catch block
        // transformers for return
        $company = $this->apiRepository->searchBySymbol($symbol);
        $quote = $this->apiRepository->getQuote($company);


        return view('stocks.show', [
            'company' => $company,
            'quote' => $quote
            ]);

    }

    public function buy()
    {
        //validate
        //make transaction
        // when transaction is completed (balance vs stock quote)
        // add purchase record to myportfolio table
        $company = $this->apiRepository->searchBySymbol('AAPL');

        event(new StockWasPurchased($company));

    }

    public function sell($id)
    {
        $stock = Stock::find($id);
        $stock->delete();

        Session::flash('message', 'You have successfully sold your shares!');
        return Redirect::to('stocks');
    }
}
