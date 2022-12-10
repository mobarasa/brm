<?php

namespace App\Http\Controllers;

use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use App\Models\About;
use Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('about_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('about_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            $request->file('upload_image')->storeAs('public/abouts', $filename);

            //Resize image here
            $resizeimagepath = public_path('storage/abouts/'.$filename);
            $img = Image::make($resizeimagepath)->resize(1130, null, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($resizeimagepath);
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
        abort_if(Gate::denies('about_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            Storage::delete('public/abouts/' . $about->upload_image);

            $filename = time() . '_' . uniqid() . '.' . $request->file('upload_image')->getClientOriginalExtension();
            $request->file('upload_image')->storeAs('public/abouts', $filename);

            //Resize image here
            $resizeimagepath = public_path('storage/abouts/'.$filename);
            $img = Image::make($resizeimagepath)->resize(1130, null, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($resizeimagepath);
        }

        $about->update([
            'content' => $request->content,
            'upload_image' => $filename ?? $about->upload_image,
        ]);

        Alert::toast('Church history has been updated!','success');

        return redirect()->route('about.index');
    }
}
