<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\FlightDelayedMailable;
use App\Mail\FlightTicketMailable;
use App\Mail\FlightUpdatedMailable;
use App\Mail\ThankYouMailable;
use App\Models\FlightBooking;
use App\Models\FlightTicket;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FlightController extends Controller
{
    //landing page
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Flight Dashboard',
            'user'     =>  $user,
            'tickets'  => FlightTicket::orderBy('created_at', 'desc')->paginate(10)
        ];

        return view('admin.flight.index',$dataView);
    }
    //landing page
    public function bookings()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Flight Bookings',
            'user'     =>  $user,
            'bookings'  => FlightBooking::orderBy('created_at', 'desc')->paginate(10)
        ];

        return view('admin.flight.flight_booking',$dataView);
    }
    //create ticket
    public function create()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Add Ticket',
            'user'     =>  $user,
        ];

        return view('admin.flight.new',$dataView);
    }
    //process new ticket
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'departure_airport' => 'required|string|max:255',
            'airline_number' => 'required|string|max:255',
            'arrival_airport' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'passenger_name' => 'required|string|max:255',
            'passenger_email' => 'required|email|max:255',
            'passenger_phone' => 'nullable|string|max:15',
            'seat_number' => 'nullable|string|max:10',
            'gate_number' => 'nullable|string|max:10',
            'class' => 'required|in:economy,business,first',
            'ticket_price' => 'required|numeric|min:0',
            'flight_status' => 'required|in:open,closed,delayed,cancelled',
            'status' => 'required|in:booked,cancelled,completed',
        ]);

        // Generate unique PNR and Flight Number
        $validated['pnr'] = strtoupper(Str::random(6));
        $validated['flight_number'] = strtoupper('FL-' . Str::random(4));

        // Create the ticket
        $ticket = FlightTicket::create($validated);

        // Send a detailed email to the passenger
        Mail::to($ticket->passenger_email)->send(new FlightTicketMailable($ticket));

        return redirect()->route('admin.flight.index')->with('success', 'Flight ticket added successfully!');
    }
    //edit flight ticket
    public function edit($id)
    {
        $ticket = FlightTicket::findOrFail($id);

        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Edit Ticket',
            'user'     =>  $user,
            'ticket'   => $ticket,
        ];

        return view('admin.flight.edit',$dataView);
    }
    //update flight ticket
    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'departure_airport' => 'required|string|max:255',
            'arrival_airport' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'airline_number' => 'required|string|max:255',
            'arrival_time' => 'required|date|after:departure_time',
            'passenger_name' => 'required|string|max:255',
            'passenger_email' => 'required|email|max:255',
            'passenger_phone' => 'nullable|string|max:15',
            'seat_number' => 'nullable|string|max:10',
            'gate_number' => 'nullable|string|max:10',
            'class' => 'required|in:economy,business,first',
            'ticket_price' => 'required|numeric|min:0',
            'flight_status' => 'required|in:open,closed,delayed,cancelled',
            'status' => 'required|in:booked,cancelled,completed',
        ]);

        // Find the ticket by ID
        $ticket = FlightTicket::findOrFail($id);

        // Check if the flight status is delayed
        $wasDelayed = $ticket->flight_status !== 'delayed' && $validated['flight_status'] === 'delayed';

        // Check if the status is being updated to "completed"
        $wasCompleted = $ticket->status !== 'completed' && $validated['status'] === 'completed';


        // Update the ticket
        $ticket->update($validated);

        // Send an email notifying the passenger of the update
        Mail::to($ticket->passenger_email)->send(new FlightUpdatedMailable($ticket));

        // Send a delayed notification email if the flight status is delayed
        if ($wasDelayed) {
            Mail::to($ticket->passenger_email)->send(new FlightDelayedMailable($ticket));
        }

        // Send a "Thank You" email if the status is updated to "completed"
        if ($wasCompleted) {
            $ticket->update([
                'flight_status' => 'closed'
            ]);
            Mail::to($ticket->passenger_email)->send(new ThankYouMailable($ticket));
        }

        return redirect()->route('admin.flight.index')->with('success', 'Flight ticket updated successfully!');
    }
    //show flight
    public function show($id)
    {
        $ticket = FlightTicket::findOrFail($id);

        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Ticket Detail',
            'user'     =>  $user,
            'ticket'   => $ticket,
        ];

        return view('admin.flight.detail',$dataView);
    }
    //print
    public function print($id)
    {
        $ticket = FlightTicket::where([
            'flight_number' => $id
        ])->firstOrFail();
        $settings = GeneralSetting::find(1);
        return view('admin.flight.print', compact('ticket','settings'));
    }

    public function destroy($id)
    {
        try {
            // Find the flight ticket by ID
            $ticket = FlightTicket::findOrFail($id);

            // Delete the ticket
            $ticket->delete();

            // Redirect back with success message
            return redirect()->route('admin.flight.index')
                ->with('success', 'Flight ticket deleted successfully!');
        } catch (\Exception $e) {
            // Handle any errors
            return redirect()->route('admin.flight.index')
                ->with('error', 'Failed to delete flight ticket: ' . $e->getMessage());
        }
    }

}
