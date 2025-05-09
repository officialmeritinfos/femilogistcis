<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Deposit;
use App\Models\FlightTicket;
use App\Models\GeneralSetting;
use App\Models\Investment;
use App\Models\User;
use App\Models\Withdrawal;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Admin Dashboard',
            'user'     =>  $user,
            'total_packages'=>Delivery::count(),
            'completed_packages'=>Delivery::where('status', 'delivered')->count(),
            'pending_packages'=>Delivery::where('status', '!=','delivered')->count(),
            'total_tickets'=>FlightTicket::count(),
            'completed_flights'=>FlightTicket::where('status', 'completed')->count(),
            'pending_flights'=>FlightTicket::where('status', '!=','completed')->count(),
        ];

        return view('admin.dashboard',$dataView);
    }
}
