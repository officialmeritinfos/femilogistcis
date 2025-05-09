<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Referrals extends Controller
{
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web'=>$web,
            'user'=>$user,
            'pageName'=>'Referrals',
            'siteName'=>$web->name,
            'referrals'=>User::where('referral',$user->id)->get()
        ];

        return view('user.referrals',$dataView);
    }
}
