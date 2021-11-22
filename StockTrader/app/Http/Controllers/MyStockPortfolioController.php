<?php

namespace App\Http\Controllers;

use App\Events\StockWasPurchased;
use App\Models\Company;
use Illuminate\Http\Request;

class MyStockPortfolioController extends Controller
{

    public function sell($id)
    {
        $stock = Company::find($id);
        $stock->delete();

        Session::flash('message', 'You have successfully sold your shares!');
        return Redirect::to('portfolio.transactions');
    }


    public function transactionHistory()
    {

    }

    public function increaseBalance()
    {

    }

}
