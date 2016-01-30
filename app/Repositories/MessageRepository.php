<?php

namespace App\Repositories;

use App\Models\Message;
use App\Models\MessageResource;

/**
 * MessageRepository.
 */
class MessageRepository
{
    /**
     * 消息.
     *
     * @var App\Models\Message
     */
    protected $model;

    /**
     * 消息素材.
     *
     * @var App\Models\MessageResource
     */
    protected $resourceModel;

    /**
     * construct.
     *
     * @param Message $message
     */
    public function __construct(Message $message, MessageResource $messageResource)
    {
        $this->model = $message;

        $this->resourceModel = $messageResource;
    }

    /**
     * 存储消息.
     *
     * @param int   $accountId 公众号ID
     * @param array $message   消息内容
     */
    public function storeMessage($accountId, $message)
    {
        $model = new $this->model();

        $model->account_id = $accountId;

        $model->resource_id = $this->storeMessageResource($accountId, $message);
    }

    /**
     * storeMessageResource.
     *
     * @param int   $accountId 公众号id
     * @param array $message   消息
     *
     * @return int 消息资源id
     */
    private function storeMessageResource($accountId, $message)
    {
        $resourceModel = new $this->resourceModel();

        //$resourceModel->account_id =
        //

        \Log::error($message);
    }
}
