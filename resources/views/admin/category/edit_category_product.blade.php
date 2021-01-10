@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhật Danh Mục Sản Phẩm
                </header>
                <div class="panel-body">
                    @foreach ($edit_category_product as $key => $edit_value)
                        <div class="position-center">
                        <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{$edit_value->category_name}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize:none" rows="5" type="text" name="category_product_desc" class="form-control" id="ckeditor1" placeholder="Mô tả danh mục">{{$edit_value->category_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa danh mục</label>
                            <textarea style="resize:none" rows="5" type="text" name="category_product_keywords" class="form-control" id="ckeditor2" placeholder="Từ khóa danh mục">{{$edit_value->meta_keywords}}</textarea>
                        </div>  
                        <button type="submit" name="update_category_product" class="btn btn-info">Cập Nhật</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
@endsection


