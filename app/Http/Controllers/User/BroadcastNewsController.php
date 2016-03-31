<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BroadcastNewsController extends Controller
{
    public function getIndex()
    {
        return user_view('broadcast_news.index');
    }
}
