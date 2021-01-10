@extends('layout')
@section('content')
<form action="{{url('/save-checkout-customer')}}" method="POST">
    @csrf
    <h3 class="bars">Thông Tin Nhận Hàng</h3>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Email</span>
        <input type="text" name="shipping_email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Tên </span>
        <input type="text" name="shipping_name" class="form-control" placeholder="Tên Người Nhận" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Địa Chỉ</span>
        <input type="text" name="shipping_address" class="form-control" placeholder="Địa Chỉ Nhận Hàng" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Phone</span>
        <input type="text" name="shipping_phone" class="form-control" placeholder="Số Điện Thoại" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Lưu Ý</span>
        <textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng của bạn" rows="10" cols="120"></textarea>
    </div>
    <input type="submit" value="Hoàn Tất" name="send_order" class="btn btn-primary btn-sm">
</form>
  
@endsection