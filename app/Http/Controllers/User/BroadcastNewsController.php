<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class BroadcastNewsController extends Controller
{
    public function getIndex()
    {
        return user_view('broadcast_news.index');
    }
}
