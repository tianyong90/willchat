<?php

namespace App\Http\Controllers\Server;

use App\Repositories\AccountRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use EasyWeChat\Foundation\Application;


class ServeController extends Controller
{
    private $request;

    protected $accountRepository;

    /**
     * IndexController constructor.
     */
    public function __construct(Request $request, AccountRepository $account)
    {
        $this->request = $request;
        $this->accountRepository = $account;
    }

    public function serv(Request $request)
    {
        $token = $request->route('token');

        $accountData = $this->accountRepository->getByToken($token);

        $options = [
            'debug' => true,
            'app_id' => $accountData->app_id,
            'secret' => $accountData->app_secret,
            'token' => $accountData->token,
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
        ];

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
