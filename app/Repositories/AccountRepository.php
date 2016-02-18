<?php

namespace App\Repositories;

use App\Models\Account;
use Illuminate\Http\Request;

/**
 * Account Repository.
 */
class AccountRepository
{
    use BaseRepository;

    /**
     * Account Model.
     *
     * @var Account
     */
    protected $model;

    public function __construct(Account $account)
    {
        $this->model = $account;
    }

    /**
     * 获取账户列表.
     *
     * @param int $pageSize 分页大小
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function lists($pageSize)
    {
        return $this->model->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate($pageSize);
    }

    /**
     * store.
     *
     * @param Request $input
     */
    public function store($input)
    {
        return $this->savePost($this->model, $input);
    }

    /**
     * 根据tag获取公众号.
     *
     * @param string $token tag
     *
     * @return Account
     */
    public function getByToken($token)
    {
        return $this->model->where('token', $token)->first();
    }

    /**
     * update.
     *
     * @param int     $id
     * @param Request $input
     */
    public function update($id, $input)
    {
        $model = $this->model->find($id);

        return $this->savePost($model, $input);
    }

    /**
     * save.
     *
     * @param Account $account account
     * @param Request $input   输入
     */
    public function savePost($account, $input)
    {
        // 公众号所属账户ID
        $ownerId = auth()->user()->id;

        return $account->fill(array_merge($input->all(), ['user_id' => $ownerId]))->save();
    }

    /**
     * 查询公众号所用户ID
     *
     * @param $accountId
     *
     * @return mixed
     */
    public function getAccountUserId($accountId)
    {
        return $this->getById($accountId)->user_id;
    }
}
