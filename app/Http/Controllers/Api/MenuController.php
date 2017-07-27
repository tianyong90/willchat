<?php

namespace App\Http\Controllers\Api;

use App\Jobs\SyncWechatMenu;
use App\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class MenuController extends BaseController
{
    /**
     * @var MenuRepository
     */
    private $menuRepository;

    /**
     * MenuController constructor.
     *
     * @param MenuRepository $menuRepository
     */
    public function __construct(MenuRepository $menuRepository)
    {
        parent::__construct();

        $this->menuRepository = $menuRepository;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Request $request)
    {
        $menus = Menu::where('account_id', $this->currentAccountId)->where('parent_id', 0)->with('subButtons')->get();

        return response()->json(compact('menus'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['account_id'] = $this->currentAccountId;

        $this->menuRepository->create($data);

        return response('保存成功', 200);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function syncFromWechat(Request $request)
    {
        $this->dispatch(new SyncWechatMenu($this->currentAccount));

        return response('同步成功', 200);
    }
}
