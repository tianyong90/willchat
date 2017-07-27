<?php

namespace App\Repositories;

use App\Repositories\Criteria\AccountCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Menu Repository.
 */
class MenuRepository extends BaseRepository
{
    use BaseRepositoryTrait;

    public function boot()
    {
        //        $this->pushCriteria(new AccountCriteria());
    }

    /**
     * 菜单列表.
     *
     * @param int $accountId 所属公众号ID
     *
     * @return array
     */
    public function menuTree()
    {
        return $this->with(['subButtons'])->scopeQuery(function ($query) {
            return $query->orderBy('id', 'asc');
        })->findWhere(['parent_id' => 0]);
    }

    /**
     * 取得所有菜单 不带有层级.
     *
     * @param int $accountId 所属公众号ID
     *
     * @return array
     */
    public function menuList($accountId)
    {
        return $this->all();
    }

    /**
     * 一次存储所有菜单.
     *
     * @param int   $$accountId id
     * @param array $menus      菜单
     */
    public function storeAll($accountId, $menus)
    {
        foreach ($menus as $key => $menu) {
            $menu['sort'] = $key;
            $menu['account_id'] = $accountId;

            $parentId = $this->create($menu)->id;

            if (!empty($menu['sub_button'])) {
                foreach ($menu['sub_button']['list'] as $subKey => $subMenu) {
                    $subMenu['parent_id'] = $parentId;

                    $subMenu['sort'] = $subKey;

                    $subMenu['account_id'] = $accountId;

                    $this->create($subMenu);
                }
            }
        }
    }

    /**
     * 解析菜单数据.
     *
     * @param int   $accountId 公众号ID
     * @param array $menus     menus
     *
     * @return array
     */
    public function parseMenus($accountId, $menus)
    {
        $menus = array_map(function ($menu) use ($accountId) {
            if (isset($menu['sub_button'])) {
                $menu['sub_button'] = $this->parseMenus($accountId, $menu['sub_button']);
            } else {
                $menu = $this->makeMenuEvent($accountId, $menu);
            }

            return $menu;
        }, $menus);

        return $menus;
    }

    /**
     * 生成菜单中的事件.
     *
     * @param int   $accountId 公众号Id
     * @param array $menu      menu
     *
     * @return array
     */
    private function makeMenuEvent($accountId, $menu)
    {
        if ($menu['type'] == 'text') {
            $menu['type'] = 'click';
            $menu['key'] = $this->eventRepository->storeTextEvent($accountId, $menu['value']);
        } elseif ($menu['type'] == 'media') {
            $menu['type'] = 'click';
            $menu['key'] = $this->eventRepository->storeMaterialEvent($accountId, $menu['value']);
        } elseif ($menu['type'] == 'view') {
            $menu['key'] = $menu['value'];
        } else {
            $menu['key'] = $menu['value'];
        }

        unset($menu['value']);

        return $menu;
    }

    /**
     * 获取菜单中的素材具体信息.
     *
     * @param array $menus 菜单列表
     *
     * @return array
     */
    public function withMaterials($menus)
    {
        return array_map(function ($menu) {
            $mediaId = $this->eventRepository->getEventByKey($menu['key'])->value;

            $menu['material'] = $this->materialRepository->getMaterialByMediaId($mediaId);

            return $menu;
        }, $menus);
    }

    /**
     * 删除菜单.
     *
     * @param $id
     */
    public function delete($id)
    {
        // 先删除子菜单
        $this->model->find($id)->subButtons()->delete();

        // 删除自身
        parent::delete($id);
    }

    /**
     * 删除全部菜单.
     *
     * @param int $accountId 公众号id
     */
    public function destroyMenu($accountId)
    {
        return $this->model->where('account_id', '=', $accountId)->delete();
    }
}
