<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Subscribed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->language = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch($this->language)
        {
            case 'nl':
                return $this->from('robindevacc@gmail.com')
                            ->subject('Nieuwsbrief')
                            ->view('emails.nl.subscribed');
                break;
            case 'fr':
                return $this->from('robindevacc@gmail.com')
                            ->subject('Bulletin')
                            ->view('emails.fr.subscribed');
                break;
            default:
                return $this->from('robindevacc@gmail.com')
                            ->subject('Nieuwsbrief')
                            ->view('emails.nl.subscribed');
        }
        
    }
}
