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

        return view('user.menu.index');
    }

    /**
     * 从微信官方服务器摘取粉丝数据并保存到本地数据库
     */
    public function updateFansData()
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
