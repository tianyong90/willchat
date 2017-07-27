<?php

namespace App\Services;

use App\Material;
use Overtrue\Wechat\Media as MediaService;

/**
 * 素材服务.
 *
 * @author rongyouyuan <rongyouyuan@163.com>
 */
class Material
{
    /**
     * 拉取素材默认起始位置.
     */
    const MATERIAL_DEFAULT_OFFSET = 0;

    /**
     * 拉取素材的最大数量.
     */
    const MATERIAL_MAX_COUNT = 20;

    /**
     * material.
     *
     * @var App\Material
     */
    private $material;

    /**
     * media.
     *
     * @var Overtrue\Wechat\Media
     */
    private $mediaService;

    public function __construct(Material $material)
    {
        $this->material = $material;
    }

    /**
     * 保存图文消息.
     *
     * @param array $articles 图文消息
     *
     * @return array
     */
    public function saveArticle(
        $accountId,
        $articles,
        $originalMediaId,
        $createdFrom,
        $canEdited)
    {
        return $this->material->storeArticle(
            $accountId,
            $articles,
            $originalMediaId,
            $createdFrom,
            $canEdited
        );
    }

    /**
     * 存储一个文字回复消息.
     *
     * @param int    $accountId 公众号ID
     * @param string $text      文字内容
     *
     * @return Response
     */
    public function saveText($accountId, $text)
    {
        return $this->material->storeText($accountId, $text);
    }

    /**
     * 素材转为本地素材.
     *
     * @param string $mediaId     素材id
     * @param string $mediaType   素材类型
     * @param bool   $isTemporary 是否是临时素材
     *
     * @return string 生成的自己的MediaId
     */
    public function localizeMaterialId($mediaId, $mediaType, $isTemporary = true)
    {
        // var_dump($mediaId);
        // die();
    }

    /**
     * 检测素材是否存在.
     *
     * @param string $materialId 素材id
     *
     * @return bool
     */
    public function isExists($materialId)
    {
        return $this->material->isExists($this->account->id, $materialId);
    }

    /**
     * 生成一个素材mediaId.
     *
     * @return string mediaId
     */
    public function buildMaterialMediaId()
    {
        return 'MEDIA_'.strtoupper(uniqid());
    }

    /**
     * 上传素材到远程.
     *
     * @param App\Model\Material $material 素材模型
     */
    public function postToRemote($material)
    {
        $function = camel_case('post_remote_'.$material->type);

        return $function($material);
    }

    /**
     * 上传视频到远程.
     *
     * @param Material $video 视频素材
     *
     * @return string 微信素材id
     */
    private function postRemoteVideo($video)
    {
        $filePath = $this->mediaUrlToPath($video->source_url);

        $mediaService = new MediaService(
            account()->getCurrent()->app_id,
            account()->getCurrent()->app_secret
        );

        return $mediaService->forever()->video($filePath, $video->title, $video->description);
    }

    /**
     * 上传声音到远程.
     *
     * @param Material $voice 声音素材
     *
     * @return string 微信素材id
     */
    private function postRemoteVoice($voice)
    {
        $filePath = $this->mediaUrlToPath($voice->source_url);

        $mediaService = new MediaService(
            account()->getCurrent()->app_id,
            account()->getCurrent()->app_secret
        );

        return $mediaService->forever()->voice($filePath);
    }

    /**
     * 上传图片到远程.
     *
     * @param Material $image 图片素材
     *
     * @return string 微信素材id
     */
    private function postRemoteImage($image)
    {
        $filePath = $this->mediaUrlToPath($image->source_url);

        $mediaService = new MediaService(
            account()->getCurrent()->app_id,
            account()->getCurrent()->app_secret
        );

        return $mediaService->forever()->image($filePath);
    }

    /**
     * 上传图文素材到远程.
     *
     * @param array $articles 图文素材
     *
     * @return string
     */
    public function postRemoteArticles($articles)
    {
        $mediaService = new MediaService(
            account()->getCurrent()->app_id,
            account()->getCurrent()->app_secret
        );

        return $mediaService->news($articles);
    }

    /**
     * 同步远程素材到本地.
     *
     * @param AccountModel $account 当前公众号
     * @param string       $type    素材类型
     *
     * @return Response
     */
    public function syncRemoteMaterial($account, $type)
    {
        $countNumber = $this->getRemoteMaterialCount($account, $type);

        for ($offset = self::MATERIAL_DEFAULT_OFFSET;
             $offset < $countNumber;
             $offset += self::MATERIAL_MAX_COUNT
            ) {
            $lists = $this->getRemoteMaterialLists($account, $type, $offset, self::MATERIAL_MAX_COUNT);

            $this->localizeRemoteMaterialLists($account, $lists, $type);
        }
    }

    /**
     * 远程素材存储本地.
     *
     * @param AccountModel $account 公众号
     * @param array        $lists   素材列表
     * @param string       $type
     *
     * @return Response
     */
    private function localizeRemoteMaterialLists($account, $lists, $type)
    {
        return array_map(function ($list) use ($type, $account) {
            $callFunc = 'storeRemote'.ucfirst($type);

            return $this->$callFunc($account, $list);
        }, $lists);
    }

    /**
     * 存储远程图片素材.
     *
     * @param AccountModel $account 公众号
     * @param array        $image   素材信息
     *
     * @return Response
     */
    private function storeRemoteImage($account, $image)
    {
        $mediaId = $image['media_id'];

        if ($this->getLocalMediaId($account->id, $mediaId)) {
            return;
        }

        $image['local_url'] = config('app.url').$this->downloadMaterial($account, 'image', $mediaId);

        return $this->material->storeWechatImage($account->id, $image);
    }

    /**
     * 存储远程声音素材.
     *
     * @param array $voice 声音素材
     *
     * @return Response
     */
    private function storeRemoteVoice($account, $voice)
    {
        $mediaId = $voice['media_id'];

        if ($this->getLocalMediaId($account->id, $mediaId)) {
            return;
        }

        $voice['local_url'] = config('app.url').$this->downloadMaterial($account, 'voice', $mediaId);

        return $this->material->storeWechatVoice($account->id, $voice);
    }

    /**
     * 存储远程视频素材.
     *
     * @param array $video 素材信息
     *
     * @return Response
     */
    private function storeRemoteVideo($account, $video)
    {
        $mediaId = $video['media_id'];

        if ($this->getLocalMediaId($account->id, $mediaId)) {
            return;
        }

        $videoInfo = $this->downloadMaterial($account, 'video', $mediaId);

        return $this->material->storeWechatVideo($account->id, $videoInfo);
    }

    /**
     * 存储远程图文素材.
     *
     * @param array $news 图文
     *
     * @return Response
     */
    private function storeRemoteNews($account, $news)
    {
        $mediaId = $news['media_id'];

        if ($this->getLocalMediaId($account->id, $mediaId)) {
            return;
        }
        $news['content']['news_item'] = $this->localizeNewsCoverMaterialId($account, $news['content']['news_item']);

        return $this->material->storeArticle(
            $account->id,
            $news['content']['news_item'],
            $news['media_id']
        );
    }

    /**
     * 将图文消息中的素材转换为本地.
     *
     * @param AccountModel $account   公众号
     * @param array        $newsItems newItem
     *
     * @return array
     */
    private function localizeNewsCoverMaterialId($account, $newsItems)
    {
        $newsItems = array_map(function ($item) {
            $item['cover_url'] = $this->mediaIdToSourceUrl($item['thumb_media_id']);

            return $item;
        }, $newsItems);

        return $newsItems;
    }

    /**
     * mediaId转换为本地Url.
     *
     * @param string $mediaId mediaId
     *
     * @return string
     */
    private function mediaIdToSourceUrl($mediaId)
    {
        return $this->material->mediaIdToSourceUrl($mediaId);
    }

    /**
     * 下载素材到本地.
     *
     * @param AccountModel $account 公众号
     * @param string       $type    素材类型
     * @param string       $mediaId 素材
     *
     * @return mixed
     */
    private function downloadMaterial($account, $type, $mediaId)
    {
        $dateDir = date('Ym').'/';

        $dir = config('material.'.$type.'.storage_path').$dateDir;

        $mediaService = new MediaService(
            $account->app_id,
            $account->app_secret
        );

        $name = md5($mediaId);

        is_dir($dir) || mkdir($dir, 0755, true);
        //如果属于视频类型
        if ($type == 'video') {
            $videoInfo = $mediaService->forever()->download($mediaId);
            //取消下载Mp4文件
            return [
                'title'       => $videoInfo['title'],
                'description' => $videoInfo['description'],
                'local_url'   => '',
                'media_id'    => $mediaId,
            ];
        } else {
            $dirFilename = $mediaService->forever()->download($mediaId, $dir.$name);

            $fileName = explode('/', $dirFilename);

            $fileName = array_pop($fileName);

            return config('material.'.$type.'.prefix').'/'.$dateDir.$fileName;
        }
    }

    /**
     * 获取远程图片列表.
     *
     * @param AccountModel $account 公众号
     * @param int          $offset  起始位置
     * @param int          $count   获取数量
     *
     * @return array 列表
     */
    private function getRemoteMaterialLists($account, $type, $offset, $count)
    {
        $mediaService = new MediaService(
            $account->app_id,
            $account->app_secret
        );

        return $mediaService->lists($type, $offset, $count)['item'];
    }

    /**
     * 取得远程素材的数量.
     *
     * @param AccountModel $account 公众号
     * @param string       $type    素材类型
     *
     * @return int
     */
    private function getRemoteMaterialCount($account, $type)
    {
        $mediaService = new MediaService(
            $account->app_id,
            $account->app_secret
        );

        return $mediaService->stats($type);
    }

    /**
     * 获取本地存储素材id.
     *
     * @param int    $accountId 公众号id
     * @param string $mediaId   素材id
     *
     * @return null|string
     */
    private function getLocalMediaId($accountId, $mediaId)
    {
        return $this->material->getLocalMediaId($accountId, $mediaId);
    }
}
