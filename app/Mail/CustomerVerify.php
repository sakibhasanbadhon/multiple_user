<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerVerify extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;

    /**
     * Create a new message instance.
     */
    public function __construct($customer)
    {
        $this->customer = $customer;

        // dd($this->customer['first_name']);

        // $this->envelope();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('sakibhasan23333@gmail.com', 'Sakib'),
            subject: 'Verify Your Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'page.customer.customerMail',
            // with:[
            //     'name'=>$this->customer['name'],
            //     'email'=>$this->customer['email']
            // ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
