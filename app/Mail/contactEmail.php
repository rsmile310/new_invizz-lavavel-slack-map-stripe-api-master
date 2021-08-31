<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $input;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        //
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact')
        ->with([
            'message' => $this->input['message'], 'email' => $this->input['email'], 'name' => $this->input['name'], 'subject' => $this->input['subject']
        ])
        ->from('no-reply@invizz.io', 'Feedback Message from INVIZZ')
        ->subject($this->input['subject']);;
    }
}
