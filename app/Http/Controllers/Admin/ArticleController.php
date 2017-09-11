<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticleCategory;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $article = Article::all();
        return view('admin/article/index')->withArticles('articles', $article);
    }

    //Create new
    public function create()
    {
        $category = ArticleCategory::getTree();
        return view('Admin/Article/create')->with('category',$category);
    }

    //store
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        $article = new Article;
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->category = $request->get('category');
        $article->order = $request->get('order');
        $article->keywords = $request->get('keywords');
        $article->thumb = $request->get('thumb');
        $article->resource = $request->get('resource');
        $article->author = $request->user()->id;

        if ($article->save()) {
            $data = [
                'status'=>'0',
                'msg'=>'保存成功！'
            ];
        } else {
            $data = [
                'status'=>'1',
                'msg'=>'保存失败！'
            ];
        }
        return $data;
    }

    // edit
    public function edit($id)
    {
       // dd(Article::find($id));
        $category = ArticleCategory::getTree();
        $article = Article::find($id);
        return view('Admin/Article/edit')->with(['article'=>$article,'category'=>$category]);
    }

    //update
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->category = $request->get('category');
        $article->order = $request->get('order');
        $article->keywords = $request->get('keywords');
        $article->thumb = $request->get('thumb');
        $article->resource = $request->get('resource');
        $article->author = $request->user()->id;

        if ($article->save()) {
            $data = [
                'status'=>'0',
                'msg'=>'保存成功！'
            ];
        } else {
            $data = [
                'status'=>'1',
                'msg'=>'保存失败！'
            ];
        }
        return $data;
    }

    //destroy
    public function destroy($id)
    {
        $result = Article::find($id)->delete();
        if($result){
            $data = [
                'status'=>'0',
                'msg'=>'删除成功！'
            ];
        }else{
            $data = [
                'status'=>'1',
                'msg'=>'删除失败！'
            ];
        }
        return $data;
    }

    //change status
    public function changestatus(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'status' => 'required',
        ]);
        $article =  Article::find($request->get('id'));
        $article['status'] = $request->get('status');
        $result = $article->update();
        if( $result ){
            $data = array(
                'code' => '0',
                'msg' => '更新成功',
            );
        }else{
            $data = array(
                'code' => '1',
                'msg' => '更新失败',
            );
        }
        return $data;
    }


}
