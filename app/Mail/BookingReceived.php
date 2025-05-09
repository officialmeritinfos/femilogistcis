<?php

namespace App\Mail;

use App\Models\FlightBooking;
use App\Models\GeneralSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(FlightBooking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Booking Request Received')
            ->view('emails.flight_booking_received')
            ->with([
                'booking' => $this->booking,
                'web'   =>GeneralSetting::find(1)
            ]);
    }
}
