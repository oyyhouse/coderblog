<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;
class ArticleCategory extends Model
{
    //
    protected $table = 'article_categorys';
    protected $primaryKey = 'id';


    protected $fillable = [
        'id','pid','cate_name','order','created_at','updated_at'
    ];

    public function posts()
    {
        return $this->hasMany(Article::class,'category');
    }

    static function getTree()
    {
        $data = ArticleCategory::get()->toArray();
        return self::_reSort($data);
    }

    static function _reSort($data,$upID = 0,$isMain=TRUE)
    {
        static $ret = array();
        if($isMain)
        {
            $ret = array();
        }
        foreach($data as $k=>$v)
        {
            if($v['pid'] == $upID)
            {
                $v['ismain'] = $isMain;
                $ret[] = $v;
                self::_reSort($data,$v['id'],FALSE);
            }
        }
        return $ret;
    }

    static function _children($data,$upID=0,$isMain=TRUE)
    {
        static $ret = array();
        if($isMain)
        {
            $ret = array();
        }
        foreach ($data as $k=>$v)
        {
            if($v['pid'] == $upID)
            {
                $ret[] = $v['id'];
                self::_children($data,$v['id'],FALSE);
            }
        }
        return $ret;
    }


    static function getParentId($id,$isMain=true)
    {
        static $pid = '';
        if($isMain)
        {
            $pid = '';
        }
        $parentCate = ArticleCategory::where('id',$id)->first();
        if($parentCate->pid != 0){
            self::getParentId($parentCate->pid,false);
        }else{
            $pid = $parentCate->id;
        }
        return $pid;
    }

    static function getChirldId($pid)
    {
        static $cate_id = array();
        $chirldCate = ArticleCategory::where('pid',$pid)->get()->toArray();
        foreach($chirldCate as $value){
            $cate_id[] = $value['id'];
        }
        if(ArticleCategory::where('pid',0)->where('id',$pid)->get()) {
            $cate_id[] = $pid;
        }
        return $cate_id;



    }
}
