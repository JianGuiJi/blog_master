<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/posts';

    //登录页面
    public function index()
    {
        return view('login.index');
    }

    ##登录
    public function login()
    {
        #1）验证 (unique:table,column,except,idColumn#)
        $this->validate(request(), [

            'email' => 'required|email',
            'password' => 'required|min:8|max:16',
            'is_remember' => 'integer'
        ]);
        #2）逻辑
        //创建用户

        $user = request(['email', 'password']);
        $is_remember = request('is_remember');
        if(\Auth::attempt($user,$is_remember)){
            return redirect('/posts');
        }

        #3）渲染
        return \Redirect::back()->withErrors('邮箱密码不匹配');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/login');
    }
}
