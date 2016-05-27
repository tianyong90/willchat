<?php

namespace App\Http\Requests\Account;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{
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
