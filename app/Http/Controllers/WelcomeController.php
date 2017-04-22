<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class WelcomeController extends Controller
{
    public function Homepage(){
    	$title = DB::table('homepages')->get();
    	$product = DB::table('products')->orderBy('id','DESC')->get()->take(8);
    	return view('users.pages.home',compact('title','product'));
    }
}
