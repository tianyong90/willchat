<?php

namespace App\Repositories;

use App\Reply;
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
        //        $this->pushCriteria(new AccountCriteria());
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
    public function getSubscribeReply($accountId)
    {
        $where = [
            'account_id' => $accountId,
            'type'       => Reply::TYPE_SUBSCRIBE,
        ];

        return $this->findWhere($where)->first();
    }

    /**
     * 取得默认回复.
     *
     * @param int $accountId accountId
     *
     * @return array|mixed
     */
    public function getDefaultReply($accountId)
    {
        $where = [
            'account_id' => $accountId,
            'type'       => Reply::TYPE_DEFAULT,
        ];

        return $this->findWhere($where)->first();
    }

    /**
     * @param $accountId
     * @param $type
     */
    public function getLists($accountId, $type)
    {
        $where = [
            'account_id' => $accountId,
            'type'       => Reply::TYPE_SUBSCRIBE,
        ];

        $this->scopeQuery(function ($query) use ($where) {
            return $query->where($where);
        })->paginate();
    }
}
