<?php

namespace App\Http\Middleware;

use Closure;

class AdminRouteMiddleware
{
    /**
     * 後台路徑解析中介層
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  String    $method    請求類型
     * @param  String    $classes   控制器 namespace
     * @param  String    $function  控制器方法
     * @param  Array     $params    附帶參數
     * @param  Array     $args      路徑分解陣列
     * @param  String    $control   控制器路徑
     * @param  Boolean   $isPass    是否正確輸出頁面
     * @return Object               返回下一層 Route 物件
     */

    private $method;
    private $classes;
    private $function;
    private $params  = [];
    private $args    = [];
    private $control = 'App\Http\Controllers\Admin\%sController';
    private $isPass  = false;

    public function handle($request, Closure $next)
    {
        $this->method = $request->method();
        $this->args   = explode('/', $request->path());
        $this->isPass = $this->analysis($request);

        return $this->next($request,$next);
    }


    /**
    * 分析路徑
    * @param  Object  $request Request 物件
    * @return Boolean          是否符合後台路徑條件
    */
    private function analysis($request)
    {
        $nowArgs = $this->args;
        list($admin,$classes) = $nowArgs;

        switch(true){
            case ($admin != 'admin'):
                return false;
            break;
            case (count($nowArgs) > 3):
                $params = array_splice($nowArgs, 3);
            case (count($nowArgs) == 3):
                list($admin,$classes,$function) = $nowArgs;
            break;
            case (empty($function)):
                $function = 'index';
            break;
            default:
                return false;
            break;
        }

        $classes = ucwords($classes);
        $controller = sprintf($this->control, $classes);

        if(isset($params)) $this->params = $params;

        $this->classes  = $controller;
        $this->function = ($this->method != 'GET') ? strtolower($this->method).'_'.$function : $function;

        return true;
    }


    /**
    * 前往下一層 Route
    * @param  Object $request Request 物件
    * @param  Object $next    Route 物件
    * @return Object          返回完整 Route 物件
    */
    private function next($request,$next)
    {
        if($this->isPass){
            $request->merge(['classes' => $this->classes, 'function' => $this->function, 'params' => $this->params, 'isPass' => $this->isPass]);
        }else{
            $request->merge(['isPass' => $this->isPass]);
        }

        return $next($request);
    }
}