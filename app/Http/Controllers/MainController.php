<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::active()->paginate(3);
        return view('front.main.index', compact('posts'));
    }
}
