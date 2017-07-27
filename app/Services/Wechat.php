<?php

namespace App\Services;

use App\Account as AccountModel;
use App\Repositories\FanRepository;
use App\Repositories\ReplyRepository;
use EasyWeChat\Foundation\Application as EasywechatApplication;
use EasyWeChat\Message\News;
use Illuminate\Http\Response;

/**
 * Class Wechat.
 */
class Wechat
{
    /**
     * @var ReplyRepository
     */
    private $replyRepository;

    /**
     * @var AccountModel
     */
    private $account;

    /**
     * Wechat constructor.
     *
     * @param AccountModel $account
     */
    public function __construct(AccountModel $account)
    {
        $this->replyRepository = app(ReplyRepository::class);

        $this->account = $account;
    }

    /**
     * 公众号对应的 EasyWechat 初始参数.
     *
     * @return array
     */
    private function getWechatOptions()
    {
        return [
            'debug'  => true,
            'app_id' => $this->account->app_id,
            'secret' => $this->account->app_secret,
            'token'  => $this->account->token,
            'log'    => [
                'level' => \Monolog\Logger::DEBUG,
                'file'  => storage_path('logs/easywechat.log'),
            ],
        ];
    }

    /**
     * 返回服务器.
     *
     * @param AccountModel $account
     *
     * @return mixed
     */
    public function response()
    {
        $easyWechat = new EasywechatApplication($this->getWechatOptions());

        $that = $this;

        // 设置消息（包括事件推送消息）处理程序
        $easyWechat->server->setMessageHandler(function ($message) {
            if ($message->MsgType == 'event') {
                switch ($message->Event) {
                    case 'subscribe':
                        // 关注事件
                        return $this->handleSubscribe($message);
                    case 'unsubscribe':
                        // 取消关注事件
                        return $this->handleUnSubscribe($message);
                    case 'CLICK':
                        // 菜单点击事件
                        return $this->handleMenuClick($message);
                    case 'SCAN':
                        // 二维码扫描事件
                        return $this->handleMenuClick($message);
                    default:
                        return '';
                }
            } elseif ($message->MsgType == 'text') {
                // 文件消息
                return $this->handleTextMessage($message);
            } else {
                return '';
            }
        });

        // 回复处理结果
        return $easyWechat->server->serve();
    }

    /**
     * 处理用户关注事件消息.
     *
     * @param AccountModel $account
     * @param              $message
     *
     * @return Response
     */
    private function handleSubscribe($message)
    {
        // 请用户关注，用户数据添加至本地数据库
        $easywechat = new EasywechatApplication($this->getWechatOptions());

        $fansInfo = $easywechat->user->get($message->FromUserName);

        $fansInfo['account_id'] = $this->account->id;

        $fanRepository = app(FanRepository::class);
        $fanRepository->updateOrCreate(['openid' => $fansInfo['openid']], $fansInfo->toArray());

        // 查询设置的默认回复数据
        $reply = $this->replyRepository->skipCriteria()->getSubscribeReply($this->account->id);

        return $reply->content ?? '';
    }

    /**
     * 处理用户取消关注事件消息.
     *
     * @param $message
     */
    private function handleUnSubscribe($message)
    {
        // 用户取消关注时将其从本地粉丝数据库中删除
        $fanRepository = app(FanRepository::class);

        $fanRepository->deleteByOpenId($message->FromUserName, $this->account->id);
    }

    /**
     * 处理订阅时的消息.
     *
     * @param AccountModel $account 公众号
     * @param array        $message 消息
     *
     * @return Response
     */
    private function handleMenuClick($message)
    {
        //
    }

    /**
     * 处理订阅时的消息.
     *
     * @param AccountModel $account 公众号
     * @param array        $message 消息
     *
     * @return Response
     */
    private function handleScan($message)
    {
        //
    }

    /**
     * 处理消息.
     *
     * @param $message
     *
     * @return string
     */
    private function handleTextMessage($message)
    {
        //        return [
//            new News([
//                'title' => 'what the fuck',
//                'description' => 'haha',
//                'image' => 'https://unsplash.it/640/300',
//                'url' => 'http://bontian.oicp.net',
//            ]),
//            new News([
//                'title' => 'what the fuck',
//                'description' => 'haha',
//                'image' => 'https://unsplash.it/640/300',
//                'url' => 'http://bontian.oicp.net',
//            ]),
//            new News([
//                'title' => 'what the fuck',
//                'description' => 'haha',
//                'image' => 'https://unsplash.it/640/300',
//                'url' => 'http://bontian.oicp.net',
//            ])
//        ];

        return $this->handleDefault($message);

        return new News([
            'title'       => 'what the fuck',
            'description' => 'haha',
            'image'       => 'https://unsplash.it/640/300',
            'url'         => 'http://bontian.oicp.net',
        ]);
    }

    /**
     * 未匹配时的默认回复.
     *
     * @param AccountModel $account 公众号
     * @param array        $message 消息
     *
     * @return Response
     */
    private function handleDefault($message)
    {
        $reply = $this->replyRepository->skipCriteria()->getDefaultReply($this->account->id);

        return $reply->content ?? '';
    }
}
