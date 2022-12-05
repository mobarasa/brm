<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscribeRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Input;
use App\Models\Subscribe;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscribe::latest()->paginate(12);

        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscribeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscribeRequest $request)
    {

        Subscribe::create($request->validated());

        Alert::toast('Thank you for signing up for our newsletter.!','success');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribe $subscribe)
    {
        //
    }
}
