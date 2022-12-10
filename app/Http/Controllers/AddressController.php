<?php

namespace App\Http\Controllers;

use Gate;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $address = Address::all();

        return view('admin.address.index', compact('address'));
    }

    public function create()
    {
        abort_if(Gate::denies('address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
