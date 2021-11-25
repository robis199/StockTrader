<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MarketActiveHours implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $time = now('UTC +2')->toTimeString('minute');
        return $time > '16:30' || $time < '23:00';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'It is currently unavailable to buy stock.';
    }
}
