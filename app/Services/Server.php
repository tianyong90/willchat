<?php

namespace App\Services;

use App\Models\Account as AccountModel;
use App\Repositories\ReplyRepository;
use App\Services\Message as MessageService;
use Cache;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Response;

/**
 * 回复服务.
 */
class Server
{
    /**
     * 消息服务
     *
     * @var Message
     */
    private $messageService;

    /**
     * replyRepository.
     *
     * @var ReplyRepository
     */
    private $replyRepository;

    /**
     * constructer.
     *
     * @param MessageService  $messageService  消息服务
     * @param ReplyRepository $replyRepository
     */
    public function __construct(MessageService $messageService, ReplyRepository $replyRepository)
    {
        $this->messageService = $messageService;

        $this->replyRepository = $replyRepository;
    }

    /**
     * 返回服务器.
     *
     * @param AccountModel $account
     *
     * @return mixed
     */
    public function response(AccountModel $account)
    {
        // 获取微信相关设置参数
        $options = get_wechat_options($account->id);

        $easyWechat = new Application($options);

        // 设置消息（包括事件推送消息）处理程序
        $easyWechat->server->setMessageHandler(function ($message) use ($account) {
            if ($message->MsgType == 'event') {
                switch ($message->Event) {
                    case 'subscribe':
                        // 关注事件
                        return $this->handleSubscribe($account, $message);
                        break;
                    case 'unsubscribe':
                        // 取消关注事件
                        return $this->handleUnSubscribe($account, $message);
                        break;
                    case 'CLICK':
                        // 菜单点击事件
                        return $this->handleMenuClick($account, $message);
                        break;
                    case 'SCAN':
                        // 二维码扫描事件
                        return $this->handleMenuClick($account, $message);
                        break;
                    default:
                        return $this->messageService->makeEmpty();
                        break;
                }
            } elseif ($message->MsgType == 'text') {
                // 文件消息
                return $this->handleMessage($account, $message);
            } else {
                return $this->messageService->makeEmpty();
            }
        });

        // 回复处理结果
        $response = $easyWechat->server->serve();

        return $response;
    }

    /**
     * 处理用户关注事件消息.
     *
     * @param AccountModel $account
     * @param              $message
     *
     * @return Response
     */
    private function handleSubscribe(AccountModel $account, $message)
    {
        // 请用户关注，用户数据添加至本地数据库
        // 获取微信相关设置参数
        $options = get_wechat_options($account->id);
        $easywechat = new Application($options);

        $userInfo = $easywechat->user->get($message->FromUserName);

        $userInfo['account_id'] = $account->id;

        $fanService = app(Fan::class);
        $fanService->create($userInfo->toArray());

        // 查询设置的默认回复数据
        $reply = $this->replyRepository->skipCriteria()->getSubscribeReply($account->id);

        return $this->messageService->makeText($reply['content']);
    }

    /**
     * 处理用户取消关注事件消息.
     *
     * @param AccountModel $account
     * @param              $message
     *
     * @return Response
     */
    private function handleUnSubscribe(AccountModel $account, $message)
    {
        // 用户取消关注时将其从本地粉丝数据库中删除
        $fanService = app(Fan::class);

        $fanService->deleteByOpenId($message->FromUserName, $account->id);
    }

    /**
     * 处理订阅时的消息.
     *
     * @param AccountModel $account 公众号
     * @param array        $message 消息
     *
     * @return Response
     */
    private function handleMenuClick(AccountModel $account, $message)
    {
        return $this->messageService->makeText('menu clicked');
    }

    /**
     * 处理订阅时的消息.
     *
     * @param AccountModel $account 公众号
     * @param array        $message 消息
     *
     * @return Response
     */
    private function handleScan(AccountModel $account, $message)
    {
        return $this->messageService->makeText('qrcode scan');
    }

    /**
     * 处理消息.
     *
     * @param AccountModel $account 公众号
     * @param array        $message 消息
     *
     * @return Response
     */
    private function handleMessage(AccountModel $account, $message)
    {
        return $this->handleDefault($account, $message);

//        //存储消息
//        $this->messageService->storeMessage($account, $message);
//
//        //属于文字类型消息
//        if ($message['MsgType'] == 'text') {
//            $replies = Cache::get('replies_'.$account->id);
//
//            foreach ($replies as $key => $reply) {
//                //查找字符串
//                if (str_contains($message['Content'], $key)) {
//                    return $this->messageService->eventsToMessage($reply['content']);
//                }
//            }
//
//            return $this->handleNoMatch($account, $message);
//        }
    }

    /**
     * 未匹配时的默认回复.
     *
     * @param AccountModel $account 公众号
     * @param array        $message 消息
     *
     * @return Response
     */
    private function handleDefault(AccountModel $account, $message)
    {
        $reply = $this->replyRepository->skipCriteria()->getDefaultReply($account->id);

        return $this->messageService->makeText($reply['content']);
    }
}
