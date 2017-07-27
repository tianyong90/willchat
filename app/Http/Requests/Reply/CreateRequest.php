<?php

namespace App\Http\Requests\Reply;

use App\Account;
use App\Http\Requests\Request;

class CreateRequest extends Request
{
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
            'token'      => 'required',
            'app_id'     => 'required',
            'app_secret' => 'required',
            'aes_key'    => 'required',
            'type'       => 'required',
        ];
    }
}
