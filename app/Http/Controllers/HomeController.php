<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Article;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(15);
        return view('home')->with('articles',$articles)->with('home','home');
    }

    public function posts($flag)
    {
        $post = app(\Persimmon\Services\RedisCache::class)->cachePost($flag);

        !empty($post) ?: abort(404, '很抱歉，页面找不到了。');

        Posts::increment('views', 1);

        return view('post')->with(compact('post'));
    }

    /**
     * Tag page
     * @param $tag
     */
    public function tags($tag)
    {

        $tags = Tags::where('tags_name', $tag)->first();

        !empty($tags) ?: abort(404, '很抱歉，页面找不到了。');

        $posts = $tags->posts()->paginate(15);

        return view('home')->with(compact('posts', 'tags'));

    }


    /**
     * friends links
     * @return $this
     */
    public function friends()
    {
        $links = Links::all();

        return view('friends')->with(compact('links'));
    }

    /**
     * Feed 流
     * @return mixed
     */
    public function feed(RssFeed $feed)
    {
        $rss = $feed->getRSS();

        return response($rss)->header('Content-type', 'text/xml; charset=UTF-8');
    }

    /**
     * 站点地图
     * @param SiteMap $siteMap
     * @return mixed
     */
    public function siteMap(SiteMap $siteMap)
    {
        $map = $siteMap->getSiteMap();

        return response($map)->header('Content-type', 'text/xml');
    }

    /**
     * 观察者方法，操作失败时候回调
     * @param $error
     */
    public function creatorFail($error)
    {
        $this->response = ['status' => 'error', 'id' => '', 'info' => $error];
    }

    /**
     * 观察者方法，操作成功时候回调
     * @param $model
     */
    public function creatorSuccess($model)
    {
        $this->response = ['status' => 'success', 'id' => $model->id, 'info' => '评论发布成功'];
    }
}
