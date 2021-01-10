@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhât Sản Phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($edit_product as $key=>$pro)
                        <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                            <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100" width="150">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize:none" rows="5" type="text" name="product_desc" class="form-control" id="ckeditor1" >{{$pro->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize:none" rows="5" type="text" name="product_content" class="form-control" id="ckeditor2" >{{$pro->product_content}}</textarea>
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="category_product" class="form-control input-sm m-bot15">
                                @foreach ($category_product as $key => $category)
                                    @if ($category->category_id == $pro->category_id)
                                        <option selected value="{{$category->category_id}}" >{{$category->category_name}}</option>
                                    @else
                                        <option value="{{$category->category_id}}" >{{$category->category_name}}</option>
                                    @endif
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu</label>
                            <select name="brand_product" class="form-control input-sm m-bot15">
                                @foreach ($brand_product as $key => $brand)
                                    @if ($brand->brand_id == $pro->brand_id)
                                        <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @else
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endif
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                @if ($pro->product_status == 1)
                                        <option selected value="{{$pro->product_status}}">Hiện thị</option>
                                @else
                                        <option value="{{$pro->product_status}}">Ẩn</option>
                                 @endif
                            </select>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                    </form>
                        @endforeach
                    </div>
                </div>
            </section>

    </div>
@endsection


