<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UsersController; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\CartController; 
use App\Http\Controllers\NewscategoryController; 
use App\Http\Controllers\NewsController; 
use App\Http\Controllers\BannerController; 
use App\Http\Controllers\CounponController; 
use App\Http\Controllers\TransportFeeController; 
use App\Http\Controllers\CheckoutController; 
use App\Http\Controllers\OrderController; 
use App\Http\Controllers\MailController; 
use App\Http\Controllers\StatisticalController; 
use App\Http\Controllers\HistoryController; 
use App\Http\Controllers\PayPalController; 
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

////////////////////////trang user
Route::get('/',[HomeController::class,'index'] );
Route::get('/trang-chu',[HomeController::class,'index']);
Route::get('/user/login',[HomeController::class,'login']);
Route::post('/user/xuly_user', [HomeController::class,'xuly_user']);
Route::get('/user/register',[HomeController::class,'register']);
Route::get('/user_logout', [HomeController::class,'user_logout']);
Route::post('/xuly_register', [HomeController::class,'xuly_register']);
//////////////////////////////////tìm kiếm
Route::post('/timkiem',[HomeController::class,'search']);


//====================================user
Route::resource('/user',UsersController::class);
Route::get('/user/active/{id}', [UsersController::class,'active'])->name('user.active');



//////////////////////////////////////////////////////admin
Route::get('/admin',[AdminController::class,'index']);
Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/xuly', [AdminController::class,'xuly']);
Route::get('/logout', [AdminController::class,'logout']);


/////////////////////////////////////danh mục
Route::get('/category/active/{id}', [CategoryController::class,'active'])->name('category.active');
Route::resource('/category',CategoryController::class);
////////////////////////////////////////danh muc hien thi san pham trang chu
Route::get('/danhmucsanpham/{id}', [CategoryController::class,'show_category_home']);


///////////////////////////////sản phẩm
Route::get('/product/active/{id}', [ProductController::class,'active'])->name('product.active');
Route::resource('/product',ProductController::class);
////////////////////////////////////chi tiet san pham
Route::get('/chitietsanpham/{id}', [ProductController::class,'details_product']);
////////////////////////////////////xem tat ca san pham
Route::get('/xemtatcasanpham', [ProductController::class,'all_product']);



///////////////////////////danh mục tin tức
Route::resource('/news_category',NewscategoryController::class);
Route::get('/news_category/active/{id}', [NewscategoryController::class,'active'])->name('news_category.active');
/////////////////////show danh mục hiển thị tin tuc
Route::get('/danhmuctintuc/{id}', [NewscategoryController::class,'show']);



/////tin tức
Route::resource('/news',NewsController::class);
Route::get('/news/active/{id}', [NewsController::class,'active'])->name('news.active');
Route::get('/tintuc',[NewsController::class,'showhomenew']);
Route::get('/chitiettintuc/{id}', [NewsController::class,'details_news']);


///////////////////////////slide banner
Route::resource('/banner',BannerController::class);
Route::get('/banner/active/{id}', [BannerController::class,'active'])->name('banner.active');



/////////////////////////////////////giỏ hàng
Route::get('/show-cart', [CartController::class,'show_cart']);
Route::get('/delete-cart/{session_id}',[CartController::class,'deleteCart']);
Route::get('/delete-all-cart',[CartController::class,'deleteAllCart']);
Route::post('/add-cart-ajax', [CartController::class,'add_cart_ajax']);
Route::post('/cart/update-quantity-product', [CartController::class,'updateQuantityProduct']);
Route::post('/cart/update-quantity-details', [CartController::class,'updateDetailsQuantityProduct']);
// Route::get('/show-cart-user',[CartController::class,'show_user_cart']);

////////////////// ma khuyen mai
Route::post('/check-coupon', [CartController::class,'check_coupon']);
Route::get('/unset-coupon', [CounponController::class,'unset_coupon']);
Route::get('/khuyenmai', [CounponController::class,'show_promotion']);
Route::resource('/coupon',CounponController::class);



////////////////// van chuyen hang hoa
Route::resource('/transport',TransportFeeController::class);
/////////////////////////////////////////////////van chuyen hang hoa mien khap ca nuoc
Route::post('/select-delivery', [TransportFeeController::class,'select_delivery']);
// Route::post('/add-delivery', [TransportFeeController::class,'add_delivery']);
Route::post('/update-transport-fee-freeship',[TransportFeeController::class,'update']);



///////////////////checkout don hang
Route::get('/show-checkout', [CheckoutController::class,'show_list'])->name('checkout');
Route::post('/select-delivery-home', [CheckoutController::class,'select_delivery_home']);
/////////////////////////////////////////////////////////////// xac nhan dat hang hoa mien khap ca nuoc trang user   
Route::post('/calculate-fee', [CheckoutController::class,'calculate_fee']);
Route::get('/delete-fee', [CheckoutController::class,'deleteTransportFee']);
Route::post('/confirm-order', [CheckoutController::class,'confirm_order']);
Route::get('/success', [CheckoutController::class,'showCheckoutSucess'])->name('success');

////////////////////// don hang admin
Route::resource('/order',OrderController::class);
Route::get('/show-order-detail/{order_code}', [OrderController::class,'show_order_detail']);
// Route::get('/delete_order/{order_code}', [OrderController::class,'destroy']);
Route::get('/print-order/{order_code}', [OrderController::class,'print_order']);
Route::post('/update-order-quanlity', [OrderController::class,'update_order_quanlity']);
Route::post('/update-order-quanlity-button', [OrderController::class,'update_order_quanlity_button']);
Route::post('/import-excel', [OrderController::class,'import_excel']);
Route::post('/export-excel', [OrderController::class,'export_excel']);


////////////////////// don hang lich su user
Route::get('/history', [HistoryController::class,'history']);
Route::get('/view-order-detail/{order_code}', [HistoryController::class,'view_order_detail']);

///////////////send mail
Route::get('/send-mail', [MailController::class,'send_mail']);
///////////////////////gui ma khuyen mai
Route::get('/send-coupon', [MailController::class,'send_coupon']);




//////////////////////////////// thống kê
Route::get('/statistical', [StatisticalController::class,'show_statistical']);
Route::post('/get-date-filter', [StatisticalController::class,'getDateFilter']);
Route::post('/filter-statistical-profit', [StatisticalController::class,'filterStatisticalProfit']);
Route::post('/show-statistical-one-year', [StatisticalController::class,'showstatisticaloneyear']);
Route::post('/show-statistical', [StatisticalController::class,'showStatistical']);


///////////////////////paypal
Route::get('/create-transaction', [PayPalController::class,'createTransaction'])->name('createTransaction');
Route::get('/process-transaction', [PayPalController::class,'processTransaction'])->name('processTransaction');
Route::get('/success-transaction', [PayPalController::class,'successTransaction'])->name('successTransaction');
Route::get('/cancel-transaction', [PayPalController::class,'cancelTransaction'])->name('cancelTransaction');