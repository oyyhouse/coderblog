<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    //index
    public function index(){
        $comments = Comment::all();
        return view('admin/comment/index')->with('comments', $comments);
    }

    // edit
    public function edit($id)
    {
        return view('admin/comment/edit')->with('comments', Comment::find($id));
    }

    //update
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required|max:255',
            'nickname' => 'required',
            'email' => 'required',
        ]);
        $comment = Comment::find($id);
        $comment->nickname = $request->get('nickname');
        $comment->email = $request->get('email');
        $comment->content = $request->get('content');
        $comment->website = $request->get('website');
        if ($comment->save()) {
            return redirect('admin/comment');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }

    //destroy
    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
