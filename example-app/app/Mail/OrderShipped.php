<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'name' => $this->details['data']['name'],
            'email' => $this->details['data']['email'],
            'phone' => $this->details['data']['phone'],
            'region' => $this->details['data']['region'],
            'ville' => $this->details['data']['ville'],
            'codePostal' => $this->details['data']['codePostal'],
            'cart' => $this->details['data']['cart']
        ];
        return $this->view('mails.order',$data);
    }
}
