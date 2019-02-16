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

Route::get('/', function () {
    return view('welcome');
});

//后台
Auth::routes();

//后台
Route::get('/home', 'HomeController@index')->name('home');

//用户注册
Route::any('/userAdd', 'User\UserController@userAdd');

//用户登录
Route::any('/loginAdd', 'User\UserController@loginAdd');

//个人中心
Route::any('/center','User\UserController@center');

//退出
Route::any('/loginQuit','User\UserController@loginQuit');



//商品主页
Route::any('/goodsList','Goods\GoodsController@goodsList');

//商品主页删除
Route::any('/goodsDel/{goods_id}','Goods\GoodsController@goodsDel')->middleware('check.login.token');

//商品详情
Route::any('/goodsDetails/{goods_id}','Goods\GoodsController@goodsDetails')->middleware('check.login.token');




//购物车展示
Route::any('/cartList','Cart\CartController@cartList')->middleware('check.login.token');

//购物车添加1
Route::any('/cartAdd/{goods_id}','Cart\CartController@cartAdd')->middleware('check.login.token');

//购物车添加2
Route::any('/cartAdd2','Cart\CartController@cartAdd2')->middleware('check.login.token');

//购物车删除1
Route::any('/cartDel/{goods_id}','Cart\CartController@cartDel')->middleware('check.login.token');

//购物车删除2
Route::any('/cartDel2/{c_id}','Cart\CartController@cartDel2')->middleware('check.login.token');




//提交订单
Route::any('/orderAdd','Order\OrderController@orderAdd')->middleware('check.login.token');

//订单展示
Route::any('/orderList','Order\OrderController@orderList')->middleware('check.login.token');

//删除订单
Route::any('/orderDel/{o_id}','Order\OrderController@orderDel')->middleware('check.login.token');

//支付订单
Route::any('/orderPay/{o_id}','Order\OrderController@orderPay')->middleware('check.login.token');

//跳转网址
Route::any('/Pay/{o_id}','Pay\AlipayController@pay');
Route::any('/aliNotify','Pay\AlipayController@aliNotify');        //支付宝支付 异步通知回调
Route::any('/aliReturn','Pay\AlipayController@aliReturn');        //支付宝支付 同步通知回调

//上传文件
Route::any('/upload','User\UserController@uploadAdd');

//坐位
Route::any('/movie','index\indexController@movie');
Route::any('/buy/{pos}','index\indexController@movieBuy');

//考试登录
Route::any('/index','index\indexController@index');

//考试修改密码
Route::any('/update','index\indexController@update');


