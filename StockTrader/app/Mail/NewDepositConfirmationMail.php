<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewDepositConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    private int $deposit;

    public function __construct(int $deposit)
    {
        $this->deposit = $deposit;
    }

    public function build()
    {
        return $this
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject(Auth::user()->name . "Wohoo, you just made a new deposit. Let's get trading!" )
            ->markdown('mail.depositMail',['deposit'=>$this->deposit]);
    }
}
