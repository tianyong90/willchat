<?php

namespace App\Services;

use Overtrue\Wechat\Message as WechatMessage;
use App\Repositories\MaterialRepository;
use App\Services\Event as EventService;
use App\Repositories\MessageRepository;
use Overtrue\Wechat\Media;

/**
 * 消息服务提供类.
 *
 * @author rongyouyuan <rongyouyuan@163.com>
 */
class Message
{
    /**
     * eventService.
     *
     * @var App\Services\Event
     */
    private $eventService;

    /**
     * materialService.
     *
     * @var App\Services\Material
     */
    private $materialRepository;

    /**
     * construct.
     *
     * @param ReplySercice $replyService
     */
    public function __construct(EventService $eventService,
                                 MaterialRepository $materialRepository,
                                 MessageRepository $messageRepository
        ) {
        $this->eventService = $eventService;

        $this->materialRepository = $materialRepository;

        $this->messageRepository = $messageRepository;
    }

    /**
     * 事件解析为消息.
     *
     * @param array $eventIds 事件Ids
     *
     * @return Response
     */
    public function eventsToMessage($eventIds)
    {
        return WechatMessage::make('text')->content('感谢您关注');
    }

    /**
     * 事件解析为消息.
     *
     * @param string $eventKey 事件key
     *
     * @return Response
     */
    public function eventToMessage($eventKey)
    {
        $event = $this->eventService->getEventByKey($eventKey);

        if (!isset($event['value'])) {
            return $this->emptyMessage();
        }

        return $this->mediaIdToMessage($event['value']);
    }

    /**
     * mediaId 转为消息.
     *
     * @param string $mediaId mediaId
     *
     * @return Response
     */
    private function mediaIdToMessage($mediaId)
    {
        $media = $this->materialRepository->getMediaByMediaId($mediaId);

        if (!$media) {
            return $this->emptyMessage();
        }

        $callback = 'reply'.ucfirst($media->type);

        return $this->$callback($media);
    }

    /**
     * 图文转为消息.
     *
     * @param App\Models\Material $media 素材
     *
     * @return Response
     */
    private function replyArticle($media)
    {
        return  WechatMessage::make('news')->items(function () use ($media) {

            $item = WechatMessage::make('news_item')
                                    ->title($media->title)
                                    ->url($media->content_url)
                                    ->description($media->description)
                                    ->picUrl($media->cover_url);
            if (!isset($media->childrens)) {
                return array($item);
            } else {
                $return = [];
                foreach ($media->childrens as $child) {
                    $return[] = WechatMessage::make('news_item')
                                    ->title($child->title)
                                    ->url($child->content_url)
                                    ->description($media->description)
                                    ->picUrl($child->cover_url);
                }

                array_unshift($return, $item);

                return $return;
            }
        });
    }

    /**
     * 文字转为消息.
     *
     * @param App\Models\Material $media 素材
     *
     * @return Response
     */
    private function replyText($media)
    {
        return WechatMessage::make('text')->content($media->content);
    }

    /**
     * 回复图片.
     *
     * @param App\Models\Material $media 素材
     *
     * @return Response
     */
    private function replyImage($media)
    {
        return WechatMessage::make('image')->media($media->original_id);
    }

    /**
     * 回复声音.
     *
     * @param App\Models\Material $voice 素材
     *
     * @return Response
     *
     * @todo  不能使用老版本的sdk
     */
    private function replyVoice($voice)
    {
        return WechatMessage::make('voice')->media($voice->original_id);
    }

    /**
     * 回复视频.
     *
     * @param App\Models\Material $video 素材
     *
     * @return Response
     */
    private function replyVideo($video)
    {
        return WechatMessage::make('video')
                            ->media($video->original_id)
                            ->title($video->title)
                            ->description($video->description);
    }

    /**
     * 存储消息.
     *
     * @param array $account 公众号
     * @param array $message 消息
     */
    public function storeMessage($account, $message)
    {
        $accountId = $account->id;

        return $this->messageRepository->storeMessage($accountId, $message);
    }

    /**
     * 返回一条空消息.
     *
     * @return Response
     */
    public function emptyMessage()
    {
        return '';
    }
}
