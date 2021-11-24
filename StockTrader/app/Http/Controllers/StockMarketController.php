<?php

namespace App\Http\Controllers;


use App\Events\StockWasPurchased;
use App\Models\Stock;
use App\Models\User;
use App\Repositories\ApiRepositoryInterface;
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
            $cachedKey = 'companies.search.'.$name;

            if(cache()->has($cachedKey)){
                return view('stocks.index', ['companies' => cache()->get($cachedKey)]);
            }
            $companies = $this->apiRepository->searchCompany($name);



            cache()->put($cachedKey,$companies);

            return view('stocks.index', ['companies' => $companies]);
        }

    public function info(string $symbol)
    {

        $cachedKey = 'company.info.'.$symbol;

        if(cache()->has($cachedKey)){
            return view('stocks.info', [
                'company'=> cache()->get($cachedKey),
                'userBalance' =>(User::find(Auth::id()))->balance
            ]);
        }
        $company = $this->apiRepository->getCompanyInfo($symbol);

        cache()->put($cachedKey,$company);

        return view('stocks.info',[
            'company'=> $company ,
            'userBalance' =>(User::find(Auth::id()))->balance
        ]);


    }


  public function buy(string $symbol)
    {
        $user = User::find(Auth::id());


        $stockAmount = request()->validate([
            'amount' => ['required','numeric' ]
        ]);

        $stockAmount['amount'] = (int)$stockAmount['amount'];

        $balance = $user->cash_balance - $stockAmount['amount']*$this->apiRepository->getCompanyInfo($symbol)->getPrice();

        $user->update(['cash_balance'=> $balance]);

        $key = 'company.info.'.$symbol;
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
