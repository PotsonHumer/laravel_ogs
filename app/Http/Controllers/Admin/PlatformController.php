<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdminSideService;

class PlatformController extends Controller
{

    protected $asideService;

    private $viewOutput = [];

    public function __construct()
    {
        $this->asideService = new AdminSideService;
    }


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
        $this->asideService->assign('platform','site');

        return $this->template('admin/platform/site_list');
    }


    /**
    * 增加站點
    */
    public function site_add()
    {
        $this->asideService->assign('platform','site');

        return $this->template('admin/platform/site_add');
    }


    /**
    * 輸出 Template
    */
    private function template($template)
    {
        $this->viewOutput = $this->asideService->output($this->viewOutput);

        return view($template, $this->viewOutput);
    }


    /**
    * 增加站點
    */
    public function post_site_add(Request $request)
    {
        print_r($request->all());
    }
}
