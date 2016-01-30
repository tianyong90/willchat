<?php

namespace App\Repositories;

use App\Models\Reply;

/**
 * Reply Repository.
 */
class ReplyRepository
{
    use BaseRepository;

    /**
     * model.
     *
     * @var App\Models\Reply
     */
    private $model;

    /**
     * eventRepository.
     *
     * @var App\Repositories\EventRepository
     */
    private $eventRepository;

    /**
     * construct.
     *
     * @param Reply           $reply           replyModel
     * @param EventRepository $eventRepository eventRepository
     */
    public function __construct(Reply $reply, EventRepository $eventRepository)
    {
        $this->model = $reply;

        $this->eventRepository = $eventRepository;
    }

    /**
     * 获取关注时的默认回复.
     *
     * @param int $accountId accountId
     *
     * @return array|mixed
     */
    public function getFollowReply($accountId)
    {
        return $this->model->where('type', Reply::TYPE_FOLLOW)->where('account_id', $accountId)->first();
    }

    /**
     * 取得关注时的默认回复.
     *
     * @param int $accountId accountId
     *
     * @return array|mixed
     */
    public function getNoMatchReply($accountId)
    {
        return $this->model->where('type', Reply::TYPE_NO_MATCH)->where('account_id', $accountId)->first();
    }

    /**
     * 获取自动回复列表.
     *
     * @param int $accountId accountId
     * @param int $pageSize  分页数目
     *
     * @return array
     */
    public function getList($accountId, $pageSize)
    {
        return $this->model->where('type', Reply::TYPE_KEYWORDS)->where('account_id', $accountId)->get();
    }

    /**
     * 取得所有回复记录.
     *
     * @param int $accountId accountId
     *
     * @return Response
     */
    public function all($accountId)
    {
        return $this->model->where('account_id', $accountId)->where('type', 'keywords')->get()->toArray();
    }

    /**
     * 保存事件自动回复.
     *
     * @param App\Http\Requests\Reply\EventRequest $request   request
     * @param int                                  $accountId accountId
     */
    public function saveEventReply($request, $accountId)
    {
        $replyContent = $request->reply_content;

        $replyType = $request->reply_type;

        $type = $request->type;

        $input = $request->all();

        $model = $this->model->where('account_id', $accountId)
                             ->where('type', $type)
                             ->first();

        if (!$model) {
            $eventId = $this->saveReplyToEvent($replyType, $replyContent, $accountId);
            $input['content'] = array($eventId);
            $input['account_id'] = $accountId;
            $model = new $this->model();
        } else {
            $eventId = $model->content;
            $this->updateEvent($eventId, $replyType, $replyContent);
        }

        return $this->savePost($model, $input);
    }

    /**
     * 存储回复.
     *
     * @param request $request   request
     * @param int     $accountId accountId
     *
     * @return Reply 模型
     */
    public function store($request, $accountId)
    {
        $reply = new $this->model();

        $input = $request->all();

        $replies = $input['replies'];

        $input['content'] = $this->saveRepliesToEvent($replies, $accountId);

        $input['account_id'] = $accountId;

        $input['type'] = Reply::TYPE_KEYWORDS;

        return $this->savePost($reply, $input);
    }

    /**
     * 保存自动回复到事件.
     *
     * @param array $replies   回复内容
     * @param int   $accountId accountId
     *
     * @return array
     */
    private function saveRepliesToEvent($replies, $accountId)
    {
        $eventRepository = $this->eventRepository;

        $eventId = array_map(function ($reply) use ($eventRepository, $accountId) {
            if ($reply['type'] == 'text') {
                return $eventRepository->storeText($reply['content'], $accountId);
            } else {
                return $eventRepository->storeMaterial($reply['content'], $accountId);
            }
        }, $replies);

        return $eventId;
    }

    /**
     * 新增一个回复到事件.
     *
     * @param string $replyType 回复类型
     * @param string $content   回复内容
     * @param int    $accountId accountId
     *
     * @return string eventId
     */
    private function saveReplyToEvent($replyType, $content, $accountId)
    {
        if ($replyType == 'text') {
            $eventId = $this->eventRepository->storeText($content, $accountId);
        } else {
            $eventId = $this->eventRepository->storeMaterial($content, $accountId);
        }

        return $eventId;
    }

    /**
     * 更新一个自动回复中的事件.
     *
     * @param string $eventKey  eventKey
     * @param string $replyType 回复类型
     * @param string $content   回复内容
     */
    private function updateEvent($eventKey, $replyType, $content)
    {
        $event = $this->eventRepository->getEventByKey($eventKey);

        if ($replyType == 'text') {
            $this->eventRepository->updateToText($eventKey, $content);
        } else {
            $this->eventRepository->updateToMaterial($eventKey, $content);
        }
    }

    /**
     * 更新自动回复.
     *
     * @param int     $id        id
     * @param Request $request   request
     * @param integet $accountId accountId
     *
     * @return Reply
     */
    public function update($id, $request, $accountId)
    {
        $reply = $this->model->find($id);

        $input = $request->all();

        $replies = $request->replies;

        $this->distoryReplyEvent($reply->content);

        $input['content'] = $this->saveRepliesToEvent($replies, $accountId);

        return $this->savePost($reply, $input);
    }

    /**
     * 删除事件.
     *
     * @param array $eventIds 事件ids
     */
    private function distoryReplyEvent($eventIds)
    {
        $eventRepository = $this->eventRepository;

        return array_map(function ($eventId) use ($eventRepository) {

            return $eventRepository->distoryByEventId($eventId);

        }, $eventIds);
    }

    /**
     * 保存.
     *
     * @param App\Models\Reply $reply reply
     * @param array            $input input
     *
     * @return Reply 返回模型
     */
    public function savePost($reply, $input)
    {
        $reply->fill($input);

        $reply->save();

        return $reply;
    }
}
