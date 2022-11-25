<?php

namespace App\Http\Controllers;

use App\Models\Attendees;
use App\Models\Events;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function default()
    {
        $events = Events::get();
        $user = Auth::user();
        $attendee = Attendees::where('user_id', $user->id)->get();

        $new = DB::table('events')->join('attendees', 'events.id', '=', 'attendees.event_id')->get();
        dd($new);

        return view('customer.custom-default', ['events' => $events]);
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
}
