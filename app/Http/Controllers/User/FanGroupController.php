<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;
use Illuminate\Support\Facades\Input;

/**
 * Class FanGroupController
 *
 * @package App\Http\Controllers\User
 */
class FanGroupController extends Controller
{
    /**
     * @var mixed
     */
    private $groupService;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $options = get_wechat_options();

        $app = new Application($options);

        $this->groupService = $app->user_group;
    }


    /**
     * @return mixed
     */
    public function index()
    {
        //获取分组数据
        $groupList = $this->groupService->lists();

        return user_view('fan_group.index', ['groups' => $groupList['groups']]);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getEdit($id)
    {
        return user_view('fan_group.edit')->with(['name' => Input::route('name'), 'id' => $id]);
    }

    /**
     * 保存编辑
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postEdit(Request $request, $id)
    {
        try {
            //更新备注
            $this->groupService->update($id, $request->input('name'));

            return success('修改成功！');
        } catch (\Exception $e) {
            return error('修改失败！' . $e->getMessage());
        }
    }

    /**
     * @return mixed
     */
    public function getCreate()
    {
        return user_view('fan_group.edit');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCreate(Request $request)
    {
        try {
            $this->groupService->create($request->input('name'));

            return success('创建成功！');
        } catch (\Exception $e) {
            return error('创建失败！' . $e->getMessage());
        }
    }

    /**
     * 删除粉丝分组
     *
     * @param int $id
     */
    public function destroy($id)
    {
        try {
            $this->groupService->delete($id);

            return success('删除成功！');
        } catch (\Exception $e) {
            return error('删除失败！' . $e->getMessage());
        }
    }
}
