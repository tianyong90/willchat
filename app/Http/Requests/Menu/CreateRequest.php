<?php

namespace App\Http\Requests\Menu;

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
            'name' => 'required',
            'type' => 'required',
            'key' => 'between:1,15',
        ];
    }
}
