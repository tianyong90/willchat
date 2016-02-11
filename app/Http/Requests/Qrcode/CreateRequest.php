<?php

namespace App\Http\Requests\Account;

use App\Http\Requests\Request;

class CreateRequest extends Request
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'keyword' => 'required',
            'remark' => 'max:20',
        ];
    }
}
