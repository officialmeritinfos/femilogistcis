<?php

namespace App\Http\Controllers\Admin;

use App\Defaults\Regular;
use App\Http\Controllers\Controller;
use App\Mail\DeliveryCompletedMail;
use App\Mail\DeliveryCreatedMail;
use App\Mail\DeliveryUpdatedMail;
use App\Models\Delivery;
use App\Models\DeliveryStage;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DeliveryController extends Controller
{
    use Regular;
    //landing page
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Logistics Dashboard',
            'user'     =>  $user,
            'orders' => Delivery::orderBy('id', 'desc')->get(),
        ];

        return view('admin.delivery.index',$dataView);
    }
    //new delivery page
    public function newDelivery()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Create New Delivery',
            'user'     =>  $user,
        ];

        return view('admin.delivery.new',$dataView);
    }
    //process new delivery
    public function processNewDelivery(Request  $request)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'sender_name' => 'required|string|max:255',
                'sender_address' => 'nullable|string|max:255',
                'sender_phone' => 'nullable|string|max:20',
                'sender_email' => 'nullable|email|max:255',
                'receiver_name' => 'required|string|max:255',
                'receiver_address' => 'nullable|string|max:255',
                'receiver_phone' => 'nullable|string|max:20',
                'receiver_email' => 'nullable|email|max:255',
                'origin' => 'required|string|max:255',
                'destination' => 'required|string|max:255',
                'photo' => 'nullable|image|max:2048',
                'service' => 'required|string|max:255',
                'package_description' => 'required|string',
                'package_fee' => 'nullable|numeric',
                'total_weight' => 'nullable|numeric',
                'shipment_date' => 'nullable|date',
                'delivery_date' => 'nullable|date',
                'shipment_mode' => 'nullable|string|max:255',
                'status' => 'required|string|in:pending,in-transit,delivered,cancelled,on-hold',
            ]);

            // Handle file upload
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = uniqid('delivery_') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('delivery'), $filename);
                $validatedData['photo'] = 'delivery/' . $filename;
            }

            $validatedData['reference'] = $this->generateUniqueCode('deliveries', 'reference', function () {
                return $this->generateReferenceCode();
            });

            $validatedData['tracking_number'] = $this->generateUniqueCode('deliveries', 'tracking_number', function () {
                return $this->generateTrackingId();
            });

            // Create delivery
            $delivery = Delivery::create($validatedData);

            // Send mails to sender and receiver
            if ($delivery->sender_email) {
                Mail::to($delivery->sender_email)->send(new DeliveryCreatedMail($delivery, 'sender'));
            }

            if ($delivery->receiver_email) {
                Mail::to($delivery->receiver_email)->send(new DeliveryCreatedMail($delivery, 'receiver'));
            }
            DB::commit();

            return redirect()->route('admin.delivery.detail',['reference'=>$delivery->reference])->with('success', 'Delivery added successfully. You can add the stages');
        }catch (\Exception $exception){
            DB::rollBack();
            logger('Error adding Delivery '. $exception->getMessage());
            return back()->with('error', $exception->getMessage());
        }
    }
    //Edit Delivery
    public function edit($id)
    {
        $delivery = Delivery::findOrFail($id);

        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Update Delivery',
            'user'     =>  $user,
            'delivery' => $delivery,
        ];
        return view('admin.delivery.edit',$dataView);
    }
    //update
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'sender_name' => 'required|string|max:255',
                'sender_address' => 'nullable|string|max:255',
                'sender_phone' => 'nullable|string|max:20',
                'sender_email' => 'nullable|email|max:255',
                'receiver_name' => 'required|string|max:255',
                'receiver_address' => 'nullable|string|max:255',
                'receiver_phone' => 'nullable|string|max:20',
                'receiver_email' => 'nullable|email|max:255',
                'origin' => 'required|string|max:255',
                'destination' => 'required|string|max:255',
                'photo' => 'nullable|image|max:2048',
                'service' => 'required|string|max:255',
                'package_description' => 'required|string',
                'package_fee' => 'nullable|numeric',
                'total_weight' => 'nullable|numeric',
                'shipment_date' => 'nullable|date',
                'delivery_date' => 'nullable|date',
                'shipment_mode' => 'nullable|string|max:255',
                'status' => 'required|string|in:pending,in-transit,delivered,cancelled,on-hold',
            ]);

            $delivery = Delivery::findOrFail($id);

            if ($request->hasFile('photo')) {
                if ($delivery->photo && file_exists(public_path($delivery->photo))) {
                    unlink(public_path($delivery->photo));
                }

                // Upload new photo
                $file = $request->file('photo');
                $filename = uniqid('delivery_') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('delivery'), $filename);
                $validatedData['photo'] = 'delivery/' . $filename;
            }

            $delivery->update($validatedData);

            if ($delivery->status!='delivered'){
                // Notify sender and receiver about the update
                if ($delivery->sender_email) {
                    Mail::to($delivery->sender_email)->send(new DeliveryUpdatedMail($delivery, 'sender'));
                }

                if ($delivery->receiver_email) {
                    Mail::to($delivery->receiver_email)->send(new DeliveryUpdatedMail($delivery, 'receiver'));
                }
            }else{
                if ($delivery->sender_email) {
                    Mail::to($delivery->sender_email)->send(new DeliveryCompletedMail($delivery, 'sender'));
                }
                if ($delivery->receiver_email) {
                    Mail::to($delivery->receiver_email)->send(new DeliveryCompletedMail($delivery, 'receiver'));
                }
            }

            DB::commit();

            return redirect()->route('admin.delivery.detail', $delivery->reference)->with('success', 'Delivery updated successfully.');

        }catch (\Exception $exception){
            DB::rollBack();
            logger('Error adding Delivery '. $exception->getMessage());
            return back()->with('error', $exception->getMessage());
        }
    }
    //delete
    public function destroy($id)
    {
        $delivery = Delivery::findOrFail($id);

        // Delete associated photo if it exists
        if ($delivery->photo && file_exists(public_path($delivery->photo))) {
            unlink(public_path($delivery->photo));
        }
        // Delete the delivery record
        $delivery->delete();

        return redirect()->route('admin.delivery.index')->with('success', 'Delivery deleted successfully.');
    }
    //delivery details
    public function deliveryDetail($ref)
    {
        $delivery = Delivery::where([
            'reference' =>  $ref
        ])->firstOrFail();

        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Delivery Detail',
            'user'     =>  $user,
            'delivery' => $delivery,
            'stages'   => DeliveryStage::where('delivery_id',$delivery->id)->latest()->get()
        ];
        return view('admin.delivery.detail',$dataView);
    }
    //print
    public function print($id)
    {
        $delivery = Delivery::where([
            'reference' => $id
        ])->firstOrFail();
        $stages = $delivery->stages()->orderBy('created_at', 'desc')->get();
        $settings = GeneralSetting::find(1);
        return view('admin.delivery.invoice', compact('delivery', 'stages','settings'));
    }

}
