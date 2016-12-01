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
                return $this->from('robindh95@gmail.com')
                            ->view('emails.nl.subscribed');
                break;
            case 'fr':
                return $this->from('robindh95@gmail.com')
                            ->view('emails.fr.subscribed');
                break;
            default:
                return $this->from('robindh95@gmail.com')
                            ->view('emails.nl.subscribed');
        }
        
    }
}
