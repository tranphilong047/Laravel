<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Session;
use Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
 

class HomeController extends Controller
{
    //trang chủ
    public function index(Request $request){
        //slider
        $slider = DB::table('tbl_slider')->where('slider_status','1')->orderby('slider_id','desc')->take(3)->get();

        //seo
        $meta_desc = "Tặng Balo Gaming + Chuột Gaming VT200 + Túi chống sốc cao cấp + Trả góp 0% Lãi suất. Miễn phí quẹt thẻ ATM,
         Visa, Master. Hỗ trợ giao hàng nội thành miễn phí. Laptop Gaming MSI. Laptop Gaming Acer. Loại: Lenovo Ideapad L340,
          Lenovo Legion Y540.";
        $meta_keywords = "philonggear,laptop gaming,laptop văn phòng,phụ kiện PC,Buil pc theo cấu hình tùy thích,màn hình pc gaming
        chuột,bàn phím gaming,laptop giá rẻ";
        $meta_title = "PhiLongGear - Máy tính PC, Laptop Gaming MSI, Asus, Acer Predator, Lenovo,...";
        $meta_canonical = $request->url();
        //seo


        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(6)->get();
        return view('pages.home')->with('category',$category_product)->with('brand',$brand_product)->with('slider',$slider)
        ->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('meta_canonical',$meta_canonical);
        // return view('pages.home')->with(compact('category_product','brand_product','all_product'));
    }
    public function tim_kiem(Request $request){
       //slider
       $slider = DB::table('tbl_slider')->where('slider_status','1')->orderby('slider_id','desc')->take(3)->get();

        //seo 
       $meta_desc = "Tìm kiếm sản phẩm"; 
       $meta_keywords = "Tìm kiếm sản phẩm";
       $meta_title = "Tìm kiếm sản phẩm";
       $url_canonical = $request->url();
       //--seo
       
        $keywords = $request->keywords_submit;
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $search_product = DB::table('tbl_product')->where('product_desc','like','%'.$keywords.'%')->limit(6)->get();

        return view('pages.product.search')->with('category',$category_product)->with('brand',$brand_product)
        ->with('slider',$slider)
        ->with('search_product',$search_product) ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('meta_canonical',$url_canonical);
    }
    public function send_mail(){
        //send mail
        $to_name = "Trần Phi Long";
        $to_email = "trtrghieu@gmail.com";

        $data = array("name"=>"Mail từ trang web PhiLongGear ","body"=>'gggggg');
    
        Mail::send('pages.mail.send_mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Đây là Mail của Trần Phi Long xin cảm ơn');
            $message->from($to_email,$to_name);
        });
        //--send mail
        return Redirect('/home')->with('mess','');

    }
}
