<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function events()
    {
        $user = Auth::user();

        $events = Events::get();
        // dd($events);
        // dd($user);
        return view('admin', ['events' => $events]);
    }

    public function add_events()
    {
        return view('events.event-add');
    }

    public function add_event(Request $request)
    {
        $event = new Events();
        $event->event_name = $request->event_name;
        $event->no_of_seats = $request->no_of_seats;
        $event->available_seats = $request->no_of_seats;
        $event->ticket_price = $request->ticket_price;
        $event->event_date = $request->event_date;
        $event->save();

        $events = Events::get();
        return redirect()->route('events', ['events' => $events]);
    }

    public function edit_event($id)
    {
        $event_details = Events::where('id', $id)->get()->first();
        // dd($event_details);
        return view('events.event-edit', ['event_details' => $event_details]);
    }

    public function event_update(Request $request, $id)
    {
        $event_details = Events::where('id', $id)->update([
            'event_name' => $request->event_name,
            'no_of_seats' => $request->no_of_seats,
            'ticket_price' => $request->ticket_price,
            'event_date' => $request->event_date,
        ]);

        $events = Events::get();
        return redirect()->route('events', ['events' => $events]);
    }

    public function event_delete($id)
    {
        $event = Events::where('id', $id)->delete($id);

        $events = Events::get();
        return redirect()->route('events', ['events' => $events]);
    }

    public function book_events()
    {
        return view('event-book');
    }
}
