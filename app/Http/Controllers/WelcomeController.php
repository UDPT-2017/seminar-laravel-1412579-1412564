<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use DB;
use Cart;
class WelcomeController extends Controller
{
    public function Homepage(){
    	$title = DB::table('homepages')->get();
    	$product = DB::table('products')->orderBy('id','DESC')->get()->take(8);
    	return view('users.pages.home',compact('title','product'));
    }
    public function Category($id,$alias){
    	$parent = DB::table('cates')->select('id')->where('parent_id',$id)->get();
    	$nameCate = DB::table('cates')->select('name')->where('id',$id)->first();
    	$idArr = [];
    	array_push($idArr, (int)$id);
    	foreach($parent as $item){
    			array_push($idArr, $item->id);
    	}
    	$parent_level_2 = DB::table('cates')->select('id')->whereIn('parent_id',$idArr)->get();
    	foreach($parent_level_2 as $item){
    			array_push($idArr, $item->id);
    	}
    	$parent_level_3 = DB::table('cates')->select('id')->whereIn('parent_id',$idArr)->get();
    	foreach($parent_level_3 as $item){
    			array_push($idArr, $item->id);
    	}
    	// dd($idArr);
    	$product = DB::table('products')->whereIn('cate_id',$idArr)->orderBy('id','DESC')->simplePaginate(8);
    	$count = DB::table('products')->whereIn('cate_id',$idArr)->count('id');
    	
    	return view('users.pages.category',compact('nameCate','product','count'));
    }
    public function productDetail($id,$alias){
        $product_detail = DB::table('products')->where('id',$id)->first();
        $images = DB::table('product_images')->select('id','image')->where('product_id',$id)->get();
        $related = DB::table('products')->where('cate_id',$product_detail->cate_id)->where('id','<>',$id)->paginate(2);
        // dd(count($images));
        //dd($related);
        return view('users.pages.detail',compact('product_detail','images','related'));
    }
    public function shoppingCart($id){
        $product_buy = DB::table('products')->where('id',$id)->first();
        Cart::add(array('id'=>$id,'name'=>$product_buy->name,'qty'=>1,'price'=>$product_buy->price,'options'=>array('img'=>$product_buy->image)));
        return redirect()->route('Cart');

    }
    public function Cart(){
        $content = Cart::content();
        $total = Cart::subtotal();
        $totalInt = str_replace(',','',$total);
        $countInt  = Cart::count();
        //dd($content);
        return view('users.pages.checkout',compact('content','totalInt','countInt'));
    }
    public function xoasanpham($id){
        if(Request::ajax()){
            Cart::remove($id);
            echo 1;
        }
    }
    public function capnhat($id){
        if(Request::ajax()){
            $id = Request::get('rowId');
            $qty = Request::get('qty');
            Cart::update($id,$qty);
            echo 1;
        }
        
    }
}


