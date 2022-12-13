<?php

namespace App\Http\Controllers;

use Gate;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        if (!is_dir(storage_path("app/public/images/posts"))) {
            mkdir(storage_path("app/public/images/posts"), 0775, true);
        }

        if ($request->hasFile('upload_image')) {
            $file = $request->file('upload_image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(1140, 487)->save( storage_path('app/public/images/posts/' . $filename) );
        }

        $post = auth()->user()->posts()->create([
            'title' => ucwords(strtolower($request->title)),
            'slug' => Str::of($request->title)->slug('-'),
            'upload_image' => $filename ?? null,
            'published' => $request->published,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);

        Alert::toast('Post has been submited!','success');

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
        abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            Storage::delete('public/images/posts/' . $post->upload_image);

            $file = $request->file('upload_image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(1140, 487)->save( storage_path('app/public/images/posts/' . $filename) );

        }

        $post->update([
            'title' => ucwords(strtolower($request->title)),
            'slug' => Str::of($request->title)->slug('-'),
            'upload_image' => $filename ?? $post->upload_image,
            'published' => $request->published,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);

        Alert::toast('Post has been updated!','success');

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
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($post->upload_image) {
            Storage::delete('public/images/posts/' . $post->upload_image);
            $post->upload_image = null;
        }

        $post->delete();

        Alert::toast('Post as been deleted!','success');

        return redirect()->route('posts.index');
    }
}
