<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlatformController extends Controller
{

    private $viewOutput = [
        'aside_platform' => 'open'
    ];


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
        $this->viewOutput['aside_platform_site'] = 'active';
        return view('admin/platform/site_list', $this->viewOutput);
    }


    /**
    * 增加站點
    */
    public function site_add()
    {
        $this->viewOutput['aside_platform_site'] = 'active';
        return view('admin/platform/site_add', $this->viewOutput);
    }


    /**
    * 增加站點
    */
    public function post_site_add(Request $request)
    {
        print_r($request->all());
    }
}
