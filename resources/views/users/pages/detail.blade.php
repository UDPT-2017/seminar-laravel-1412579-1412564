@extends('users.index')
@section('content')



<!-- content -->
<div class="container">
<div class="women_main">
	<!-- start content -->
			<div class="row single">
				<div class="col-md-9 det">
				  <div class="single_left">
					<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="{{ asset('public/images/'.$product_detail->image) }}" class="img-responsive" />
									<img class="etalage_source_image" src="{{ asset('public/images/'.$product_detail->image) }}" class="img-responsive" title="" />
								</a>
							</li>
							@foreach($images as $item)
							<li>
								<img class="etalage_thumb_image" src="{{ asset('public/images/'.$item->image) }}" class="img-responsive" />
								<img class="etalage_source_image" src="{{ asset('public/images/'.$item->image) }}" class="img-responsive" title="" />
							</li>
							@endforeach
						</ul>
						 <div class="clearfix"></div>		
				  </div>
				  <div class="desc1 span_3_of_2">
					<h3>{{ $product_detail->name }}</h3>
					<br>
					<span class="code">Product Code: {{ $product_detail->id }}</span>
					<p>{{ $product_detail->intro}}</p>
						<div class="price">
							<span class="text">Price:</span>
							<span class="price-new">{!! number_format($product_detail->price,0,',','.') !!}</span><span class="price-old">{!! number_format(($product_detail->price)*120/100,0,',','.') !!}</span> <br>
						</div>
					<div class="btn_form">
						<a href="checkout.html">Mua</a>
					</div>
					
			   	 </div>
          	    <div class="clearfix"></div>
          	   </div>
          	    <div class="single-bottom1">
					<h6>Mô tả</h6>
					<p class="prod-desc">{{ $product_detail->content}}</p>
				</div>
				<div class="single-bottom2">
					<h6>Related Products</h6>
					@foreach($related as $item)
				     <div class="product">
						   <div class="product-desc">
								<div class="product-img">
		                           <img src="{{ asset('public/images/'.$item->image) }}" class="img-responsive " alt=""/>
		                       </div>
		                       <div class="prod1-desc">
		                           <h5><a class="product_link" href="#">{{ $item->name}}</a></h5>
		                           <p class="product_descr"> {!! $item->intro !!}</p>									
							   </div>
							   <div class="clearfix"></div>
					      </div>
						  <div class="product_price">
								<span class="price-access">{!! number_format($item->price,0,',','.') !!}</span>								
								<button class="button1"><span>Add to cart</span></button>
		                  </div>
						 <div class="clearfix"></div>
				     </div>
				     @endforeach
				     <div style="text-align: center">
				     {{ $related->links() }}
				     </div>
		   	  </div>
	       </div>	
	<div class="col-md-3">
	  <div class="w_sidebar">
		<div class="w_nav1">
			<h4>Hot trend</h4>
			<ul>
			<?php $title = DB::table('homepages')->get(); ?>
			@foreach($title as $item)
			<?php $nameCate = DB::table('cates')->where('id',$item->cate_id)->first(); ?>
				<li><a href="{{ route('category',[$nameCate->id,$nameCate->alias]) }}">{{ $nameCate->name }}</a></li>
			@endforeach
			</ul>	
		</div>
	</div>
   </div>
		   <div class="clearfix"></div>		
	  </div>
	<!-- end content -->
</div>
</div>
@endsection