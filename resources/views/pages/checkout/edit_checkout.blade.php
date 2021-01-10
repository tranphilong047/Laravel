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
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Thông tin nhận hàng</p>
                        <div class="form-one">
                            @foreach ($sua_thong_tin as $key=>$edit)
                            <form action="{{url('/update-shipping/'.$edit->shipping_id)}}" method="POST">
                                @csrf
                                <input type="text" value="{{$edit->shipping_email}}" name="shipping_email" placeholder="Email*">
                                <input type="text" value="{{$edit->shipping_name}}" name="shipping_name" placeholder="Họ và tên *">
                                <input type="text" value="{{$edit->shipping_address}}" name="shipping_address" placeholder="Địa chỉ*">
                                <input type="text" value="{{$edit->shipping_phone}}" name="shipping_phone" placeholder="Số điện thoại*">
                                <textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng của bạn" rows="16">{{$edit->shipping_notes}}</textarea>
                                <input type="submit" value="Cập Nhật" name="send_order" class="btn btn-primary btn-sm">
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>			
            </div>
        </div>
    </div>
</section> <!--/#cart_items-->

@endsection