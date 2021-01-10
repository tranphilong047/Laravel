@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Chi Tiết Hóa Đơn
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
            <thead>
                <tr>
                    <th style="width:20px;">
                    <label class="i-checks m-b-none">
                    </label>
                    </th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giảm Giá</th>
                    <th>Quản Lý</th>
                    <th style="width:10px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details_order as $key =>$details)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$details->product_name}}</td>         
                        <td>{{$details->product_price}}</td>     
                        <td>{{$details->product_sales_quantity}}</td>
                        <td>{{$details->product_coupon}}</td>
                        <td>
                        <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này :)))')" href="{{URL::to('/delete-product-details/'.$details->order_details_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-times text-danger text"></i>
                        </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
{{-- tổng giá trị đơn hàng --}}
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Tổng giá trị đơn hàng
         </div>
         <tbody>
            @php
            $total =0;   
             @endphp 
            @foreach ($details_order as $key =>$details)
                @php  
                    $subtotal = $details->product_price * $details->product_sales_quantity;   
                    $total += $subtotal;
                @endphp
            @endforeach
            
            <tr>
                <td>
                    <li>Tạm Tính :<span>{{number_format($total,0,',','.')}}đ</span></li>
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
            </tr>
        </tbody>
        
</div>
</div>
@endsection


