<?php

namespace App\Mail;

use App\Website;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailBox extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email = $data;
        $this->email['logoR'] = "logo";
        $this->email['fb'] = "www.facebook.com";
        $this->email['in'] = "www.facebook.com";
        $this->email['tw'] = "www.facebook.com";
        $this->email['copyright'] = "Beledeya 2022";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email['from'])->subject($this->email['subject'])->view('layouts.email.reply');
    }
}
