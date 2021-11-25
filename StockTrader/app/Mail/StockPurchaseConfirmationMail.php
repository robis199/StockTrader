<?php

namespace App\Mail;

use App\Models\Company;
use App\Models\Stock;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StockPurchaseConfirmationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subject = 'you just made a new trade!';
    private Company $company;

    public function __construct(Company $company){
        $this->company = $company;
    }


    public function build()
    {
        return $this
            ->from(env('MAIL_FROM_ADDRESS'))
            ->view('mail.newTransaction')
            ->markdown('mail.tradeDone', [
                'subject' => $this->subject,
                'company' => $this->company->getName(),
                'price' => $this->company->getPrice()
            ]);
    }
}
