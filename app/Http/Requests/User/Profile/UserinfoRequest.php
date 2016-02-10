<?php

namespace App\Http\Requests\User\Profile;

use App\Http\Requests\Request;

class UserinfoRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nickname' => 'between:1,20',
            'mobile' => 'regex:/^1[3,5,7,8]\d{9}$/',
            'qq' => 'digits_between:5,10',
        ];
    }
}
