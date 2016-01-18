<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use EasyWeChat\Foundation\Application;

class FansGroupController extends Controller
{
    public function index()
    {
        $options = get_wechat_options();

        $app = new Application($options);
        $group = $app['user.group'];

        //获取分组数据
        $groupList = $group->lists();

        return user_view('fans_group.index', ['groups' => $groupList['groups']]);
    }

    /**
     * 编辑菜单
     */
    public function getEdit()
    {
        return user_view('fans_grop.edit');
    }

    /**
     * 保存编辑
     */
    public function postEdit()
    {

    }

    public function getCreate()
    {

    }

    public function postCreate()
    {
        
    }

    /**
     * 删除菜单
     */
    public function destroy()
    {
        
    }


}
