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

Route::get('/user/{vue_capture?}', 'UserController@index')->where('vue_capture', '[\/\w\.-]*');

// /*
// * Home
// */
// $home = [
//     'namespace' => 'User',
// ];

// Route::group($home, function () {
//     Route::get('/', 'AuthController@getLogin');
// });

// /*
// * User
// */
// $user = [
//     'prefix'     => 'user',
//     'namespace'  => 'User',
//     'middleware' => 'auth.user',
// ];

// Route::group($user, function () {
//     Route::get('/', 'DashboardController@index');

//     // 登录登出
//     Route::get('login', 'AuthController@getLogin');
//     Route::post('login', 'AuthController@postLogin');
//     Route::get('logout', 'AuthController@getLogout');

//     // 注册
//     Route::get('register', 'AuthController@getRegister');
//     Route::post('register', 'AuthController@postRegister');

//     // 锁屏
//     Route::get('lock', 'AuthController@lock');

//     // 账号操作
//     Route::get('account/create', 'AccountController@getCreate');
//     Route::post('account/create', 'AccountController@postCreate');
//     Route::get('account/edit/{accountId}', 'AccountController@getEdit');
//     Route::post('account/edit/{accountId}', 'AccountController@postEdit');
//     Route::get('account/destroy/{accountId}', 'AccountController@destroy');
//     Route::get('account/interface/{accountId}', 'AccountController@showInterface');
//     Route::get('account/manage/{accountId}', 'AccountController@getManage');

//     // 头像设置
//     Route::get('avatar', 'AvatarController@index');
//     Route::post('avatar', 'AvatarController@store');

//     // 个人资料
//     Route::get('profile/userinfo', 'ProfileController@getUserinfo');
//     Route::post('profile/userinfo', 'ProfileController@postUserinfo');
//     Route::get('profile/password', 'ProfileController@getPassword');
//     Route::post('profile/password', 'ProfileController@postPassword');

//     // 在线文档
//     Route::get('document/index/{type}/{keyword?}', 'DocumentController@index');
//     Route::get('document/detail/{id}', 'DocumentController@detail');

//     // 选定公众号后才能进行的操作
//     Route::group(['middleware' => 'account'], function () {
//         // 粉丝管理
//         Route::get('fans', 'FansController@index');
//         Route::get('fans/sync', 'FansController@syncFans');
//         Route::get('fans/editremark/{id}', 'FansController@getEditRemark');
//         Route::post('fans/editremark/{id}', 'FansController@postEditRemark');
//         Route::get('fans/moveto/{id}', 'FansController@getMoveTo');
//         Route::post('fans/moveto/{id}', 'FansController@postMoveTo');

//         // 二维码管理
//         Route::get('qrcode/{type}/{keyword?}', 'QrcodeController@index')->where('type', 'forever|temporary|card');
//         Route::get('qrcode/create', 'QrcodeController@getCreate');
//         Route::post('qrcode/create', 'QrcodeController@postCreate');
//         Route::get('qrcode/download/{id?}', 'QrcodeController@download');
//         Route::any('qrcode/destroy/{id?}', 'QrcodeController@destroy');

//         // 粉丝组管理
//         Route::get('fan-group', 'FanGroupController@index');
//         Route::get('fan-group/sync', 'FanGroupController@getSync');
//         Route::get('fan-group/create', 'FanGroupController@getCreate');
//         Route::post('fan-group/create', 'FanGroupController@postCreate');
//         Route::get('fan-group/edit/{id}/{name}', 'FanGroupController@getEdit');
//         Route::post('fan-group/edit/{id}', 'FanGroupController@postEdit');
//         Route::get('fan-group/destroy/{id}', 'FanGroupController@destroy');

//         // 红包
//         Route::get('luckymoney', 'LuckyMoneyController@index');

//         // 自定义菜单
//         Route::get('menu', 'MenuController@getIndex');
//         Route::get('menu/sync-from-wechat', 'MenuController@getSyncFromWechat');
//         Route::get('menu/sync-to-wechat', 'MenuController@getSyncToWechat');
//         Route::get('menu/destroy/{id}', 'MenuController@destroy');
//         Route::get('menu/clear', 'MenuController@clear');
//         Route::get('menu/create', 'MenuController@getCreate');
//         Route::post('menu/create', 'MenuController@postCreate');
//         Route::get('menu/update/{id}', 'MenuController@getUpdate');
//         Route::post('menu/update/{id}', 'MenuController@postUpdate');

//         // 数据统计
//         Route::get('stats', 'DataStatsController@getIndex');

//         // 高级群发
//         Route::get('broadcast-text', 'BroadcastTextController@getIndex');
//         Route::get('broadcast-news', 'BroadcastNewsController@getIndex');

//         // 关注回复
//         Route::get('reply-subscribe', 'SubscribeReplyController@show');
//         Route::post('reply-subscribe', 'SubscribeReplyController@store');

//         Route::get('reply-default', 'DefaultReplyController@show');
//         Route::post('reply-default', 'DefaultReplyController@store');

//         Route::get('reply-text', 'TextReplyController@index');
//         Route::get('reply-text/create', 'TextReplyController@getCreate');
//         Route::post('reply-text/create', 'TextReplyController@postCreate');
//         Route::get('reply-text/update/{id}', 'TextReplyController@getUpdate');
//         Route::post('reply-text/update/{id}', 'NewsReplyController@postUpdate');

//         Route::get('reply-news', 'NewsReplyController@index');
//         Route::get('reply-news/create', 'NewsReplyController@getCreate');
//         Route::post('reply-news/create', 'NewsReplyController@postCreate');
//         Route::get('reply-news/update/{id}', 'NewsReplyController@getUpdate');
//         Route::post('reply-news/update/{id}', 'NewsReplyController@postUpdate');
//     });
// });

// /*
// * Mobile
// */
// $mobile = [
//     'prefix'    => 'mobile',
//     'namespace' => 'Mobile',
// ];

// Route::group($mobile, function () {
//     Route::get('shop', 'ShopController@getIndex');
// });

// // 开放平台授权测试
// Route::get('open-oauth', 'OpenAuthController@getIndex');
// Route::get('open-oauth-callback', 'OpenAuthController@openOauthCallback');

// // 开放平台接口调用测试
// Route::get('open-test', 'OpenTestController@getIndex');
