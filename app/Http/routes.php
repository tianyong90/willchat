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
Route::any('wechat/{token}', 'Wechat\IndexController@index');

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
    $home = [
        'namespace' => 'Home',
//        'middleware' => 'auth',
    ];

    Route::group($home, function () {
        Route::get('/', function () {
            return view('welcome');
        });
    });

    /*
    * User
    */
    $user = [
        'prefix' => 'user',
        'namespace' => 'User',
//        'middleware' => 'auth',
    ];

    Route::group($user, function () {
        Route::get('/', 'DashboardController@getIndex');
//        Route::controller('account', 'AccountController');
//        Route::controller('auth', 'AuthController');

        Route::get('fans', 'FansController@getIndex');

        Route::get('luckymoney', 'LuckyMoneyController@index');

        Route::get('function', 'SystemFunctionController@index');

        Route::get('document', 'DocumentController@index');

        Route::get('fans', 'user\FansController@index');
        Route::get('menu', 'user\MenuController@index');


        Route::get('avatar', 'AvatarController@index');
        Route::post('avatar', 'AvatarController@store');

//        Route::group(['middleware' => 'account'], function () {
//            Route::controllers([
//                'user' => 'UserController',
//                'fan' => 'FanController',
//                'fan-group' => 'FanGroupController',
//                'menu' => 'MenuController',
//                'material' => 'MaterialController',
//                'staff' => 'StaffController',
//                'message' => 'MessageController',
//                'reply' => 'ReplyController',
//                'upload' => 'UploadController',
//            ]);
//        });
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
        Route::get('/', 'VipController@getIndex');


    });

});
