<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->nickname = delTags($request->get('nickname'));
        $comment->email = delTags($request->get('email'));
        $comment->website = delTags($request->get('website'));
        $comment->content = delTags($request->get('content'));
        $comment->article_id = $request->get('article_id');

        if ($comment->save()) {
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->withErrors('评论发表失败！');
        }
    }
}
