<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class SliderController extends Controller
{
     //thêm  banner
     public function add_slider(){
        return  view('pages.slider.add_slider');
    }
    //danh sách sản phẩm
    public function all_slider(){
        $all_slider = DB::table('tbl_slider')->get();
        $message_slider = view('pages.slider.all_slider')->with('all_slider',$all_slider);
        return  view('admin_layout')->with('pages.slider.all_product',$message_slider);
    }
    //lưu đã thêm
    public function save_slider(Request $request){
        $data = array();
        $data['slider_desc'] = $request->slider_desc; 
        $data['slider_image'] = $request->slider_image;    
        $data['slider_status'] = $request->slider_status;
        $data['slider_name'] = $request->slider_name;
        
        $get_image = $request->file('slider_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);
            $data['slider_image']=$new_image; 
            DB::table('tbl_slider')->insert($data);
            return Redirect::to('add-slider');
        }
        $data['slider_image']=''; 
        DB::table('tbl_slider')->insert($data);
        return Redirect::to('all-slider');
    }
    
    //thay đổi trạng thái
    public function active_slider($slider_id)
    {
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>0]);
        return Redirect::to('all-slider'); 
    }
    public function unactive_slider($slider_id){
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>1]);
        return Redirect::to('all-slider');
    }
    //sửa sản phẩm
    public function edit_slider($slider_id){
        $edit_slider = DB::table('tbl_slider')->where('slider_id',$slider_id)->get();

        $message_slider = view('pages.slider.edit_slider')->with('edit_slider',$edit_slider);
       
        return  view('admin_layout')->with('pages.slider.edit_slider',$message_slider);
    }
    //xóa sản phẩm
    public function delete_slider($slider_id){
        DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
        return Redirect::to('all-slider');
    }
    //sửa sản phẩm
    public function update_slider(Request $request,$slider_id){
        $data = array();
        $data['slider_desc'] = $request->slider_desc;     
        $data['product_status'] = $request->product_status;
        $data['product_name'] = $request->product_name;
        
        $get_image = $request->file('slider_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);
            $data['slider_image']=$new_image; 
            DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);
            return Redirect::to('all-slider');
        }
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);
        return Redirect::to('all-slider');
    }
}
