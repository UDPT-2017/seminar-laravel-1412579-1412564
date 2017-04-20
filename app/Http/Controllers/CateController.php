<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;

use DB;
class CateController extends Controller {

	public function getAdd(){
		$parent = DB::table('cates')->orderBy('id','DESC')->get();
		return view('admin.cate.add',compact('parent'));
	}

	public function getList(){
		$data = DB::table('cates')->orderBy('id','DESC')->get();

		return view('admin.cate.list',compact('data'));
	}

	public function postAdd(CateRequest $request){
		DB::table('cates')->insert(
				    [
				    	'name' => $request->txtCateName, 
					    'alias' => changeTitle($request->txtCateName),
					    'order' => 1,
					    'parent_id' => $request->sltParent,
					    'keywords' => $request->txtKeywords,
					    'description' => $request->txtDescription,
					    "created_at" =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		           		"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	           		]
				);
		return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success','flash_massage'=>'Đã thêm thành công Category!!!']);

	}

	
	public function getDelete($id){
		$parent = DB::table('cates')->where('parent_id',$id)->count();
		if($parent == 0){
			DB::table('cates')->where('id', $id)->delete();
			return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success','flash_massage'=>'Đã xoá thành công Category!!!']);
		}
		else{
			DieuKienDelete();
		}
	}
	public function getEdit($id){
		$data = DB::table('cates')->where('id',$id)->first();
		$parent =  DB::table('cates')->select('id','name','parent_id')->get();
		return view('admin.cate.edit',compact('parent','data','parent_id'));
	}
	public function postEdit(Request $request,$id){
		$this->validate($request,
			["txtCateName"=>"required"],
			["txtCateName.required"=>"Vui lòng nhập tên Category"]
			);
		
		DB::table('cates')->where('id',$id)->update(
				    [
				    	'name' => $request->txtCateName, 
					    'alias' => changeTitle($request->txtCateName),
					    'order' => 1,
					    'parent_id' => $request->sltParent,
					    'keywords' => $request->txtKeywords,
					    'description' => $request->txtDescription,
		           		"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	           		]
				);
		return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success','flash_massage'=>'Đã sửa thành công Category!!!']);
	}
}
