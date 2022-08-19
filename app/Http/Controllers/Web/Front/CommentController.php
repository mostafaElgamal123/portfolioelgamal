<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Blog;
class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment');
        $comment->user()->associate($request->user());
        $blog = Blog::find($request->get('blog_id'));
        $blog->comments()->save($comment);

        return back();
    }
    public function replyStore(Request $request)
    {
        $reply = new Reply();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $blog = Blog::find($request->get('blog_id'));

        $blog->comments()->save($reply);

        return back();

    }
}
