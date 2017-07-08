<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     * @param  Array $field - key: 會員資料預設欄位 & value: 檢查規則
     * @return void
     */

    private $field = [
        'l_name'   => 'required|max:255',
        'f_name'   => 'required|max:255',
        'nickname' => 'required|max:255',
        'avatar'   => 'nullable',
        'email'    => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed'
    ];

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, $this->field);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $fields = array_keys($this->field);

        foreach($fields as $field){
            switch(true){
                case ($field == 'password'):
                    $handleValue = bcrypt($data[$field]);
                break;
                case (empty($data[$field])):
                    $handleValue = NULL;
                break;
                default:
                    $handleValue = $data[$field];
                break;
            }

            $create[$field] = $handleValue;
        }

        return User::create($create);
    }

    protected function register(Request $request){

        $post = $request->all();
        $validator = $this->validator($post);

        if(!$validator->fails()){
            $this->create($post);
        }else{
            return redirect()->back()
                ->withInput($request->only(['l_name','f_name','nickname','email'], 'remember'))
                ->withErrors($validator->messages());
        }
    }
}
