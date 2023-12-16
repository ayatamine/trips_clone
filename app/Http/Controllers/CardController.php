<?php

namespace App\Http\Controllers;

use App\Models\PaymentCard;
use Illuminate\Http\Request;
use App\Models\VisitorNotifications;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = VisitorNotifications::latest()->get();
        $cards = PaymentCard::with('visitor')->latest()->get();
        return view('list_cards', compact('cards', 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->validate($request, [
                'status' => 'required|in:success,danger'
            ]);
            $card = PaymentCard::findOrFail($id);

            if ($request->status == 'success') {
                $card->update(['is_added' => true]);
                session()->flash('success', 'تم عمل البطاقة كمضافة');
            }
            if ($request->status == 'danger')
            {
                $card->update(['is_invalid' => true]);
                session()->flash('success', 'تم عمل البطاقة غير صالحة');
            }

            return back();
        } catch (\Exception $e) {
            session()->flash('error', 'حدث خطأ .' . $e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $card = PaymentCard::find($id);
        if (!$card) return back();
        $card->delete();
        session()->flash('success', 'تم حذف البطاقة بنجاح');
        return back();
    }
    public function destroyAll()
    {
        try {
            PaymentCard::query()->truncate();
            session()->flash('success', 'تم حذف جميع البطافات بنجاح');
            return redirect()->route('notifications.index');
        } catch (\Exception $e) {
            session()->flash('error', 'حدث خطأ .' . $e->getMessage());
            return back();
        }
    }
}
