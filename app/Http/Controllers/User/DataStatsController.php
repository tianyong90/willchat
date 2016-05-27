<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class DataStatsController extends Controller
{
    public function getIndex()
    {
        return user_view('data_stats.index');
    }
}
