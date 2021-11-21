<?php

namespace App\Events;


use App\Models\Company;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StockWasPurchased
{
    use Dispatchable, SerializesModels;
    private Company $company;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }
}
