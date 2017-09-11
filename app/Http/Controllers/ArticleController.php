<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\ArticleCategory;
use Illuminate\Support\Facades\DB;
class ArticleController extends Controller
{
    //
    public function show($id)
    {
        !empty(Article::with('hasManyComments')->find($id)) ?: abort(404, '很抱歉，页面找不到了。');
        Article::where('id',$id)->increment('view');
        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));

    }

    /**
     * 分类
     * @param $flag
     * @return $this
     */
    public function category($flag)
    {
        $category = ArticleCategory::where('cate_name', $flag)->first();
        !empty($category) ?: abort(404, '很抱歉，页面找不到了。');

        $Chirld_cate = ArticleCategory::getChirldId($category->id);
        //var_dump($Chirld_cate);
        if(is_array($Chirld_cate)){
            $article = Article::wherein('category',$Chirld_cate)->paginate(15);
        }else{
            $article = Article::where('category',$category->id)->paginate(15);
        }

        return view('home')->with('articles',$article)->with('category',$category);
    }

}
