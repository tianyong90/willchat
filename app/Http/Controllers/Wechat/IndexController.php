<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Overtrue\WeChat\Application;


class IndexController extends Controller
{

    private $request;

    /**
     * IndexController constructor.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

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
                'cert_path' => '‪D:\EXIKECERT\apiclient_cert.pem',
                'key_path' => '‪D:\EXIKECERT\apiclient_key.pem',
                // 'device_info'     => '013467007045764',
                // 'sub_app_id'      => '',
                // 'sub_merchant_id' => '',
                // ...
            ],

        ];


        $app = new Application($options);

        $server = $app['server'];
        $user = $app['user'];

        $server->setMessageHandler(function($message) use ($user) {
            $fromUser = $user->get($message->FromUserName);

            return "{$fromUser['nickname']}您好！\n欢迎关注 overtrue!";
        });

        $server->serve()->send();
    }
}
