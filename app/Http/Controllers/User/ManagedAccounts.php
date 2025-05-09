<?php

namespace App\Http\Controllers\User;

use App\Defaults\Regular;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\ManageAccount;
use App\Models\ManageAccountDuration;
use App\Models\User;
use App\Notifications\InvestmentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ManagedAccounts extends Controller
{
    use Regular;
    //landing page
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Managed Account',
            'user'     =>  $user,
            'web'       =>$web,
            'durations'=>ManageAccountDuration::get(),
            'accounts'  =>ManageAccount::where('user',$user->id)->get()
        ];

        return view('user.managed_accounts',$dataView);
    }

    public function subscribeNew(Request $request)
    {
        $web = GeneralSetting::where('id',1)->first();
        $user = Auth::user();
        $validator = Validator::make($request->input(),[
            'subDuration'=>['required','numeric','exists:manage_accounts_durations,id'],
            'accountId'=>['required','string','max:150'],
            'accountPassword'=>['required','string','max:150'],
            'accountType'=>['required','string','max:150'],
            'currency'=>['required','string','max:150'],
            'leverage'=>['required','string','max:150'],
            'server'=>['required','string','max:150'],
        ]);

        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }

        $input = $validator->validated();

        $duration = ManageAccountDuration::where('id',$input['subDuration'])->first();

        $amountToPay = $duration->amount;
        if ($amountToPay >$user->balance){
            return back()->with('error','Insufficient balance');
        }

        $user->balance = $user->balance-$duration->amount;

        $account = ManageAccount::create([
            'user'=>$user->id,
            'reference'=>$this->generateId('manage_accounts','reference',20),
            'duration'=>$duration->duration,'amount'=>$duration->amount,'accountId'=>$input['accountId'],
            'accountPassword'=>$input['accountPassword'],'accountType'=>$input['accountType'],
            'currency'=>$input['currency'],'leverage'=>$input['leverage'],'server'=>$input['server'],
            'expires_at'=>strtotime($duration->duration,time())
        ]);
        if(!empty($account)){
            $user->save();
            $admin = User::where('is_admin',1)->first();
            $adminMessage = "
                    A new managed account submission
                    has been made by the investor <b>".$user->name."</b> with reference <b>".$account->reference."</b>
                ";
            //SendInvestmentNotification::dispatch($admin,$adminMessage,'New Investment Initiation');
            $admin->notify(new InvestmentMail($admin,$adminMessage,'New Managed Account Submission'));
            return back()->with('success','Subscription successful');
        }

        return back()->with('error','Something went wrong');
    }

    public function delete($id)
    {
        $web = GeneralSetting::where('id',1)->first();
        $user = Auth::user();

        $account = ManageAccount::where('user',$user->id)->where('reference',$id)->firstOrFail();

        $account->delete();

        return back()->with('success','Successfully deleted');
    }
}
