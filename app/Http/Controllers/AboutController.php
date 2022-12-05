<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();

        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = About::count();
        if ($count == 0) {
            return view('admin.about.create');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutRequest $request)
    {
        if ($request->has('upload_image')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('upload_image')->getClientOriginalExtension();
            $request->file('upload_image')->storeAs('uploads/abouts', $filename, 'public');
        }

        About::create([
            'content' => $request->content,
            'upload_image' => $filename ?? null,
        ]);

        Alert::toast('Church history has been submited!','success');

        return redirect()->route('about.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutRequest  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        if ($request->has('upload_image')) {
            Storage::delete('public/uploads/abouts/' . $about->upload_image);

            $filename = time() . '_' . uniqid() . '.' . $request->file('upload_image')->getClientOriginalExtension();
            $request->file('upload_image')->storeAs('uploads/abouts', $filename, 'public');
        }

        $about->update([
            'content' => $request->content,
            'upload_image' => $filename ?? $about->upload_image,
        ]);

        Alert::toast('Church history has been updated!','success');

        return redirect()->route('about.index');
    }
}
