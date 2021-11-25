<?php
namespace App\Listeners;

use App\Events\DepositMade;
use App\Mail\NewDepositConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendDepositConfirmation implements ShouldQueue
{

    public function __construct(){}

    public function handle(DepositMade $event)
    {
        Mail::to($event->getUserEmail())->send(new NewDepositConfirmationMail($event->getDeposit()));
    }
}
