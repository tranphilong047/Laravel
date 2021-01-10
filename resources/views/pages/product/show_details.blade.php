@extends('layout')
@section('content')
@foreach ($product_details as $key => $value)
<!-- single -->
<div class="single">
	<div class="container">
		<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<!-- FlexSlider -->
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
					<ul class="slides">
						<li data-thumb="{{URL::to('public/uploads/product/'.$value->product_image)}}">
							<div class="thumb-image"> <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
                    <h3>{{$value->product_name}}</h3>
                    <div class="color-quality">
						<h5>Thương Hiệu: {{$value->brand_name}}</h5>
                    </div>
                    <div class="color-quality">
						<h5>Danh Mục : {{$value->category_name}}</h5>
                    </div>
                    <div class="rating1">
                        <span class="starRating">
                            <input id="rating5" type="radio" name="rating" value="5"checked="">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3" >
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                        </span>
                    </div>
                    <div class="fb-like" data-href="http://localhost:8000/chi-tiet-san-pham/{{$value->product_id}}" 
                        data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true">
                    </div>
                    <form action="{{url('/save-cart')}}">
                        @csrf
                        <span>
                            <p><span class="item_price">{{number_format($value->product_price).' '.'VNĐ'}}</span>
                            <div class="color-quality">
                                <div class="color-quality-right">
                                    <h5>Số Lượng :</h5>
                                    <input name="qty" type="number" min="1" value="1" />
                                    <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                                    <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                                    <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                                    <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                    <input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">
                                    <div class="occasion-cart">
                                        <button type="button" class="item_add hvr-outline-out add-to-cart" data-id_product="{{$value->product_id}}" 
                                        name="add-to-cart" value="">Thêm Vào Giỏ</button>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </form>
					
		</div>
            <div class="clearfix"> </div>
            <div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Mô tả</a></li>
        
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                            <p>{!!$value->product_desc!!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fb-comments" data-href="http://localhost:8000/chi-tiet-san-pham/{{$value->product_id}}" data-numposts="10" data-width=""></div>
	</div>
</div>
@endforeach
<!-- //single -->
@endsection