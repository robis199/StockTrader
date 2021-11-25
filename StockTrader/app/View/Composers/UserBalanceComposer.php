<?php

namespace App\View\Composers;

use App\Models\User;
use Illuminate\View\View;

class UserBalanceComposer

{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function compose(View $view)
    {
        $view->with($this->user['cash_balance']);
    }

}
