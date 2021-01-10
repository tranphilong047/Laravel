@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Tất Cả Mã Giảm Giá
    </div>
    <div class="row w3-res-tb">
    <div class="col-sm-5 m-b-xs">
      <h3>Tất Cả Mã Giảm Giá</h3>                
</div>
<div class="col-sm-4">
</div>
<div class="col-sm-3">
<div class="input-group">
  
</div>
</div>
</div>
<div class="table-responsive">
<table class="table table-striped b-t b-light">
<thead>
  <tr>
    <th style="width:20px;">
      <label class="i-checks m-b-none">
      </label>
    </th>
    <th>Tên Mã</th>
    <th>Mã</th>
    <th>Số Lượng Mã</th>
    <th>Loại mã</th>
    <th>Số tiền|số %</th>
    <th>Quản lý</th>
    <th style="width:10px;"></th>
  </tr>
</thead>
<tbody>
  @foreach ($list_coupon as $key =>$coupon)
        <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$coupon->coupon_name}}</td>               
            <td>{{$coupon->coupon_code}}</td>
            <td>{{$coupon->coupon_time}}</td>

            <td><span class="text-ellipsis">
                <?php
                  if ($coupon->coupon_condition==1) {
                ?>
                  <a>Giảm theo %</a>
                <?php
                }else {
                ?>
                  <a>Giảm theo tiền</a>
                <?php
                }
                ?>
               </span>
            </td>
            
            <td>{{$coupon->coupon_number}}</td>
         
        <td>
          <a href="{{URL::to('/edit-coupon/'.$coupon->coupon_id)}}" class="active styling-edit" ui-toggle-class="">
            <i class="fa fa-pencil-square-o text-success text-active"></i>
          </a>
          <a onclick="return confirm('Bạn có chắc muốn xóa mã giảm giá :)))')" href="{{URL::to('/delete-coupon/'.$coupon->coupon_id)}}" class="active styling-edit" ui-toggle-class="">
            <i class="fa fa-times text-danger text"></i>
          </a>
        </td>
    </tr>
  @endforeach
  
</tbody>
</table>
</div>
<footer class="panel-footer">
<div class="row">

<div class="col-sm-5 text-center">
  <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
</div>
<div class="col-sm-7 text-right text-center-xs">                
  <ul class="pagination pagination-sm m-t-none m-b-none">
    <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
    <li><a href="">1</a></li>
    <li><a href="">2</a></li>
    <li><a href="">3</a></li>
    <li><a href="">4</a></li>
    <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
  </ul>
</div>
</div>
</footer>
</div>
</div>
@endsection


