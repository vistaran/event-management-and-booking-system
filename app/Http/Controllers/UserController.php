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


            $total_seats = Events::where('id', $id)->get()->first();
            $available_seats = $total_seats->available_seats - $request->seats_with_table - $request->seats_without_table;

            $events = Events::where('id', $id)->update([
                'available_seats' => $available_seats
            ]);
            // dd($attendee);

            $events = Events::get();

            $event_details_print = DB::table('events')->join('attendees', 'events.id', '=', 'attendees.event_id')->where('user_id',  Auth::user()->id)->get();

            return response()->json(['success' => 'success', 'event_details_print' => $event_details_print]);
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
        $events = DB::table('events')->join('attendees', 'events.id', '=', 'attendees.event_id')->where('user_id',  Auth::user()->id)->orderBy('event_name', 'ASC')->get();

        return view('events.my_events', ['events' => $events]);
    }

    public function get_booked_edit_form($id, $user_id)
    {
        // $user_id = $request->user_id;
        // dd($user_id, $id);
        $attendee = Attendees::where('id', $id)->where('user_id', $user_id)->get()->first();
        $event_details = Events::where('id', $attendee->event_id)->get()->first();
        $user = User::where('id', $user_id)->get()->first();

        // dd($event_details);

        return view('customer.customer-booked-edit', ['event_details' => $event_details, 'attendee' => $attendee, 'user' => $user]);
    }

    public function edit_attendee(Request $request, $id)
    {
        try {
            // dd($request);
            $user = Auth::user();

            $old_attendee_details = Attendees::where('id', $id)->get()->first();
            $old_seats_booked = $old_attendee_details->seats_booked;
            $old_no_of_adults = $old_attendee_details->no_of_adults;

            $old_available_seats = Events::where('id', $old_attendee_details->event_id)->get()->first();

            $new_total_seats = $request->seats_without_table + $request->seats_with_table;

            $new_attendee = Attendees::where('id', $id)->update([
                'seats_booked_table' => $request->seats_with_table,
                'seats_booked_without_table' => $request->seats_without_table,
                'seats_booked' => $new_total_seats,
                'no_of_adults' => $request->no_of_adults,
                'adult_photo' => $request->adult_photo
            ]);

            $new_available_seats = $old_available_seats->available_seats + $old_seats_booked - $new_total_seats;

            $update_available_seats = Events::where('id', $old_attendee_details->event_id)->update(['available_seats' => $new_available_seats]);

            $event_details_print = DB::table('events')->join('attendees', 'events.id', '=', 'attendees.event_id')->where('user_id',  Auth::user()->id)->get();

            return response()->json(['success' => 'success', 'event_details_print' => $event_details_print]);
        } catch (Exception $e) {
            // dd($request);
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    public function custom_booked_delete($id)
    {
        try {
            // dd($request);
            $user = Auth::user();
            $attendee = Attendees::where('id', $id)->get()->first();
            $event_details = Events::where('id', $attendee->event_id)->get()->first();

            $add_seats = $event_details->available_seats + $attendee->seats_booked;

            $update_available_seats = Events::where('id', $attendee->event_id)->update([
                'available_seats' => $add_seats
            ]);
            $updated_booking = Attendees::where('id', $id)->delete($id);

            return redirect()->route('manageBookings');
        } catch (Exception $e) {
            // dd($request);
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }
}
