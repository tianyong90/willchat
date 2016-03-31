<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateRequest;
use App\Http\Requests\Menu\UpdateRequest;
use App\Repositories\MenuRepository;
use App\Services\Account as AccountService;
use App\Services\Menu as MenuService;

class MenuController extends Controller
{
    /**
     * @var MenuRepository
     */
    private $menuRepository;

    /**
     * @var MenuService
     */
    private $menuService;

    /**
     * @var AccountService
     */
    private $accountService;

    /**
     * MenuController constructor.
     *
     * @param MenuRepository $menuRepository
     * @param MenuService    $menuService
     * @param AccountService $accountService
     */
    public function __construct(MenuRepository $menuRepository, MenuService $menuService, AccountService $accountService)
    {
        $this->menuRepository = $menuRepository;

        $this->menuService = $menuService;

        $this->accountService = $accountService;
    }

    /**
     * 菜单列表显示.
     *
     * @return mixed
     */
    public function getIndex()
    {
        //获取菜单数据
        $menuTree = $this->menuRepository->menuTree();

        return user_view('menu.index', compact('menuTree'));
    }

    /**
     * 显示创建表单.
     *
     * @return mixed
     */
    public function getCreate()
    {
        $topMenuList = $this->menuService->getTopMenu();

        return user_view('menu.create', compact('topMenuList'));
    }

    /**
     * 保存创建菜单.
     *
     * @param CreateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCreate(CreateRequest $request)
    {
        $this->menuRepository->create($request->all());

        return success('保存成功！');
    }

    /**
     * 显示更新表单.
     *
     * @param $id
     *
     * @return mixed
     */
    public function getUpdate($id)
    {
        $menuData = $this->menuRepository->find($id);

        $topMenuList = $this->menuService->getTopMenu();

        return user_view('menu.create', compact('menuData','topMenuList'));
    }

    /**
     * 保存更新菜单.
     *
     * @param CreateRequest $request
     * @param int           $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUpdate(UpdateRequest $request, $id)
    {
        $this->menuRepository->update($request->all(), $id);

        return success('保存成功！');
    }

    /**
     * 将微信现有菜单同步到本地.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSyncFromWechat()
    {
        // 当前选中的公众号
        $currentAccount = $this->accountService->chosedAccount();

        $this->menuService->syncToLocal($currentAccount);

        return success('同步成功');
    }

    /**
     * 本地菜单数据同步到微信.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSyncToWechat()
    {
        // 当前选中的公众号
        $currentAccount = $this->accountService->chosedAccount();

        $this->menuService->saveToRemote($currentAccount);

        return success('同步成功');
    }

    /**
     * 删除指定菜单.
     *
     * @param $menuId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($menuId)
    {
        $this->menuRepository->delete($menuId);

        return success('删除成功');
    }

    /**
     * 清除全部菜单.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function clear()
    {
        try {
            // 当前选中的公众号
            $currentAccount = $this->accountService->chosedAccount();

            $this->menuService->deleteAll($currentAccount);

            return success('清除成功');
        } catch (\Exception $e) {
            return error('清除失败');
        }
    }
}
