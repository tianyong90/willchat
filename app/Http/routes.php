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

Route::get('/', function () {
    return view('welcome');
});

//微信路由
Route::any('wechat/{token}', 'Server\ServeController@index');

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
//    $home = [
//        'namespace' => 'Home',
//    ];
//
//    Route::group($home, function () {
//        Route::get('', function () {
//            return view('home.index');
//        });
//    });

    /*
    * User
    */
    $user = [
        'prefix' => 'user',
        'namespace' => 'User',
//        'middleware' => 'auth',
    ];

    Route::group($user, function () {
        Route::get('/', 'IndexController@index');

        //公众号管理
        Route::get('account/add', 'AccountController@getAdd');
        Route::post('account/add', 'AccountController@postAdd');
        Route::get('account/edit/{id}', 'AccountController@getEdit');
        Route::post('account/edit/{id}', 'AccountController@postEdit');
        Route::get('account/destroy/{id}', 'AccountController@destroy');

        //粉丝管理
        Route::get('fans', 'FansController@index');

        //二维码
        Route::get('qrcode/{type}/{keyword?}', 'QrcodeController@index')->where('type', 'forever|temporary|card');
        Route::get('qrcode/create', 'QrcodeController@getCreate');
        Route::post('qrcode/create', 'QrcodeController@postCreate');
        Route::get('qrcode/download/{id?}', 'QrcodeController@download');
        Route::any('qrcode/destroy/{ids?}', 'QrcodeController@destroy');

        //粉丝分组
        Route::get('fan_group', 'FanGroupController@index');
        Route::get('fan_group/create', 'FanGroupController@getCreate');
        Route::post('fan_group/create', 'FanGroupController@postCreate');
        Route::get('fan_group/edit/{id}', 'FanGroupController@getEdit');
        Route::post('fan_group/edit/{id}', 'FanGroupController@postEdit');
        Route::get('fan_group/destroy/{id}', 'FanGroupController@destroy');

        //微信红包
        Route::get('luckymoney', 'LuckyMoneyController@index');

        //功能列表
        Route::get('function', 'SystemFunctionController@index');

        //帮助文档
        Route::get('document/index/{type}/{keyword?}', 'DocumentController@index');
        Route::get('document/detail/{id}', 'DocumentController@detail');

        //自定义菜单
        Route::get('menu', 'MenuController@index');

        //数据统计与分析
        Route::get('stats', 'DataStatsController@index');

        //头像设置
        Route::get('avatar', 'AvatarController@index');
        Route::post('avatar', 'AvatarController@store');

        Route::get('lock', 'LockController@index');
        Route::get('logout', 'LockController@index');

        Route::get('profile/index', 'ProfileController@index');

        Route::get('profile/password', 'ProfileController@password');
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
