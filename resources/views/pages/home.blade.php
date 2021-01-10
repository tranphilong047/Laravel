@extends('layout')
@section('content')

<ul class="resp-tabs-list">
    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Sản Phẩm Mới</span></li> 
</ul>
<div class="resp-tabs-container">
    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
        @foreach ($all_product as $key=>$pro)
            <div class="col-md-3 product-men">
                <div class="men-pro-item simpleCart_shelfItem">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$pro->product_id}}" class="cart_product_id_{{$pro->product_id}}">
                        <input type="hidden" value="{{$pro->product_name}}" class="cart_product_name_{{$pro->product_id}}">
                        <input type="hidden" value="{{$pro->product_image}}" class="cart_product_image_{{$pro->product_id}}">
                        <input type="hidden" value="{{$pro->product_price}}" class="cart_product_price_{{$pro->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$pro->product_id}}">
                        <div class="men-thumb-item">
                            <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" class="pro-image-front">
                            <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}" class="link-product-add-cart">Chi Tiết</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>
                                
                        </div>
                        <div class="item-info-product ">
                            <h4><a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">{{$pro->product_name}}</a></h4>
                            <div class="info-product-price">
                                <span class="item_price">{{number_format($pro->product_price).' '.'VNĐ'}}</span>
                            </div>
                            <button type="button" class="item_add single-item hvr-outline-out add-to-cart" data-id_product="{{$pro->product_id}}" 
                                name="add-to-cart" value="">Thêm Vào Giỏ</button>									
                        </div>
                    </form>
                    
                </div>
            </div>
        @endforeach
        <div class="clearfix"></div>
    </div>
</div>

@endsection

