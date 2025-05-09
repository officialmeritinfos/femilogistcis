<?php

use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\FlightController;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\RecoverPassword;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('index',[HomeController::class,'index']);
Route::get('about',[HomeController::class,'about']);
Route::get('terms',[HomeController::class,'terms']);
Route::get('terms',[HomeController::class,'terms']);
Route::get('privacy',[HomeController::class,'privacy']);
Route::get('faqs',[HomeController::class,'faqs']);
Route::get('faq',[HomeController::class,'faqs']);
Route::get('contact',[HomeController::class,'contact']);
Route::get('flight-booking',[HomeController::class,'flightBooking'])->name('flight-booking');
Route::post('flight-booking/process',[HomeController::class,'processFlightBooking'])->name('flight-booking.process');
//Services
Route::get('tour',[HomeController::class,'tour']);
Route::get('travel',[HomeController::class,'travel']);
Route::get('logistics',[HomeController::class,'logistics']);
Route::get('visa',[HomeController::class,'visa']);
Route::get('flight-tracking',[HomeController::class,'flightTracking']);

Route::post('tracking/package/process',[HomeController::class,'processPackage'])
    ->name('tracking.package.process');
Route::post('tracking/flight/process',[HomeController::class,'processFLight'])
    ->name('tracking.flight.process');


Route::get('tracking/flight/{pnr}/detail',[HomeController::class,'flightDetail'])->name('home.flight.detail');
Route::get('tracking/package/{ref}/detail',[HomeController::class,'packageDetail'])->name('home.package.detail');



//Flight Ticket Printing
Route::get('flight/flight-tickets/{id}/print', [FlightController::class, 'print'])->name('flight_tickets.print');
//Delivery Printing
Route::get('delivery/{id}/print', [DeliveryController::class, 'print'])->name('delivery.print');
