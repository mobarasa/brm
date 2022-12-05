<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->with('category')->paginate(12);

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('name')->pluck('name', 'id');

        return view('admin.events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        // dd($request);
        if ($request->has('upload_image')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('upload_image')->getClientOriginalExtension();
            $request->file('upload_image')->storeAs('uploads/events', $filename, 'public');
        }

        $post = auth()->user()->events()->create([
            'title' => ucwords(strtolower($request->title)),
            'slug' => Str::of($request->title)->slug('-'),
            'location' => ucwords(strtolower($request->location)),
            'published' => $request->published,
            'upload_image' => $filename ?? null,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'media_link' => $request->media_link,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);

        Alert::toast('Event as been submited!','success');

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $categories = Category::all()->sortBy('name')->pluck('name', 'id');

        return view('admin.events.show', compact('event', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $categories = Category::all()->sortBy('name')->pluck('name', 'id');

        return view('admin.events.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        if ($request->has('upload_image')) {
            Storage::delete('public/uploads/events/' . $event->upload_image);

            $filename = time() . '_' . uniqid() . '.' . $request->file('upload_image')->getClientOriginalExtension();
            $request->file('upload_image')->storeAs('uploads/events', $filename, 'public');
        }

        $event->update([
            'title' => ucwords(strtolower($request->title)),
            'slug' => Str::of($request->title)->slug('-'),
            'location' => ucwords(strtolower($request->location)),
            'published' => $request->published,
            'upload_image' => $filename ?? $event->upload_image,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'media_link' => $request->media_link,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);

        Alert::toast('Event as been updated!','success');

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if ($event->upload_image) {
            Storage::delete('public/uploads/events/' . $event->upload_image);
            $event->upload_image = null;
        }

        $event->delete();

        Alert::toast('Event as been deleted!','success');

        return redirect()->route('events.index');
    }
}
