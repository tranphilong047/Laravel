@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Tất Cả Hóa Đơn
    </div>
<div class="table-responsive">
<h3>Tất Cả Hóa Đơn</h3>  
<table class="table table-striped b-t b-light">
<thead>
  <tr>
    <th style="width:20px;">
      <label class="i-checks m-b-none">
      </label>
    </th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ khách hàng</th>
    <th>Trạng thái</th>
    <th>Chi tiết hóa đơn</th>
    <th>Xóa hóa đơn</th>
    <th style="width:10px;"></th>
  </tr>
</thead>
<tbody>
  @foreach ($list_order as $key =>$order)
        <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$order->customer_name}}</td>         
            <td>{{$order->shipping_address}}</td>     
            <td>{{$order->order_status}}</td>
            <td>
              <a href="{{URL::to('/chi-tiet-hoa-don/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
             </td>
            <td>
              <a onclick="return confirm('Bạn có chắc muốn xóa hóa đơn :)))')" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
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
@endsection


