<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlatformController extends Controller
{

    /**
    * 平台設定首頁
    */
    public function index()
    {

    }


    /**
    * 站點設定
    */
    public function site()
    {
        return view('admin/platform/site_list');
    }
}
