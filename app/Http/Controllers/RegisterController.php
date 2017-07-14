<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class RegisterController extends Controller
{
    //注册页面
    public function index()
    {
        return view('register.index');
    }

    //注册行为
    public function register()
    {
        //表单提交
        #1）验证 (unique:table,column,except,idColumn#)
        $this->validate(request(), [
            'name' => 'required|unique:users,name|string|min:2|max:20',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|unique:users|string|min:8|max:16|confirmed', //验证字段值必须和 foo_confirmation 的字段值一致。例如，如果要验证的字段是 password，就必须和输入数据里的 password_confirmation 的值保持一致。
        ]);
        #2）逻辑
        //创建用户
        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));
        $user = Users::create(compact('name', 'email', 'password'));


        #3）渲染
        return redirect('/login');

    }

}
