<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware', ['web']], function () {
    Route::get('/', 'Home\IndexController@index');

    Route::get('/artlist/{cate_id?}', 'Home\IndexController@lists')->name('artlist');

    Route::get('/artlist', 'Home\IndexController@lists');

    Route::get('/detail', 'Home\IndexController@detail')->name('detail');

    Route::get('/test', 'Home\TestController@index');

});

//定向到文件
Route::get('/admin', 'Admin\LogRegister@login');

Route::get('/admin/quit', 'Admin\LogRegister@quit');
Route::get('/admin/login', 'Admin\LogRegister@login');
Route::post('/admin/sublogin', 'Admin\LogRegister@sublogin');
Route::get('/admin/code', 'Admin\LogRegister@code');
Route::get('/admin/encryptcode', 'Admin\LogRegister@encryptcode');

Route::post('/uploady/upload', 'Admin\UploadyController@upload')->name('upload');

Route::group(['middleware' => ['admin.login']], function () {
    Route::any('/admin/pass', 'Admin\LogRegisterController@pass');

    Route::get('/admin/index', 'Admin\IndexController@index');
    Route::get('/admin/info', 'Admin\IndexController@info');
    Route::get('/admin/add', 'Admin\IndexController@add');
    Route::get('/admin/list', 'Admin\IndexController@lists');
    Route::get('/admin/tab', 'Admin\IndexController@tab');
    Route::get('/admin/img', 'Admin\IndexController@img');

    Route::get('/admin/config/inputFile', 'Admin\ConfigController@inputFile');

    Route::resource('/admin/category', 'Admin\CategoryController');
    Route::resource('/admin/article', 'Admin\ArticleContorller');
    Route::resource('/admin/links', 'Admin\LinksController');
    Route::resource('/admin/navs', 'Admin\NavsController');
    Route::resource('/admin/conf', 'Admin\ConfigController');

    Route::post('/admin/article/changeOrder', 'Admin\ArticleContorller@changeOrder');
    Route::post('/admin/cate/changeOrder', 'Admin\CategoryController@changeOrder');
    Route::post('/admin/navs/changeOrder', 'Admin\NavsController@changeOrder');
    Route::post('/admin/conf/changecontent', 'Admin\ConfigController@changecontent');


});




