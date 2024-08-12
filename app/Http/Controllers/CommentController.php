<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request) {
        $post_id = $request->post_id;
        $user_id = $request->user_id;
        $message = $request->message;

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post_id,
            'body' => $message
        ]);

        return redirect()->route('posts.show', ['post' => $post_id]);
    }
}
