<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Env;

class MainController extends Controller
{
    public function index()
    {
//        $categories =Category::factory()->count(3)->create();
//        $tags = Tag::factory()->count(3)->create();
//        $posts = Post::factory()->count(5)->create();
        $title = 'Админка';
        return view('admin.main.index', compact('title'));
    }
}
