<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    public function index()
    {


        return view('user.docment.index');
    }


}
