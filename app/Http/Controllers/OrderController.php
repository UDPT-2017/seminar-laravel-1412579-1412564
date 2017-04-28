<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
    public function __construct(){
		$this->middleware('auth:admin');
	}
    public function getList(){
		$data=DB::table('orders')->select('user_id')->groupBy('user_id')->orderBy('id','DESC')->get();
		return view('admin.order.list',compact('data'));
	}
}
