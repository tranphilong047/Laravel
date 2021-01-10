<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Coupon;
use DB;
session_start();

class CouponController extends Controller
{
    public function insert_coupon(){
        return view('admin.coupon.insert_coupon');
    }
    public function insert_coupon_code(Request $request){
        $data = array();
        $data['coupon_name'] = $request->coupon_name;
        $data['coupon_number'] = $request->coupon_number;
        $data['coupon_code'] = $request->coupon_code;
        $data['coupon_time'] = $request->coupon_time;
        $data['coupon_condition'] = $request->coupon_condition;

        DB::table('tbl_coupon')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('insert-coupon');
    }
    public function list_coupon()
    {
        $list_coupon = DB::table('tbl_coupon')->get();
        $message_coupon = view('admin.coupon.list_coupon')->with('list_coupon',$list_coupon);
        return  view('admin_layout')->with('acoupon.list_coupon',$message_coupon);
    }
    //sửa mã
    public function edit_coupon($coupon_id){
        $edit_coupon = DB::table('tbl_coupon')->where('coupon_id',$coupon_id)->get();
        $message_coupon = view('admin.coupon.edit_coupon')->with('edit_coupon',$edit_coupon);
        return  view('admin_layout')->with('admin.coupon.edit_coupon',$message_coupon);
    }
    public function update_coupon(Request $request,$coupon_id){
        $data = array();
        $data['coupon_name'] = $request->coupon_name;
        $data['coupon_number'] = $request->coupon_number;
        $data['coupon_code'] = $request->coupon_code;
        $data['coupon_time'] = $request->coupon_time;
        $data['coupon_condition'] = $request->coupon_condition;

        DB::table('tbl_coupon')->where('coupon_id',$coupon_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('list-coupon');
    }
    //xóa mã
    public function delete_coupon($coupon_id){
        DB::table('tbl_coupon')->where('coupon_id',$coupon_id)->delete();
        Session::put('message','Đã xóa');
        return Redirect::to('list-coupon');
    }
    //hủy mã giảm giá
    public function unset_coupon(){
        $coupon = Session::get('coupon');
        if($coupon == true){
            Session::forget('coupon');
            return redirect()->back();
        }
    }
}
