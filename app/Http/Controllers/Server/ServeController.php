<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use EasyWeChat\Foundation\Application;


class ServeController extends Controller
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
        $options = get_wechat_options();

        $app = new Application($options);

        $server = $app['server'];
        $user = $app['user'];

        $server->setMessageHandler(function ($message) use ($user) {
            $fromUser = $user->get($message->FromUserName);

            return "{$fromUser['nickname']}您好！\n欢迎关注 WillChat!";
        });

        $server->serve()->send();
    }
}
