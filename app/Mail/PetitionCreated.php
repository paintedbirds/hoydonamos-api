<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PetitionCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Created vars to encapsulate data like subject, name, email etc
     * @return void
    */
    public $petitionData;
    
    public $subject = "Has creado una Peticion exitosamente";
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
        return $this->view('emails.petitionCreated');
    }
}
