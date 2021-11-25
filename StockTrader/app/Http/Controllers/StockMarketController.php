<?php

namespace App\Http\Controllers;


use App\Events\StockWasPurchased;
use App\Models\Stock;
use App\Models\User;
use App\Repositories\ApiRepositoryInterface;
use App\Rules\MarketActiveHours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StockMarketController extends Controller
{
    private ApiRepositoryInterface $apiRepository;

    public function __construct(ApiRepositoryInterface $apiRepository)
    {
        $this->apiRepository = $apiRepository;

    }

    public function index()
    {
        return view('stocks.index');

    }

    public function search(Request $request)
    {

        $name = strtolower($request['company']);
        $key = 'companies.search.' . $name;

        if (cache()->has($key)) {
            return view('stocks.index', ['companies' => cache()->get($key)]);
        }
        $companies = $this->apiRepository->searchCompany($name);

        cache()->put($key, $companies);

        return view('stocks.index', ['companies' => $companies]);
    }

    public function info(string $symbol)
    {
        $key = 'company.info.' . $symbol;

        if (cache()->has($key)) {
            return view('stocks.info', [
                'company' => cache()->get($key),
            ]);
        }
        $company = $this->apiRepository->getCompanyInfo($symbol);

        cache()->put($key, $company);

        return view('stocks.info', [
            'company' => $company,
            'userBalance' => (User::find(Auth::id()))->balance
        ]);
    }


    public function buy(string $symbol)
    {
        $user = User::find(Auth::id());

        $stockAmount = request()->validate([
            'amount' => ['required', 'numeric'],
        ]);

        $balance = $user->cash_balance - $stockAmount['amount'] * $this->apiRepository->getCompanyInfo($symbol)->getPrice();

        $user->update(['cash_balance' => $balance]);

        $key = 'company.info.' . $symbol;
        $company = cache()->get($key);

        $stock = new Stock([
            'company' => $company->getName(),
            'company_symbol' => $company->getSymbol(),
            'buying_price' => $company->getPrice(),
            'amount_acquired' => $stockAmount['amount']
        ]);
        $stock->user()->associate(auth()->user());

        $stock->save();

        event(new StockWasPurchased($company));

        return redirect(route('portfolio.transactions'));

    }


}
