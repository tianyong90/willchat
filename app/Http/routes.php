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

//    Route::get('login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
//    Route::post('login', 'AuthController@postLogin');
//
//    Route::get('mail', function () {
//        $email = '412039588@qq.com';
//        $name = 'tianyong';
//        $uid = 123;
//        $code = 'abc';
//
//        $data = ['email' => $email, 'name' => $name, 'uid' => $uid, 'activationcode' => $code];
//        Mail::send('welcome', $data, function ($message) use ($data) {
//            $message->to($data['email'], $data['name'])->subject("abadafsl哈哈");
//        });
//    });

    /*
    * Home
    */
//    $home = [
//        'namespace' => 'Home',
//    ];
//
//    Route::group($home, function () {
//        Route::get('/', function () {
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
//        Route::controller('account', 'AccountController');
//        Route::controller('auth', 'AuthController');

        //粉丝管理
        Route::get('fans', 'FansController@index');

        //二维码
        Route::get('qrcode', 'QrcodeController@index');

        //粉丝分组
        Route::get('fans-group', 'FansGroupController@index');
        Route::get('fans-group/edit/{id}', 'FansGroupController@getEdit');
        Route::post('fans-group/edit/{id}', 'FansGroupController@postEdit');

        //微信红包
        Route::get('luckymoney', 'LuckyMoneyController@index');

        //功能列表
        Route::get('function', 'SystemFunctionController@index');

        //帮助文档
        Route::get('document/{type}', 'DocumentController@index');

        //自定义菜单
        Route::get('menu', 'MenuController@index');

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
        'namespace' => 'Mobile',
//        'middleware' => 'auth',
    ];

    Route::group($mobile, function () {
        Route::get('/', 'VipController@index');


    });

});
