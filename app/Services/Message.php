<?php

namespace App\Services;

use App\Repositories\MaterialRepository;
use App\Repositories\MessageRepository;
use App\Services\Event as EventService;
use EasyWeChat\Message\Image;
use EasyWeChat\Message\Link;
use EasyWeChat\Message\Location;
use EasyWeChat\Message\News;
use EasyWeChat\Message\Text;
use EasyWeChat\Message\Video;
use EasyWeChat\Message\Voice;

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
            return $this->makeEmpty();
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
            return $this->makeEmpty();
        }

        $callback = 'reply'.ucfirst($media->type);

        return $this->$callback($media);
    }

    /**
     * 生成文字消息.
     *
     * @param string $content 素材
     *
     * @return Text
     */
    public function makeText($content)
    {
        return new Text(['content' => $content]);
    }

    /**
     * 生成图文消息.
     *
     * @param App\Models\Material $media 素材
     *
     * @return Response
     */
    public function makeNews($news)
    {
        $news1 = new News([
            'title'       => 'abc',
            'description' => 'abc',
            'image'       => 'abc',
            'url'         => 'http://www.baidu.com',
        ]);

        return [$news1, $news1, $news1];

//        return WechatMessage::make('news')->items(function () use ($media) {
//
//            $item = WechatMessage::make('news_item')
//                ->title($media->title)
//                ->url($media->content_url)
//                ->description($media->description)
//                ->picUrl($media->cover_url);
//            if (!isset($media->childrens)) {
//                return array($item);
//            } else {
//                $return = [];
//                foreach ($media->childrens as $child) {
//                    $return[] = WechatMessage::make('news_item')
//                        ->title($child->title)
//                        ->url($child->content_url)
//                        ->description($media->description)
//                        ->picUrl($child->cover_url);
//                }
//
//                array_unshift($return, $item);
//
//                return $return;
//            }
//        });
    }

    public function makeArticle()
    {
    }

    /**
     * 生成图片消息.
     *
     * @param string $media 素材
     *
     * @return Image
     */
    private function makeImage($mediaId)
    {
        return new Image(['media_id' => $mediaId]);
    }

    /**
     * 生成语音消息.
     *
     * @param string $media 素材
     *
     * @return Image
     */
    private function makeVoice($mediaId)
    {
        return new Voice(['media_id' => $mediaId]);
    }

    /**
     * 生成视频消息.
     *
     * @param array $video 视频
     *
     * @return Video
     */
    private function makeVideo(array $video)
    {
        new Video([
            'title'       => $video['title'],
            'media_id'    => $video['mediaId'],
            'description' => $video['description'],
        ]);
    }

    /**
     * 生成链接消息.
     *
     * @param array $link 链接
     *
     * @return Video
     */
    private function makeLink(array $link)
    {
        new Link([
            'title'       => $link['title'],
            'url'         => $link['url'],
            'description' => $link['description'],
        ]);
    }

    /**
     * 生成位置消息.
     *
     * @param array $location 位置
     *
     * @return Location
     */
    private function makeLocation(array $location)
    {
        new Location([
            'latitude'  => $location['latitude'],
            'longitude' => $location['longitude'],
            'scale'     => $location['scale'],
            'label'     => $location['label'],
        ]);
    }

    /**
     * 返回空消息.
     *
     * @return string
     */
    public function makeEmpty()
    {
        return '';
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

        $this->messageRepository->storeMessage($accountId, $message);
    }
}
