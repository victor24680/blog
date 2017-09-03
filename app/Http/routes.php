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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');




Route::get('/admin/quit','Admin\LogRegister@quit');
Route::get('/admin/login','Admin\LogRegister@login');
Route::post('/admin/sublogin','Admin\LogRegister@sublogin');
Route::get('/admin/code','Admin\LogRegister@code');
Route::get('/admin/encryptcode','Admin\LogRegister@encryptcode');



Route::group(['middleware'=>['admin.login']],function(){
    Route::any('/admin/pass','Admin\LogRegister@pass');
    
    Route::get('/admin/index','Admin\IndexController@index');
    Route::get('/admin/info','Admin\IndexController@info');

    Route::get('/admin/add','Admin\IndexController@add');
    Route::get('/admin/list','Admin\IndexController@lists');
    Route::get('/admin/tab','Admin\IndexController@tab');
    Route::get('/admin/img','Admin\IndexController@img'); 
    Route::resource('/admin/category','Admin\CategoryController');
    
    Route::post('/admin/cate/changeOrder','Admin\CategoryController@changeOrder');
});




