<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    //
    public function index()
    {
        return view('/admin/login/index');
    }

    public function login(Request $request)
    {

        #1）验证 (unique:table,column,except,idColumn#)
        $this->validate($request, [
            'name' => 'required|min:2',
            'password' => 'required|min:6|max:16',
        ]);

        #2）逻辑
        $user = request(['name', 'password']);

        if (true ==\Auth::guard('admin')->attempt($user)) {
            return redirect('/admin/home');
        }

        #3）渲染
        return \Redirect::back()->withErrors('账号密码不匹配');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/login');
    }
}
