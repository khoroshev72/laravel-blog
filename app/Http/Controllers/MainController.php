<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::query()->orderBy('id', 'desc')->active()->paginate(3);
        return view('front.main.index', compact('posts'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->with('comments')->active()->orderBy('id', 'desc')->paginate(2);
        return view('front.main.tag', compact('tag', 'posts'));
    }

    public function add_like()
    {
        $id = $_POST['id'];
        if (!(int)$id) return false;
        if (!Auth::check()) return false;
        $post = Post::find($id);
        if (!$post) return false;
        //Если этот пользователь уже ставил лайк этой статье возвращаем false
        $candidate = DB::table('likes_users')->where([
            ['post_id', '=', $id],
            ['user_id', '=', Auth::id()]
        ])->get();
        if ($candidate->count()) return false;
        $post->likes = $post->likes + 1;
        $post->save();
        DB::table('likes_users')->insert(
            ['post_id' => $id, 'user_id' => Auth::id()]
        );
        die(json_encode(['res' => 'ok', 'likes' => $post->likes]));
    }
}
