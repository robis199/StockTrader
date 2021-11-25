<?php
namespace App\Services;


use App\Models\Stock;
use App\Repositories\ApiRepositoryInterface;

class TransactionsMade
{
    private ApiRepositoryInterface $apiRepository;

    public function __construct(ApiRepositoryInterface $apiRepository)
    {
        $this->apiRepository = $apiRepository;
    }


    public function handle(int $userId): RealTimeInfo
    {
        $myStocks = Stock::where('user_id',$userId)
            ->orderBy('created_at', 'DESC')
            ->get();

        $currentQuote = [];

        foreach ($myStocks as $stock) {
            $companySymbol = $stock->company_symbol;
            if (!isset($currentQuote[$companySymbol])) {
                $currentQuote[$companySymbol] = $this->apiRepository->getPrice($companySymbol);
            }
        }
        return new RealTimeInfo($myStocks, $currentQuote);
    }
}
