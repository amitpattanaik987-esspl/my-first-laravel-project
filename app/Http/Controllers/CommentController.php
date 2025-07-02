<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\PostWithDb;

class CommentController extends Controller
{
    public function store(PostWithDb $post)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $user_id = auth()->id();
        $post_id = $post->id;
        $body = request('body');
        comment::create(['user_id' => $user_id, 'post_id' => $post_id, 'body' => $body]);

        return redirect("/about/{$post_id}")->with('success', 'Comment Added !');
    }
}
