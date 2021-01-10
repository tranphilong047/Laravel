<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Coupon;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }
        Session::save();
    }
    public function save_cart(Request $request){
        //seo 
        $meta_desc = "Giỏ hàng của bạn"; 
        $meta_keywords = "Giỏ hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();
        //--seo
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        
        $data = DB::table('tbl_product')->where('product_id',$productId)->get();


        
        return view('pages.cart.show_cart')->with('category',$category_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
         ->with('meta_title',$meta_title)->with('meta_canonical',$url_canonical);
    
    }
    public function show_cart(Request $request){
        //slider
        $slider = DB::table('tbl_slider')->where('slider_status','1')->orderby('slider_id','desc')->take(3)->get();
        
        //seo 
         $meta_desc = "Giỏ hàng của bạn"; 
         $meta_keywords = "Giỏ hàng";
         $meta_title = "Giỏ hàng";
         $url_canonical = $request->url();
         //--seo
         $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
         $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
 
         return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)
         ->with('slider',$slider)
         ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
         ->with('meta_title',$meta_title)->with('meta_canonical',$url_canonical);
    }
    public function delete_product($session_id)
    {
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($cart as $key => $val) {
                if ($val['session_id']==$session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back();
        }else{
            return redirect()->back();
        }

    }
    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $val) {
                    if ($val['session_id']==$key) {
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
    public function delete_all_product(){
        $cart = Session::get('cart');
        if($cart == true){
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back();
        }
    }
    public function check_coupon(Request $request){
        $data = $request->all();
        
        $coupon = DB::table('tbl_coupon')->where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $count_coupon = DB::table('tbl_coupon')->count();
            if($count_coupon>0){
                $count_session = Session::get('coupon');
                if($count_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable ==0){
                        $cou[] = array(
                            'coupon_code' =>$coupon->coupon_code,
                            'coupon_condition' =>$coupon->coupon_condition,
                            'coupon_number' =>$coupon->coupon_number,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code' =>$coupon->coupon_code,
                        'coupon_condition' =>$coupon->coupon_condition,
                        'coupon_number' =>$coupon->coupon_number,
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Thêm mã giảm giá thành công');
            }
        }else{
            return redirect()->back()->with('error','Mã giảm giá không tồn tại');
        }
    }
    
}
