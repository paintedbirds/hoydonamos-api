<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PetitionManagmentCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $petitionData;
    
    public $subject = "Una petición ha sido creada";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($petition)
    {
        $this->petitionData = $petition;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.managment.petition-managment');
    }
}
