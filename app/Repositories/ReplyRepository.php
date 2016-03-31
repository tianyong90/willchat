<?php

namespace App\Repositories;

use App\Models\Reply;
use App\Repositories\Criteria\AccountCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Reply Repository.
 */
class ReplyRepository extends BaseRepository
{
    use BaseRepositoryTrait;

    public function boot()
    {
        $this->pushCriteria(new AccountCriteria());
    }

    /**
     * eventRepository.
     *
     * @var \App\Repositories\EventRepository
     */
    private $eventRepository;

//    /**
//     * construct.
//     *
//     * @param Reply           $reply           replyModel
//     * @param EventRepository $eventRepository eventRepository
//     */
//    public function __construct(Reply $reply, EventRepository $eventRepository)
//    {
//
//        $this->eventRepository = $eventRepository;
//    }

    /**
     * 获取关注回复.
     *
     * @param int $accountId accountId
     *
     * @return array|mixed
     */
    public function getSubscribeReply($accountId = null)
    {
        $where = [
            'type' => Reply::TYPE_SUBSCRIBE,
        ];

        if ($accountId) {
            $where['account_id'] = $accountId;
        }

        return $this->findWhere($where)->first();
    }

    /**
     * 取得默认回复.
     *
     * @param int $accountId accountId
     *
     * @return array|mixed
     */
    public function getDefaultReply($accountId = null)
    {
        $where = [
            'type' => Reply::TYPE_DEFAULT,
        ];

        if ($accountId) {
            $where['account_id'] = $accountId;
        }

        return $this->findWhere($where)->first();
    }

    public function saveReply($data, $accountId)
    {
        return $this->create($data);
    }
}
