@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Tất Cả Sản Phẩm
    </div>
    <div class="row w3-res-tb">
    <div class="col-sm-5 m-b-xs">
    <h3>Tất Cả Sản Phẩm</h3>    
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
    <th>Tên Sản Phẩm</th>
    <th>Giá</th>
    <th>Hinh Ảnh</th>
    <th>Danh Mục</th>
    <th>Hãng</th>
    <th>Trạng Thái</th>
    <th>Quản lý</th>
    <th style="width:10px;"></th>
  </tr>
</thead>
<tbody>
  @foreach ($all_product as $key =>$pro)
        <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$pro->product_name}}</td>         
            <td>{{$pro->product_price}}</td> 
            <td> <img src="public/uploads/product/{{$pro->product_image}}" height="100px" width="100px"></td>         
            <td>{{$pro->category_name}}</td>
            <td>{{$pro->brand_name}}</td>
         
        
          <td><span class="text-ellipsis">
              <?php
                if ($pro->product_status==0) {
              ?>
                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-o-down"></span></a>
              <?php
              }else {
              ?>
                <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-o-up"></span></a>
              <?php
              }
              ?>
             </span>
        </td>
        <td>
          <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
            <i class="fa fa-pencil-square-o text-success text-active"></i>
          </a>
          <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm :)))')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
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


