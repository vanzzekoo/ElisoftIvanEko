<?php

namespace App\Http\Controllers;

use App\Events\NewPostNotification;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
        $request->validate([
            'thumbnail' => 'required',
            'judul' => 'required',
            'konten' => 'required',
            'status' => 'required',
            'tanggal_publikasi' => 'nullable|date',
        ]);

        $post = Post::create($request->all());
        event(new NewPostNotification($post));
        broadcast(new NewPostNotification($post))->toOthers();

        return redirect()->route('posts.index')
                        ->with('success', 'Post berhasil dibuat.');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'thumbnail' => 'required',
            'judul' => 'required',
            'konten' => 'required',
            'status' => 'required',
            'tanggal_publikasi' => 'nullable|date_format:Y-m-d',
        ]);


        $post->update($request->all());

        return redirect()->route('posts.index')
                         ->with('success', 'Post berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

         return redirect()->route('posts.index')
                          ->with('success', 'Post berhasil dihapus.');
    }
}
