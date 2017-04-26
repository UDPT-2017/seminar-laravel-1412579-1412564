@extends('users.index')
@section('content')

<div class="container">
	<div class="check">	 
			 <div class="col-md-3 cart-total">
			 <a class="continue" href="{{ route('homepage') }}">Tiếp tục mua hàng</a>
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
		<h1>Giỏ hàng </h1>
		<div class="alert" style="color: green"></div>
		 <div class="col-md-9 cart-items">
			 
				{{-- <script>$(document).ready(function(c) {
					$('.close').on('click', function(c){
						
						var temp = $(this).parent().attr('class');
						$('.'+ temp).fadeOut('slow', function(c){
							$('.'+ temp).remove();
						});
						});	  
				
					});
			   </script> --}}
			 <?php $count = 0; ?>
			 @foreach($content as $item)
			 <?php $count++; ?>
			 <div class="cart-header{{ $count }}">
				 <a class="close" href="javascript:void(0)">Xoá</a>
				 <input type="hidden"  id="{{ $item->rowId }}" >
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="{!! asset('resources/upload/images/'.$item->options->img) !!}" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						<h3><a href="#">{!! $item->name !!}</a><span>ID Sản phẩm: {!! $item->id !!}</span></h3>
						<ul class="qty">
							<input type="hidden"  id="{{ $item->rowId }}" >
							<li><p>Giá : {!! $item->price !!}</p></li>
							<li><p>Số lượng : <input id="qty" type="number" size="0" value="{!! $item->qty !!}"></p>
							</li>
							<li><a class="editQty" href="javascript:void(0)">Sửa</a></li>
							
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
<script type="text/javascript">
  $(document).ready(function(){
    $(".close").on('click',function(){
      var url = 'http://localhost:8080/seminar-laravel-1412579-1412564/xoa-san-pham/';
      var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
      var rowId = $(this).parent().find("input").attr('id');   
      var temp = $(this).parent().attr('class');
      // alert(temp);
      $.ajax({
        url: url + rowId,
        type: 'GET',
        cache: false,
        data:{"_token":_token,"rowId":rowId},
        success: function (data){
          if(data == 1){
				$('.'+ temp).fadeOut('slow', function(c){
					$('.'+ temp).remove();
				});          
			}
			else{
            alert("Không thể xoá sản phẩm!!!");
          }
        }
      });
    })

    $(".editQty").on('click',function(){
      var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
      var rowId = $(this).parent().parent().parent().find("input").attr('id');   
      var qty = $(this).parent().parent().find("input#qty").val();
      //alert(qty);
      $.ajax({
        url: 'cap-nhat/'+rowId+'/'+qty,
        type: 'GET',
        cache: false,
        data:{"_token":_token,"rowId":rowId,"qty": qty},
        success: function (data){
          if(data == 1){
	            $('.alert').text("Thành công!!!").fadeOut(2000);
	            window.location='gio-hang';
			}	
			else{
            alert("Không thể sửa sản phẩm!!!");
          }
        }
      });
    })
  });
  
</script>

@endsection