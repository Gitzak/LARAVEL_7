<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Mail\CommentPosted;
use App\Mail\CommentPostedMarkDown;
use App\Post;
use Illuminate\Support\Facades\Mail;

class PostCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

    public function store(StoreComment $request, Post $post){

        // save comment
        $comment = $post->comments()->create([
            'content' => $request->content,
            "user_id" => $request->user()->id
        ]);

        // send mail
        // Mail::to($post->user->email)->send(new CommentPosted($comment));

        // send mail with MarkDown
        Mail::to($post->user->email)->send(new CommentPostedMarkDown($comment));

        return redirect()->back();
    }
}
