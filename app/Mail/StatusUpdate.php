<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $ConfirmationEmail;
    public $showdetailedcontractor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ConfirmationEmail)
    {
        $this->ConfirmationEmail=$ConfirmationEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Vendor Status Update')
        ->view('emails.statusupdate');
    }
}
