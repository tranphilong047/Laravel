@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật mã giảm giá
                </header>
                <div class="panel-body">
                    @foreach ($edit_coupon as $key => $coupone)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-coupon/'.$coupone->coupon_id)}}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                <input type="text" value="{{$coupone->coupon_name}}" name="coupon_name" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mã giảm giá</label>
                                <input type="text" value="{{$coupone->coupon_code}}" name="coupon_code" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng mã giảm giá</label>
                                <input type="text" value="{{$coupone->coupon_time}}" name="coupon_time" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">tính năng mã giảm giá</label>
                                <select name="coupon_condition" class="form-control input-sm m-bot15">
                                    <?php
                                        if($coupone->coupon_condition == 1){
                                    ?>
                                        <option value="1">Giảm theo %</option>
                                    <?php
                                    }elseif ($coupone->coupon_condition == 2) {
                                    ?>
                                       <option value="2">Giảm theo tiền</option>
                                    <?php
                                    }else {
                                    ?>    
                                        <option value="0">---chọn---</option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số % giảm giá hoặc số tiền giảm</label>
                                <input type="text" value="{{$coupone->coupon_number}}" name="coupon_number" class="form-control" id="exampleInputEmail1">
                            </div>
                           
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<p class="text-alert">'.$message.'</p>';
                                    Session::put('message',null);
                                }
                            ?>
                            <button type="submit" name="add_coupon" class="btn btn-info">Cập Nhật</button>
                        </form>
                        </div>
                    @endforeach
                </div>
                </div>
            </section>

    </div>
@endsection


