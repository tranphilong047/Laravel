<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function Authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    //thêm thương hiệu sản phẩm
    public function add_brand_product(){
        $this->Authlogin();
        return view('admin.brand.add_brand_product');
    }
    //danh sách thương hiệu sản phẩm
    public function all_brand_product(){
        $this->Authlogin();
        $all_brand_product = DB::table('tbl_brand_product')->get();
        $message_brand_product = view('admin.brand.all_brand_product')->with('all_brand_product',$all_brand_product);
        return  view('admin_layout')->with('admin.brand.all_brand_product',$message_brand_product);
    }
    //lưu thương hiệu đã thêm
    public function save_brand_product(Request $request){
        $this->Authlogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['meta_keywords'] = $request->brand_product_keywords;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;

        DB::table('tbl_brand_product')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('add-brand-product');
    }
    //thay đổi trạng thái
    public function active_brand_product($brand_product_id)
    {
        $this->Authlogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        return Redirect::to('all-brand-product'); 
    }
    public function unactive_brand_product($brand_product_id){
        $this->Authlogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        return Redirect::to('all-brand-product');
    }
    //sửa thương hiệu sản phẩm
    public function edit_brand_product($brand_product_id){
        $this->Authlogin();
        $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();
        $message_brand_product = view('admin.brand.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return  view('admin_layout')->with('admin.brand.edit_brand_product',$message_brand_product);
    }
    //xóa thương hiệu sản phẩm
    public function delete_brand_product($brand_product_id){
        $this->Authlogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Đã xóa');
        return Redirect::to('all-brand-product');
    }
    //sửa thương hiệu sản phẩm
    public function update_brand_product(Request $request,$brand_product_id){
        $this->Authlogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['meta_keywords'] = $request->brand_product_keywords;
        $data['brand_desc'] = $request->brand_product_desc;
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('add-brand-product');
    }
    //end function admin
    //begin function home
    public function show_brand_home(Request $request,$brand_id){
        //slider
        $slider = DB::table('tbl_slider')->where('slider_status','1')->orderby('slider_id','desc')->take(3)->get();
        
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.brand_id',$brand_id)->get();
        foreach($brand_by_id as $key =>$value){
            //seo
            $meta_desc = $value->brand_desc;
            $meta_keywords = $value->meta_keywords;
            $meta_title = "Thương Hiệu ".$value->brand_name;
            $meta_canonical = $request->url();
            //seo
        }
        $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id',$brand_id)->limit(1)->get();
        return view('pages.brand.show_brand')->with('category',$category_product)->with('brand',$brand_product)
        ->with('slider',$slider)
        ->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('meta_canonical',$meta_canonical);
    }

    //end function home
}
