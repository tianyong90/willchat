<?php

namespace App\Http\Controllers\User;

use App\Repositories\FanGroupRepository;
use App\Services\FanGroup as FanGroupService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;
use Illuminate\Support\Facades\Input;

/**
 * Class FanGroupController.
 */
class FanGroupController extends Controller
{
    /**
     * @var FanGroupService
     */
    private $fanGroupService;

    /**
     * @var FanGroupRepository
     */
    private $fanGroupRepository;

    /**
     * Constructor.
     */
    public function __construct(FanGroupService $fanGroupService, FanGroupRepository $fanGroupRepository)
    {
        $this->fanGroupService = $fanGroupService;

        $this->fanGroupRepository = $fanGroupRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        //获取分组数据
        $groups = $this->fanGroupRepository->paginate();

        return user_view('fan_group.index', compact('groups'));
    }

    /**
     * 同步分组数据到本地
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSync()
    {
        $this->fanGroupService->syncToLocal();

        return success('同步成功');
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
     * 保存编辑.
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
            $this->fanGroupService->update($id, $request->input('name'));

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
            $this->fanGroupService->create($request->input('name'));

            return success('创建成功！');
        } catch (\Exception $e) {
            return error('创建失败！' . $e->getMessage());
        }
    }

    /**
     * 删除粉丝分组.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        try {
            $this->fanGroupService->delete($id);

            return success('删除成功！');
        } catch (\Exception $e) {
            return error('删除失败！' . $e->getMessage());
        }
    }
}
