<?php

namespace App\Http\Requests\Account;

use App\Http\Requests\Request;
use App\Models\Account;
use App\Repositories\AccountRepository;

class CreateRequest extends Request
{
    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * CreateRequest constructor.
     *
     * @param AccountRepository $accountRepository
     */
    public function __construct(AccountRepository $accountRepository)
    {
        parent::__construct();

        $this->accountRepository = $accountRepository;
    }

//    public function authorize()
//    {
//        // 每个用户限添加3个公众号
//        if (Account::where('user_id', auth()->user()->id)->count() >= 3) {
//            return false;
//        }
//
//        return true;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'       => 'required',
            'app_id'     => 'required',
            'app_secret' => 'required',
            'type'       => 'required',
        ];
    }
}
