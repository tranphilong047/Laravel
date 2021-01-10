<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Validator;
use App\Rules\Captcha;

class CheckoutController extends Controller
{
    public function login_checkout(Request $request)
    {

        //seo 
        $meta_desc = "Đăng nhập thanh toán"; 
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();
        //--seo 

        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.checkout.login_checkout')->with('category',$category_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('meta_canonical',$url_canonical);
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name',$request->customer_name);

        return Redirect('/checkout');
    }
    public function checkout(Request $request){
         //seo 
         $meta_desc = "Đăng nhập thanh toán"; 
         $meta_keywords = "Đăng nhập thanh toán";
         $meta_title = "Đăng nhập thanh toán";
         $url_canonical = $request->url();
         //--seo 

        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.checkout.show_checkout')->with('category',$category_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('meta_canonical',$url_canonical);
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);
        return Redirect('/payment');
    }
    public function sua_thong_tin($shipping_id,Request $request){
        //seo 
        $meta_desc = "Thông tin nhận hàng"; 
        $meta_keywords = "Thông tin nhận hàng";
        $meta_title = "Thông tin nhận hàng";
        $url_canonical = $request->url();
        //--seo
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();


        $sua_thong_tin = DB::table('tbl_shipping')->where('shipping_id',$shipping_id)->get();

        return  view('pages.checkout.edit_checkout')
        ->with('sua_thong_tin',$sua_thong_tin)
        ->with('category',$category_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('meta_canonical',$url_canonical);
    }
    public function update_shipping(Request $request,$shipping_id){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;
        DB::table('tbl_shipping')->where('shipping_id',$shipping_id)->update($data);
        return Redirect('/save-cart');
    }
    public function payment(Request $request){
        //seo 
        $meta_desc = "Xử lý giỏ hàng"; 
        $meta_keywords = "Xử lý giỏ hàng";
        $meta_title = "Xử lý giỏ hàng";
        $url_canonical = $request->url();
        //--seo 

        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        return view('pages.checkout.payment')->with('category',$category_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('meta_canonical',$url_canonical);
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect('/login-checkout');
    }
    public function login_customer(Request $request){

        $data = $request->validate([
            'email_account' => 'required',
            'password_account' => 'required',
           'g-recaptcha-response' => new Captcha(), //dòng kiểm tra Captcha
        ]);

        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();

        Session::put('customer_id', $result->customer_id);
        return Redirect('/checkout');

    }
    public function order_place(Request $request){
        //seo 
        $meta_desc = "Xử lý giỏ hàng"; 
        $meta_keywords = "Xử lý giỏ hàng";
        $meta_title = "Xử lý giỏ hàng";
        $url_canonical = $request->url();
        //--seo 
        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);
        //insert order details
        $content = Session::get('cart');
        $coupon = Session::get('coupon');
        foreach($content as $cart){
            if ($coupon = Session::get('coupon')) {
                foreach ($coupon as $cop) {
                    $order_d_data['order_id'] = $order_id;
                    $order_d_data['product_id'] = $cart['product_id'];
                    $order_d_data['product_name'] = $cart['product_name'];
                    $order_d_data['product_price'] =  $cart['product_price'];
                    $order_d_data['product_sales_quantity'] = $cart['product_qty'];
                    $order_d_data['product_coupon'] =  $cop['coupon_number'];
                    DB::table('tbl_order_details')->insert($order_d_data);
                }
            }else{
                    $order_d_data['order_id'] = $order_id;
                    $order_d_data['product_id'] = $cart['product_id'];
                    $order_d_data['product_name'] = $cart['product_name'];
                    $order_d_data['product_price'] =  $cart['product_price'];
                    $order_d_data['product_sales_quantity'] = $cart['product_qty'];
                    $order_d_data['product_coupon'] =  100;
                    DB::table('tbl_order_details')->insert($order_d_data);
                
            }
        }
        return Redirect('/payment');

    }
    public function confirm_order(Request $request){
        $data = $request->all();

    }
}
