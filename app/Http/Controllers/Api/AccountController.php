<?php

namespace App\Http\Controllers\Api;

use App\Account;
use App\Repositories\AccountRepository;
use Auth;
use Illuminate\Http\Request;

class AccountController extends BaseController
{
    private $accountRepository;

    /**
     * AccountController constructor.
     *
     * @param AccountRepository $accountRepository
     */
    public function __construct(AccountRepository $accountRepository)
    {
        parent::__construct();

        $this->accountRepository = $accountRepository;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Request $request)
    {
        $accounts = Account::where('user_id', Auth::id())->get();

        return response()->json(compact('accounts'));
    }

    /**
     * 公众号信息.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function show($id)
    {
        if (!$id) {
            return response('缺少ID', 400);
        }

        $account = $this->accountRepository->find($id);

        return response()->json(compact('account'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = Auth::id();

            $this->accountRepository->updateOrCreate(['id' => $request->id], $data);

            return response('success', 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
