<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function single($slug)
    {
        $post = Post::with('comments')->active()->where('slug', $slug)->firstOrFail();
        return view('front.post.single', compact('post'));
    }

    public function add_comment(Request $request)
    {
        $request->validate([
            'comment' => 'required|min:3',
            'post_id' => 'integer|exists:posts,id'
        ]);
        $comment = Comment::create($request->all());
        $comment->user_id = Auth::id();
        $comment->save();
        return redirect()->back()->with('success', 'Комментарий добавлен');
    }
}
