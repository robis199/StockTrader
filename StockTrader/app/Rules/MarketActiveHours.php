<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MarketActiveHours implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $time = now('UTC +2')->toTimeString('minute');
        return $time > '16:30' || $time < '23:00';
    }

    public function message()
    {
        return 'It is currently unavailable to buy stock';
    }
}
