<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(12);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('name', ['Sysadmin'])->pluck('name', 'id');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if ($request->has('upload_image')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('upload_image')->getClientOriginalExtension();
            $request->file('upload_image')->storeAs('uploads/users', $filename, 'public');
        }

        $user = User::create([
            'name' => ucwords(strtolower($request->name)),
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'position' => $request->position,
            'published' => $request->published,
            'upload_image' => $filename ?? null,
            'content' => $request->content,
            'password' => Hash::make($request->phone_number),
        ]);

        $user->roles()->sync($request->input('roles', []));

        Alert::toast('User has been submited!','success');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::whereNotIn('name', ['Sysadmin'])->pluck('name', 'id');

        $user->load('roles');

        return view('admin.users.show', compact('roles', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::whereNotIn('name', ['Sysadmin'])->pluck('name', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->has('upload_image')) {
            Storage::delete('public/uploads/users/' . $user->upload_image);

            $filename = time() . '_' . uniqid() . '.' . $request->file('upload_image')->getClientOriginalExtension();
            $request->file('upload_image')->storeAs('uploads/users', $filename, 'public');
        }

        $user->update([
            'name' => ucwords(strtolower($request->name)),
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'position' => $request->position,
            'published' => $request->published,
            'upload_image' => $filename ?? $user->upload_image,
            'content' => $request->content,
            'password' => Hash::make($request->phone_number),
        ]);

        $user->roles()->sync($request->input('roles', []));

        Alert::toast('User has been updated!','success');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->upload_image) {
            Storage::delete('public/uploads/users/' . $user->upload_image);
            $user->upload_image = null;
        }

        $user->delete();

        Alert::toast('User has been deleted!','success');

        return back();
    }
}
