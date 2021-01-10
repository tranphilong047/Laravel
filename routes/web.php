<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\orderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//frontend
Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'index']);
Route::post('/tim-kiem',[HomeController::class,'tim_kiem']);

//danh mục sản phẩm
Route::get('/danh-muc-san-pham/{category_id}',[CategoryProduct::class,'show_category_home']);
//thương hiệu sản phẩm
Route::get('/thuong-hieu-san-pham/{brand_id}',[BrandProduct::class,'show_brand_home']);
//chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{product_id}',[ProductController::class,'details_product']);

//backend
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);
Route::get('/logout',[AdminController::class,'log_out']);
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);

//category-product
Route::get('/add-category-product',[CategoryProduct::class,'add_category_product']);
Route::get('/edit-category-product/{category_product_id}',[CategoryProduct::class,'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}',[CategoryProduct::class,'delete_category_product']);
Route::get('/all-category-product',[CategoryProduct::class,'all_category_product']);

Route::get('/active-category-product/{category_product_id}',[CategoryProduct::class,'active_category_product']);
Route::get('/unactive-category-product/{category_product_id}',[CategoryProduct::class,'unactive_category_product']);

Route::post('/save-category-product',[CategoryProduct::class,'save_category_product']);
Route::post('/update-category-product/{category_product_id}',[CategoryProduct::class,'update_category_product']);

//brand-product
Route::get('/add-brand-product',[BrandProduct::class,'add_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}',[BrandProduct::class,'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}',[BrandProduct::class,'delete_brand_product']);
Route::get('/all-brand-product',[BrandProduct::class,'all_brand_product']);

Route::get('/active-brand-product/{brand_product_id}',[BrandProduct::class,'active_brand_product']);
Route::get('/unactive-brand-product/{brand_product_id}',[BrandProduct::class,'unactive_brand_product']);

Route::post('/save-brand-product',[BrandProduct::class,'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}',[BrandProduct::class,'update_brand_product']);

//Product
Route::get('/add-product',[ProductController::class,'add_product']);
Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product']);
Route::get('/all-product',[ProductController::class,'all_product']);

Route::get('/active-product/{product_id}',[ProductController::class,'active_product']);
Route::get('/unactive-product/{product_id}',[ProductController::class,'unactive_product']);

Route::post('/save-product',[ProductController::class,'save_product']);
Route::post('/update-product/{product_id}',[ProductController::class,'update_product']);

//Cart
Route::get('/show-cart',[CartController::class,'show-cart']);
Route::get('/save-cart',[CartController::class,'save_cart']);
Route::post('/add-cart-ajax',[CartController::class,'add_cart_ajax']);
Route::post('/update-cart',[CartController::class,'update_cart']);
Route::get('/del-product/{session_id}',[CartController::class,'delete_product']);
Route::get('/del-all-product',[CartController::class,'delete_all_product']);

//coupon cart
Route::post('/check-coupon',[CartController::class,'check_coupon']);
//coupon admin
Route::get('/unset-coupon',[CouponController::class,'unset_coupon']);
Route::get('/insert-coupon',[CouponController::class,'insert_coupon']);
Route::post('/insert-coupon-code',[CouponController::class,'insert_coupon_code']);
Route::get('/list-coupon',[CouponController::class,'list_coupon']);
Route::get('/delete-coupon/{coupon_id}',[CouponController::class,'delete_coupon']);
Route::get('/edit-coupon/{coupon_id}',[CouponController::class,'edit_coupon']);
Route::post('/update-coupon/{coupon_id}',[CouponController::class,'update_coupon']);


//Check Out
Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::get('/payment',[CheckoutController::class,'payment']);
Route::get('/login-checkout',[CheckoutController::class,'login_checkout']);
Route::get('/logout-checkout',[CheckoutController::class,'logout_checkout']);
Route::get('/sua-thong-tin/{shipping_id}',[CheckoutController::class,'sua_thong_tin']);
Route::post('/update-shipping/{shipping_id}',[CheckoutController::class,'update_shipping']);
Route::post('/add-customer',[CheckoutController::class,'add_customer']);
Route::get('/order-place',[CheckoutController::class,'order_place']);
Route::post('/login-customer',[CheckoutController::class,'login_customer']);
Route::post('/confirm-order',[CheckoutController::class,'confirm_order']);
Route::post('/save-checkout-customer',[CheckoutController::class,'save_checkout_customer']);

//send mail
Route::get('/send-mail',[HomeController::class,'send_mail']);
//login facebook
Route::get('/login-facebook',[AdminController::class,'login_facebook']);
Route::get('/admin/callback',[AdminController::class,'callback_facebook']);
//login google
Route::get('/login-google',[AdminController::class,'login_google']);
Route::get('/google/callback',[AdminController::class,'callback_google']);

//banner
Route::get('/add-slider',[SliderController::class,'add_slider']);
Route::get('/edit-slider/{slider_id}',[SliderController::class,'edit_slider']);
Route::get('/delete-slider/{slider_id}',[SliderController::class,'delete_slider']);
Route::get('/all-slider',[SliderController::class,'all_slider']);

Route::get('/active-slider/{slider_id}',[SliderController::class,'active_slider']);
Route::get('/unactive-slider/{slider_id}',[SliderController::class,'unactive_slider']);

Route::post('/save-slider',[SliderController::class,'save_slider']);
Route::post('/update-slider/{slider_id}',[SliderController::class,'update_slider']);
//order
Route::get('/list-order',[orderController::class,'list_order']);
Route::get('/delete-order/{order_id}',[orderController::class,'delete_order']);
Route::get('/chi-tiet-hoa-don/{order_id}',[orderController::class,'chi_tiet_hoa_don']);
Route::get('/delete-product-details/{order_details_id}',[orderController::class,'delete_product_details']);

