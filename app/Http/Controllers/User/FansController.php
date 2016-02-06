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

        return redirect(user_url('fans'))->withMessage('同步成功！');
    }

    public function moveUser()
    {

    }

    public function editRemark()
    {

    }

}
