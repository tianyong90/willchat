<?php

namespace App\Services;

use App\Account;
use App\Account as AccountModel;
use App\Menu;
use EasyWeChat\Foundation\Application;

/**
 * 菜单服务提供类.
 *
 * @author rongyouyuan <rongyouyuan@163.com>
 */
class Menu
{
    /**
     * @var Menu
     */
    private $menu;

    /**
     * @var Account
     */
    private $account;

    /**
     * Menu constructor.
     *
     * @param Menu $menu
     */
    public function __construct(Menu $menu, Account $account)
    {
        $this->menu = $menu;
        $this->account = $account;
    }

    /**
     * 同步远程菜单到本地数据库.
     *
     * @param AccountModel $account 公众号
     *
     * @return mixed
     */
    public function syncToLocal(AccountModel $account)
    {
        $remoteMenus = $this->getFromRemote($account);

        $menus = $this->makeLocalize($remoteMenus);

        // 先清除本地原有相关菜单数据
        $this->menu->destroyMenu($account->id);

        return $this->saveToLocal($account->id, $menus);
    }

    /**
     * 取得远程公众号的菜单.
     *
     * @param AccountModel $account
     *
     * @return array 菜单信息
     */
    private function getFromRemote(AccountModel $account)
    {
        $options = get_wechat_options($account->id);

        $easywechat = new Application($options);

        return with($easywechat->menu->current());
    }

    /**
     * 将远程菜单进行本地化.
     *
     * @param array $menus 菜单
     *
     * @return array 处理后的菜单
     */
    private function makeLocalize($menus)
    {
        $menus = $menus['selfmenu_info']['button'];

        if (empty($menus)) {
            return [];
        }

        return $this->filterEmptyMenu(array_map([$this, 'analyseRemoteMenu'], $menus));
    }

    /**
     * 保存解析后台的菜单到本地.
     *
     * @param array $menus 菜单
     *
     * @return array
     */
    private function saveToLocal($accountId, $menus)
    {
        $this->menu->storeAll($accountId, $menus);
    }

    /**
     * 过滤掉菜单中空的内容.
     *
     * @param array $menus 菜单
     *
     * @return array
     */
    private function filterEmptyMenu($menus)
    {
        foreach ($menus as $key => $menu) {
            if (false == $menu) {
                unset($menus[$key]);
            }

            if (isset($menu['sub_button'])) {
                $menus[$key]['sub_button'] = array_filter($menu['sub_button']);
            }
        }

        return $menus;
    }

    /**
     * 获取可设置为.
     *
     * @return mixed
     */
    public function getTopMenu()
    {
        return $this->menu->scopeQuery(function ($query) {
            return $query->where('parent_id', '=', 0);
        })->all();
    }

    /**
     * 分析远程取得的菜单数据.
     *
     * @param array $menu 菜单
     *
     * @return array|null
     */
    private function analyseRemoteMenu($menu)
    {
        //        if (isset($menu['sub_button']['list'])) {
//            $menu['sub_button'] = array_map([$this, 'analyseRemoteMenu'], $menu['sub_button']['list']);
//        } else {
//            $menu = call_user_func([$this, camel_case('resolve_'.$menu['type'].'_menu')], $menu);
//        }

        return $menu;
    }

    /**
     * 解析文字类型的菜单 [转换为事件].
     *
     * @param AccountModel $account
     * @param array        $menu
     *
     * @return array
     */
    private function resolveTextMenu(AccountModel $account, $menu)
    {
        $menu['type'] = 'click';

        $mediaId = $this->materialService->saveText($account->id, $menu['value']);

        $menu['key'] = $this->eventService->makeMediaId($mediaId);

        unset($menu['value']);

        return $menu;
    }

    /**
     * 解析MediaId类型的菜单.
     *
     * @param array $menu 菜单
     *
     * @return array
     */
    private function resolveMediaIdMenu($menu)
    {
        return false; //暂时关掉此类型处理 todo
        $menu['type'] = 'click';
        //mediaId类型属于永久素材类型
        $menu['key'] = $this->eventService->makeMediaId();

        unset($menu['value']);

        return $menu;
    }

    /**
     * 解析新闻类型的菜单 [转换为事件/存储图文为素材].
     *
     * @param array $menu 菜单
     *
     * @return array
     */
    private function resolveNewsMenu($menu)
    {
        $menu['type'] = 'click';

        $mediaId = $this->materialService->saveArticle(
            account()->getCurrent()->id,
            $menu['news_info']['list'],
            null,
            Material::CREATED_FROM_WECHAT,
            Material::CAN_NOT_EDITED //无法编辑
        );

        $menu['key'] = $this->eventService->makeMediaId($mediaId);

        unset($menu['value']);

        unset($menu['news_info']);

        return $menu;
    }

    /**
     * 解析视频类型的菜单 属于临时素材丢弃.
     *
     * @param array $menu 菜单参数
     *
     * @return false
     */
    private function resolveVideoMenu($menu)
    {
        return false;
    }

    /**
     * 解析声音类型的菜单 属于临时素材丢弃.
     *
     * @param array $menu 菜单参数
     *
     * @return false
     */
    private function resolveVoiceMenu($menu)
    {
        return false;
    }

    /**
     * 解析图片类型的菜单 属于临时素材丢弃.
     *
     * @param array $menu 菜单
     *
     * @return array
     */
    private function resolveImgMenu($menu)
    {
        return false;
    }

    /**
     * 解析地址类型菜单 不用处理.
     *
     * @param array $menu 菜单
     *
     * @return array
     */
    private function resolveViewMenu($menu)
    {
        $menu['key'] = $menu['url'];

        unset($menu['url']);

        return $menu;
    }

    /**
     * 解析点击事件类型的菜单 [自己的保留，否则丢弃].
     *
     * @param array $menu 菜单信息
     *
     * @return array|bool
     */
    private function resolveClickMenu($menu)
    {
        if (!$this->eventService->isOwnEvent($menu['key'])) {
            return false;
        }

        return $menu;
    }

    /**
     * 解析弹出摄像头类型菜单.
     *
     * @param array $menu 菜单
     *
     * @return array
     */
    private function resolvePicSysphotoMenu($menu)
    {
        return $menu;
    }

    /**
     * 解析微信相册类型菜单.
     *
     * @param array $menu 菜单
     *
     * @return array
     */
    private function resolvePicWeixinMenu($menu)
    {
        return $menu;
    }

    /**
     * 解析弹出拍照或者相册发图类型菜单.
     *
     * @param array $menu 菜单
     *
     * @return array
     */
    private function resolvePicPhotoOrAlbumMenu($menu)
    {
        return $menu;
    }

    /**
     * 解析选择地理位置类型菜单.
     *
     * @param array $menu 菜单
     *
     * @return array
     */
    private function resolveLocationSelectMenu($menu)
    {
        return $menu;
    }

    /**
     * 解析扫码推事件类型菜单.
     *
     * @param array $menu 菜单
     *
     * @return array
     */
    private function resolveScancodePushMenu($menu)
    {
        return $menu;
    }

    /**
     * 解析扫码推事件且弹出“消息接收中”提示框类型菜单.
     *
     * @param array $menu $menu
     *
     * @return array
     */
    private function resolveScancodeWaitmsgMenu($menu)
    {
        return $menu;
    }

    /**
     * 解析跳转图文MediaIdUrl类型的菜单[将被转换为View类型].
     *
     * @param array $menu 菜单
     *
     * @return array
     */
    private function resolveViewLimitedMenu($menu)
    {
        return false; //暂时关闭这个功能

        $menu['type'] = 'view';

        $url = $this->materialService->localizeMaterialId($menu['value']);

        if (!$url) {
            return false;
        }

        $menu['key'] = $url;

        unset($menu['value']);

        return $menu;
    }

    /**
     * 提交菜单到微信
     *
     * @param AccountModel $account
     */
    public function saveToRemote($account)
    {
        $menus = $this->menu->menuTree()->toArray();

        $options = get_wechat_options($account->id);

        $easywechat = new Application($options);

        $menus = $this->formatToWechat($menus);

        return $easywechat->menu->add($menus);
    }

    /**
     * 格式化为微信菜单.
     *
     * @param array $menus 菜单
     */
    private function formatToWechat($menus)
    {
        $saveMenus = [];

        foreach ($menus as $menu) {
            if (!empty($menu['sub_buttons'])) {
                $temp['name'] = $menu['name'];

                foreach ($menu['sub_buttons'] as $subButton) {
                    $temp['sub_button'][] = $this->makeMenuItem($subButton);
                }

                $saveMenus[] = $temp;
            } else {
                $saveMenus[] = $this->makeMenuItem($menu);
            }
        }

        return $saveMenus;
    }

    /**
     * 根据本地保存的数据生成单个菜单项.
     *
     * @param array $menuData
     *
     * @return mixed
     */
    private function makeMenuItem(array $menuData)
    {
        switch ($menuData['type']) {
            case '点击':
                $menuItem['type'] = 'click';
                $menuItem['key'] = $menuData['key'];
                break;
            case '页面跳转':
                $menuItem['type'] = 'view';
                $menuItem['url'] = $menuData['url'];
                break;
            default:
                break;
        }

        $menuItem['name'] = $menuData['name'];

        return $menuItem;
    }

    /**
     * 删除全部菜单，包括本地数据.
     *
     * @param AccountModel $account
     */
    public function deleteAll(AccountModel $account)
    {
        $easywechat = app('easywechat');

        $easywechat->menu->destroy();

        $this->menu->destroyMenu($account->id);
    }
}
