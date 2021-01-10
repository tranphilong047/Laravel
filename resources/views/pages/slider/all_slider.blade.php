@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Tất Cả Banner
    </div>
<div class="table-responsive">
<h3>Tất Cả Banner</h3>
<table class="table table-striped b-t b-light">
<thead>
  <tr>
    <th style="width:20px;">
      <label class="i-checks m-b-none">
        <input type="checkbox"><i></i>
      </label>
    </th>
    <th>Tên Banner</th>
    <th>Hình ảnh</th>
    <th>Trạng thái</th>
    <th>Quản lý</th>
    <th style="width:30px;"></th>
  </tr>
</thead>
<tbody>
  @foreach ($all_slider as $key =>$slider)
      <tr>
        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
      <td>{{$slider->slider_name}}</td> 
      <td> <img src="public/uploads/slider/{{$slider->slider_image}}" height="150" width="600"></td>

        <td><span class="text-ellipsis">
              <?php
                if ($slider->slider_status==0) {
              ?>
                <a href="{{URL::to('/unactive-slider/'.$slider->slider_id)}}"><span class="fa-thumb-styling fa fa-thumbs-o-down"></span></a>
              <?php
              }else {
              ?>
                <a href="{{URL::to('/active-slider/'.$slider->slider_id)}}"><span class="fa-thumb-styling fa fa-thumbs-o-up"></span></a>
              <?php
              }
              ?>
        </span></td>
        <td>
          <a href="{{URL::to('/edit-slider/'.$slider->slider_id)}}" class="active styling-edit" ui-toggle-class="">
            <i class="fa fa-pencil-square-o text-success text-active"></i>
          </a>
          <a onclick="return confirm('Bạn có chắc muốn xóa Banner :)))')" href="{{URL::to('/delete-slider/'.$slider->slider_id)}}" class="active styling-edit" ui-toggle-class="">
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


