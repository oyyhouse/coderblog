<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ArticleCategory;
class ArticleCategoryController extends Controller
{
    //
    public function index()
    {
        $categorys = ArticleCategory::getTree();
        return view('Admin/ArticleCategory/index')->with('data',$categorys);
    }

    //Create new
    public function create()
    {
        $category = ArticleCategory::where('pid',0 )->get();
        //dd( $category);
        return view('Admin/ArticleCategory/create')->with(compact('category'));
    }

    //store
    public function store(Request $request)
    {
        $this->validate($request, [
            'cate_name' => 'required|unique:article_categorys|max:255',
            'pid' => 'required',
        ]);
        $articlecCate = new ArticleCategory;
        $articlecCate->cate_name = $request->get('cate_name');
        $articlecCate->pid = $request->get('pid');
        $articlecCate->url = $request->get('url');
        $articlecCate->order = $request->get('order');
        $articlecCate->keyword = $request->get('keyword');
        $articlecCate->seotitle = $request->get('seotitle');
        $articlecCate->description = $request->get('description');

        if ($articlecCate->save()) {
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
        $category = ArticleCategory::where( 'pid',0 )->get();
        $categorys = ArticleCategory::find($id);
        return view('Admin/ArticleCategory/edit')->with(['data'=>$categorys,'category'=>$category]);
    }

    //update
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cate_name' => 'required|max:255',
            'pid' => 'required',
        ]);
        $articlecCate = ArticleCategory::find($id);
        $articlecCate->cate_name = $request->get('cate_name');
        $articlecCate->pid = $request->get('pid');
        $articlecCate->url = $request->get('url');
        $articlecCate->order = $request->get('order');
        $articlecCate->keyword = $request->get('keyword');
        $articlecCate->seotitle = $request->get('seotitle');
        $articlecCate->description = $request->get('description');

        if ($articlecCate->save()) {
            $data = [
                'status'=>'0',
                'msg'=>'更新成功！'
            ];
        } else {
            $data = [
                'status'=>'1',
                'msg'=>'更新失败！'
            ];
        }
        return $data;
    }

    //destroy
    public function destroy($id)
    {
        //判断是否有子目录
        $isParent = ArticleCategory::where('pid',$id)->get()->toArray();
        if(!$isParent){
            $result = ArticleCategory::find($id)->delete();
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
       }else{
            $data = [
                'status'=>'1',
                'msg'=>'所删除的目录含有子目录，请先删除子目录！'
            ];
        }
        return $data;
    }




}
