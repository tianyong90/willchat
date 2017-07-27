<?php

namespace App\Http\Requests\Account;

use App\Account;
use App\Http\Requests\Request;

class CreateRequest extends Request
{
    /**
     * @var Account
     */
    private $account;

    /**
     * CreateRequest constructor.
     *
     * @param Account $account
     */
    public function __construct(Account $account)
    {
        parent::__construct();

        $this->account = $account;
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
