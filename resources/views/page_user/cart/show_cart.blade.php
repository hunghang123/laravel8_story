@extends('user_layout')
@section('content')



    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{URL::to('/trang-chu')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    
    <!-- Cart Start -->
    @php
         $subtotal = 0;
         $total = 0;
         $transport_fee_freeship = 0;
         $totaldiscount = 0;
         $totaltransportfreeship = 0;
         $soluong = 0;
    @endphp

    @if (session('message'))
                <div class="alert alert-success" align="center">
                    {{ session('message') }}
                </div>
            

             @elseif (session('error'))
                <div class="alert alert-danger" align="center">
                    {{ session('error') }}
                </div>
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
                            <th>Yêu cầu</th>
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
                            $soluong++;
                         
                                    if (is_numeric($value['product_quanlity']) && is_numeric($value['product_price'])) {
                                            $subtotal = $value['product_price']*$value['product_quanlity'];
                                            $total+=$subtotal;
                                            }
                                     @endphp
                                        <!-- echo $soluong; -->
                            <input type="hidden" name="cart_session_id" value="{{$value['session_id']}}"/>
                        <tr id ="giohang">
                            <td class="align-middle"><img src="{{asset($value['product_imge'])}}" alt="" style="width: 80px;"> {{$value['product_name']}}</td>
                            <td class="align-middle">{{number_format($value['product_price'],0,',','.')}} VNĐ</td>
                            <td class="align-middle">
                            <form method='post'>
                                @csrf
                                <div class="input-group quantity mx-auto" id="quantiyCart{{$value['session_id']}}" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus"  data-session_id="{{$value['session_id']}}" type="button">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text"  min="1" class="form-control form-control-sm bg-secondary text-center" type="button"
                                     name="cart_quantity" value="{{$value['product_quanlity']}}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus" data-session_id="{{$value['session_id']}}" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </td>
                            <td class="align-middle">{{number_format($subtotal,0,',','.')}} VNĐ</td>
                               <td class="align-middle"><a href="{{url('/delete-cart/'.$value['session_id'])}}"><button class="btn btn-sm btn-primary">
                               <i class="fa fa-times"></i>  
                                </button></a> 
                               </td>
                        </tr>
                  
                      
                       
                      
                         @endforeach
                        @endif
                        
                    </tbody>
                   
                </table>
                @if(session()->get('cart'))
                       <div class="col-md-8 col-sm-12">
                            <div class="buttons-cart">
                            <td>
                                <a href="{{url('/')}}"> 
                                    <button onclick="return confirm('Bạn có muốn quay lại trang chủ ?')"  style="font-size: 12px;background-color:pink;">
                                    <i class="fa-solid fa-backward"></i>
                                    </button>
                                </a>

                                <a href="{{url('/delete-all-cart')}}">
                                <button onclick="return confirm('Bạn có muốn xóa toàn bộ giỏ hàng không ?')" style="font-size: 12px;background-color:red;"><i style="background-color:red;" class="fa-solid fa-xmark"></i>
                                 </button>
                                  
                                </a>
                                </td>
                            </div>
                        </div>
                @endif
            </div>
           
            <div class="col-lg-4">
              
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng giá giỏ hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-semi-bold m-0">Tổng giá chưa được khuyến mãi</h6>
                            <!-- <h6 class="font-weight-medium">{{$soluong}}</h6> -->
                            <h6 class="font-weight-medium">{{number_format($total,0,',','.')}} VNĐ</h6>
                        </div>
                       
                       
                        
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                       
                       
                        <a href="{{url('/show-checkout')}}"><button class="btn btn-block btn-primary my-3 py-3">Xác nhận đặt hàng</button></a>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->



@endsection