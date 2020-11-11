<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category', 'tags'])->orderBy('id', 'desc')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['thumbnail'] = Post::uploadImage($request);
        $data = Post::toggleStatus($request, $data);
        $post = Post::create($data);
        $post->user_id = Auth::id();
        $post->save();
        $post->tags()->attach($request->tags);
        return redirect()->route('post.index')->with('success', 'Добавлен новый пост');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.post.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();
        if ($path = Post::uploadImage($request, $post->thumbnail)){
            $data['thumbnail'] = $path;
        }
        if ($request->has('no-image')){
            Storage::delete($post->thumbnail);
            $data['thumbnail'] = null;
        }
        $data = Post::toggleStatus($request, $data);
        $post->update($data);
        $post->tags()->sync($request->tags);
        return redirect()->back()->with('success', 'Сохранения изменены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->thumbnail){
            Storage::delete($post->thumbnail);
        }
        $post->tags()->detach();
        $post->delete();
        return redirect()->back()->with('success', 'Пост был удалён');
    }
}
