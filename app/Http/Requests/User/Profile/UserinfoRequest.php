<?php

namespace App\Http\Requests\User\Profile;

use App\Http\Requests\Request;
use App\Models\User;

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
            'nickname' => 'required',
            'mobile' => 'required',
        ];
    }
}
