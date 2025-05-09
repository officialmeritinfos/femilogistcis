<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\GeneralSetting;
use App\Models\Investment;
use App\Models\Notification;
use App\Models\Promo;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\InvestmentMail;
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
            'pageName' => 'User Dashboard',
            'user'     =>  $user,
            'pendingDeposit'=>Investment::where('user',$user->id)->where('status',2)->sum('amount'),
            'withdrawals'=>Withdrawal::where('user',$user->id)->where('status',1)->sum('amount'),
            'pendingWithdrawal'=>Withdrawal::where('user',$user->id)->where('status','!=',1)->sum('amount'),
            'investments' => Investment::where('user',$user->id)->sum('amount'),
            'ongoingInvestments'=>Investment::where('user',$user->id)->where('status',4)->sum('amount'),
            'completedInvestments'=>Investment::where('user',$user->id)->where('status',1)->sum('amount'),
            'totalDeposits'=>Investment::where('user',$user->id)->where('status',1)->sum('amount'),
            'cancelledInvestments'=>Investment::where('user',$user->id)->where('status',3)->sum('amount'),
            'web'=>$web,
            'latests'=>Investment::where([
                'user'=>$user->id,'status'=>4
            ])->limit(5)->get(),
            'promos'=>Promo::where('status',1)->get(),
            'notifications'=>Notification::where('status',1)->where('user',$user->id)->get()
        ];

        return view('user.dashboard',$dataView);
    }
    //enroll in promo
    public function enrollInPromo($id)
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();
        $promo = Promo::where('id',$id)->first();
        if (empty($promo)){
            return back()->with('error','Promo not found');
        }
        if ($promo->status!=1){
            return back()->with('error','Promo not activated or had expired.');
        }
        $message = "An Investor <b>".$user->name."</b> with email <b>".$user->email."</b> and username <b>".$user->username."</b> has indicated
        interest in the promo <b>".$promo->title."</b>.<br/> Please attend tho this soonest.";

        $admin = User::where('is_admin',1)->first();
        if (!empty($admin)){
            $admin->notify(new InvestmentMail($admin,$message,'New Promo Enrollment Received.'));
        }
        return back()->with('success','Enrollment in promo received. You will receive a mail soon from us about your interest');
    }
}
