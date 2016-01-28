<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use EasyWeChat\Foundation\Application;

class DataStatsController extends Controller
{
    public function index()
    {
        $options = get_wechat_options();

        $app = new Application($options);
        $stats = $app->stats;

        $data = $stats->userSummary('2015-12-01', '2015-12-06');

        dd($data);

        return user_view('data_stats.index');
    }

    /**
     * 编辑菜单
     */
    public function getEdit()
    {
        return user_view('fans_group.edit');
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
