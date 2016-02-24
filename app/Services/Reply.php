<?php

namespace App\Services;

use App\Services\Event as EventService;
use App\Repositories\ReplyRepository;
use Cache;

/**
 * 回复服务.
 *
 * @author rongyouyuan <rongyouyuan@163.com>
 */
class Reply
{
    /**
     * eventService.
     *
     * @var EventService
     */
    private $eventService;

    /**
     * replyRepository.
     *
     * @var App\Repositories\ReplyRepository
     */
    private $replyRepository;

    public function __construct(EventService $eventService, ReplyRepository $replyRepository)
    {
        $this->eventService = $eventService;

        $this->replyRepository = $replyRepository;
    }

    /**
     * 解析一个事件回复.
     *
     * @param App\Models\Reply $reply reply
     *
     * @return array
     */
    public function resolveReply($reply)
    {
        $eventService = $this->eventService;

        $reply['content'] = array_map(function ($eventId) use ($eventService) {

            return $eventService->eventToMaterial($eventId);
        }, $reply['content']);

        return $reply;
    }

    /**
     * 解析多个事件回复.
     *
     * @param array $replies replies
     *
     * @return array
     */
    public function resolveReplies($replies)
    {
        $replies = $replies->toArray();

        return array_map(function ($reply) {
            return $this->resolveReply($reply);
        }, $replies);
    }

    /**
     * 重建回复缓存.
     *
     * @param int $accountId 公众号ID
     */
    public function rebuildReplyCache($accountId)
    {
        $replies = $this->replyRepository->all($accountId);

        if (empty($replies)) {
            Cache::forget('replies_'.$accountId);
        }

        $caches = [];

        foreach ($replies as $reply) {
            foreach ($reply['trigger_keywords'] as $keyword) {
                $caches[$keyword]['type'] = $reply['trigger_type'];
                $caches[$keyword]['content'] = $reply['content'];
            }
        }

        Cache::forever('replies_'.$accountId, $caches);
    }
}
