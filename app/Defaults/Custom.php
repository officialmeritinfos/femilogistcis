<?php
namespace App\Defaults;

use App\Models\InvestmentReturn;
use App\Models\RealEstate;
use App\Models\ReturnType;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;

class Custom{

    public function getInvestor($id)
    {
        $user = User::where('id',$id)->first();
        return $user->name??'N/A';
    }
    public function getInvestorUsername($id)
    {
        $user = User::where('id',$id)->first();
        return $user->username??'N/A';
    }

    public function getReturnType($id)
    {
        $type = ReturnType::where('id',$id)->first();
        return $type->name;
    }
    //get user's earning in a day
    public function userDailyEarning($user)
    {
        // Get the current date and create Carbon instances for the start and end of the day
        $today = Carbon::now();
        $startOfDay = $today->copy()->startOfDay();
        $endOfDay = $today->copy()->endOfDay();

        return InvestmentReturn::where('user',$user)->whereBetween('created_at', [$startOfDay, $endOfDay])
            ->sum('amount');
    }
    //get user's earning in previous month
    public function userPreviousMonthEarning($user)
    {
        // Get the current date and create Carbon instances for the start and end of the previous month
        $today = Carbon::now();
        $startOfPreviousMonth = $today->copy()->startOfMonth()->subMonth();
        $endOfPreviousMonth = $today->copy()->endOfMonth()->subMonth();

        return InvestmentReturn::where('user',$user)->whereBetween('created_at', [$startOfPreviousMonth, $endOfPreviousMonth])
            ->sum('amount');
    }
    //get user's earning in current month
    public function userCurrentMonthEarning($user)
    {
        // Get the current date and create Carbon instances for the start and end of the current month
        $today = Carbon::now();
        $startOfMonth = $today->copy()->startOfMonth();
        $endOfMonth = $today->copy()->endOfMonth();

        return InvestmentReturn::where('user',$user)->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('amount');
    }
    //services
    public function getServices()
    {
        return Service::where('status',1)->where('isService',1)->get();
    }
    //sectors
    public function getSectors()
    {
        return Service::where('status',1)->where('isSector',1)->get();
    }

    public function getEstates()
    {
        return RealEstate::where('status',1)->get();
    }
}
