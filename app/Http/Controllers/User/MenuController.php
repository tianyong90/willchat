<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use EasyWeChat\Foundation\Application;

class MenuController extends Controller
{
    public function index()
    {
        $options = [
            'debug' => true,
            'app_id' => env('WECHAT_APPID'),
            'secret' => env('WECHAT_APPSECRET'),
            'token' => env('WECHAT_TOKEN'),
            // log
            'log' => [
                'level' => \Monolog\Logger::DEBUG,
                'file' => storage_path('logs\easywechat.log'),
            ],
            // oauth
            'oauth' => [
                'scopes' => ['snsapi_userinfo'],
                'callback' => '/examples/oauth_callback.php',
            ],
            'payment' => [
                'merchant_id' => env('WECHAT_MERCHANT_ID'),
                'key' => env('WECHAT_MERCHANT_KEY'),
                'cert_path' => 'D:\EXIKECERT\apiclient_cert.pem',
                'key_path' => 'D:\EXIKECERT\apiclient_key.pem',
            ],
        ];

        $app = new Application($options);

        $menu = $app['menu'];

        $menuList = $menu->current();

//        dump($menuList);
//        exit;

        return user_view('menu.index');
    }

    /**
     * 创建菜单
     */
    public function getCreate()
    {
        return user_view('menu.create');

        
    }

    /**
     * 保存创建菜单
     */
    public function postCreate()
    {
        //TODO:update fans data


    }

    public function moveUser()
    {

    }

    public function editRemark()
    {

    }




}
