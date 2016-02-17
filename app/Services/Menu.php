<?php

namespace App\Services;

use Overtrue\Wechat\MenuItem;

/**
 * 菜单服务提供类.
 *
 * @author rongyouyuan <rongyouyuan@163.com>
 */
class Menu
{
    /**
     * 取得远程公众号的菜单.
     *
     * @param App\Models\AccountModel $account
     *
     * @return array 菜单信息
     */
    private function getFromRemote(AccountModel $account)
    {
        return with(new WechatMenu($account->app_id, $account->app_secret))->current();
    }

    /**
     * 同步远程菜单到本地数据库.
     *
     * @param App\Models\AccountModel $account 公众号
     *
     * @return Response
     */
    public function syncToLocal(AccountModel $account)
    {
        $remoteMenus = $this->getFromRemote($account);

        $menus = $this->makeLocalize($remoteMenus);

        return $this->saveToLocal($account->id, $menus);
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
     * 分析远程取得的菜单数据.
     *
     * @param array $menu 菜单
     *
     * @return array|NULL
     */
    private function analyseRemoteMenu($menu)
    {
        if (isset($menu['sub_button']['list'])) {
            $menu['sub_button'] = array_map([$this, 'analyseRemoteMenu'], $menu['sub_button']['list']);
        } else {
            $menu = call_user_func([$this, camel_case('resolve_'.$menu['type'].'_menu')], $menu);
        }

        return $menu;
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
        return $this->menuRepository->storeMulti($accountId, $menus);
    }

    /**
     * 解析文字类型的菜单 [转换为事件].
     *
     * @param App\Models\AccountModel $account
     * @param array                   $menu
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
     * @param array        $menus   菜单
     */
    public function saveToRemote($account, $menus)
    {
        $wechatMenu = new WechatMenu($account->app_id, $account->app_secret);

        $menus = $this->formatToWechat($menus);

        return $wechatMenu->set($menus);
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
            if (isset($menu['sub_button'])) {
                $menuItem = new MenuItem($menu['name']);
                $subButtons = [];
                foreach ($menu['sub_button'] as $subMenu) {
                    $subButtons[] = new MenuItem($subMenu['name'], $subMenu['type'], $subMenu['key']);
                }
                $menuItem->buttons($subButtons);
                $saveMenus[] = $menuItem;
            } else {
                $saveMenus[] = new MenuItem($menu['name'], $menu['type'], $menu['key']);
            }
        }

        return $saveMenus;
    }
}
