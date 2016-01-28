<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use EasyWeChat\Foundation\Application;

class MenuController extends Controller
{
    public function index()
    {
        $options = get_wechat_options();

        $app = new Application($options);

        $menu = $app->menu;

        $menuList = $menu->current();

        return user_view('menu.index');
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


    }

    public function moveUser()
    {

    }

    public function editRemark()
    {

    }




}
