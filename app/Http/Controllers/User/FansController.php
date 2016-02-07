<?php

namespace App\Http\Controllers\User;

use App\Models\Fan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use EasyWeChat\Foundation\Application;

class FansController extends Controller
{
    public function index()
    {
        $fanList = Fan::paginate(15);

        return user_view('fans.index', compact('fanList'));
    }

    /**
     * 从微信官方服务器摘取粉丝数据并保存到本地数据库
     */
    public function updateFansData()
    {
        $options = get_wechat_options();

        $app = new Application($options);

        $user = $app->user;
        $fansList = $user->lists();

        // 粉丝 openid 列表
        $openIds = $fansList->get('data.openid');

        $info = $user->batchGet($openIds)->get('user_info_list');

        Fan::insert($info);

        return success('同步成功');
    }

    public function getMoveTo($id)
    {
        //获取旧备注信息
        $groupid = Fan::find($id)->groupid;

        //当前公众号的粉丝分组数据
        $options = get_wechat_options();

        $app = new Application($options);
        $group = $app->user_group;

        //获取分组数据
        $groups = $group->lists()->groups;

        return user_view('fans.moveto')->with(['groupid' => $groupid, 'groups'=>$groups]);
    }

    public function postMoveTo(Request $request, $id)
    {
        $options = get_wechat_options();

        $app = new Application($options);
        $groupService = $app->user_group;

        try {
            $fan = Fan::find($id);

            $newGroupId = $request->input('groupid');

            //更新备注
            $groupService->moveUser($fan->openid, $newGroupId);

            //更新本地库中对应备注数据
            $fan->groupid = $newGroupId;
            $fan->save();

            return success('移动成功！');
        } catch (\Exception $e) {
            return error('移动失败！' . $e->getMessage());
        }
    }


    public function getEditRemark($id)
    {
        //获取旧备注信息
        $remark = Fan::find($id)->remark;

        return user_view('fans.editremark')->with(['remark' => $remark]);
    }

    public function postEditRemark(Request $request, $id)
    {
        $options = get_wechat_options();

        $app = new Application($options);
        $user = $app->user;

        try {
            $fan = Fan::find($id);

            //更新备注
            $user->remark($fan->openid, $request->input('remark'));

            //更新本地库中对应备注数据
            $fan->remark = $request->input('remark');
            $fan->save();

            return success('修改成功！');
        } catch (\Exception $e) {
            return error('修改失败！' . $e->getMessage());
        }
    }

}
