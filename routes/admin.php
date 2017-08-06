<?php
/**
 * Created by PhpStorm.
 * User: _jjg
 * Date: 2017/8/6
 * Time: 16:40
 */
### 后台管理的路由
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', '\App\Http\Controllers\Admin\LoginController@index');
    # 后台登录
    Route::get('/login', '\App\Http\Controllers\Admin\LoginController@index');
   # 登录处理
    Route::post('/login', '\App\Http\Controllers\Admin\LoginController@login');
    # 退出登录
    Route::get('/logout', '\App\Http\Controllers\Admin\LoginController@logout');

    ## 中间件，
    Route::group(['middleware'=>'auth:admin'],function(){
        #后台首页
        Route::get('/home', '\App\Http\Controllers\Admin\HomeController@index');
    });


});
