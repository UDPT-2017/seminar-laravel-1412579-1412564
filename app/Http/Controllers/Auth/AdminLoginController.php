<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;
class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin', ['except' => ['logout', 'getLogout']]);
	}
    public function showLoginForm(){
    	return view('login.admin');
    }

    public function login(Request $request){
    	$this->validate($request,[
    		'txtUser' => 'required',
    		'txtPass' => 'required'],
            ["txtUser.required"=>"Vui lòng nhập tài khoản",
            "txtPass.required"=>"Vui lòng nhập mật khẩu"
    		]);

    	if(Auth::guard('admin')->attempt(['username' => $request->txtUser, 'password' => $request->txtPass],$request->remember)){
    		return redirect()->intended(route('admin.dashboard'));
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
