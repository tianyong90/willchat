<?php

namespace App\Services;

use Overtrue\Wechat\Server as WechatServer;
use App\Services\Message as MessageService;
use App\Repositories\ReplyRepository;
use Cache;

/**
 * 回复服务.
 *
 * @author rongyouyuan <rongyouyuan@163.com>
 */
class Server
{
    /**
     * 消息服务
     *
     * @var App\Services\Message
     */
    private $messageService;

    /**
     * replyRepository.
     *
     * @var App\Repositories\ReplyRepository
     */
    private $replyRepository;

    /**
     * constructer.
     *
     * @param MessageService $messageService 消息服务
     */
    public function __construct(MessageService $messageService, ReplyRepository $replyRepository)
    {
        $this->messageService = $messageService;

        $this->replyRepository = $replyRepository;
    }

    /**
     * 返回服务器.
     *
     * @param App\Models\Account $account account
     *
     * @return Response
     */
    public function make($account)
    {
        $appId = $account->app_id;

        $token = $account->token;

        $encodingAESKey = $account->aes_key;

        $server = new WechatServer($appId, $token, $encodingAESKey);

        $server->on('message', function ($message) use ($server, $account) {
            return $this->handleMessage($account, $message, $server);
        });

        //普通事件
        $server->on('event', function ($event) use ($server, $account) {
            return $this->handleEvent($account, $event, $server);
        });

        return $server->serve();
    }

    /**
     * 处理事件.
     *
     * @param int                    $account 公众号
     * @param array                  $event   事件
     * @param Overtrue\Wechat\Server $server  server
     *
     * @return Response
     */
    private function handleEvent($account, $event, $server)
    {
        if ($event['Event'] == 'subscribe') {
            return $this->handleSubscribe($account);
        }
    }

    /**
     * 处理订阅时的消息.
     *
     * @return Response
     */
    private function handleSubscribe($account)
    {
        $event = $this->replyRepository->getFollowReply($account->id);

        $eventId = $event['content'][0];

        return $eventId ? $this->messageService->eventToMessage($eventId) : $this->messageService->emptyMessage();
    }

    /**
     * 处理未匹配时的回复.
     *
     * @return Response
     */
    private function handleNoMatch($account)
    {
        $event = $this->replyRepository->getNoMatchReply($account->id);

        $eventId = $event['content'][0];

        return $eventId ? $this->messageService->eventToMessage($eventId) : $this->messageService->emptyMessage();
    }

    /**
     * 处理消息.
     *
     * @param int                    $account 公众号
     * @param array                  $message 消息
     * @param Overtrue\Wechat\Server $server  server
     *
     * @return Response
     */
    private function handleMessage($account, $message, $server)
    {
        //存储消息
        $this->messageService->storeMessage($account, $message);
        //属于文字类型消息
        if ($message['MsgType'] == 'text') {
            $replies = Cache::get('replies_'.$account->id);

            foreach ($replies as $key => $reply) {
                //查找字符串
                if (str_contains($message['Content'], $key)) {
                    return $this->messageService->eventsToMessage($reply['content']);
                }
            }

            return $this->handleNoMatch($account);
        }
    }
}
