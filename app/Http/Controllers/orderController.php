<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class orderController extends Controller
{
    public function list_order(){
        $list_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
        ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        ->get();
        $message_order = view('admin.order.list_order')->with('list_order',$list_order);
        return  view('admin_layout')->with('admin.order.list_order',$message_order);
    }
    public function delete_order($order_id){
        DB::table('tbl_order')->where('order_id',$order_id)->delete();
        Session::put('message','Đã xóa');
        return Redirect::to('list-order');
    }
    public function chi_tiet_hoa_don($order_id){
        $details_order = DB::table('tbl_order_details')
        ->join('tbl_product','tbl_product.product_id','=','tbl_order_details.product_id')->where('order_id',$order_id)->get();
        $message_details_order = view('admin.order.details_order')->with('details_order',$details_order);
        return  view('admin_layout')->with('admin.order.details_order',$message_details_order);
    }
    public function delete_product_details($order_details_id){
        DB::table('tbl_order_details')->where('order_details_id',$order_details_id)->delete();
        return Redirect::to('list-order');
    }
    
}
