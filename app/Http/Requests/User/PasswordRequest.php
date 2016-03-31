<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class PasswordRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old' => 'required',
            'password' => 'required|between:6,25|confirmed',
        ];
    }

    /**
     * 返回官僚别名.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'old' => '原密码',
            'password' => '新密码',
        ];
    }
}
