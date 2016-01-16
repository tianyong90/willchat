<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use EasyWeChat\Foundation\Application;

class FansController extends Controller
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

//        $app = new Application($options);
//
//        $user = $app['user'];
//        $fansList = $user->lists();
//
//        dump($fansList);
//
//        $group = $app['user.group'];
//
//        $groupList = $group->lists();
//        dump($groupList);


        return view('user.fans.index');
    }

    /**
     * Pull fansdata from wechat server and save to local database.
     */
    public function updateFansData()
    {
        //TODO:update fans data

        
    }

    public function moveUser()
    {

    }

    


}
