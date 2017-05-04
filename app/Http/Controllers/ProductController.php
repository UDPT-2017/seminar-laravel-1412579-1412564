<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Request;
use Auth;
use DB;
class ProductController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}
    public function getList(){
		$data=DB::table('products')->orderBy('id','DESC')->get();
		return view('admin.product.list',compact('data'));
	}
	public function getAdd(){
		$cate = DB::table('cates')->select('id','name','parent_id')->get();
		return view('admin.product.add',compact('cate'));
	}
	public function postAdd(ProductRequest $request){
		$imgName = changeTitle(Input::file('fImages')->getClientOriginalName());
		//echo $imgName;
		$product_id = DB::table('products')->insertGetId(
			    [
			    	"name" =>  $request->txtName,
					"alias" => changeTitle($request->txtName),
					"price" => $request->txtPrice,
					"intro" => $request->txtIntro,
					"content" => $request->txtContent,
					"image" => $imgName,
					"keywords" => $request->txtKeywords,
					"description" => $request->txtDescription,
					"user_id" => 1,
					"cate_id" => $request->sltParent,
					"created_at" =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		           	"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
			    ]
			);

		Input::file('fImages')->move('resources/upload/images',$imgName);
		//echo $product_id;
		if(Input::hasFile('fProductDetail')){
			foreach (Input::file('fProductDetail') as $file) {
				if(isset($file)){
					DB::table('product_images')->insert(
					    [
					    	"image" =>  changeTitle($file->getClientOriginalName()),
							"product_id" => $product_id,
							"created_at" =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
				           	"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
					    ]
					);
					$file->move('resources/upload/details',changeTitle($file->getClientOriginalName()));
				}
			}
			
		}
		return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_massage'=>'Đã thêm sản phẩm thành công !!!']);
		
	}

	public function getDelete($id){
		$product_detail = DB::table('product_images')->where('product_id',$id)->get();
		foreach ($product_detail as $value) {
			Storage::delete('resources/upload/details/'.$value->image);
				#casceda rồi nên chỉ cần xoá trong đây là được.

		}
		$product = DB::table('products')->where('id',$id)->first();
		Storage::delete('resources/upload/images/'.$product->image);

		DB::table('products')->where('id', $id)->delete();

		return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_massage'=>'Đã xoá sản phẩm! thành công !!']);
	}

	public function getEdit($id){
		$cate = DB::table('cates')->get();
		$product = DB::table('products')->where('id',$id)->first();
		$product_img= DB::table('product_images')->where('product_id',$id)->get();
		return view('admin.product.edit',compact('cate','product','product_img'));
	}
	
	public function postEdit($id){
		$insert =  [
			    	"name" =>  Request::input('txtName'),
					"alias" => changeTitle(Request::input('txtName')),
					"price" => Request::input('txtPrice'),
					"intro" => Request::input('txtIntro'),
					"content" => Request::input('txtContent'),
					//"image" => $imgName,
					"keywords" => Request::input('txtKeywords'),
					"description" => Request::input('txtDescription'),
					"user_id" => 1,
					"cate_id" => Request::input('sltParent'),
		           	"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
			    ];
		

		$img_crr = 'resources/upload/images/'.Request::input('img_crr');
		if(!empty(Request::file('fImages'))){
			$filename = Request::file('fImages')->getClientOriginalName();
			$insert['image'] = changeTitle($filename);
			
			Request::file('fImages')->move('resources/upload/images',changeTitle($filename));
			if(Storage::exists($img_crr)){
				Storage::delete($img_crr);
			}
		}

		if(!empty(Request::file('fEditDetail'))){
			foreach(Request::file('fEditDetail') as $file){
				if(isset($file)){
					$insertImg =  [
						"image" => changeTitle($file->getClientOriginalName()),
						"product_id" => $id,
						];
					$file->move('resources/upload/details/',changeTitle($file->getClientOriginalName()));
					DB::table('product_images')->insert($insertImg);
				}
			}
		}
		
		//dd($insert);
		DB::table('products')->where('id',$id)->update($insert);
		return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_massage'=>'Đã sửa sản phẩm thành công !!!']);
	}

	public function getDelImg($id){
		if(Request::ajax()){
			$idHinh = (int)Request::get('idHinh');
			$image_detail = DB::table('product_images')->where('id',$idHinh)->first();
			if(!empty($image_detail)){
				$img='resources/upload/details/'.$image_detail->image;
				if(Storage::exists($img)){
					Storage::delete($img);
				}
				DB::table('product_images')->where('id',$idHinh)->delete();
			}
			return 1;
		}
	}
}
