<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->with('category')->paginate(12);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('name')->pluck('name', 'id');

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        if ($request->has('upload_image')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('upload_image')->getClientOriginalExtension();
            $request->file('upload_image')->storeAs('uploads/posts', $filename, 'public');
        }

        $post = auth()->user()->posts()->create([
            'title' => ucwords(strtolower($request->title)),
            'slug' => Str::of($request->title)->slug('-'),
            'upload_image' => $filename ?? null,
            'published' => $request->published,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);

        Alert::toast('Post as been submited!','success');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::all()->sortBy('name')->pluck('name', 'id');

        return view('admin.posts.show', compact('post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all()->sortBy('name')->pluck('name', 'id');

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->has('upload_image')) {
            Storage::delete('public/uploads/posts/' . $post->upload_image);

            $filename = time() . '_' . uniqid() . '.' . $request->file('upload_image')->getClientOriginalExtension();
            $request->file('upload_image')->storeAs('uploads/posts', $filename, 'public');
        }

        $post->update([
            'title' => ucwords(strtolower($request->title)),
            'slug' => Str::of($request->title)->slug('-'),
            'upload_image' => $filename ?? $post->upload_image,
            'published' => $request->published,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);

        Alert::toast('Post as been updated!','success');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->upload_image) {
            Storage::delete('public/uploads/posts/' . $post->upload_image);
            $post->upload_image = null;
        }

        $post->delete();

        Alert::toast('Post as been deleted!','success');

        return redirect()->route('posts.index');
    }
}
