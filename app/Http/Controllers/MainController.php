<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments')->orderBy('id', 'desc')->active()->paginate(3);
        return view('front.main.index', compact('posts'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->active()->orderBy('id', 'desc')->paginate(2);
        return view('front.main.tag', compact('tag', 'posts'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->active()->orderBy('id', 'desc')->paginate(2);
        return view('front.main.category', compact('category', 'posts'));
    }
}
