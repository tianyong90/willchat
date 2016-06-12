<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\CreateRequest;
use App\Http\Requests\Account\UpdateRequest;
use App\Repositories\AccountRepository;

class AccountController extends Controller
{
    /**
     * @var AccountRepository
     */
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate(CreateRequest $request)
    {
        $this->accountRepository->create($request->all());

        return success('添加成功！', user_url('/'));
    }

    /**
     * 显示编辑公众号表单.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $accountInfo = $this->accountRepository->find($id);

        return user_view('account.edit', compact('accountInfo'));
    }

    /**
     * 保存编辑后的公众号数据.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function postEdit(UpdateRequest $request, $id)
    {
        $this->accountRepository->update($request->all(), $id);

        return success('修改成功！', user_url('/'));
    }

    /**
     * 查看公众号对应接口信息.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showInterface($id)
    {
        //公众号对应的 token
        $token = $this->accountRepository->find($id)->token;

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
        chose_account($id);

        return redirect(user_url('menu'));
    }

    /**
     * 删除公众号.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->accountRepository->delete($id);

        return success('删除成功！');
    }
}
