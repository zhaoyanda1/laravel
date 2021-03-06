<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('/goods',GoodsController::class);
    $router->resource('/users',UsersController::class);
    $router->resource('/wechat',WechatController::class);
    $router->resource('/matter',WeixinMediaController::class);
    $router->resource('/material',MaterialController::class);

    $router->get('/information','WechatController@information');      //
    $router->get('/chat','WechatController@getChatMsg');      //
    $router->get('/textMsg','WechatController@textMsg');      //

    $router->get('/weixin/sendmsg','WechatController@sendMsgView');      //
    $router->post('/weixin/sendmsg','WechatController@sendMsg');
});
