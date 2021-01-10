@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật Thương Hiệu Sản Phẩm
                </header>
                <div class="panel-body">
                    @foreach ($edit_brand_product as $key => $edit_value)
                        <div class="position-center">
                        <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize:none" rows="5" type="text" name="brand_product_desc" class="form-control" id="ckeditor1" placeholder="Mô tả thương hiệu">{{$edit_value->brand_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ Khóa thương hiệu</label>
                            <textarea style="resize:none" rows="5" type="text" name="brand_product_keywords" class="form-control" id="ckeditor2" placeholder="Từ khóa thương hiệu">{{$edit_value->meta_keywords}}</textarea>
                        </div>
                        <button type="submit" name="update_brand_product" class="btn btn-info">Cập Nhật</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
@endsection


