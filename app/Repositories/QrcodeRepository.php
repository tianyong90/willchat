<?php

namespace App\Repositories;

use App\Models\Qrcode;

/**
 * Qrcode Repository.
 */
class QrcodeRepository
{
    use BaseRepository;

    /**
     * Qrcode Model.
     *
     * @var $model
     */
    protected $model;

    /**
     * eventRepository
     *
     * @var EventRepository
     */
    protected $eventRepository;

    /**
     * materialRepository
     *
     * @var MaterialRepository
     */
    protected $materialRepository;

    /**
     * construct
     *
     * @param Qrcode             $qrcode             模型
     * @param EventRepository    $eventRepository    事件Repository
     * @param MaterialRepository $materialRepository 素材Repository
     */
    public function __construct(Qrcode $qrcode,
                                EventRepository $eventRepository,
                                MaterialRepository $materialRepository)
    {
        $this->model = $qrcode;

        $this->eventRepository = $eventRepository;

        $this->materialRepository = $materialRepository;
    }

    /**
     * 菜单列表.
     *
     * @return array
     */
    public function lists($accountId)
    {
        return $this->model->with('subButtons')->where('account_id', $accountId)->where('parent_id', 0)->orderBy('id', 'asc')->get();
    }

    /**
     * 取得所有菜单 不带有层级.
     *
     * @return array
     */
    public function all($accountId)
    {
        return $this->model->where('account_id', $accountId)->get()->toArray();
    }

    /**
     * 一次存储所有菜单.
     *
     * @param       int    $$accountId id
     * @param array $menus 菜单
     */
    public function storeMulti($accountId, $menus)
    {
        foreach ($menus as $key => $menu) {
            $menu['sort'] = $key;
            $menu['account_id'] = $accountId;

            $parentId = $this->store($menu)->id;

            if (!empty($menu['sub_button'])) {
                foreach ($menu['sub_button'] as $subKey => $subMenu) {
                    $subMenu['parent_id'] = $parentId;

                    $subMenu['sort'] = $subKey;

                    $subMenu['account_id'] = $accountId;

                    $this->store($subMenu);
                }
            }
        }
    }

    /**
     * 删除旧菜单.
     *
     * @param int $accountId 公众号id
     */
    public function destroyMenu($accountId)
    {
        $menus = $this->all($accountId);

        array_map(function ($menu) {

            if ($menu['type'] == 'click') {
                $this->eventRepository->distoryByEventKey($menu['key']);
            }

        }, $menus);

        $this->model->where('account_id', $accountId)->delete();
    }


    /**
     * 保存菜单.
     *
     * @param array $input input
     */
    public function store($input)
    {
        return $this->savePost(new $this->model(), $input);
    }

    /**
     * savePost.
     *
     * @param Qrcode $menu  菜单
     * @param array  $input input
     *
     * @return Qrcode
     */
    public function savePost($menu, $input)
    {
        $menu->fill($input);
        $menu->save();

        return $menu;
    }
}
