<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;
class UserLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:user', ['except' => ['logout', 'getLogout']]);
	}
    public function showLoginForm(){
    	return view('users.pages.login');
    }

    public function login(Request $request){
    	$this->validate($request,[
    		'txtUser' => 'required',
    		'txtPass' => 'required'],
            ["txtUser.required"=>"Vui lòng nhập tài khoản",
            "txtPass.required"=>"Vui lòng nhập mật khẩu"
    		]);

    	if(Auth::guard('user')->attempt(['username' => $request->txtUser, 'password' => $request->txtPass],$request->remember)){
    		return redirect()->intended(route('homepage'));
    	}
    	return redirect()->back()->withInput($request->only('username','remember'))->with('status', 'Tài khoản hoặc mật khẩu không chính xác!');
    }
    public function getLogout() 
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}