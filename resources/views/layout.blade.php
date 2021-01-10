
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{-- seo --}}
	<meta name="description" content="{{$meta_desc}}">
	<meta name="keywords" content="{{$meta_keywords}}"/>
	<meta name="robots" content="INDEX,FOLLOW"/>
	<link  rel="icon" type="image/x-icon" href="{{('../frontend/images/icontital.png')}}" />
	<link  rel="canonical" href="{{$meta_canonical}}" />
	<meta name="author" content="">
	{{-- seo --}}

    <title>{{$meta_title}}</title>

<!-- for-mobile-apps -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- pignose css -->
<link href="{{asset('frontend/css/pignose.layerslider.css')}}" rel="stylesheet" type="text/css" media="all" />

<link href="{{asset('frontend/css/sweetalert.css')}}" rel="stylesheet">

<!-- //pignose css -->
<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="{{asset('frontend/js/jquery-2.1.4.min.js')}}"></script>
<!-- //js -->
<!-- cart -->
	<script src="{{asset('frontend/js/simpleCart.min.js')}}"></script>
<!-- cart -->
<!-- for bootstrap working -->
	<script type="text/javascript" src="{{asset('frontend/js/bootstrap-3.1.1.min.js')}}"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="{{asset('frontend/js/jquery.easing.min.js')}}"></script>
</head>
<body>
<!-- header -->
<div class="header">
	<div class="container">
		<ul>
			<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Giao Hàng Tốc Độ</li>
			<li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Miễn Phí Giao Hàng</li>
			<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">tranphilong047@gmail.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="{{URL::to('/home')}}"><img src="{{asset('/frontend/images/logoday.png')}}"></a></h1>
		</div>
		<div class="col-md-6 header-middle">
			<form action="{{url('/tim-kiem')}}" method="POST">
				@csrf
				<div class="search">
					<input type="search" value="Tìm Kiếm" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
				</div>
				<div class="sear-sub">
					<input type="submit" value="">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="col-md-3 header-right footer-bottom">
			<ul>
				{{-- <li><a href="hhh" class="use1"><span>Login</span></a></li> --}}
				<?php
				$customer_id = Session::get('customer_id');
				if ($customer_id != Null) {
				?>
				<li><a href="{{URL::to('/logout-checkout')}}" class="use1" data-toggle="modal" data-target="#myModal4"><span> Đăng Xuất</span></a></li>
				<?php
				}else{
				?>	
				<li><a href="{{URL::to('/login-checkout')}}" class="use1" data-toggle="modal" data-target="#myModal4"><span>Đăng nhập</span> </a></li>
				<?php
				}
				?>
			
				<li><a class="fb" href="#"></a></li>
				<li><a class="twi" href="#"></a></li>
				<li><a class="insta" href="#"></a></li>
				<li><a class="you" href="#"></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="{{URL::to('/home')}}">Trang Chủ <span class="sr-only"></span></a></li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Thương Hiệu<span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="{{URL::to('/home')}}"><img src="{{asset('frontend/images/nen1.jpg')}}" alt=" "/></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											@foreach ($brand as $key => $brand)
											<li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
											@endforeach
											
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Danh Mục<span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											@foreach ($category as $key => $cate)
												<li><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
											@endforeach
											
										</ul>
									</div>
									<div class="col-sm-6 multi-gd-img multi-gd-text ">
										<a href="{{URL::to('/home')}}"><img src="{{asset('frontend/images/nen.jpg')}}" alt=" "/></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class=" menu__item"><a class="menu__link" href="electronics.html">Chính Sách</a></li>
					<li class=" menu__item"><a class="menu__link" href="codes.html">Thông Tin</a></li>
					<li class=" menu__item"><a class="menu__link" href="contact.html">Địa Chỉ</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="cart box_1">
						<a href="{{URL::to('/save-cart')}}">
							<h3> <div class="total">
								<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
								</div>
							</h3>
						</a>
						<p><a href="{{URL::to('/save-cart')}}" class="simpleCart_empty">Giỏ Hàng</a></p>
						
			</div>	
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- banner -->
<div class="banner-grid">
	<div id="visual">
			<div class="slide-visual">
				<!-- Slide Image Area (1000 x 424) -->
				<ul class="slide-group">
					<li><img class="img-responsive" src="{{asset('frontend/images/baner1.jpg')}}" height="424" width="1000" alt="Dummy Image" /></li>
					<li><img class="img-responsive" src="{{asset('frontend/images/baner2.jpg')}}" height="424" width="1000" alt="Dummy Image" /></li>
					<li><img class="img-responsive" src="{{asset('frontend/images/baner3.jpg')}}" height="424" width="1000" alt="Dummy Image" /></li>
				</ul>

				<!-- Slide Description Image Area (316 x 328) -->
				<div class="script-wrap">
					<ul class="script-group">
						<li><div class="inner-script"><img class="img-responsive" src="{{asset('frontend/images/baner1.jpg')}}" height="328" width="316"  alt="Dummy Image" /></div></li>
						<li><div class="inner-script"><img class="img-responsive" src="{{asset('frontend/images/baner2.jpg')}}" height="328" width="316"  alt="Dummy Image" /></div></li>
						<li><div class="inner-script"><img class="img-responsive" src="{{asset('frontend/images/baner3.jpg')}}" height="328" width="316"  alt="Dummy Image" /></div></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	<script type="text/javascript" src="{{asset('frontend/js/pignose.layerslider.js')}}"></script>
	<script type="text/javascript">
	//<![CDATA[
		$(window).load(function() {
			$('#visual').pignoseLayerSlider({
				play    : '.btn-play',
				pause   : '.btn-pause',
				next    : '.btn-next',
				prev    : '.btn-prev'
			});
		});
	//]]>
	</script>

</div>
<!-- //banner -->
<!-- product-nav -->

<div class="product-easy">
	<div class="container">
		<script src="{{asset('frontend/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
		<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default',     
									width: 'auto',
									fit: true   
								});
							});
							
		</script>
		<div class="sap_tabs">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				@yield('content')	
			</div>
		</div>
	</div>
</div>

<!-- //product-nav -->
{{-- {{-- <!-- footer -->
<div class="footer"> --}}
	<div class="container">
		<div class="col-md-3 footer-left">
			<h2><a href="{{URL::to('/home')}}"><img src="{{asset('/frontend/images/logoday.png')}}" alt=" " /></a></h2>
			<p>Trải Nghiện Phong Cách Mới.</p>
		</div>
		<div class="col-md-9 footer-right">
			<div class="col-sm-6 newsleft">
				<h3>Nhập Email thông báo mới !</h3>
			</div>
			<div class="col-sm-6 newsright">
				<form >
					<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="Submit">
				</form>
			</div>
			<div class="clearfix"></div>
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Information</h4>
					<ul>
						<li><a href="index.html">Trang Chủ</a></li>
						<li><a href="mens.html">Hãng</a></li>
						<li><a href="womens.html">Danh Mục</a></li>
					
					</ul>
				</div>
				
				<div class="col-md-4 sign-gd-two">
					<h4>Thông Tin</h4>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Địa Chỉ : Quận 9, TP.HCM</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : tranphilong047@gmail.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Số Điện Thoại : 0382965484</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		<p class="copy-right">Layout copy | Design by TranPhiLong</p>
	</div>
</div>
<!-- //footer --> --}}
{{-- login --}}
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            
        </div>
    </div>
</div>
{{-- endlogin --}}
	<script src="{{asset('frontend/js/sweetalert.js')}}"></script>
	<script src="{{asset('frontend/js/api.js')}}"></script>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" 
	src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=191246831803128&autoLogAppEvents=1" 
	nonce="3KQLU1O4"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('.add-to-cart').click(function(){
				var id = $(this).data('id_product');
				var cart_product_id = $('.cart_product_id_'+ id).val();
				var cart_product_name = $('.cart_product_name_'+ id).val();
				var cart_product_image = $('.cart_product_image_'+ id).val();
				var cart_product_price = $('.cart_product_price_'+ id).val();
				var cart_product_qty = $('.cart_product_qty_'+ id).val();
				var _token = $('input[name = "_token"]').val();

				$.ajax({
					url:'{{url('/add-cart-ajax')}}',
					method: 'POST',
					data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,
						cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
					success:function(data){
						swal("Hoàn Tất!", "Tiếp Tục Mua Hàng!", "success", {
							button: "Aww yiss!",
							});
					}
				});
			});
		});
	</script>
</body>
</html>
