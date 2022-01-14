<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonationPublished extends Mailable
{
    use Queueable, SerializesModels;

    public $donationData;

    public $subject = "Tu donación ha sido publicada";
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
        return $this->view('emails.donationPublished');
    }
}
