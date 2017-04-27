<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use DB;
use Storage;
class HomepageController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}
    public function getList(){
    	$data = DB::table('homepages')->get();
    	return view('admin.homepage.list',compact('data'));
    }
    public function getEdit($id){
    	$cate = DB::table('cates')->get();
    	$product = DB::table('homepages')->where('id',$id)->first();
    	return view('admin.homepage.edit',compact('product','cate'));
    }
    public function postEdit($id){
    	$update =  [
			    	"headline" =>  Request::input('txtHeadline'),
			    	"cate_id" => Request::input('sltParent'),
			    ];
		
		if(!empty(Request::input('txtContent'))){
			$update["content"] = Request::input('txtContent');
		}
		$img_crr = 'public/images/'.Request::input('img_crr');
		if(!empty(Request::file('fImages'))){
			$date = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
			$date = str_replace(":","",$date);
			$filename = Request::file('fImages')->getClientOriginalName();
			$update['image'] = $date.changeTitle($filename);
			
			Request::file('fImages')->move('public/images/',$date.changeTitle($filename));
			if(Storage::exists($img_crr)){
				Storage::delete($img_crr);
			}
		}

		// dd($update);
		DB::table('homepages')->where('id',$id)->update($update);
		return redirect()->route('admin.homepage.getList')->with(['flash_level'=>'success','flash_massage'=>'Đã sửa sản phẩm thành công !!!']);
	}
    
}
