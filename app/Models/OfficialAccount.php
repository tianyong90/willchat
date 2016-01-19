<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficialAccount extends Model
{
//    protected $hidden = ['name'];

    public function getDates()
    {
        return ['create_at'];
    }
}
