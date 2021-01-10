<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function Authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
     //thêm  sản phẩm
     public function add_product(){
        $this->Authlogin();
        $category_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        
        return  view('admin.product.add_product')->with('category_product', $category_product)->with('brand_product', $brand_product);
    }
    //danh sách sản phẩm
    public function all_product(){
        $this->Authlogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->orderby('product_id','desc')->get();
        $message_product = view('admin.product.all_product')->with('all_product',$all_product);
        return  view('admin_layout')->with('admin.product.all_product',$message_product);
    }
    //lưu đã thêm
    public function save_product(Request $request){
        $this->Authlogin();
        $data = array();
        $data['category_id'] = $request->category_product;
        $data['brand_id'] = $request->brand_product;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;   
        $data['product_image'] = $request->product_image;    
        $data['product_status'] = $request->product_status;
        $data['product_name'] = $request->product_name;
        
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image']=$new_image; 
            DB::table('tbl_product')->insert($data);
            return Redirect::to('add-product');
        }
        $data['product_image']=''; 
        DB::table('tbl_product')->insert($data);
        return Redirect::to('all-product');
    }
    
    //thay đổi trạng thái
    public function active_product($product_id)
    {
        $this->Authlogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        return Redirect::to('all-product'); 
    }
    public function unactive_product($product_id){
        $this->Authlogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        return Redirect::to('all-product');
    }
    //sửa sản phẩm
    public function edit_product($product_id){
        $this->Authlogin();
        $category_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();

        $message_product = view('admin.product.edit_product')->with('edit_product',$edit_product)->with('category_product',$category_product)
        ->with('brand_product',$brand_product);
       
        return  view('admin_layout')->with('admin.product.edit_product',$message_product);
    }
    //xóa sản phẩm
    public function delete_product($product_id){
        $this->Authlogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        return Redirect::to('all-product');
    }
    //sửa sản phẩm
    public function update_product(Request $request,$product_id){
        $this->Authlogin();
        $data = array();
        $data['category_id'] = $request->category_product;
        $data['brand_id'] = $request->brand_product;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;     
        $data['product_status'] = $request->product_status;
        $data['product_name'] = $request->product_name;
        
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image']=$new_image; 
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        return Redirect::to('all-product');
    }
    //chi tiết sản phẩm
    public function details_product(Request $request,$product_id){
         //slider
         $slider = DB::table('tbl_slider')->where('slider_status','1')->orderby('slider_id','desc')->take(3)->get();

        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach ($details_product as $key => $value) {
            $category_id = $value->category_id; 
             //seo 
             $meta_desc = $value->product_desc;
             $meta_keywords = "Chi tiết sản phẩm";
             $meta_title = $value->product_name;
             $url_canonical = $request->url();
             //--seo   
        }
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->inRandomOrder()->limit(3)->get();

         return view('pages.product.show_details')->with('category',$category_product)->with('brand',$brand_product)
         ->with('slider',$slider)
         ->with('product_details',$details_product)->with('related',$related_product)
         ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
         ->with('meta_title',$meta_title)->with('meta_canonical',$url_canonical);
    }

}
