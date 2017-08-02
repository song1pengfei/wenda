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

//前台首页
Route::get('/',"Home\IndexController@index");
//前台列表页
Route::get('/list/{id}', 'Home\ListController@index');
Route::get('/list/highscore/{id}', 'Home\ListController@index2');
Route::get('/list/hot/{id}', 'Home\ListController@index3');
Route::get('/list/feed/{id}', 'Home\ListController@index4');

//公告测试
Route::get('/home/notices','Home\NoticeController@index');
//公告单页
Route::get('/home/notice/{id}','Home\NoticeController@show');
//前台登录
Route::get('/home/login', 'Home\LoginController@index');
Route::post("/home/doLogin","Home\LoginController@doLogin");
Route::get('/home/logout', "Home\LoginController@logout");//退出登录
Route::get('/home/geren','Home\GerenController@index');//个人中心
//注册页面
Route::get('/home/register', 'Home\RegisterController@index');
Route::post('/home/registeradd', 'Home\RegisterController@register');
//回答测试
Route::get('/home/getcode',"Home\RegisterController@getCode"); //加载验证码
//完善个人信息
Route::get('/home/wanshan/{id}/edit',"Home\WanshanController@edit");
Route::put('/home/wanshan/update/{id}',"Home\WanshanController@update");

Route::get('/home/detail','Home\AnswerController@index');
//后台
Route::get("/admin/login","Admin\LoginController@login");
Route::get('/admin/getcode',"Admin\LoginController@getCode"); //加载验证码
Route::post("/admin/dologin","Admin\LoginController@doLogin");//执行登录
Route::get('/admin/logout', "Admin\LoginController@logout");//退出登录
Route::get('/admin',"Admin\IndexController@index");
Route::group(['prefix' => 'admin','middleware' => 'admin'],function(){
	Route::get('/',"Admin\IndexController@index");
	//公告信息
	Route::get('notice','Admin\NoticeController@index');
	Route::get('AddNotice','Admin\NoticeController@create');
	Route::post('InsertNotice','Admin\NoticeController@store');
	Route::get('notice/{id}/edit',"Admin\NoticeController@edit");
	Route::post('notice/{id}/update',"Admin\NoticeController@update");
	Route::delete('NoticeDel/{id}',"Admin\NoticeController@destroy");
	//广告信息
	Route::get('adu','Admin\AduController@index');
	Route::get('AduInsert','Admin\AduController@create');
	Route::post('AduUpload','Admin\AduController@store');
	Route::get('adu/{id}/edit','Admin\AduController@edit');
	Route::post('adu/{id}/update',"Admin\AduController@update");
	Route::delete('AduDel/{id}',"Admin\AduController@destroy");
	Route::get('adu/BigImage/{id}',"Admin\AduController@show");
	//评论信息
	Route::get('comment','Admin\CommentController@index');
    Route::get('comment/{id}/edit',"Admin\CommentController@edit");
	Route::post('editcomment/{id}',"Admin\CommentController@update");
	Route::get('comment/del/{id}','Admin\CommentController@destroy');
	//后台栏目分类
    Route::resource('lanmu', 'Admin\LanmuController'); 
    //Route::get('columnadd', 'Admin\ColumnController@create'); 

    //用户表
    Route::resource('logins',"Admin\LoginsController");
    //个人信息表1
    Route::resource('user',"Admin\UserController");
    
    //后台用户表
    Route::resource('admin',"Admin\AdminController");
    
    //用户日志
    Route::resource('log',"Admin\LogController");

    Route::resource('question',"Admin\QuestionController");

    Route::resource('answer',"Admin\AnswerController");

});
//前台路由组
Route::group(['prefix' => 'home','middleware' => 'home'],function(){
	Route::resource('comment',"Home\CommentController");
    //前台提问页
	Route::get('question/{id}', 'Home\QuestionController@show');
	Route::resource('question', 'Home\QuestionController');
	//Route::get('question/{id}','Home\AgainQuestionController@show');
	//追问
	
    //回答
	Route::post('/detail/store', 'Home\AnswerController@store');
    //评论信息
	//评论测试
	Route::post('/comment/insert','Home\CommentController@store');
	//个人信息我的回答
	Route::get('AgainAnswer/{id}','Home\UpdateAnswerController@show');
	Route::post('AgainAnswer/update/{id}','Home\UpdateAnswerController@update');
	
});
    //追问页面
	
    Route::get('question/askagain','Home\AgainQuestionController@store');
    //有人回答页面
	//Route::get('/detail', 'Home\AnswerController@index');
	Route::get('/detail/{id}', 'Home\AnswerController@show');
	//Route::get('/detail','Home\AnswerController@index');
    //点赞
    Route::get('/praise/islike/{id}', 'Home\AnswerController@islike');

	//Route::post('/comment','Home\CommentController@store');
	Route::get('/comment/show/{id}','Home\CommentController@show');
//七牛云测试
Route::get('/file','Home\UploadController@index');
Route::post('/upload/Upload','Home\UploadController@UploadFile');