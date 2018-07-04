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
    // Route::group([],function(){
    //     Route::get('/admins','admin\IndexController@index');
    // });
    Route::resource('/admins/user','admin\UserController');
    //分类管理
    Route::group([],function(){
        Route::resource('/admins/cate','admin\CateController');
        Route::get('/admins/cate/{id}/create','admin\CateController@add' );
    });
    //商品管理
    Route::group([],function(){
        Route::resource('/admins/goods','admin\GoodsController');
        // Route::get('/admins/goods/{id}/create','admin\GoodsController@add' );
    });

    // Route::get('/', function () {
    //     return view('home.index');
    // });
    
    // Route::get('/main', function () {
    //     return view('layout.main');
    // });
    // //用户评价表
    // Route::get('/evaluate', function () {
    //     return view('home.evaluate');
    // });
    // //商品详情表
    // Route::get('/list', function () {
    //     return view('home.list');
    // });
    // //用户登录页
    // Route::get('/login', function () {
    //     return view('home.login');
    // });
    // //用户注册页
    // Route::get('/reg', function () {
    //     return view('home.reg');
    // });
    // //用户服务页
    // Route::get('/service', function () {
    //     return view('home.service');
    // });
    // Route::get('/good', function () {
    //     return view('home.good');
    // });



    // Route::get('/info', function () {
    //     return view('home.info');
    // });
    // Route::get('/cart', function () {
    //     return view('home.cart');
    // });
    // Route::get('/orders', function () {
    //     return view('home.orders');
    // });


    