<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use EasyWeChat\Foundation\Application;

class MenuController extends Controller
{
    /**
     * @var MenuRepository
     */
    private $menuRepository;

    /**
     * MenuController constructor.
     *
     * @param MenuRepository $menuRepository
     */
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }


    public function index()
    {
        //获取菜单数据
        $menuTree = $this->menuRepository->lists(\Session::get('account_id'));

        return user_view('menu.index', compact('menuTree'));
    }

    /**
     * 创建菜单
     */
    public function getCreate()
    {
        return user_view('menu.create');
    }

    /**
     * 保存创建菜单
     */
    public function postCreate()
    {
        //TODO:update fans data

        $easywechat = app('easywechat');

        $menu = $easywechat->menu;

        $buttons = [
            [
                "type" => "click",
                "name" => "今日歌曲",
                "key"  => "V1001_TODAY_MUSIC"
            ],
            [
                "name"       => "菜单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "搜索",
                        "url"  => "http://www.soso.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "视频",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "赞一下我们",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
        ];

        $matchRule = [
            "group_id"             => "1",
            "sex"                  => "1",
            "country"              => "中国",
            "province"             => "湖北",
            "city"                 => "宜昌",
//            "client_platform_type" => "2"
        ];
        $menu->add($buttons, $matchRule);

        exit;


    }

    /**
     * 删除指定菜单
     *
     * @param $menuId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($menuId)
    {
        $options = get_wechat_options(\Session::get('account_id'));

        $app = new Application($options);

        $menuService = $app->menu;

        try {
            $menuService->destroy($menuId);

            //清除本地数据库中保存的相关菜单数据
            $this->menuRepository->destroy($menuId);

            return success('删除成功');
        } catch (\Exception $e) {
            return error('删除失败');
        }
    }

    /**
     * 清除全部菜单
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function clear()
    {
        $options = get_wechat_options(\Session::get('account_id'));

        $app = new Application($options);

        $menuService = $app->menu;

        try {
            $menuService->destroy();

            //清除本地数据库中保存的相关菜单数据
            $this->menuRepository->destroyMenu(\Session::get('account_id'));

            return success('清除成功');
        } catch (\Exception $e) {
            return error('清除失败');
        }
    }

}
