<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{

    public function index($id)
    {
        $reminders = Reminder::all();
        // dd($reminders);
        return view('reminder.create', compact('reminders', 'id'));
    }

    public function store(Request $request)
    {
        // $user = Auth::user();
        $pro = Shop::find($request->id);
        // dd($pro);
        $reminder = new Reminder();
        $reminder ->shop_id = $request->input('id');
        $reminder->title = $request->input('title');
        $reminder->description = $request->input('description');
        $reminder->reminder_date = $request->input('reminder_date');
        $reminder->recipient_email = $pro->email;
        $reminder->save();

        // send email to recipient here

        return redirect()->route('reminders.list')->with('success', 'Reminder Set');
    }

    public function destroy($id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->delete();
        return redirect()->route('reminders.list')->with('success', 'Reminder deleted successfully!');
    }

    public function list(){
        $reminders = Reminder::with('shop')->get();
        // dd($reminders);
        return view('reminder.list', compact('reminders'));
    }
}
