@extends('users.index')
@section('content')

<div class="container">
	<div class="check">	 
			 <div class="col-md-3 cart-total">
			 <a class="continue" href="#">Tiếp tục mua hàng</a>
			 <div class="price-details">
				 <h3>Thông tin giá</h3>
				 <span>Tổng cộng</span>
				 <span class="total1">{!! number_format($totalInt,0,',','.').' VNĐ' !!}</span>
				 <span>Giảm giá</span>
				 <span class="total1">---</span>
				 <span>Phí vận chuyển</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>Tổng cộng</h4></li>	
			   <li class="last_price"><span>{!! number_format($totalInt,0,',','.').' VNĐ' !!}</span></li>
			   <div class="clearfix"> </div>
			 </ul>
			
			 
			 <div class="clearfix"></div>
			 <a class="order" href="#">Place Order</a>
			</div>
		<h1>Giỏ hàng của tôi - {{ $countInt }} sản phẩm</h1>
		 <div class="col-md-9 cart-items">
			 
				<script>$(document).ready(function(c) {
					$('.close').on('click', function(c){
						
						var temp = $(this).parent().attr('class');
						$('.'+ temp).fadeOut('slow', function(c){
							$('.'+ temp).remove();
						});
						});	  
				
					});
			   </script>
			 <?php $count = 0; ?>
			 @foreach($content as $item)
			 <?php $count++; ?>
			 <div class="cart-header{{ $count }}">
				 <a class="close">Xoá</a>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="{!! asset('resources/upload/images/'.$item->options->img) !!}" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						<h3><a href="#">{!! $item->name !!}</a><span>ID Sản phẩm: {!! $item->id !!}</span></h3>
						<ul class="qty">

							<li><p>Giá : {!! $item->price !!}</p></li>
							<li><p>Số lượng : {!! $item->qty !!}</p></li>

						</ul>

					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>	
			 @endforeach
		 </div>
		 
		
			<div class="clearfix"> </div>
	 </div>
	 </div>

@endsection