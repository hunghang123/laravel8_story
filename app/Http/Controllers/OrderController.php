<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportFee;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use App\Models\News;
use App\Models\Statistical;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelexportOrder;
use App\Imports\ExcelImportOrder;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $order = Order::orderBy('order_date','DESC')->paginate(5);
      return view('page_admin.order.index')->with(compact('order',(request()->input('page',1)-1)*5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
       
        return redirect()->back()->with('message','Xóa mã thành công!');
    }


    public function show_order_detail($order_code){
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
        
        return view('page_admin.order.show_order_details')->with(compact('order_details','order','order2','discountCodeCondition','discountCodePrice','transportFee','order_status'));
    }
    public function update_order_quanlity(Request $request)
    {
      $data = $request->all();
   
      $order = Order::find($data['orderId']);
      $order->order_status = $data['orderStatus'];
      $order->save();

      $order_feeship = 0;
      $discountCodeCondition = 0;
      $discountCodePrice = 0;
      $discountCode = Coupon::where('coupon_code',$order->order_coupon)->first();

      if($discountCode){
          $count = $discountCode->count();
          if($count>0){
              $discountCodeCondition = $discountCode->coupon_condition;
              $discountCodePrice = $discountCode->coupon_number;
          }else{
              $discountCodeCondition = 0;
              $discountCodePrice = 0;
          }
      }
      $order_date = $order->order_date;
      $order_feeship = $order->order_feeship;
    
      $statistical = Statistical::where('order_date',$order_date)->get();
      $count = 0;
      if($statistical==true){
          $count = $statistical->count();
      }else{
          $count = 0;
      }

      $totalAfter = 0;
      $totalDiscounCode = 0;
      $total = 0;
      if($discountCodeCondition == 1){
        $totalDiscounCode = ($total * $discountCodePrice)/100;
        $totalAfter = $total- $totalDiscounCode;
    }else{
        $totalDiscounCode= $discountCodePrice;
        $totalAfter = $total- $totalDiscounCode;
    }
    $totalAfter += $order_feeship;

      if($order->order_status == 2 ){
        $totalOrder = 0;
        $quantityStatistical = 0;
        $profit = 0;
        $sales = 0;
       

        foreach($data['productIdWashouse'] as $key => $value){
          $product = Product::find($value);
          $product_quanlity = $product->product_quanlity;
          $product_sold = $product->product_sold;

          $productPrice = $product->product_price;
          $productPriceCost = $product->product_price_cost;
          $Now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

          foreach($data['quantity'] as $key2 => $quantityValue){
            if($key == $key2 ){
              $quantityStatistical = $quantityStatistical+ $quantityValue;
              $totalOrder +=1;
              $sales += ($productPrice*$quantityValue) + $totalAfter;
              $profit = ($productPrice*$quantityValue)-($productPriceCost*$quantityValue);

          $product_remain = $product_quanlity - $quantityValue;
          $product->product_quanlity = $product_remain;
          $product->product_sold = $product_sold + $quantityValue;
          $product->save();
             
          
          
         
          }
        }
       }
     
                if($count>0){
        $statistical2 = Statistical::where('order_date',$order_date)->first();
        $statistical2->quantity = $statistical2->quantity + $quantityStatistical;
        $statistical2->profit = $statistical2->profit + $profit;
        $statistical2->sales = $statistical2->sales + $sales;
        $statistical2->total_order = $statistical2->total_order + $totalOrder;
        $statistical2->save();
           }else{
        $statisticalNew = new Statistical();
        $statisticalNew->order_date = $order_date;
        $statisticalNew->quantity = $quantityStatistical;
        $statisticalNew->profit = $profit;
        $statisticalNew->sales = $sales;
        $statisticalNew->total_order = $totalOrder;
        $statisticalNew->save();


              }
              
      }
    }
  
  public function update_order_quanlity_button(Request $request)
    {
      $data = $request->all();
      $order_details = OrderDetails::where('product_id',$data['order_product_id'])->where('order_code',$data['order_code'])->first();
      $order_details->product_quanlity = $data['order_qty'];
      $order_details->save();
    }
    public function print_order($order_code){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->printOrderPdf($order_code));
        return $pdf->stream();
    }

    public function printOrderPdf($order_code)
    {

        $transportFee=0;
        $order = Order::where('order_code',$order_code)->first();
        $status = '';
        $method = '';
        if($order->order_status == 1){
            $status='Đơn hàng mới';
        }elseif($order->order_status == 2){
            $status='Đang giao hàng';
        }elseif($order->order_status == 3){
            $status='Thành công';
         } else{
            $status='Hủy đơn hàng';
         }

         if($order->shipping->shipping_default == 0 ){
            $method='Tiền mặt';
          } elseif($order->shipping->shipping_default == 1){
            $method='Chuyển khoản';
         }else{
          $method='Paypal';
         }
        $transportFee= $order->order_feeship;
        $orderDetail = OrderDetails::where('order_code',$order_code)->get();
        $discountCodeCondition = 0;
        $discountCodePrice = 0;

        $discountCode = Coupon::where('coupon_code',$order->order_coupon)->first();

        if($discountCode){
            $count = $discountCode->count();
            if($count>0){
                $discountCodeCondition = $discountCode->coupon_condition;
                $discountCodePrice = $discountCode->coupon_number;
            }else{
                $discountCodeCondition = 0;
                $discountCodePrice = 0;
            }
        }
        $html ='';

        $html.='<!DOCTYPE html>
        <html>
        <head>
        <style>
        body{
            font-family: DejaVu Sans;
        }
        table {
          border-collapse: collapse;
          width: 100%;
        }

        th, td {
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {background-color: #f2f2f2;}
        </style>
        </head>
        <body>

        <h2><center>Công ty HNH chuyên bán truyện tranh</center></h2>';
        $html.='
        <p><center><h3>Thông tin khách hàng</h3></center></p>
        <div style="overflow-x: auto;">
          <table border="1">
            <tr>
              <th>Tên khách </th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Ghi chú</th>
            </tr>';
            $html.='
            <tr>
              <td>'.$order->shipping->shipping_name.'</td>
              <td>'.$order->shipping->shipping_address.'</td>
              <td>'.$order->shipping->shipping_phone.'</td>
              <td>'.$order->shipping->shipping_note.'</td>
            </tr>
          </table>
        </div>';

        $html.='
        <p><center><h3>Thông tin đơn hàng</h3></center></p>
        <div style="overflow-x: auto;">
          <table border="1">
            <tr>
              <th>Sản phẩm</th>
              
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Ngày đặt</th>
              <th>Tình trạng </th>
              <th>Phương thức thanh toán</th>
        
              <th>Tổng tiền</th>
            
            </tr>';
            $subtotal = 0;
            $total = 0;
            $totalDiscounCode = 0;
            $totalAfter = 0;
            $productPriceProduct=0;
            
          
          
            foreach($orderDetail as $value){
          
               $productPriceProduct = $value->product->product_price;
              
                $subtotal = $value->product_quanlity* $productPriceProduct;
                $total+=$subtotal;
                $html.='
                <tr>
                  <td>'.$value->product->product_name.'</td>
                  <td>'.number_format($productPriceProduct,0,',','.').'đ</td>
                  <td>'.$value->product_quanlity.'</td>
                  <td>'.$value->created_at.'</td>
                  
                  <td>'.$status.'</td>
                  <td>'.$method.'</td>
                  <td>'.$subtotal.'</td>
                
                  
             
               
                </tr>';
            }
            if($discountCodeCondition == 1){
                $totalDiscounCode = ($total * $discountCodePrice)/100;
                $totalAfter = $total- $totalDiscounCode;
            }else{
                $totalDiscounCode= $discountCodePrice;
                $totalAfter = $total- $totalDiscounCode;
            }
            $totalAfter += $transportFee ;
            $html.='
            <tr >
                <td colspan="7" class="textright_text" style="text-align: right;">
                <div class="sum_price_all">
                   <span class="text_price">Tổng tiền 
                      
                   </span>: 
                   <span class="text_price color_red"><b>'.number_format($total,0,',','.').'VNĐ</b></span>
                </div>
             </td>
            </tr>

            <tr>
            <td colspan="7" class="textright_text" style="text-align: right;">
            <div class="sum_price_all">
               <span class="text_price">giá khuyến mãi 
                  
               </span>: 
               <span class="text_price color_red"><b>'.number_format($totalDiscounCode,0,',','.').'</b></span>
            </div>
         </td>
            </tr>

            <tr>
            <td colspan="7" class="textright_text" style="text-align: right;">
            <div class="sum_price_all">
               <span class="text_price">Phí vận chuyển 
                  
               </span>: 
               <span class="text_price color_red"><b>'.number_format($transportFee,0,',','.').'VNĐ</b></span>
            </div>
         </td>
            </tr>


            <tr>
            <td colspan="7" class="textright_text" style="text-align: right;">
            <div class="sum_price_all">
               <span class="text_price">Tổng chi phí 
                  
               </span>: 
               <span class="text_price color_red"><b>'.number_format($totalAfter,0,',','.').'VNĐ</b></span>
            </div>
         </td>
            </tr>


              </table>
            </div>';
        $html.='

        </body>
        </html>';

        return $html;

    }
    public function import_excel(Request $request)
    {
      $path = $request->file('import_file')->getRealPath();
      Excel::import(new ExcelImportOrder(), $path);
      return redirect()->back()->with('message','Thành công!');
    }
    public function export_excel()
    {
        
        return Excel::download(new ExcelexportOrder, 'order.xlsx');
    }


}
