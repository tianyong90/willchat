<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//微信路由
Route::any('wechat/{token}', 'Server\ServeController@serv');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    /*
    * Home
    */
    $home = [
        'namespace' => 'Home',
    ];

    Route::group($home, function () {
        Route::get('/', 'IndexController@index');
    });

    /*
    * User
    */
    $user = [
        'prefix' => 'user',
        'namespace' => 'User',
        'middleware' => 'auth.user',
    ];

    Route::group($user, function () {
        Route::get('/', 'DashboardController@index');

        // 认证路由
        Route::get('login', 'AuthController@getLogin');
        Route::post('login', 'AuthController@postLogin');
        Route::get('logout', 'AuthController@getLogout');

        //注册路由
        Route::get('register', 'AuthController@getRegister');
        Route::post('register', 'AuthController@postRegister');

        // 锁屏
        Route::get('lock', 'AuthController@lock');

        //公众号管理
        Route::get('account/create', 'AccountController@getCreate');
        Route::post('account/create', 'AccountController@postCreate');
        Route::get('account/edit/{id}', 'AccountController@getEdit');
        Route::post('account/edit/{id}', 'AccountController@postEdit');
        Route::get('account/destroy/{id}', 'AccountController@destroy');
        Route::get('account/interface/{id}', 'AccountController@showInterface');
        Route::get('account/manage/{id}', 'AccountController@getManage');

        //头像设置
        Route::get('avatar', 'AvatarController@index');
        Route::post('avatar', 'AvatarController@store');

        //个人信息
        Route::get('profile/userinfo', 'ProfileController@getUserinfo');
        Route::post('profile/userinfo', 'ProfileController@postUserinfo');
        Route::get('profile/password', 'ProfileController@getPassword');
        Route::post('profile/password', 'ProfileController@postPassword');

        //帮助文档
        Route::get('document/index/{type}/{keyword?}', 'DocumentController@index');
        Route::get('document/detail/{id}', 'DocumentController@detail');

        // 某一公众号相关的路由
        Route::group(['middleware' => 'account'], function() {
            //粉丝管理
            Route::get('fans', 'FansController@index');
            Route::get('fans/sync', 'FansController@updateFansData');
            Route::get('fans/editremark/{id}', 'FansController@getEditRemark');
            Route::post('fans/editremark/{id}', 'FansController@postEditRemark');
            Route::get('fans/moveto/{id}', 'FansController@getMoveTo');
            Route::post('fans/moveto/{id}', 'FansController@postMoveTo');

            //二维码
            Route::get('qrcode/{type}/{keyword?}', 'QrcodeController@index')->where('type', 'forever|temporary|card');
            Route::get('qrcode/create', 'QrcodeController@getCreate');
            Route::post('qrcode/create', 'QrcodeController@postCreate');
            Route::get('qrcode/download/{id?}', 'QrcodeController@download');
            Route::any('qrcode/destroy/{id?}', 'QrcodeController@destroy');

            //粉丝分组
            Route::get('fan-group', 'FanGroupController@index');
            Route::get('fan-group/create', 'FanGroupController@getCreate');
            Route::post('fan-group/create', 'FanGroupController@postCreate');
            Route::get('fan-group/edit/{id}/{name}', 'FanGroupController@getEdit');
            Route::post('fan-group/edit/{id}', 'FanGroupController@postEdit');
            Route::get('fan-group/destroy/{id}', 'FanGroupController@destroy');

            //微信红包
            Route::get('luckymoney', 'LuckyMoneyController@index');

            //功能列表
            Route::get('function', 'SystemFunctionController@index');

            //自定义菜单
            Route::get('menu', 'MenuController@index');
            Route::get('menu/sync', 'MenuController@sync');

            //数据统计与分析
            Route::get('stats', 'DataStatsController@index');

            //自动回复
            Route::get('reply-subscribe', 'SubscribeReplyController@show');
            Route::post('reply-subscribe', 'SubscribeReplyController@store');

            Route::get('reply-default', 'DefaultReplyController@show');
            Route::post('reply-default', 'DefaultReplyController@store');

            Route::get('reply-text', 'TextReplyController@index');
            Route::get('reply-text/create', 'TextReplyController@getCreate');
            Route::post('reply-text/create', 'TextReplyController@postCreate');
            Route::get('reply-text/update/{id}', 'TextReplyController@getUpdate');
            Route::post('reply-text/update/{id}', 'NewsReplyController@postUpdate');

            Route::get('reply-news', 'NewsReplyController@index');
            Route::get('reply-news/create', 'NewsReplyController@getCreate');
            Route::post('reply-news/create', 'NewsReplyController@postCreate');
            Route::get('reply-news/update/{id}', 'NewsReplyController@getUpdate');
            Route::post('reply-news/update/{id}', 'NewsReplyController@postUpdate');

        });
    });

    /*
    * Mobile
    */
    $mobile = [
        'prefix' => 'mobile',
        'namespace' => 'Mobile'
    ];

    Route::group($mobile, function () {
        Route::get('shop', 'ShopController@index');


    });

});
