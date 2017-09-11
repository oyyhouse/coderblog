<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

//前端路由
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('article/{id}', 'ArticleController@show');
Route::get('category/{flag}', 'ArticleController@category');
Route::post('comment', 'CommentController@store');












//验证码
Route::get('admin/code', 'Auth\LoginController@code');

//后台路由
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('/dashboard', 'HomeController@dashboard');

    //文章资讯路由
    Route::resource('article', 'ArticleController');
    Route::post('article/changestatus', 'ArticleController@changestatus');
    Route::any('fileupload', 'CommonController@fileupload');
    Route::resource('article', 'ArticleController');
    Route::resource('comment', 'CommentController');

    //文章资讯分类路由
    Route::resource('articleCategory', 'ArticleCategoryController');
    //Route::get('/categoryList/{upID}','ArticleCategoryController@categoryList')->name('categoryList'); //资讯文章分类列表
//    Route::get('/categoryFooterList/{upID}','ArticleCategoryController@categoryList')->name('categoryFooterList'); //页脚文章分类列表
//    Route::get('/categoryDelete/{id}/{upID}','ArticleCategoryController@categoryDelete')->name('categoryDelete'); //删除文章分类
//    Route::get('/categoryAdd/{upID}','ArticleCategoryController@categoryAdd')->name('categoryCreatePage'); //添加资讯文章分类视图
//    Route::post('/categoryAdd', 'ArticleCategoryController@postCategory')->name('categoryCreate');//添加文章分类

});