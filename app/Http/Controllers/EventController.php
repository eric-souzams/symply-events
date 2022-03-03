<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $events = Event::where('title', 'like', '%'.$search.'%')->get();
        } else {
            $events = Event::all();
        }

        return view('events.index', ['events' => $events, 'search' => $search]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:1|max:100',
            'date' => 'required|date',
            'city' => 'required|string|min:1|max:100',
            'private' => 'required|boolean',
            'description' => 'required|string|min:1',
            'image' => 'required|file'
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $extension = $request->image->extension();

            $imageName = Str::uuid() .'-'. md5(strtotime("now") . $request->image->getClientOriginalName()) . '.' . $extension;

            $request->file('image')->move(public_path('img/events'), $imageName);
        }

        Event::create([
            'title' => $request->title,
            'date' => $request->date,
            'city' => $request->city,
            'private' => $request->private,
            'description' => $request->description,
            'image' => $imageName,
            'items' => $request->items,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('events.index')->with('msg', 'Event created successfully.');
    }

    public function show($eventId)
    {
        $event = Event::findOrFail($eventId);
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard()
    {
        $myEvents = auth()->user()->events;

        return view('dashboard', ['events' => $myEvents]);
    }

    public function destroy($eventId)
    {
        Event::findOrFail($eventId)->delete();

        return redirect()->route('dashboard')->with('msg', 'Event deleted successfully!');
    }

    public function edit($eventId)
    {
        $event = Event::findOrFail($eventId);

        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);
        $data = $request->all();

        if (auth()->user()->id != $event->user_id) {
            return redirect()->route('dashboard')->with('msg', 'This event does not belong to you.');
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $extension = $request->image->extension();

            $imageName = Str::uuid() .'-'. md5(strtotime("now") . $request->image->getClientOriginalName()) . '.' . $extension;

            $request->file('image')->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }

        $event->update($data);

        return redirect()->route('dashboard')->with('msg', 'Event successfully updated!');
    }
}
