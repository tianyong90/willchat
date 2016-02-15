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

        $options = get_wechat_options(\Session::get('account_id'));

        $app = new Application($options);

        $menu = $app->menu;

        $menuList = $menu->current();


    }

    public function destroy($id)
    {
        $this->menuRepository->destroy($id);

        $options = get_wechat_options(\Session::get('account_id'));

        $app = new Application($options);

        $menu = $app->menu;

        return success('删除成功');
    }

    public function clear()
    {
        $this->menuRepository->destroyMenu(\Session::get('account_id'));

        $options = get_wechat_options(\Session::get('account_id'));

        $app = new Application($options);

        $menu = $app->menu;

        return success('删除成功');
    }



}
