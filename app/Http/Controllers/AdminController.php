<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class AdminController extends Controller
{

    use RegistersUsers;

    private $field = [
        'email'    => 'required|email|max:255',
        'password' => 'required|min:6'
    ];

    public function __construct()
    {

    }

    /**
    * 驗證後台登入
    */
    protected function validator(array $data)
    {
        return Validator::make($data, $this->field);
    }


    /**
    * 後台首頁; dashboard
    */
    public function index()
    {
        echo 'admin?';
    }


    /**
    * 登入表單
    */
    public function loginForm()
    {
        if(!Auth::check()){
            return view('admin/login');
        }else{
            return redirect('admin');
        }
    }


    /**
    * 登入功能
    */
    public function login(Request $request)
    {
        $post = $request->all();

        $validator = $this->validator($post);

        if(!$validator->fails()){
            $loginData = [
                'email'    => $post['email'],
                'password' => $post['password'],
                'admin'    => '1'
            ];

            if(Auth::attempt($loginData)){
                return redirect('admin');
            }else{
                $errMessage = ['errMessage' => Lang::get('auth.failed')];
            }
        }else{
            $errMessage = $validator->messages();
        }

        return redirect()->back()
            ->withInput($request->only(['email'], 'remember'))
            ->withErrors($errMessage);
    }


    /**
    * 登出
    */
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
