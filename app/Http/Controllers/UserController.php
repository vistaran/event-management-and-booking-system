<?php

namespace App\Http\Controllers;

use App\Models\Attendees;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function default()
    {
        $users = User::where('is_admin', 0)->get();
        return view('customer.custom-default', ['users' => $users]);
    }

    public function allEvents()
    {
        $events = Events::get();

        return view('customer.custom-all_events', ['events' => $events]);
    }

    public function add_events()
    {
        return view('event-add');
    }

    public function book_events()
    {

        return view('event-book');
    }

    public function add_attendee(Request $request, $id)
    {
        try {
            // dd($request);
            $user = Auth::user();

            $event_details = Events::where('id', $id)->get()->first();
            $attendee = new Attendees();
            $attendee->event_id = $id;
            $attendee->user_id = $user->id;
            $attendee->no_of_adults = $request->no_of_adults;
            $attendee->seats_booked = $request->seats_with_table + $request->seats_without_table;
            $attendee->seats_booked_table = $request->seats_with_table;
            $attendee->seats_booked_without_table = $request->seats_without_table;
            $attendee->adult_photo = $request->adult_photo;
            $attendee->save();

            // dd($attendee);

            $events = Events::get();

            return response()->json(['success' => 'success']);
        } catch (Exception $e) {
            // dd($request);
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    public function add_customer()
    {
        return view('customer.customer-add');
    }

    public function edit_customer($id)
    {
        $user = User::where('id', $id)->first();
        return view('customer.customer-edit', ['id' => $id, 'user' => $user]);
    }

    public function save_customer(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('customer_default');
    }

    public function update_customer(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('customer_default');
    }

    public function customer_delete($id)
    {
        $event = User::where('id', $id)->delete($id);
        return redirect()->route('customer_default');
    }


    public function listEvents()
    {
        $events = DB::table('events')->join('attendees', 'events.id', '=', 'attendees.event_id')->where('user_id',  Auth::user()->id)->get();

        return view('events.event_list', ['events' => $events]);
    }
}
