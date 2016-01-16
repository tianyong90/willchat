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

    Route::get('vip', 'Wap\VipController@index');

    Route::get('luckymoney', 'User\LuckyMoneyController@index');

    Route::get('function', 'User\SystemFunctionController@index');

    Route::get('document', 'User\DocumentController@index');

    Route::get('user', 'User\DashboardController@index');
    Route::get('account', 'user\OfficialAccountController@index');

    Route::get('fans', 'user\FansController@index');


    Route::get('avatar', 'User\AvatarController@index');
    Route::post('avatar', 'User\AvatarController@store');



    Route::get('login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', 'AuthController@postLogin');

    Route::get('mail', function () {
        $email = '412039588@qq.com';
        $name = 'tianyong';
        $uid = 123;
        $code = 'abc';

        $data = ['email' => $email, 'name' => $name, 'uid' => $uid, 'activationcode' => $code];
        Mail::send('welcome', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject("abadafsl哈哈");
        });
    });

});
