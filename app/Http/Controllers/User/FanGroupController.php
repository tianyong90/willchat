<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use EasyWeChat\Foundation\Application;

class FanGroupController extends Controller
{
    public function index()
    {
        $options = get_wechat_options();

        $app = new Application($options);
        $group = $app['user.group'];

        //获取分组数据
        $groupList = $group->lists();

        return user_view('fan_group.index', ['groups' => $groupList['groups']]);
    }

    /**
     * 编辑菜单
     */
    public function getEdit()
    {
        return user_view('fan_group.edit');
    }

    /**
     * 保存编辑
     */
    public function postEdit()
    {

    }

    public function getCreate()
    {
        return user_view('fan_group.edit');
    }

    public function postCreate()
    {
        
    }

    /**
     * 删除粉丝分组
     *
     * @param int $id
     */
    public function destroy($id)
    {
        return success('删除成功！');
    }


}
