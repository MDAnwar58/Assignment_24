<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Rsvp;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function index(Request $request)
    {
        $query = Event::query();
        if ($request->filter) {
            $userId = $request->filter;
            $query->whereHas('rsvps', function ($subQuery) use ($userId) {
                $subQuery->where('user_id', $userId);
            });
            $events = $query->paginate(5);
        } else if ($request->search) {
            $events = Event::where('organization', 'like', '%' . $request->search . '%')
                ->orWhere('title', 'like', '%' . $request->search . '%')
                ->latest()->paginate(5);
        } else {
            $events = Event::latest()->paginate(5);
        }
        $users = User::latest()->get();
        return view('pages.backend.event.index', compact('events', 'users'));
    }
    function create()
    {
        $users = User::latest()->get();
        return view('pages.backend.event.create', compact('users'));
    }
    function store(Request $request)
    {
        $request->validate([
            'organization' => 'required',
            'title' => 'required|max:200',
            'description' => 'required',
            'date' => 'date|required',
            'time' => 'required',
            'location' => 'required|max:200',
        ]);

        Event::create([
            'organization' => $request->organization,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location
        ]);

        return redirect()->route('admin.event')->with('success', 'Event created successfully');
    }
    function show($id)
    {
        $event = Event::find($id);
        $user = User::with('rsvps')->find(auth()->id());
        $users = User::latest()->get();
        $rsvp = Rsvp::where('event_id', $id)->where('user_id', $user->id)->first();
        return view('pages.backend.event.show', compact('event', 'users', 'user', 'rsvp'));
    }
    function edit($id)
    {
        $event = Event::find($id);
        $users = User::latest()->get();
        return view('pages.backend.event.edit', compact('event', 'users'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'organization' => 'required',
            'title' => 'required|max:200',
            'description' => 'required',
            'date' => 'date|required',
            'time' => 'required',
            'location' => 'required|max:200',
        ]);

        Event::find($id)->update([
            'organization' => $request->organization,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
        ]);

        return redirect()->route('admin.event')->with('success', 'Event updated successfully');
    }
    function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('admin.event')->with('success', 'Event deleted successfully');
    }
    function rsvp(Request $request, Event $event)
    {
        if ($event) {
            $request->validate([
                'user_id' => 'required',
            ]);

            Rsvp::create([
                'user_id' => $request->user_id,
                'event_id' => $event->id,
            ]);

            return redirect()->back()->with('success', 'RSVP successful.');
        }
    }

    function cancelRsvp(Event $event)
    {
        Rsvp::where('event_id', $event->id)->delete();
        return redirect()->back()->with('success', 'RSVP cancelled.');
    }
}
