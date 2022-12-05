<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreSermonRequest;
use App\Http\Requests\UpdateSermonRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Sermon;

class SermonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sermons = Sermon::latest()->paginate(12);

        return view('admin.sermons.index', compact('sermons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('name')->pluck('name', 'id');

        return view('admin.sermons.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSermonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSermonRequest $request)
    {
        if ($request->has('upload_image')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('upload_image')->getClientOriginalExtension();
            $request->file('upload_image')->storeAs('uploads/sermons', $filename, 'public');
        }

        $sermon = auth()->user()->sermons()->create([
            'title' => ucwords(strtolower($request->title)),
            'slug' => Str::of($request->title)->slug('-'),
            'preacher' => ucwords(strtolower($request->preacher)),
            'bible_passage' => ucwords(strtolower($request->bible_passage)),
            'location' => ucwords(strtolower($request->location)),
            'published' => $request->published,
            'upload_image' => $filename ?? null,
            'date_preached' => $request->date_preached,
            'media_link' => $request->media_link,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);

        Alert::toast('Sermon as been submited!','success');

        return redirect()->route('sermons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function show(Sermon $sermon)
    {
        $categories = Category::all()->sortBy('name')->pluck('name', 'id');

        return view('admin.sermons.show', compact('sermon', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function edit(Sermon $sermon)
    {
        $categories = Category::all()->sortBy('name')->pluck('name', 'id');

        return view('admin.sermons.edit', compact('sermon', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSermonRequest  $request
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSermonRequest $request, Sermon $sermon)
    {
        if ($request->has('upload_image')) {
            Storage::delete('public/uploads/sermons/' . $sermon->upload_image);

            $filename = time() . '_' . uniqid() . '.' . $request->file('upload_image')->getClientOriginalExtension();
            $request->file('upload_image')->storeAs('uploads/sermons', $filename, 'public');
        }

        $sermon->update([
            'title' => ucwords(strtolower($request->title)),
            'slug' => Str::of($request->title)->slug('-'),
            'preacher' => ucwords(strtolower($request->preacher)),
            'bible_passage' => ucwords(strtolower($request->bible_passage)),
            'location' => ucwords(strtolower($request->location)),
            'published' => $request->published,
            'upload_image' => $filename ?? $sermon->upload_image,
            'date_preached' => $request->date_preached,
            'media_link' => $request->media_link,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);

        Alert::toast('Sermon as been updated!','success');

        return redirect()->route('sermons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sermon $sermon)
    {
        if ($sermon->upload_image) {
            Storage::delete('public/uploads/sermons/' . $sermon->upload_image);
            $sermon->upload_image = null;
        }

        $sermon->delete();

        Alert::toast('Sermon as been deleted!','success');

        return redirect()->route('sermons.index');
    }
}
