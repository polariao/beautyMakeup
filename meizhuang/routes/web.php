<?php

Route::get('excel/export','ExcelController@export');

Route::get('excel/import','ExcelController@import');

/**
 * 后台路由
 */
    Route::any('admin/register','Admin\RegisterController@register');
    Route::any('admin/register/store','Admin\RegisterController@store');
    Route::any('admin/login','Admin\LoginController@Login');
    Route::get('admin/code','Admin\LoginController@code');

//后台中间件
Route::group(['middleware' => ['admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('/','IndexController@index');
    Route::get('add','IndexController@add');
    Route::get('welcome','IndexController@welcome');
    Route::get('loginout','LoginController@loginout');
//分类路由
    Route::resource('category', 'CategoryController');
//商城协议
    Route::get('protocol', 'CommonController@update1');
    Route::post('protocol/store', 'CommonController@store');
//公告路由
    Route::resource('gonggao', 'GonggaoController');
//用户留言
    Route::resource('leaveword', 'LeavewordController');
    Route::post('leaveword/select', 'LeavewordController@select');
//友情链接路由
    Route::resource('link', 'LinkController');
//订单路由
    Route::resource('dingdan', 'DingdanController');
    Route::get('dingdan/fahuo/{id}', 'DingdanController@fahuo');
    Route::post('dingdan/select', 'DingdanController@select');
//商品评价路由
    Route::resource('pingjia', 'PingjiaController');
    Route::post('pingjia/select', 'PingjiaController@select');
//商品路由
    Route::resource('product', 'ProductController');
    Route::any('product/select','ProductController@select');
    Route::any('product/select1','ProductController@selectReady');
    Route::any('product/select2','ProductController@selectUp');
    Route::any('product/select3','ProductController@selectDown');
    Route::any('shan/up','ShanController@up');
    Route::any('shan/down','ShanController@down');
    Route::any('shan/ready','ShanController@ready');
    Route::get('shan/xia/{id}','ShanController@updateXia');
    Route::get('shan/shang/{id}','ShanController@updateShang');

//用户管理
    Route::resource('user', 'UserController');
    Route::get('user/dongjie/{id}', 'UserController@Dongjie');
    Route::post('user/select', 'UserController@select');

//管理员管理
    Route::resource('admin', 'AdminController');
    Route::resource('give', 'GiveController');
//系统管理
    Route::resource('lunbotu', 'LunbotuController');
});

/**
 * 前台路由
 */

Route::get('/','Home\IndexController@index');
Route::get('loginout','Home\LoginController@loginout');

Route::group(['prefix'=>'home','namespace'=>'Home'], function () {

    Route::any('login','LoginController@login');
    Route::get('register','LoginController@register');
    Route::get('xieyi','LoginController@xieyi');
    Route::post('register/store','LoginController@store');

//用户中心
    Route::resource('user', 'UserController');
    Route::post('user/update','UserController@update1');
//购物车
    Route::get('shopCar','IndexController@shopCar');
    Route::any('updateNumber/{id}/{value}','IndexController@updateNumber');
    Route::any('fukuan','IndexController@fukuan');
    Route::any('shopCarDel/{id}','IndexController@shopCarDel');
//订单详情
    Route::get('order','IndexController@order');
    Route::any('orderDel/{id}','IndexController@orderDel');
//全部商品
    Route::get('all','IndexController@all');
    Route::any('select','IndexController@select');
//商品详细信息
    Route::get('goods/{id}', 'IndexController@goods');
    Route::post('goods/add', 'IndexController@add');
//分类管理
    Route::get('cate/{id}', 'IndexController@cate');
//商品评价
    Route::post('pingjia', 'IndexController@pingjia');
//留言板
    Route::get('liuyan', 'IndexController@liuyan');
    Route::post('leaveWord', 'IndexController@leaveWord');
//活动公告
    Route::get('action', 'IndexController@action');
    Route::get('action/{id}', 'IndexController@actionxq');
});