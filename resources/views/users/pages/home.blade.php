@extends('users.index')
@section('content')

<div class="arriv">
	<div class="container">
		<div class="arriv-top" >
			<div class="col-md-6 arriv-left">
				<img src="{{ asset('public/images/'.$title[0]->image) }}" class="img-responsive" alt="">
				<div class="arriv-info">
					<h3>{{ $title[0]->headline }}</h3>
					<p>{{ $title[0]->content }}</p>
					<div class="crt-btn">
						<a href="details.html">Xem ngay</a>
					</div>
				</div>
			</div>
			<div class="col-md-6 arriv-right">
				<img src="{{ asset('public/images/'.$title[1]->image) }}" class="img-responsive" alt="">
				<div class="arriv-info">
					<h3>{{ $title[1]->headline }}</h3>
					<p>{{ $title[1]->content }}</p>
					<div class="crt-btn">
						<a href="details.html">Xem ngay</a>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="arriv-bottm">
			<div class="col-md-8 arriv-left1">
				<img src="{{ asset('public/images/'.$title[2]->image) }}" class="img-responsive" alt="">
				<div class="arriv-info1">
					<h3>{{ $title[2]->headline }}</h3>
					<p>{{ $title[2]->content }}</p>
					<div class="crt-btn">
						<a href="details.html">Xem ngay</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 arriv-right1">
				<img src="{{ asset('public/images/'.$title[3]->image) }}" class="img-responsive" alt="">
				<div class="arriv-info2">
					<a href="details.html"><h3>{{ $title[3]->headline }}<i class="ars"></i></h3></a>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="arriv-las">
			<div class="col-md-4 arriv-left2">
				<img src="{{ asset('public/images/'.$title[4]->image) }}" class="img-responsive" alt="">
				<div class="arriv-info2">
					<a href="details.html"><h3>{{ $title[4]->headline }}<i class="ars"></i></h3></a>
				</div>
			</div>
			<div class="col-md-4 arriv-middle">
				<img src="{{ asset('public/images/'.$title[5]->image) }}" class="img-responsive" alt="">
				<div class="arriv-info2">
					<a href="details.html"><h3>{{ $title[5]->headline }}<i class="ars"></i></h3></a>
				</div>
			</div>
			<div class="col-md-4 arriv-right2">
				<img src="{{ asset('public/images/'.$title[6]->image) }}" class="img-responsive" alt="">
				<div class="arriv-info2">
					<a href="details.html"><h3>{{ $title[6]->headline }}<i class="ars"></i></h3></a>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="special">
	<div class="container">
		<h3>Sản phẩm mới nhất</h3>
		<div class="specia-top">
			<ul class="grid_2">
		@foreach($product as $item)
		<li>	
			<div>
			<span style="font-size: 15px;position: absolute;margin: 5px" class="label label-success">Mới nhất</span>
				<a href="details.html"><img src="{{ asset('public/images/'.$item->image) }}" class="img-responsive" alt=""></a>
				
			</div>
				<div class="special-info grid_1 simpleCart_shelfItem">
					<h5>{{ $item->name }}</h5>
					<div class="item_add"><span class="item_price"><h6>{!! number_format($item->price,0,',','.') !!}</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">Add to cart</a></span></div>
				</div>
		</li>
		@endforeach
		<div class="clearfix"> </div>
	</ul>
		</div>
	</div>
</div>

@endsection