<?php

namespace App\Repositories;

use App\Models\Material;

class MaterialRepository
{
    use BaseRepository;

    /**
     * model.
     *
     * @var App\Models\Material
     */
    private $model;

    public function __construct(Material $material)
    {
        $this->model = $material;
    }

    /**
     * 取得素材列表.
     *
     * @param accountId $accountId 公众号ID
     * @param string    $type      类型
     * @param int       $pageSize  分页
     *
     * @return Response
     */
    public function getList($accountId, $type, $pageSize)
    {
        return $this->model->where('type', $type)
                ->where('account_id', $accountId)
                ->where('parent_id', 0)
                ->with('childrens')
                ->orderBy('id', 'desc')
                ->paginate($pageSize);
    }

    /**
     * mediaId获取访问资源Url.
     *
     * @param string $mediaId mediaId
     *
     * @return string
     */
    public function mediaIdToSourceUrl($mediaId)
    {
        $record = $this->model->where('original_id', $mediaId)->first();

        return $record ? $record->source_url : '';
    }

    /**
     * 通过 id 获取素材.
     *
     * @param int $id 素材ID
     *
     * @return App\Models\Material|NULL
     */
    public function getMediaById($id)
    {
        return $this->model->where('id', $mediaId)->with('childrens')->first();
    }

    /**
     * 通过MediaId获取素材.
     *
     * @param string $mediaId 素材标识
     *
     * @return App\Models\Material|NULL
     */
    public function getMaterialByMediaId($mediaId)
    {
        return $this->model->where('media_id', $mediaId)->with('childrens')->first();
    }

    /**
     * 统计图片.
     *
     * @param int $accountId accountId
     *
     * @return int
     */
    public function countImage($accountId)
    {
        return $this->model->where('account_id', $accountId)
                            ->where('parent_id', 0)
                            ->where('type', 'image')
                            ->count();
    }

    /**
     * 统计声音.
     *
     * @param int $accountId accountId
     *
     * @return int
     */
    public function countVoice($accountId)
    {
        return $this->model->where('account_id', $accountId)
                            ->where('parent_id', 0)
                            ->where('type', 'voice')
                            ->count();
    }

    /**
     * 统计图文数量.
     *
     * @param int $accountId accountId
     *
     * @return int
     */
    public function countArticle($accountId)
    {
        return $this->model->where('account_id', $accountId)
                            ->where('parent_id', 0)
                            ->where('type', 'article')
                            ->count();
    }

    /**
     * 统计视频数量.
     *
     * @param int $accountId accounId
     *
     * @return int
     */
    public function countVoide($accountId)
    {
        return $this->model->where('account_id', $accountId)
                            ->where('parent_id', 0)
                            ->where('type', 'voice')
                            ->count();
    }

    /**
     * 指定素材是否已经存在.
     *
     * @param int    $accountId  账号id
     * @param string $materialId mediaId
     *
     * @return bool
     */
    public function isExists($accountId, $materialId)
    {
        return $this->model->where('account_id', $accountId)->where('original_id', $materialId)->get();
    }

    /**
     * 存储一个文字素材.
     *
     * @param int    $accountId 公众号id
     * @param string $text      文字内容
     *
     * @return string mediaId
     */
    public function storeText($accountId, $text)
    {
        $model = new $this->model();

        $model->type = 'text';

        $model->account_id = $accountId;

        $model->content = $text;

        $model->save();

        return $model->media_id;
    }

    /**
     * 存储声音素材.
     *
     * @param int     $accountId 公众号ID
     * @param Request $request   request
     *
     * @return string mediaId
     */
    public function storeVoice($accountId, $request)
    {
        $model = new $this->model();

        $model->type = 'voice';

        $model->title = $request->title;

        $model->source_url = $request->url;

        $model->account_id = $accountId;

        $model->save();

        return $model->media_id;
    }

    /**
     * 存储图片素材.
     *
     * @param int    $accountId   公众号ID
     * @param string $resourceUrl 图片访问地址
     *
     * @return Response
     */
    public function storeImage($accountId, $resourceUrl)
    {
        $model = new $this->model();

        $model->type = 'image';

        $model->account_id = $accountId;

        $model->source_url = $resourceUrl;

        $model->save();

        return $model;
    }

    /**
     * 存储视频素材.
     *
     * @param int     $accountId 公众号id
     * @param Request $request   request
     *
     * @return Response
     */
    public function storeVideo($accountId, $request)
    {
        $model = new $this->model();

        $model->type = 'video';

        $model->title = $request->title;

        $model->description = $request->description;

        $model->source_url = $request->url;

        $model->account_id = $accountId;

        $model->save();

        return $model->media_id;
    }

    /**
     * 存储来自微信同步的图片素材.
     *
     * @param int   $accountId 公众号ID
     * @param array $image     图片信息
     *
     * @return bool
     */
    public function storeWechatImage($accountId, $image)
    {
        $model = new $this->model();

        $model->type = 'image';

        $model->title = $image['name'];

        $model->account_id = $accountId;

        $model->original_id = $image['media_id'];

        $model->source_url = $image['local_url'];

        $model->save();

        return $model->media_id;
    }

    /**
     * 存储来自微信同步的声音素材.
     *
     * @param int   $accountId 公众号Id
     * @param array $voice     声音信息
     *
     * @return bool
     */
    public function storeWechatVoice($accountId, $voice)
    {
        $model = new $this->model();

        $model->type = 'voice';

        $model->title = $voice['name'];

        $model->account_id = $accountId;

        $model->original_id = $voice['media_id'];

        $model->source_url = $voice['local_url'];

        $model->save();

        return $model->media_id;
    }

    /**
     * 存储来自微信同步的视频素材.
     *
     * @param int   $accountId 公众号ID
     * @param array $video     video
     *
     * @return bool
     */
    public function storeWechatVideo($accountId, $video)
    {
        $model = new $this->model();

        $model->type = 'video';

        $model->title = $video['title'];

        $model->description = $video['description'];

        $model->original_id = $video['media_id'];

        $model->account_id = $accountId;

        $model->source_url = $video['local_url'];

        $model->save();

        return $model->media_id;
    }

    /**
     * 获取素材本地存储Id.
     *
     * @param int    $accountId 公众号id
     * @param string $mediaId   素材id
     *
     * @return bool|string
     */
    public function getLocalMediaId($accountId, $mediaId)
    {
        $record = $this->model->where('account_id', $accountId)->where('original_id', $mediaId)->first();

        return $record ? $record->media_id : null;
    }

    /**
     * 存储图文.
     *
     * @param array $article 图文内容
     *
     * @return Response
     */
    public function storeArticle(
        $accountId,
        $articles,
        $originalMediaId = null,
        $createdFrom = Material::CREATED_FROM_WECHAT,
        $canEdited = Material::CAN_EDITED
        ) {

        //判断多个与单个
        if (count($articles) >= 2) {
            return $this->storeMultiArticle(
                $accountId,
                $articles,
                $originalMediaId,
                $createdFrom,
                $canEdited
            );
        } else {
            return $this->storeSimpleArticle(
                $accountId,
                array_shift($articles),
                $originalMediaId,
                $createdFrom,
                $canEdited
            );
        }
    }

    /**
     * 存储多图文素材.
     *
     * @param int    $accountId       公众号Id
     * @param array  $articles        多图文
     * @param string $originalMediaId 微信素材id
     * @param int    $createdFrom     创建标识
     * @param int    $canEdited       是否可编辑
     *
     * @return string MediaId
     */
    private function storeMultiArticle(
        $accountId,
        $articles,
        $originalMediaId,
        $createdFrom,
        $canEdited)
    {
        $firstData = array_shift($articles);

        $firstData['type'] = 'article';
        $firstData['can_edited'] = $canEdited;
        $firstData['original_id'] = $originalMediaId;
        $firstData['created_from'] = $createdFrom;
        $firstData['parent_id'] = 0;
        $firstData['account_id'] = $accountId;

        $firstArticle = $this->savePost($firstData);

        foreach ($articles as $article) {
            $article['type'] = 'article';
            $article['created_from'] = $createdFrom;
            $article['can_edited'] = $canEdited;
            $article['account_id'] = $accountId;
            $article['parent_id'] = $firstArticle->id;
            $this->savePost($article);
        }

        return $firstArticle->media_id;
    }

    /**
     * 存储远程单图文素材.
     *
     * @param int    $accountId       公众号Id
     * @param array  $article         单图文
     * @param string $originalMediaId 微信素材id
     * @param int    $createdFrom     创建标识
     * @param int    $canEdited       是否可编辑
     *
     * @return string 本地MediaId
     */
    private function storeSimpleArticle(
        $accountId,
        $article,
        $originalMediaId,
        $createdFrom,
        $canEdited)
    {
        $article['type'] = 'article';
        $article['can_edited'] = $canEdited;
        $article['created_from'] = Material::CREATED_FROM_WECHAT;
        $article['account_id'] = $accountId;
        $article['original_id'] = $originalMediaId;

        $record = $this->savePost($article);

        return $record->media_id;
    }

    /**
     * 保存 [针对于字段名称不统一].
     *
     * @param App\Models\Material $material 模型
     * @param array               $input    图文数据
     *
     * @return App\Models\Material
     */
    private function savePost($input)
    {
        if (isset($input['show_cover_pic'])) {
            $showCover = $input['show_cover_pic'];
        } else {
            $showCover = $input['show_cover'];
        }

        if (isset($input['url'])) {
            $sourceUrl = $input['url'];
        } else {
            $sourceUrl = $input['source_url'];
        }

        $article = new $this->model();

        $article->description = $input['digest'];

        $article->source_url = $sourceUrl;

        $article->show_cover_pic = $showCover;

        $article->cover_media_id = $input['thumb_media_id'];

        $article->fill($input);

        $article->save();

        return $article;
    }

    /**
     * fillSavePost.
     *
     * @param App\Models\Material $material model
     * @param array               $input    数据
     */
    private function fillSavePost($article, $input)
    {
        $account->fill($input);

        return $account->save();
    }

    /**
     * update.
     *
     * @param int   $id
     * @param array $input
     */
    public function update($id, $input)
    {
        $model = $this->model->find($id);

        return $this->fillSavePost($model, $input);
    }
}
