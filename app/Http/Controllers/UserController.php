<?php

namespace App\Http\Controllers;

use Gate;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::whereNotIn('name', ['Super-Admin'])->pluck('name', 'id');

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
            $request->file('upload_image')->storeAs('public/users', $filename);

            //Resize image here
            $resizeimagepath = public_path('storage/users/'.$filename);
            $img = Image::make($resizeimagepath)->resize(360, 360, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($resizeimagepath);
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
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::whereNotIn('name', ['Super-Admin'])->pluck('name', 'id');

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
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::whereNotIn('name', ['Super-Admin'])->pluck('name', 'id');

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
            Storage::delete('public/users/' . $user->upload_image);

            $filename = time() . '_' . uniqid() . '.' . $request->file('upload_image')->getClientOriginalExtension();
            $request->file('upload_image')->storeAs('public/users', $filename);

            //Resize image here
            $resizeimagepath = public_path('storage/users/'.$filename);
            $img = Image::make($resizeimagepath)->resize(360, 360, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($resizeimagepath);
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
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($user->upload_image) {
            Storage::delete('public/users/' . $user->upload_image);
            $user->upload_image = null;
        }

        $user->delete();

        Alert::toast('User has been deleted!','success');

        return back();
    }
}
