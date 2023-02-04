<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News_Category;
use App\Models\Banner;
use App\Models\Coupon;
use Illuminate\Support\Facades\Log;
class Cartcontroller extends Controller
{
   
    public function show_cart(){
        $categorynews =  News_Category::orderBy('news_category_id','ASC')->where('news_category_status','1')->get();
        $category =  Category::orderBy('category_id','DESC')->where('category_status','1')->get();
        $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
        // $count = 0;
        // if(session()->get('cart')){
        //     $count = count(session()->get('cart'));
        // }
      
        // dd($cart);
        return view('page_user.cart.show_cart')->with(compact('category','categorynews','banner'));
    }

   
    public function add_cart_ajax(Request $request)
    {
       $cart = [];
        $data = $request->all();
       

        $is_avaiable = 0;
        $session_id = substr(md5(microtime()),rand(0,26),5);
       
        $cart = session()->get('cart');
      
        if($cart==true){
            log::info("da co cart");
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                
                }
            }
          
            if($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_imge' => $data['cart_product_imge'],
                    'product_quanlity' => $data['cart_product_quanlity'],
                    'product_price' => $data['cart_product_price'],
                    'product_promotion' => $data['cart_product_promotion'],
                );
                // dd($cart);
                session()->put('cart',$cart);
            }
        }else{
            // log::info("chua co cart");
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_imge' => $data['cart_product_imge'],
                'product_quanlity' => $data['cart_product_quanlity'],
                'product_price' => $data['cart_product_price'],
                'product_promotion' => $data['cart_product_promotion'],
            );
            // Log::info($cart['session_id']);
            // log::info("==========================>");
            // Log::info($cart);
            session()->put('cart',$cart);
            
        }
        session()->save();
        // echo 2;
        
    }
    public function deleteCart($session_id){
        $sessionCart = session()->get('cart');
        // echo '<pre>';
        // print_r($sessionCart);
        // echo'</pre>';
        if($sessionCart == true){
            foreach($sessionCart as $key => $value){
                if($value['session_id']==$session_id){
                    unset($sessionCart[$key]);
                }
            }
            session()->put('cart',$sessionCart);
            return redirect()->back()->with('message','Xóa sản phẩm thành công');
        }else{
            return redirect()->back()->with('message','Xóa sản phẩm không thành công');
        }
    }
    public function updateQuantityProduct(Request $request){
 
    $data = $request->all();
//    dd ($data);   
   
    $cart = session()->get('cart');
    
    $i=0;
    if($cart==true){
            foreach($cart as $key => $value){
                            if($value['session_id']== $data['session_id']){
                                        $sqlhung = Product::where('product_id',$cart[$key]['product_id'])->first();
                                        // dd($sqlhung->product_quanlity);
                                          if($sqlhung->product_quanlity >= (int) $data['inputValue'] ){
                                            
                                            $cart[$key]['product_quanlity'] = $data['inputValue'];
                                            
                                            $i = $i+1;
                                           
                                          }
                                         
                                }
                            }
        }
    if($i==1){
        // dd($i);
        session()->put('cart',$cart);
    }else{
        echo "1";
    }
   }
//    public function updateDetailsQuantityProduct(Request $request){
 
//     $data = $request->all();
//     $cart = session()->get('cart');
//     $i=0;
//     if($cart==true){
//             foreach($cart as $key => $value){
//                             if($value['session_id']== $data['session_id']){
//                                         $cart[$key]['product_quanlity'] = $data['inputValue'];
//                                         $i = $i+1;
//                                 }
//                             }
//         }
//     if($i==1){
//         session()->put('cart',$cart);
//     }else{
//         echo "1";
//     }

//    }
   public function deleteAllCart(){
    $cart = session()->get('cart');
    if($cart == true){
        session()->forget('cart');
        session()->forget('coupon');
        return redirect()->back()->with('message','Xóa toàn bộ giỏ hàng thành công');
    }else{
        return redirect()->back()->with('error','Không có sản phẩm để xóa.Hihi');
    }
   }



   public function check_coupon(Request $request){
    $data = $request->all();
    $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
          if($coupon){
             $count_coupon = $coupon->count();
             if($count_coupon>0){
              $coupon_session = session()->get('coupon');
              if($coupon_session==true){
               $is_avaiable = 0;
                if($is_avaiable==0){
                 $cou[] = array(
                    'coupon_code' => $coupon->coupon_code,
                    'coupon_condition' => $coupon->coupon_condition,
                    'coupon_number' => $coupon->coupon_number,
                    'coupon_time' => $coupon->coupon_time,
                 );
                 session()->put('coupon',$cou);
                }
              }else{
                $cou[] = array(
                    'coupon_code' => $coupon->coupon_code,
                    'coupon_condition' => $coupon->coupon_condition,
                    'coupon_number' => $coupon->coupon_number,
                    'coupon_time' => $coupon->coupon_time,
                 );
                 session()->put('coupon',$cou);
              }
            
              session()->save();
              return redirect()->back()->with('message','Thêm mã giảm giá giỏ hàng thành công');
             }
           }else{
            return redirect()->back()->with('error','Mã giảm giá không có hoặc không đúng  !!');
           }
   }
}   
