<?php

namespace App\Http\Controllers\User;

use App\Defaults\Regular;
use App\Defaults\Wallet;
use App\Http\Controllers\Controller;
use App\Jobs\SendDepositNotification;
use App\Models\Coin;
use App\Models\Deposit;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Notifications\InvestmentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Deposits extends Controller
{
    use Regular,Wallet;

    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web'=>$web,
            'user'=>$user,
            'deposits'=>Deposit::where('user',$user->id)->get(),
            'pageName'=>'Deposit Lists',
            'siteName'=>$web->name
        ];

        return view('user.deposits',$dataView);
    }

    public function newDeposit()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web'=>$web,
            'user'=>$user,
            'coins'=>Coin::where('status',1)->get(),
            'pageName'=>'New Deposit',
            'siteName'=>$web->name
        ];

        return view('user.new_deposit',$dataView);
    }

    public function processDeposit(Request $request)
    {
        $web = GeneralSetting::where('id',1)->first();
        $user = Auth::user();
        $validator = Validator::make($request->input(),[
            'amount'=>['required','numeric'],
            'asset'=>['required','string']
        ]);

        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }
        $input = $validator->validated();

        //check if amount is more than minimum deposit
        if ($web->minDeposit > $input['amount']){
            return back()->with('error','Amount to Deposit is less than minimum Deposit of $'.$web->minDeposit);
        }
        //check if the asset is supported
        $coinExists = Coin::where('asset',strtoupper($input['asset']))->first();
        if (empty($coinExists)){
            return back()->with('error','Asset is not supported');
        }
        //generate deposit reference
        $reference = $this->generateId('deposits','reference',10);
        //check if the deposit type manual or automatic
        switch ($web->paymentMethod){
            case 1:
                $dataInvoice =[
                    'name'=>'Account Funding',
                    'description'=>'Account Funding by '.$user->name,
                    'amount'=>$input['amount'],
                    'payerName'=>$user->name,
                    'email'=>$user->email,
                    'asset'=>$input['asset'],
                    'fiat'=>'USD','customId'=>$reference
                ];
                $result= $this->createInvoice($dataInvoice);
                $response = $result->json();
                if ($result->successful()){
                    $address=$response['data']['address'];
                    $dataDeposit =[
                        'user'=>$user->id,'reference'=>$reference,'amount'=>$input['amount'],
                        'cryptoAmount'=>$response['data']['cryptoAmount'],'asset'=>$input['asset'],
                        'details'=>$response['data']['address'],'paymentRef'=>$response['data']['reference'],
                        'paymentMethod'=>1,'methodType'=>1
                    ];
                }else{
                    return back()->with('error',$response['data']['error']);
                }
                break;
            default:
                $address = $coinExists->address;
                $dataDeposit =[
                    'user'=>$user->id,'reference'=>$reference,'amount'=>$input['amount'],
                    'asset'=>$input['asset'],'details'=>$coinExists->address,'paymentRef'=>$reference,
                    'paymentMethod'=>2,'methodType'=>2
                ];
                break;
        }

        $create = Deposit::create($dataDeposit);
        if (!empty($create)){
            //check if admin exists
            $admin = User::where('is_admin',1)->first();
            $userMessage = "
                Your new deposit request of $<b>".$input['amount']." worth of ".$input['asset']."</b>
                has been received and awaiting payment. To complete your deposit, send your payment to the Address
                below: <br>
                <b>Wallet Address:</b> ".$address.".
            ";
            //send mail to user
            //SendDepositNotification::dispatch($user,$userMessage,'Pending Deposit');
            $user->notify(new InvestmentMail($user,$userMessage,'Pending Deposit Request'));
            //send mail to Admin
            if (!empty($admin)){
                $adminMessage = "
                    A new deposit request of $<b>".$input['amount']." worth of ".$input['asset']."</b>
                    has been placed by the investor <b>".$user->name."</b> with reference <b>".$reference."</b>
                ";
                //SendDepositNotification::dispatch($admin,$adminMessage,'New Pending Deposit');
                $admin->notify(new InvestmentMail($admin,$adminMessage,'New Pending Deposit'));
            }
            return redirect()->route('deposit_detail',['id'=>$create->id])
                ->with('success','Deposit Initiated. Follow the instruction below to complete it');
        }
        return back()->with('error','Something went wrong');
    }

    public function depositDetails($id)
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $deposit = Deposit::where('user',$user->id)->findOrFail($id);

        $dataView = [
            'web'=>$web,
            'user'=>$user,
            'deposit'=>$deposit,
            'pageName'=>'Deposit Details',
            'siteName'=>$web->name
        ];

        return view('user.deposit_details',$dataView);
    }

    public function cancel($id)
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $deposit = Deposit::where('user',$user->id)->findOrFail($id);

        if ($deposit->status ==3){
            return back()->with('error','Deposit already cancelled. Please contact support for help');
        }
        $data=[
            'status'=>3
        ];
        $update = Deposit::where('id',$id)->update($data);

        if ($update){
            //check if admin exists
            $admin = User::where('is_admin',1)->first();
            $userMessage = "
                Your deposit with reference: <b>".$deposit->reference."</b> has been cancelled.
            ";
            //send mail to user
            //SendDepositNotification::dispatch($user,$userMessage,'Deposit Cancelled');
            $user->notify(new InvestmentMail($user,$userMessage,'Deposit Cancelled'));
            //send mail to Admin
            if (!empty($admin)){
                $adminMessage = "
                    The deposit request with reference <b>".$deposit->reference."</b> placed by the
                    investor <b>".$user->name."</b> has been cancelled.
                ";
                //SendDepositNotification::dispatch($admin,$adminMessage,'New Deposit Cancelled');
                $admin->notify(new InvestmentMail($admin,$adminMessage,'New Deposit Cancelled'));
            }
        }
        return back()->with('error','Something went wrong');
    }

}
