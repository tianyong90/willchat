<?php

namespace App;

use Laratrust\LaratrustPermission;

class Permission extends LaratrustPermission
{
    protected $fillable = [
        'id',
        'name',
        'display_name',
        'description',
    ];
}
