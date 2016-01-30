<?php

namespace App\Repositories;

use App\Services\Account as AccountService;
use App\Models\Event;

/**
 * Event Repository.
 */
class EventRepository
{
    use BaseRepository;

    /**
     * Event Model.
     *
     * @var Event
     */
    protected $model;

    /**
     * construct.
     *
     * @param Event          $event          event
     * @param AccountService $accountService AccountService
     */
    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    /**
     * 通过key查询event.
     *
     * @param string $eventId eventId
     *
     * @return Event event
     */
    public function getEventByKey($eventId)
    {
        return $this->model->where('key', $eventId)->first();
    }

    /**
     * 通过key删除事件.
     *
     * @param string $eventId eventId
     */
    public function distoryByEventKey($eventKey)
    {
        return $this->model->where('key', $eventKey)->delete();
    }

    /**
     * 存储一个文字回复类型事件.
     * 
     * @param int    $accountId 公众号id
     * @param string $text      回复内容
     *
     * @return string key
     */
    public function storeTextEvent($accountId, $text)
    {
        $model = new $this->model();

        $model->account_id = $accountId;

        $model->type = 'material';

        $model->value = $text;

        $model->save();

        return $model->key;
    }

    /**
     * 更新一个文字类型回复事件.
     *
     * @param string $eventId   事件ID
     * @param string $text      文字回复内容
     * @param int    $accountId accountID
     */
    public function updateTextEvent($eventId, $text)
    {
        $model = $this->getEventByKey($eventId);

        $model->type = 'material';

        $model->value = $text;

        $model->save();
    }

    /**
     * 更新一个素材类型回复事件.
     *
     * @param string $eventId   事件id
     * @param string $mediaId   mediaId
     * @param int    $accountId accountId
     */
    public function updateMaterialEvent($eventId, $mediaId)
    {
        $model = $this->getEventByKey($eventId);

        $model->type = 'material';

        $model->value = $mediaId;

        $model->save();
    }

    /**
     * 存储一个素材回复类型的事件.
     *
     * @param int    $accountId accountId
     * @param string $mediaId   素材id
     *
     * @return string mediaId
     */
    public function storeMaterialEvent($accountId, $mediaId)
    {
        $model = new $this->model();

        $model->account_id = $accountId;

        $model->type = 'material';

        $model->value = $mediaId;

        $model->save();

        return $model->key;
    }

    /**
     * 是否属于自己的事件.
     *
     * @param string $name name
     *
     * @return bool
     */
    public function isOwnEvent($name)
    {
        return starts_with($name, 'V_EVENT_');
    }

    /**
     * 创建key名称.
     *
     * @return string
     */
    public function makeEventKey()
    {
        return 'V_EVENT_'.strtoupper(uniqid());
    }
}
