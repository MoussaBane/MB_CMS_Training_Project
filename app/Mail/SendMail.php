<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


/* An Example of Send Mail Class That Can Be Useful
class SendMail extends Mailable
{
    use Queueable, SerializesModels;

     //Create a new message instance.
     //@return void
     
    public function __construct($data)
    {
        $this->data=$data;
    }

    

    //Build the message.
    //@return $this
    
    public function build()
    {
        return $this->from('info@emrahyuksel.com.tr')
            ->subject('Test Mail')
            ->view('template.index')
            ->with('data',$this->data);
    }
}
*/

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //$this->data = $data;
        //"data" cause en error that i could not fix yet
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Send Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
