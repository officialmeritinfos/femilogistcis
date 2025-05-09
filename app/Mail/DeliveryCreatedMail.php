<?php

namespace App\Mail;

use App\Models\Delivery;
use App\Models\GeneralSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeliveryCreatedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $delivery;
    public $recipientType;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Delivery $delivery, $recipientType)
    {
        $this->delivery = $delivery;
        $this->recipientType = $recipientType;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = ($this->recipientType === 'sender')
            ? 'Delivery Confirmation - Reference: ' . $this->delivery->reference
            : 'You Have a Package Coming - Tracking ID: ' . $this->delivery->tracking_number;
        return $this->subject($subject)
            ->from(config('mail.from.address'), config('app.name'))
            ->replyTo(config('mail.mailers.smtp.username'), 'Customer Support')
            ->view('emails.delivery_created')
            ->with([
                'delivery' => $this->delivery,
                'recipientType' => $this->recipientType,
                'web' => GeneralSetting::find(1)
            ]);
    }
}
