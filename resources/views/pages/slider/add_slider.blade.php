@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Banner
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-slider')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Banner</label>
                            <input data-validation="lenght" data-validation-lenght="max 5"
                            data-validation-error-msg="Nhập trên 5 ký tự" type="text" name="slider_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Banner">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh Banner</label>
                            <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả Banner</label>
                            <textarea style="resize:none" rows="5" type="text" name="slider_desc" class="form-control" id="ckeditor1" placeholder="Mô tả Banner"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="slider_status" class="form-control input-sm m-bot15">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" name="add_silder" class="btn btn-info">Thêm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection


