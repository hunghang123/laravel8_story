@extends('user_layout')
@section('content')

 
 
 
 
 <!-- Page Header Start -->
 <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    @php
         $subtotal = 0;
         $total = 0;
         $transport_fee_freeship = 0;
         $totaldiscount = 0;
         $totaltransportfreeship = 0;
    @endphp
    @if ($errors->any())
                        <div class="alert alert-danger">
                             <ul>
                          @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                             @endforeach
                                  </ul>
                          </div>
                        @endif
    <!-- Checkout Start -->

    @if (session('status'))
                <div class="alert alert-success" align="center">
                    {{ session('status') }}
                </div>
             @endif
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
              
            <div class="col-lg-8">
              <form action="{{url('/confirm-order')}}"  method="POST">
                @csrf
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Điền thông tin người nhận(Có tính phí vận chuyển tỉnh thành)</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ và tên người nhận</label>
                            <input class="form-control shipping_name" type="text" placeholder="John" name="shipping_name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control shipping_mail" type="email" placeholder="example@email.com" name="shipping_mail">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control shipping_phone" type="phone" placeholder="+123 456 789" name="shipping_phone">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ người nhận</label>
                            <input class="form-control shipping_address" type="address" placeholder="123 Street" name="shipping_address">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ghi chú</label>
                            <textarea class="form-control shipping_note" type="text" rows="2" placeholder="ghi chú" name="shipping_note"></textarea>
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>Thành Phố</label>
                            <select class="custom-select choose city" name="city" id="city">
                                <option selected>Chọn thành phố</option>
                                @foreach($city as $key =>$tp)
                                <option value="{{$tp->matp}}">{{$tp->nametp}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Quận huyện</label>
                            <select class="custom-select district choose" name="district" id="district">
                                <option selected>Chọn quận huyện</option>
                                @foreach($district as $key =>$qh)
                                <option value="{{$qh->maqh}}">{{$qh->nameqh}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Xã Phường</label>
                            <select class="custom-select ward" name="ward" id="ward">
                                <option selected>Chọn xã phường</option>
                                @foreach($ward as $key =>$xp)
                                <option value="{{$xp->maxptt}}">{{$xp->namexptt}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(session()->get('fee'))
                        <div class="col-md-6 form-group">
                            <input class="form-control order_fee" type="hidden"  name="order_fee" value="{{session()->get('fee')}}">
                        </div>
                        @else
                        <div class="col-md-6 form-group">
                          <input class="form-control order_fee" type="hidden"  name="order_fee" value="15000">
                        </div>
                        @endif

                        @if(session()->get('coupon'))
                        <div class="col-md-6 form-group">
                            @foreach(session()->get('coupon') as $key => $cou)
                            <input class="form-control order_coupon" type="hidden"  name="order_coupon" value="{{$cou['coupon_code']}}">
                            @endforeach
                        </div>
                        @else
                        <div class="col-md-6 form-group">
                          <input class="form-control order_coupon" type="hidden"  name="order_coupon" value="Không có">
                        </div>
                        @endif

                       

                        <div class="col-md-6 form-group">
                            <label>Phương thức thanh toán</label>
                            @if(!session()->get('success_totalPaypal')==true)
                            <select class="custom-select payment_select" name="shipping_default" >
                                <option value="0">Tiền mặt</option>
                               
                                <option value="1">Chuyển khoản</option>
                               
                            </select>
                            @else
                            <select class="custom-select payment_select" name="shipping_default" >
                                <option value="2">Đã thanh toán Paypal</option>
                            </select>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                           <button onclick="return confirm('Bạn có muốn đặt hàng không ?')" type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3 send_order " name="send_order">Xác nhận đơn hàng</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
              </form>
            </div>



            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Phí vận chuyển</h4>
                    </div>
                    <div class="card-body">
                        
                        <h5 class="font-weight-medium mb-3">Khắp cả nước</h5>
                        @foreach($transportFee as $key => $vc)
                        <h6 class="font-weight-medium mb-3">{{$vc->city->nametp}}, 
                            <span>{{$vc->district->nameqh}}, </span>
                            <span>{{$vc->ward->namexptt}}</span>=>
                            <span>{{$vc->shipping_fee}}</span>
                        </h6>
                        @endforeach
                        <h6 class="font-weight-medium mb-3">Còn lại tất cả => 15000</h6>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                            @if(session()->get('fee'))
                            <h6 class="font-weight-medium">{{number_format(session()->get('fee'),0,',','.')}} VNĐ</h6>
                            <a href="{{url('/delete-fee')}}"><i class="fa-solid fa-trash"></i></a> 
                            @else
                            <h6 class="font-weight-medium">Không có </h6>
                            @endif
                        </div>
                       
                    </div>
                   
                </div>
                <!-- @php
                        echo (session()->get('fee'));
                        @endphp -->
                <!-- <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Checkout End -->
  
    @if (session('message'))
                <div class="alert alert-success" align="center">
                    {{ session('message') }}
                </div>
            

             @elseif (session('error'))
                <div class="alert alert-danger" align="center">
                    {{ session('error') }}
                </div>
               
             @endif

            @if(\Session::has('error'))
        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
        {{ \Session::forget('error') }}
    @endif
    @if(\Session::has('success'))
        <div class="alert alert-success">{{ \Session::get('success') }}</div>
        {{ \Session::forget('success') }}
    @endif
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                       
                     <!-- @php
                     echo '<pre>';
                        print_r(session()->get('cart'));
                        echo'</pre>';
                      @endphp -->
                      @if(session()->get('cart') ==null)
                                <tr><td colspan="6">Đăng ký tài khoản để được nhận mã khuyến mãi trong giỏ hàng của bạn</td></tr>

                            @else
                            @foreach(session()->get('cart') as $key => $value)
                            @php
                                    if (is_numeric($value['product_quanlity']) && is_numeric($value['product_price'])) {
                                            $subtotal = $value['product_price']*$value['product_quanlity'];
                                            $total+=$subtotal;
                                            }
                                     @endphp
                            <input type="hidden" name="cart_session_id" value="{{$value['session_id']}}"/>
                        <tr>
                            <td class="align-middle"><img src="{{asset($value['product_imge'])}}" alt="" style="width: 80px;"> {{$value['product_name']}}</td>
                            <td class="align-middle">{{number_format($value['product_price'],0,',','.')}} VNĐ</td>
                            <td class="align-middle">
                            
                                
                                    
                                    <sapn    class="form-control form-control-sm bg-secondary text-center" 
                                     >{{$value['product_quanlity']}}</span>
                                   
                               
                            
                            </td>
                            <td class="align-middle">{{number_format($subtotal,0,',','.')}} VNĐ</td>
                              
                        </tr>
                  
                      
                       
                      
                         @endforeach
                        @endif
                        
                    </tbody>
                   
                </table>
                
            </div>
           
            <div class="col-lg-4">
            @if(session()->get('cart'))
                <form class="mb-5" action="{{URL::to('/check-coupon')}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Nhập mã giảm giá" name="coupon">
                        <div class="input-group-append">
                            <button class="btn btn-primary check_coupon" name="check_coupon" type="submit" value="Mã giảm giá">Xác nhận</button>
                        </div>
                        @if(session()->get('coupon'))
                        <div class="input-group-append">
                           
                        <button class="btn btn-primary check_coupon" type="submit" > <a href="{{url('/unset-coupon')}}" style="color:black;">  Xóa </a></button>
                           
                        </div>
                        @endif
                    </div>
                </form>
                @endif
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng giá giỏ hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-semi-bold m-0">Tổng giá chưa được khuyến mãi</h6>
                            <h6 class="font-weight-medium">{{number_format($total,0,',','.')}} VNĐ</h6>
                        </div>
                       
                      
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-semi-bold m-0">
                            Sau khi khuyến mãi
                            </h6>
                            <h6 class="font-weight-medium">
                               
                          @if(session()->get('coupon'))
                                 @foreach(session()->get('coupon') as $key => $cou)
                                   @if($cou['coupon_condition']==1)
                                  <b>Được đã giảm: </b>  {{$cou['coupon_number']}}%
                                      <p>
                                        @php
                                       
                                          $total_coupon = ($total * $cou['coupon_number'])/100;
                                          $totaldiscount = $total - $total_coupon;
                                          echo '<p><b>Tổng giảm: </b>'.number_format($total_coupon,0,',','.'). 'VNĐ</p>';
                                        @endphp
                                      </p>
                                      <p><b>Tổng đã giảm:</b> {{number_format($total-$total_coupon,0,',','.')}}VNĐ</p>

                                      @elseif($cou['coupon_condition']==2)
                                     <b>Đã được giảm:</b>  {{number_format($cou['coupon_number'],0,',','.')}} VNĐ
                                           <p>
                                          @php
                                              $totaldiscount = $total - $cou['coupon_number'];
                                         
                                           @endphp
                                         </p>
                                         <p><b>Tổng đã giảm:</b> {{number_format($totaldiscount,0,',','.')}}VNĐ</p>
                                         @endif
                                 @endforeach
                              @else
                                <h6 class="font-weight-medium">Không có </h6>
                              @endif
       
                               
                               <!-- them code coupon o day -->
                            </h6>
                          
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium"><b>Phí vận chuyển</b></h6>
                            @if(session()->get('fee'))
                            <h6 class="font-weight-medium">{{number_format(session()->get('fee'),0,',','.')}} VNĐ</h6>
                          
                            @else
                            <h6 class="font-weight-medium">Không có </h6>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng chi phí</h5>
                            <h5 class="font-weight-bold">
                            @php
                            $transport_fee_freeship= session()->get('fee');
                            $totaltransportfreeship = $total + $transport_fee_freeship;

                            if(session()->get('fee') && !session()->get('coupon')){
                                $sum = $totaltransportfreeship;
                            echo number_format($sum,0,',','.') .'VNĐ';
                            
                            }elseif(!session()->get('fee') && session()->get('coupon')){
                                $sum = $totaldiscount;
                            echo number_format($sum,0,',','.') .'VNĐ';

                            }elseif(session()->get('fee') && session()->get('coupon')){
                                $sum = $totaldiscount;
                                $sum = $sum + session()->get('fee');
                            echo number_format($sum,0,',','.') .'VNĐ';

                            }elseif(!session()->get('fee') && !session()->get('coupon')){
                                $sum = $total;
                            echo number_format($sum,0,',','.') .'VNĐ';

                            }
                            @endphp
                            </h5>
                        </div>
                        @php
                                    $usd = round($sum/23357,2);
                                    session()->put('totalPaypal',$usd);
                                @endphp
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium"><b>Gía thanh toán PayPal</b></h6>
                            @if(session()->get('totalPaypal'))
                           
                            <!-- <input type="hidden" id="sum-ok-hidden" value="{{$usd}}"> -->
                            <h6 class="font-weight-medium">{{$usd}}usđ</h6>
                            @else
                            <h6 class="font-weight-medium">Không có </h6>
                            @endif
                        </div>

                    </div>
                    <a class="btn btn-primary m-3" href="{{ route('processTransaction') }}">Thanh toán Paypal</a>
                    <div id="paypal-button" align="center"></div>
                </div>
                   
                       
                        
                   
            </div>
        </div>
    </div>
    @endsection