<?php

namespace App\Http\Requests\User\Profile;

use App\Http\Requests\Request;

class UserinfoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nickname' => 'required',
            'mobile' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => '昵称必须填写',
            'mobile.required' => '手机号必须填写',
        ];
    }
}
