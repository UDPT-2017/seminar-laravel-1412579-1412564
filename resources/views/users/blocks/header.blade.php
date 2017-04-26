<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE HTML>
<html>
<head>
<title>Gretong a Ecommerce Category Flat Bootstarp Responsive Website Template | Home :: w3layouts</title>
<link href="{{ url('public/vendor/bootstrap/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="{{ url('public/js/jquery-1.11.1.min.js') }}"></script>
<!-- Custom Theme files -->
<link href="{{ url('public/css/style.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<link rel="shortcut icon" href="{{ url('public/favicon.ico')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

<!-- start menu -->
<link href="{{ url('public/css/megamenu.css') }}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{ url('public/css/etalage.css') }}">
<script type="text/javascript" src="{{ url('public/js/megamenu.js') }}"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="{{ url('public/js/menu_jquery.js') }}"></script>
<script src="{{ url('public/js/simpleCart.min.js') }}"> </script>
<script src="{{ url('public/js/jquery.etalage.min.js') }}"></script>
<script src="{{ url('public/js/menu_jquery.js') }}"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
</script>
</head>
<body>
<!-- header_top -->
<div class="top_bg">
	<div class="container">
		<div class="header_top">
			<div class="top_right">
				<ul>
					<li><a href="#">help</a></li>|
					<li><a href="contact.html">Contact</a></li>|
					<li><a href="#">Delivery information</a></li>
				</ul>
			</div>
			<div class="top_left">
				<h2><span></span> Call us : 032 2352 782</h2>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- header -->
<div class="header_bg">
<div class="container">
	<div class="header">
	<div class="head-t">
		<div class="logo">
			<a href="{{ route('homepage') }}"><img src="{{ asset('public/images/logo.png') }}" class="img-responsive" alt=""/> </a>
		</div>
		<!-- start header_right -->
		<div class="header_right">
			<div class="rgt-bottom">
				<div class="log">
					<div class="login" >
						<div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a>
						    <div id="loginBox">                
						        <form id="loginForm">
						                <fieldset id="body">
						                	<fieldset>
						                          <label for="email">Email Address</label>
						                          <input type="text" name="email" id="email">
						                    </fieldset>
						                    <fieldset>
						                            <label for="password">Password</label>
						                            <input type="password" name="password" id="password">
						                     </fieldset>
						                    <input type="submit" id="login" value="Sign in">
						                	<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
						            	</fieldset>
						            <span><a href="#">Forgot your password?</a></span>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="reg">
					<a href="register.html">REGISTER</a>
				</div>
			<div class="cart box_1">
	
				
				<div class="clearfix"> </div>
			</div>
			<div class="create_btn">
				<a href="{{ route('Cart') }}">Giỏ hàng</a>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="search">
		    <form>
		    	<input type="text" value="" placeholder="search...">
				<input type="submit" value="">
			</form>
		</div>
		<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<?php
              $menu_level_1 = DB::table('cates')->where('parent_id',0)->get();
         ?>
		<!-- start header menu -->
		<ul class="megamenu skyblue">
			<li class="active grid"><a class="color1" href="{{ route('homepage') }}">Home</a></li>
			<li class="grid"><a class="color2" href="#">new arrivals</a>
				</li>

				@foreach($menu_level_1 as $item_lv_1)
				<li><a class="color6" href="{{ route('category',[$item_lv_1->id,$item_lv_1->alias]) }}">{{ $item_lv_1->name }}</a>
					 <?php $menu_level_2 = DB::table('cates')->where('parent_id',$item_lv_1->id)->get(); 
					  ?>
           				@if(count($menu_level_2)>0)
           				<div class="megapanel">
							<div class="row">
								
									@foreach($menu_level_2 as $item_lv_2)
									<div class="col1">
										<div class="h_nav">
										<?php $menu_level_3 = DB::table('cates')->where('parent_id',$item_lv_2->id)->get(); ?>
										<h4><a class="" href="{{ route('category',[$item_lv_2->id,$item_lv_2->alias]) }}">{{ $item_lv_2->name }}</a></h4>
										<ul>
											@if(count($menu_level_3)>0)
												@foreach($menu_level_3 as $item_lv_3)
												<li><a href="{{ route('category',[$item_lv_3->id,$item_lv_3->alias]) }}">{{ $item_lv_3->name }}</a></li>
												@endforeach
											@endif
										</ul>	
										</div>							
									</div>
									@endforeach
							</div>
						</div>
						@endif
				</li>
				@endforeach
		 </ul> 
	</div>
</div>
</div>
