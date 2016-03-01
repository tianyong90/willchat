<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\FanRepository;
use App\Services\Fan as FanService;
use EasyWeChat\Foundation\Application;

class FansController extends Controller
{
    /**
     * @var FanRepository
     */
    private $fanRepository;

    /**
     * @var FanService
     */
    private $fanService;

    /**
     * FansController constructor.
     *
     * @param FanRepository $fanRepository
     */
    public function __construct(FanRepository $fanRepository, FanService $fanService)
    {
        $this->fanRepository = $fanRepository;

        $this->fanService = $fanService;
    }

    /**
     * 粉丝列表.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $fanList = $this->fanRepository->paginate();

        return user_view('fans.index', compact('fanList'));
    }

    /**
     * 从微信官方服务器摘取粉丝数据并保存到本地数据库.
     */
    public function syncFans()
    {
        $this->fanService->syncToLocal();

        return success('同步成功');
    }

    /**
     * 显示移到至页面.
     *
     * @param $id
     *
     * @return mixed
     */
    public function getMoveTo($id)
    {
        // 粉丝原所在分组ID
        $groupid = $this->fanRepository->getFanGroupByfanId($id);

        //当前公众号的粉丝分组数据
        $options = get_wechat_options(\Session::get('account_id'));

        $app = new Application($options);
        $group = $app->user_group;

        //获取分组数据
        $groups = $group->lists()->groups;

        return user_view('fans.moveto')->with(['groupid' => $groupid, 'groups' => $groups]);
    }

    /**
     * 移动粉丝并保存移动后数据.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postMoveTo(Request $request, $id)
    {
        $easywechat = app('easywechat');

        $groupService = $easywechat->user_group;

        try {
            $fan = $this->fanRepository->getById($id);

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

    /**
     * 编辑备注表单.
     *
     * @param $id
     *
     * @return mixed
     */
    public function getEditRemark($id)
    {
        //获取旧备注信息
        $remark = $this->fanRepository->find($id)->remark;

        return user_view('fans.editremark')->with(['remark' => $remark]);
    }

    /**
     * 更新备注并保存到本地数据库.
     *
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postEditRemark(Request $request, $id)
    {
        try {
            $this->fanService->edirRemark($id, $request->input('remark'));

            return success('修改成功！');
        } catch (\Exception $e) {
            return error('修改失败！' . $e->getMessage());
        }
    }
}
