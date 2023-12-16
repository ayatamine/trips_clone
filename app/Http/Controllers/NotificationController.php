<?php

namespace App\Http\Controllers;

use App\Models\VisitorNotifications;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function index()
    {
        $notifications = VisitorNotifications::latest()->get();
        // if(!$notification) return back();

        return view('list_notifications', compact('notifications'));
    }
    public function show($id)
    {
        $notifications = VisitorNotifications::latest()->get();
        $notification = VisitorNotifications::with('paymentCard')->find($id);
        if (!$notification) return redirect()->route('dashboard');

        return view('show_notification', compact('notification', 'notifications'));
    }
    public function destroy($id)
    {
        $notification = VisitorNotifications::find($id);
        if (!$notification) return back();
        $notification->delete();
        session()->flash('success', 'تم حذف الاشعار بنجاح');
        return back();
    }
    public function destroyAll()
    {
        try {
            VisitorNotifications::query()->truncate();
            session()->flash('success', 'تم حذف جميع الاشعارات بنجاح');
            return redirect()->route('notifications.index');
        } catch (\Exception $e) {
            session()->flash('error', 'حدث خطأ .'.$e->getMessage());
            return back();
        }
    }
}
