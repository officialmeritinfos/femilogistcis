<?php

namespace App\Mail;

use App\Models\FlightTicket;
use App\Models\GeneralSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FlightUpdatedMailable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $ticket;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct(FlightTicket $ticket)
    {
        $this->ticket = $ticket;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Flight Ticket Updated')
            ->view('emails.flight_updated')
            ->with(['ticket' => $this->ticket,'web' => GeneralSetting::find(1)]);
    }
}
