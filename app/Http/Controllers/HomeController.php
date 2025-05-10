<?php

namespace App\Http\Controllers;

use App\Mail\AdminBookingNotification;
use App\Mail\BookingReceived;
use App\Models\Country;
use App\Models\Delivery;
use App\Models\DeliveryStage;
use App\Models\FlightBooking;
use App\Models\FlightTicket;
use App\Models\GeneralSetting;
use App\Models\Service;
use App\Models\User;
use App\Notifications\InvestmentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Rules\ReCaptcha;

class HomeController extends Controller
{
    public function index()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Home Page',
            'services'  =>Service::where('status',1)->get(),
        ];

        return view('home.home',$dataView);
    }

    public function about()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Company Overview',
        ];

        return view('home.about',$dataView);
    }
    public function terms()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Terms and Conditions',
        ];

        return view('home.terms',$dataView);
    }
    public function privacy()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Privacy Policy',
        ];

        return view('home.privacy',$dataView);
    }
    public function faqs()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Frequently Asked Questions',
        ];

        return view('home.faq',$dataView);
    }


    public function contact()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Contact us',
        ];

        return view('home.contact',$dataView);
    }

    public function tour()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Tour Services',
        ];

        return view('home.tour',$dataView);
    }
    public function travel()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Travel Agency Services',
        ];

        return view('home.travel',$dataView);
    }
    public function logistics()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Logistics Services',
        ];

        return view('home.logistics',$dataView);
    }
    public function visa()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Visa Preparation Services',
        ];

        return view('home.visa',$dataView);
    }
    public function flightTracking()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Flight Tracking Services',
        ];

        return view('home.flight',$dataView);
    }
    //process package
    public function processPackage(Request  $request)
    {
        $request->validate([
            'tracking_id' => 'required|string|max:255',
        ]);

        $trackingId = $request->input('tracking_id');
        $package = Delivery::where('tracking_number', $trackingId)->first();

        if (!$package) {
            return redirect()->back()->with('error','Tracking ID not found. Please try again.');
        }

        return redirect(route('home.package.detail',['ref'=>$package->reference]))->with('success','Package found');
    }
    //package detail
    public function packageDetail($ref)
    {
        $package = Delivery::where('reference', $ref)->firstOrFail();

        $stages = DeliveryStage::where('delivery_id', $package->id)->orderBy('created_at', 'asc')->get();
        $web = GeneralSetting::find(1);

        return view('home.package_tracking_detail', compact('package', 'stages','web'));

    }
    //process flight
    public function processFLight(Request $request)
    {
        $request->validate([
            'pnr' => 'required|string|max:6|min:6',
        ]);

        $pnr = $request->input('pnr');
        $flight = FlightTicket::where('pnr', $pnr)->first();

        if (!$flight) {
            return redirect()->back()->with('error','PNR not found. Please try again.');
        }

        return redirect(route('home.flight.detail',['pnr'=>$flight->pnr]))->with('success','Flight found');
    }
    //flight detail
    public function flightDetail($pnr)
    {
        $flight = FlightTicket::where('pnr', $pnr)->firstOrFail();
        $web = GeneralSetting::find(1);

        return view('home.flight_tracking_detail', compact('flight','web'));

    }
    //flight booking
    public function flightBooking()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Flight Booking',
            'services'  =>Service::where('status',1)->get(),
            'froms'     =>Country::where('status',1)->get(),
            'tos'       =>Country::where('status',1)->get(),
            'countries' =>Country::where('status',1)->get(),
        ];

        return view('home.flight_booking',$dataView);
    }

    public function processFlightBooking(Request  $request)
    {
        $web = GeneralSetting::find(1);
        //validate request
        $request->validate([
            'tripType' => 'required',
            'departureDate' => 'required|date',
            'returnDate' => 'nullable|date',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'residence' => 'required|string',
            'destination' => 'required|string',
            'nationality' => 'required|string',
            'class' => 'required|string',
            'numberOfAdults' => 'required|integer|min:1',
            'numberOfChildren' => 'required|integer|min:0',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        $booking = FlightBooking::create([
            'trip_type' => $request->tripType,
            'departure_date' => $request->departureDate,
            'return_date' => $request->returnDate,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'departure_country' => $request->residence,
            'destination_country' => $request->destination,
            'nationality' => $request->nationality,
            'class' => $request->class,
            'number_of_adults' => $request->numberOfAdults,
            'number_of_children' => $request->numberOfChildren,
        ]);
        Mail::to($request->email)->send(new BookingReceived($booking));

        $admins = User::where('is_admin',1)->get();

        if ($admins->count() > 0) {
            foreach ($admins as $admin){
                Mail::to($admin->email)->send(new AdminBookingNotification($booking));
            }
        }

        return redirect()->back()->with('success', 'Your booking request has been received.');
    }
}

