@extends('layout')
@section('content')
<!--/#cart_items-->
<style>
.textcolor{
	color: rgb(255, 0, 0);
}	
</style>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
                <li class="active">Giỏ Hàng Của Bạn</li>
            </ol>
        </div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
        <div class="table-responsive cart_info">
            <form action="{{url('/update-cart')}}" method="POST">
                @csrf
                <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình Ảnh </td>
                        <td class="description">Tên Sản Phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số Lượng</td>
						<td class="total">Thành Tiền</td>
						<td class="delete">Quản Lý</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @if (Session::get('cart'))

                            @php
                                $total =0;   
                            @endphp  
                            @foreach (Session::get('cart') as $key => $cart)
                                @php  
                                    $subtotal =$cart['product_price']*$cart['product_qty'];   
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    <td class="cart_product">
                                    <img class="textcolor" src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="150" alt="{{$cart['product_name']}}"/>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{$cart['product_name']}}</a></h4>
                                        <p></p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            
                                                <input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                                                
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p>{{number_format($subtotal,0,',','.')}}đ</p>
                                    </td>
                                    <td class="cart_delete">
										<a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><p class="textcolor">Xóa</p></a>
                                    </td>
                                </tr>
                                            
                            @endforeach
                            <tr>
                                <td>
                                    <input type="submit" value="Cập Nhật Giỏ Hàng" name="update_qty" class="check_out btn btn-default btn-sm">
                                    
                                </td>
                                <td>
                                    <?php
                                        $shipping_id =Session::get('shipping_id');
                                    ?>
                                    <a class="btn btn-default check_out" href="{{url('/sua-thong-tin/'.$shipping_id)}}">Thông tin nhận hàng</a>
                                </td>
                                <td>
                                    @if (Session::get('coupon'))
                                        <a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Hủy mã</a>
                                    @endif
                                </td>
                                
                                <td>
                                    <li>Tổng tiền :<span>{{number_format($total,0,',','.')}}đ</span></li>
                                    @if (Session::get('coupon'))
                                    <li>
                                            @foreach (Session::get('coupon') as $key=>$cou)
                                                @if ($cou['coupon_condition']==1)
                                                    Mã giảm : {{$cou['coupon_number']}}%
                                                    <p>
                                                        @php
                                                            $total_coupon = ($total*$cou['coupon_number'])/100;
                                                            echo '<p><li>Tiền giảm: '.number_format($total_coupon,0,',','.').'đ</li></p>';
                                                        @endphp
                                                    </p>
                                                    <p><li>Tổng tiền:{{number_format($total-$total_coupon,0,',','.')}}đ</li></p>
                                                @elseif($cou['coupon_condition']==2)
                                                    Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}}đ
                                                    <p>
                                                        @php
                                                            $total_coupon = $total - $cou['coupon_number'];
                                                        @endphp
                                                    </p>
                                                    <p><li>Tổng tiền: {{number_format($total_coupon,0,',','.')}}đ</li></p>
                                                @endif
                                            @endforeach
                                    </li>
                                    @endif
                                </td>
                                <td>
                                    <?php
                                        $customer_id =Session::get('customer_id');
                                        $shipping_id =Session::get('shipping_id');
                                        if ($customer_id != Null && $shipping_id == Null) {
                                    ?>
                                        <a class="btn btn-default check_out" href="{{url('/checkout')}}">Thanh Toán</a>
                                    <?php
                                        }elseif($customer_id != Null && $shipping_id != Null){
                                    ?>
                                        <a class="btn btn-default check_out" href="{{url('/order-place')}}">Thanh Toán</a>
                                    <?php
                                        }else {
                                    ?>
                                        <a class="btn btn-default check_out" href="{{url('/login-checkout')}}">Thanh Toán</a>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Hủy giỏ hàng</a>
                                </td>
                            </tr>
                        </tbody>
                    @else
                <tr>
                    <td colspan="5">
                        <center>
                         @php
                        echo 'Thêm sản phẩm vào giỏ hàng'
                        @endphp
                        </center>
                        
                    </td>
                   
                </tr>
                @endif
                
                </form>
                @if (Session::get('cart'))
                    <tr>
                        <td>
                            <form method="POST" action="{{url('/check-coupon')}}">
                                @csrf
                                <input type="text" class="from-control" name="coupon" placeholder="Nhập giảm giá"><br>
                                <input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">
                            </form>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

@endsection

