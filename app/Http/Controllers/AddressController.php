<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $address = Address::all();

        return view('admin.address.index', compact('address'));
    }

    public function create()
    {
        $count = Address::count();
        if ($count == 0) {
            return view('admin.address.create');
        } else {
            return redirect()->back();
        }
    }

    public function store(StoreAddressRequest $request)
    {
        Address::create([
            'website' => $request->website,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube
        ]);

        Alert::toast('Address as been submited!','success');

        return redirect()->route('address.index');
    }

    public function edit(Address $address)
    {
        return view('admin.address.edit', compact('address'));
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address->update([
            'website' => $request->website,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube
        ]);

        Alert::toast('Address as been updated!','success');

        return redirect()->route('address.index');
    }
}
