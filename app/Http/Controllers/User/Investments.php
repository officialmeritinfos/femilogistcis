<?php

namespace App\Http\Controllers\User;

use App\Defaults\Regular;
use App\Http\Controllers\Controller;
use App\Jobs\SendDepositNotification;
use App\Jobs\SendInvestmentNotification;
use App\Models\Coin;
use App\Models\GeneralSetting;
use App\Models\Investment;
use App\Models\Package;
use App\Models\ReturnType;
use App\Models\User;
use App\Notifications\InvestmentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Investments extends Controller
{
    use Regular;
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web'=>$web,
            'user'=>$user,
            'investments'=>Investment::where('user',$user->id)->paginate(15),
            'pageName'=>'Deposit Lists',
            'siteName'=>$web->name
        ];

        return view('user.investments',$dataView);
    }

    public function newInvestment()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web'=>$web,
            'user'=>$user,
            'pageName'=>'New Deposit',
            'siteName'=>$web->name,
            'packages'=>Package::where('status',1)->get(),
            'coins'=>Coin::where('status',1)->get(),
        ];

        return view('user.new_investments',$dataView);
    }

    public function processInvestment(Request $request)
    {
        $web = GeneralSetting::where('id',1)->first();
        $user = Auth::user();
        $validator = Validator::make($request->input(),[
            'amount'=>['required','numeric'],
            'account'=>['required','numeric'],
            'package'=>['required','numeric'],
            'asset'=>['required','string']
        ]);

        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }

        $input = $validator->validated();

        //check if the asset is supported
        $coinExists = Coin::where('asset',strtoupper($input['asset']))->first();
        if (empty($coinExists)){
            return back()->with('error','Asset is not supported');
        }
        //generate deposit reference
        $reference = $this->generateId('deposits','reference',10);
        //check if the package exists

        $packageExists = Package::where('id',$input['package'])->first();

        if (empty($packageExists)){
            return back()->with('error','Selected Package is invalid');
        }

        //check if amount matches
        if ($packageExists->isUnlimited !=1){
            if ($packageExists->maxAmount < $input['amount']){
                return back()->with('error','Deposit amount cannot be greater than maximum amount');
            }
        }
        if ($packageExists->minAmount > $input['amount']){
            return back()->with('error','Deposit amount cannot be less than minimum amount');
        }

        $packageHasLoan = $packageExists->canLoan;

        //check if the user has the amount in balance
        switch ($input['account']){
            case 1:
                $balance = $user->balance;
                $source = 'balance';
                $newBalance = [
                    'balance'=>$balance
                ];
                $status=2;
                break;
            default:
                $balance = $user->profit;
                $source = 'profit';
                $newBalance = [
                    'profit'=>$balance- $input['amount']
                ];
                $status=4;
                break;
        }

        if ($input['account']!=1 && $balance < $input['amount'] ){
            return back()->with('error','Insufficient balance in profit account.');
        }


        if ($packageExists->reinvest!=1 && $source=='profit') {
            return back()->with('error','You cannot reinvest on this package. Please upgrade.');
        }

        //get the return type attached to investment package
        $returnType = ReturnType::where('id',$packageExists->returnType)->first();
        //do calculations for the investment
        $roi = $packageExists->roi;
        $profitPerReturn = $input['amount']*($roi/100);
        $nextReturn = strtotime($returnType->duration,time());
        $ref =$this->generateId('investments','reference',15);

        $dataInvestment = [
            'user'=>$user->id,'amount'=>$input['amount'],'roi'=>$roi,'reference'=>$ref,
            'source'=>strtolower($source),'profitPerReturn'=>$profitPerReturn,'currentProfit'=>0,
            'nextReturn'=>$nextReturn,'currentReturn'=>0,'returnType'=>$returnType->id,
            'numberOfReturns'=>$packageExists->numberOfReturns,'status'=>$status,'duration'=>$packageExists->Duration,
            'package'=>$packageExists->id,
            'wallet'=>$coinExists->address,'asset'=>$coinExists->asset
        ];

        $investment = Investment::create($dataInvestment);
        if (!empty($investment)){
            User::where('id',$user->id)->update($newBalance);
            //send notification
            //check if admin exists
            $admin = User::where('is_admin',1)->first();
            $userMessage = "
                    Your new investment package purchase of $<b>".$input['amount']." </b>
                    has been received. Your Investment reference Id is <b>".$ref."</b>
                ";

            //send mail to user
            //SendInvestmentNotification::dispatch($user,$userMessage,'Investment Initiation');
            $user->notify(new InvestmentMail($user,$userMessage,'Investment Initiation'));
            //send mail to Admin
            if (!empty($admin)){
                $adminMessage = "
                    A new investment of $<b>".$input['amount']."</b>
                    has been started by the investor <b>".$user->name."</b> with reference <b>".$ref."</b>
                ";
                //SendInvestmentNotification::dispatch($admin,$adminMessage,'New Investment Initiation');
                $admin->notify(new InvestmentMail($admin,$adminMessage,'New Investment Initiation'));
            }
            return redirect()->route('invest_detail',['id'=>$investment->id])
                ->with('success','Investment initiated successfully.');
        }
        return back()->with('error','Something went wrong');
    }

    public function investmentDetails($id)
    {
        $user = Auth::user();
        $web = GeneralSetting::find(1);

        $investment = Investment::where('user',$user->id)->findOrFail($id);
        $dataView = [
            'user'=>$user,
            'web'=>$web,
            'pageName'=>'Deposit Detail',
            'siteName'=>$web->name,
            'investment'=>$investment,
        ];
        return view('user.investment_detail',$dataView);
    }

    public function cancel($id)
    {
        $user = Auth::user();
        $web = GeneralSetting::find(1);

        $investment = Investment::where('user',$user->id)->where('id',$id)->first();

        if (empty($investment)){
            return back()->with('error','Investment not found');
        }
        if ($investment->status ==1){
            return back()->with('error','Investment already completed.');
        }

        if ($investment->status ==3){
            return back()->with('error','Investment already cancelled.');
        }

        $data=['status'=>3];

        switch ($investment->source){
            case 'balance':
                $balance = $user->balance+$investment->amount;
                $newBalance = ['balance'=>$balance];
                break;
            default:
                $balance = $user->profit+$investment->amount;
                $newBalance = ['profit'=>$balance];
                break;
        }
        $update=Investment::where('id',$investment->id)->update($data);

        if ($update){

            User::where('id',$user->id)->update($newBalance);

            return back()->with('success','Investment cancelled');
        }

        return back()->with('error','Something went wrong');
    }
}
