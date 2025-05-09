<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DeliveryCompletedMail;
use App\Models\Delivery;
use App\Models\DeliveryStage;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DeliveryStageController extends Controller
{
    //create new stage
    /**
     * @param $stage
     * @return void
     */
    protected static function UpdateDeliveryStatus(DeliveryStage  $stage): void
    {
        if ($stage->status == 'delivered') {
            $delivery = $stage->delivery;

            $delivery->update(['status' => 'delivered']);

            if ($delivery->sender_email) {
                Mail::to($delivery->sender_email)->send(new DeliveryCompletedMail($delivery, 'sender'));
            }
            if ($delivery->receiver_email) {
                Mail::to($delivery->receiver_email)->send(new DeliveryCompletedMail($delivery, 'receiver'));
            }
        }
    }

    public function create($deliveryId)
    {
        $delivery = Delivery::findOrFail($deliveryId);

        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Add Delivery Stage',
            'user'     =>  $user,
            'delivery' => $delivery,
        ];
        return view('admin.delivery.add_stage',$dataView);
    }

    public function store(Request $request, $deliveryId)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
            'status' => 'required|in:picked-up,in-transit,out-for-delivery,delivered',
            'remark' => 'nullable|string|max:1000',
        ]);

        //create the stage
        $stage = DeliveryStage::create([
            'delivery_id' => $deliveryId,
            'location' => $validated['location'],
            'status' => $validated['status'],
            'remark' => $validated['remark'],
        ]);

        self::UpdateDeliveryStatus($stage);

        return redirect()->route('admin.delivery.detail', $stage->delivery->reference)->with('success', 'Stage added successfully.');
    }
    public function edit($id)
    {
        $stage = DeliveryStage::findOrFail($id);

        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Edit Delivery Stage',
            'user'     =>  $user,
            'stage' => $stage,
        ];
        return view('admin.delivery.edit_stage',$dataView);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
            'status' => 'required|in:picked-up,in-transit,out-for-delivery,delivered',
            'remark' => 'nullable|string|max:1000',
        ]);

        $stage = DeliveryStage::findOrFail($id);
        $stage->update($validated);

        self::UpdateDeliveryStatus($stage);

        return redirect()->route('admin.delivery.detail', $stage->delivery->reference)->with('success', 'Stage updated successfully.');
    }

}
