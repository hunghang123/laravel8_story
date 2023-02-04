<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Models\TransportFee;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
class CheckoutController extends Controller
{
   public function show_list(){
    $city = City::orderBy('matp','ASC')->get();
    $district = District::orderBy('maqh','ASC')->get();
    $ward = Ward::orderBy('maxptt','ASC')->get();
    $transportFee = TransportFee::orderBy('feeship_id','ASC')->get();
    $category =  Category::orderBy('category_id','DESC')->where('category_status','1')->get();
    $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();

    
    return view('page_user.cart.checkout')->with(compact('category','banner','city','district','ward','transportFee'));
   }

   public function select_delivery_home(Request $request){
    $data = $request->all();
    $output= '';
    if($data['action']){
       if($data['action']=='city'){
        $district = District::where('matp',$data['ma'])->orderBy('maqh','ASC')->get();
            $output.='<option value="0">Chọn quận, huyện</option>';
            foreach ($district as $key => $district){
                $output.='<option value="'.$district->maqh.'">'.$district->nameqh.'</option>';
            }
       }else{
        $ward = Ward::where('maqh',$data['ma'])->orderBy('maxptt','ASC')->get();
        $output.='<option value="0">Chọn xã, phường</option>';
        foreach ($ward as $key => $ward){
            $output.='<option value="'.$ward->maxptt.'">'.$ward->namexptt.'</option>';
        }
       }
    
    }
    echo $output;
}





         public function calculate_fee(Request $request){
            $data = $request->all();
            if($data['matp']){
            $feeship = TransportFee::where('matp',$data['matp'])->where('maqh',$data['maqh'])->where('maxptt',$data['maxptt'])->get();
            if($feeship){
                $count = count($feeship);
                if($count>0){
            foreach($feeship as $key => $fee){
                session()->put('fee',$fee->shipping_fee);
                session()->save();
            }
           }else{
            session()->put('fee',15000);
            session()->save();
           }
             }
            }
         }

         public function deleteTransportFee(){
            $sessionTransportFee = session()->get('fee');
            if($sessionTransportFee == true){
                session()->forget('fee');
                return redirect()->back()->with('message','Xóa phí vận chuyển thành công');
            }
        }



        public function showCheckoutSucess()
        {
    
            $category =  Category::orderBy('category_id','DESC')->where('category_status','1')->get();
            $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
            return view('page_user.cart.success')->with(compact('category', 'banner'));
        }
        public function confirm_order(Request $request){
            $data = $request->validate(
                [
                'shipping_name' => 'required',  
                'shipping_address' =>'required',
                'shipping_phone' => 'required',
                'shipping_note' => 'required',
                'shipping_mail' => 'required',
                'shipping_default' => 'required',
                'city'=>'required',
                'district'=>'required',
                'ward'=>'required',
            ], [
                'shipping_name.required' => 'Vui lòng nhập họ và tên',
                
               
                'shipping_address.required' => 'Địa chỉ chưa điền',
                'shipping_phone.required' => 'Số điện thoại phải điền',
               
                
                'shipping_note.required' => 'Ghi chú phải điền',
                'shipping_mail.required' => 'Email phải điền',
                'city.required' => 'Tỉnh chưa chọn',
                'district.required' => 'Huyện chưa chọn',
                'ward.required' => 'Xã chưa chọn',
                
            ]
        );

        $transport_fee = 0;
        $coupont_code  = 'Không có mã';
        $coupon_number = 0;
        $coupon_condition= '';
        $order_date = '';
        $user = null;
        if(session()->get('id')){
            $user = session()->get('id');
        }else{
            $user = null;
        }
        $ward = Ward::where('maxptt',$data['ward'])->first();
        $district = District::where('maqh',$data['district'])->first();
        $city = City::where('matp',$data['city'])->first();
            $shipping = new Shipping();
            $shipping->shipping_name = $data['shipping_name'];
            $shipping->shipping_mail = $data['shipping_mail'];
            $shipping->shipping_address = $data['shipping_address'].','.$ward->namexptt.','.$district->nameqh.','.$city->nametp;
            $shipping->shipping_phone = $data['shipping_phone'];
            $shipping->shipping_note = $data['shipping_note'];
            $shipping->shipping_default = $data['shipping_default'];
            $shipping->id = $user;
            $shipping->matp = $data['city'];
            $shipping->maqh = $data['district'];
            $shipping->maxptt = $data['ward'];

            $shipping->save();

            $shipping_name= $data['shipping_name'];
            $shipping_mail= $data['shipping_mail'];
            $Ship = Shipping::where('shipping_name',$shipping_name)->where('shipping_mail',$shipping_mail)->first();
            if($Ship){
                session()->put('shipping_mail',$Ship->shipping_mail);
                session()->put('shipping_id',$Ship->shipping_id);
            }
            $feeship = TransportFee::where('matp',$shipping->matp)->where('maqh',$shipping->maqh)->where('maxptt',$shipping->maxptt)->get();
            if($feeship){
                $count = count($feeship);
                if($count>0){
            foreach($feeship as $key => $fee){
                session()->put('fee',$fee->shipping_fee);
                session()->save();
            }
           }else{
            session()->put('fee',15000);
            session()->save();
           }
             }
            
            $check_code = substr(md5(microtime()),rand(0,26),5);
            $shipping_id = $shipping->shipping_id;


            if(session()->get('fee')){
                $transport_fee = session()->get('fee');
            }else{
                $transport_fee = 0;
            }
            
            if(session()->get('coupon')){
                foreach(session()->get('coupon') as $cou){
                    $coupont_code = $cou['coupon_code'];
                    $coupon_number = $cou['coupon_number'];
                    $coupon_condition = $cou['coupon_condition'];

                    $discountCode = Coupon::where('coupon_code',$cou['coupon_code'])->first();

                    $discountCode->coupon_time = $cou['coupon_time']-1;
                    $discountCode->save();
                }

            }else{
                $coupont_code  = 'Không có mã';

            }

            
            $Order = new Order();
            $Order->shipping_id = $shipping_id;
            $Order->order_status='1';
            $Order->order_code =  $check_code;
            $Order->order_coupon =  $coupont_code;
            $Order->order_feeship =  $transport_fee;
            $Order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $Order->order_date = $Order_date;
            $Order->id = $user;
            $Order->save();


            if(session()->get('cart')){
                    
                foreach(session()->get('cart') as $key => $value){
                    $Order_details = new OrderDetails();
                    $Order_details->order_code = $check_code;
                    $Order_details->product_id = $value['product_id'];
                    $Order_details->product_quanlity=$value['product_quanlity'];
                    $Order_details->save();
                }
            }
            $date = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
            $title = 'Đơn hàng đã được xác nhận vào ngày'.' '.$date;
           
            $customer = Shipping::find(session()->get('shipping_id'));


            $mail['email'][] = $customer->shipping_mail;

            if(session()->get('cart')){
                foreach(session()->get('cart') as $cartOrder){
                    $arrayCartOrder[] = array(
                        'product_name' => $cartOrder['product_name'],
                        'product_price' => $cartOrder['product_price'],
                        'product_quanlity' => $cartOrder['product_quanlity'],
                    );
                }
            }

            $arrayShipping = array(
                'shipping_name' => $shipping->shipping_name,
                'shipping_address' => $shipping->shipping_address,
                'shipping_phone' => $shipping->shipping_phone,
                'shipping_default' => $shipping->shipping_default,
                'shipping_note' => $shipping->shipping_note,
            );

            $codeOrder = array(
                'order_feeship'=> $transport_fee,
                'coupon_code' => $coupont_code,
                'coupon_number' => $coupon_number,
                'coupon_condition' => $coupon_condition,
                'order_code' => $check_code,
            );
            Mail::send('page_user.mail.mail_order',['arrayCartOrder'=>$arrayCartOrder,'arrayShipping'=>$arrayShipping,'codeOrder'=>$codeOrder],
            function($message) use ($title,$mail){
                $message->to($mail['email'])->subject($title);
                $message->from($mail['email'],$title);
            });
            if(session()->get('success_totalPaypal')){
                session()->forget('success_totalPaypal');
            }
            if(session()->get('totalPaypal')){
                session()->forget('totalPaypal');
            }
            session()->forget('fee');
            session()->forget('coupon');
            session()->forget('cart');
            return redirect('/success');
     
          
    }
  
}
