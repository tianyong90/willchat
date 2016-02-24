<?php

namespace App\Http\Requests\Qrcode;

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
            'expire' => 'between:1,108000',
        ];
    }
}
