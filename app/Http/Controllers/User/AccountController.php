<?php

namespace App\Http\Controllers\User;

use App\Repositories\AccountRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    private $accountRepository;

    /**
     * AccountController constructor.
     *
     * @param AccountRepository $account
     */
    public function __construct(AccountRepository $account)
    {
        $this->accountRepository = $account;
    }

    /**
     * 显示添加公众号表单.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return user_view('account.add');
    }

    /**
     * 保存添加公众号数据.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        $this->accountRepository->store($request);

        return success('添加成功！');
    }

    /**
     * 显示编辑公众号表单.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $accountInfo = $this->accountRepository->getById($id);

        return user_view('account.add', compact('accountInfo'));
    }

    /**
     * 保存编辑后的公众号数据.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request, $id)
    {
        $this->accountRepository->update($id, $request);

        return success('修改成功！');
    }

    /**
     * 查看公众号对应接口信息
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showInterface($id)
    {
        //公众号对应的 token
        $token = $this->accountRepository->getById($id)->token;

        return user_view('account.interface', compact('token'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getManage($id)
    {
        //记录当前操作的公众号ID到会话
        $this->accountRepository->change($id);

        return redirect(user_url('menu'));
    }

    /**
     * 删除公众号
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->accountRepository->destroy($id);

        return success('删除成功！');
    }
}
