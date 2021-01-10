@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhât Banner
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($edit_slider as $key=>$slider)
                        <form role="form" action="{{URL::to('/update-slider/'.$slider->slider_id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Banner</label>
                            <input type="text" name="slider_name" class="form-control" id="exampleInputEmail1" value="{{$slider->slider_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh Banner</label>
                            <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1">
                            <img src="{{URL::to('public/uploads/slider/'.$slider->slider_image)}}" height="100" width="150">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả Banner</label>
                            <textarea style="resize:none" rows="5" type="text" name="slider_desc" class="form-control" id="ckeditor1" >{{$slider->slider_desc}}</textarea>
                        </div>
                        
            
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="slider_status" class="form-control input-sm m-bot15">
                                @if ($slider->slider_status == 1)
                                        <option selected value="{{$slider->slider_status}}">Hiện thị</option>
                                @else
                                        <option value="{{$slider->slider_status}}">Ẩn</option>
                                 @endif
                            </select>
                        </div>
                        <button type="submit" name="add_slider" class="btn btn-info">Cập nhật</button>
                    </form>
                        @endforeach
                    </div>
                </div>
            </section>

    </div>
@endsection


