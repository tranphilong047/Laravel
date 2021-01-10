@extends('layout')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
                <li class="active">Thanh Toán Giỏ Hàng</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <form action="{{url('/update-cart')}}" method="POST">
                @csrf
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình Ảnh </td>
                        <td class="description">Tên Sản Phẩm</td>
                        <td class="quantity">Số Lượng</td>
                        <td class="total">Thành Tiền</td>
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
                            <img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}"/>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$cart['product_name']}}</a></h4>
                                <p></p>
                            </td>
                            <td class="cart_quantity">
                                <p>{{$cart['product_qty']}}</p> 
                            </td>
                            <td class="cart_total">
                                <p>{{number_format($subtotal,0,',','.')}}đ</p>
                            </td>
                            <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                                            
                    @endforeach
                    <tr>
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
                        <td><h3 style="color: red">ĐƠN HÀNG ĐANG ĐƯỢC XỬ LÝ</h3></td>
                        
                    </tr>
                </tbody>
                @endif
            </form>
            </table>
        
        </div>
        
    
    </div>
</section> <!--/#cart_items-->

@endsection