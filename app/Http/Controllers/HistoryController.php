<?php

namespace App\Http\Controllers;
use App\Models\TransportFee;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use App\Models\News;
use App\Models\Category;
use App\Models\Banner;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function history(){
        $category =  Category::orderBy('category_id','DESC')->where('category_status','1')->get();
        $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
        $customer = User::where('id',session()->get('id'))->first();
        $order = Order::orderBy('order_date','DESC')->where('id', $customer->id)->paginate(5);

        return view('page_user.history.history_order')->with(compact('category', 'banner','order',(request()->input('page',1)-1)*5));
    }

    public function view_order_detail($order_code){
        $category =  Category::orderBy('category_id','DESC')->where('category_status','1')->get();
        $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();


        $discountCodeCondition = 0;
        $discountCodePrice = 0;
        $transportFee = 0;
        $order_details = OrderDetails::where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->first();
        $transportFee= $order->order_feeship;
        $order2 = Order::where('order_code',$order_code)->get();
        foreach($order2 as $Key => $ord){
          $order_status = $ord->order_status;
        }
        
        $discountCode = Coupon::where('coupon_code',$order->order_coupon)->first();

        if($discountCode){
            $count = $discountCode->count();
            if($count>0){
                $discountCodeCondition = $discountCode->coupon_condition;
                $discountCodePrice = $discountCode->coupon_number;
            }
        }


        return view('page_user.history.view_history_order')->with(compact('category', 'banner','order_details','order','order2','discountCodeCondition','discountCodePrice','transportFee','order_status'));
    }
}
