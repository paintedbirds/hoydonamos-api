<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonationCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Created vars to encapsulate data like subject, name, email etc
     * @return void
    */
    public $donationData;

    public $subject = "Has creado una Donacion exitosamente";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($donation)
    {
        $this->donationData = $donation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.donationCreated');
    }
}
