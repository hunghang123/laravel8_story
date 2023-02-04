@extends('admin_layout')
@section('content')


    <!-- Left Panel -->

    <!-- Right Panel -->

   

        <!-- Header-->
        
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Danh sách đơn hàng </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                @if (session('thong bao'))
                      <div class="alert alert-success">
                             {{ session('thong bao') }}
                                 </div>
                                @endif
                          @if (session('message'))
                        <div class="alert alert-success">
                      {{ session('message') }}
                                           </div>
                                 @endif
                             @php
                                 $subtotal = 0;
                              $total = 0;
                                $totalDiscounCode = 0;
                                 $totalAfter = 0;
                              @endphp
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                <h3 style="text-align:right;"><a href="{{URL::to('/order')}}"><i class="fa-solid fa-power-off text-danger"></i></a></h3>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        <th>Sản phẩm</th>
                                   
                                    <th>Giá</th>
                                    <th>Giá gốc</th>
                                    <th>Số lượng</th>
                                    <th>Số lượng kho</th>
                                    
                                    <th>Người nhận </th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Tổng tiền</th>
                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @foreach( $order_details as $key => $value)
                                       @php
                                        $subtotal = $value->product->product_price * $value->product_quanlity;
                                        $total += $subtotal;
                                        @endphp
                                       
                                        <tr class="color_qty_{{$value->product_id}}">
                                        
                                           
                                           
                                            <td><img
                                            src="{{asset($value->product->product_imge)}}"
                                            height="100px" width="100px"><span>{{$value->product->product_name}}</span></td>
                                            <td>{{number_format($value->product->product_price,0,',','.')}} VNĐ</td>
                                            <td>{{number_format($value->product->product_price_cost,0,',','.')}} VNĐ</td>
                                            <td>
                                                <input type="number" min= "1" {{$order_status==2 || $order_status==3 ||  $order_status==4? 'disabled' : ''}} class="qty_{{$value->product_id}}" value="{{$value->product_quanlity}}" name="product_sales_quanlity">

                                                <input type="hidden" value="{{$value->order_code}}" class="order_code" name="order_code"/>
                                                
                                                <input type="hidden" value="{{$value->product->product_quanlity}}" class="order_qty_storage_{{$value->product_id}}" name="order_qty_storage"/>

                                                <input type="hidden" value="{{$value->product_id}}" class="quantity_wasehouse" name="quantity_wasehouse"/>
                                                 @if($order_status!=2 && $order_status!=3 && $order_status!=4) 
                                                <button style="color:black;"class="btn btn-defaults update_quanlity_order" data-product_id="{{$value->product_id}}" name="update_quanlity_order">Cập nhật</button>
                                                @endif
                                            </td>
                                            <td>{{$value->product->product_quanlity}}</td>
                                            <td>{{$order->shipping->shipping_name}}</td>
                                            <td>{{$order->shipping->shipping_address}}</td>
                                            <td>{{$order->shipping->shipping_phone}}</td>
                                            <td>{{number_format($subtotal,0,',','.')}} VNĐ</td>
                                        </tr>
                                  
                               @endforeach


                               <tr>
                              <td colspan="9" class="textright_text" style="text-align: right;">
                                 <div class="sum_price_all">
                                    <span class="text_price">Tổng tiền 
                                       
                                    </span>: 
                                    <span class="text_price color_red"><b>{{number_format($total,0,',','.')}} VNĐ</b></span>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                           @php
                                                if($discountCodeCondition == 1){
                                                    $totalDiscounCode = ($total * $discountCodePrice)/100;
                                                    echo'
                              <td colspan="9" class="textright_text" style="text-align: right;">
                                 <div class="sum_price_all">
                                    <span class="text_price">Gía khuyến mãi 
                                       
                                    </span>: 
                                    <span class="text_price color_red"><b>'.number_format($totalDiscounCode,0,',','.').'đ</b></span>
                                 </div>
                              </td>
                              ';
                              $totalAfter = $total- $totalDiscounCode;
                                                }else{
                                                    echo'
                              <td colspan="9" class="textright_text" style="text-align: right;">
                                 <div class="sum_price_all">
                                    <span class="text_price">Gía khuyến mãi 
                                       
                                    </span>: 
                                    <span class="text_price color_red"><b>'.number_format($discountCodePrice,0,',','.').'đ</b></span>
                                 </div>
                              </td>';
                              $totalAfter = $total- $discountCodePrice;
                                                }
                              @endphp
                           </tr>

                         
                              <td colspan="9" class="textright_text" style="text-align: right;">
                                 <div class="sum_price_all">
                                    <span class="text_price">Phí vận chuyển
                                       
                                    </span>: 
                                    <span class="text_price color_red"><b>{{number_format($transportFee,0,',','.')}}đ</b></span>
                                    @php
                                                $totalAfter += $transportFee ;
                                        @endphp
                                 </div>
                              </td>
                           </tr>
                                
                                    <tr>
                              <td colspan="9" class="textright_text" style="text-align: right;">
                                 <div class="sum_price_all">
                                    <span class="text_price">Tổng tiền thành toán
                                       
                                    </span>: 
                                    <span class="text_price color_red"><b>{{number_format($totalAfter,0,',','.')}} VNĐ</b></span>
                                 </div>
                              </td>
                           </tr>
                         <tr>
                         <td colspan="9" >
                            @foreach($order2 as $key => $or)
                            @if($or->order_status == 1)
                        <form>
                            @csrf
                         <div class="row form-group">
                                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Trạng thái</label></div>
                                <div class="col-12 col">
                                    <select name="category" id="selectSm" class="form-control-sm form-control order_details">
                                        <option value="0">----Chọn danh mục----</option>
                                       
                                                    <option id="{{$or->order_id}}" selected value="1">Đơn hàng mới</option>
                                                    <option id="{{$or->order_id}}" value="2">Đang giao hàng</option>
                                                    <option id="{{$or->order_id}}" value="3">Thành công</option>
                                                    <option id="{{$or->order_id}}" value="4">Hủy đơn</option>
                                               
                                    </select>
                                </div>
                            </div>
                            </form>
                            @elseif($or->order_status == 2)
                            <form>
                            @csrf
                         <div class="row form-group">
                                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Trạng thái</label></div>
                                <div class="col-12 col">
                                    <select name="category" id="selectSm" class="form-control-sm form-control order_details">
                                        <option value="0">----Chọn danh mục----</option>
                                       
                                                    <option id="{{$or->order_id}}" value="1">Đơn hàng mới</option>
                                                    <option id="{{$or->order_id}}" selected value="2">Đang giao hàng</option>
                                                    <option id="{{$or->order_id}}" value="3">Thành công</option>
                                                    <option id="{{$or->order_id}}" value="4">Hủy đơn</option>
                                               
                                    </select>
                                </div>
                            </div>
                            </form>
                            @elseif($or->order_status == 3)
                            <form>
                            @csrf
                         <div class="row form-group">
                                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Trạng thái</label></div>
                                <div class="col-12 col">
                                    <select name="category" id="selectSm" class="form-control-sm form-control order_details">
                                        <option value="0">----Chọn danh mục----</option>
                                       
                                                    <option id="{{$or->order_id}}" value="1">Đơn hàng mới</option>
                                                    <option id="{{$or->order_id}}"  value="2">Đang giao hàng</option>
                                                    <option id="{{$or->order_id}}" selected value="3">Thành công</option>
                                                    <option id="{{$or->order_id}}" value="4">Hủy đơn</option>
                                               
                                    </select>
                                </div>
                            </div>
                            </form>
                            @else
                            <form>
                            @csrf
                         <div class="row form-group">
                                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Trạng thái</label></div>
                                <div class="col-12 col">
                                    <select name="category" id="selectSm" class="form-control-sm form-control order_details">
                                        <option value="0">----Chọn danh mục----</option>
                                       
                                                    <option id="{{$or->order_id}}" value="1">Đơn hàng mới</option>
                                                    <option id="{{$or->order_id}}"  value="2">Đang giao hàng</option>
                                                    <option id="{{$or->order_id}}"  value="3">Thành công</option>
                                                    <option id="{{$or->order_id}}" selected value="4">Hủy đơn</option>
                                               
                                    </select>
                                </div>
                            </div>
                            </form>
                            @endif
                            @endforeach
                         </td>
                         </tr>
                           
                                    </tbody>
                                </table>
                                <a href="{{url('/print-order/'.$order->order_code)}}" style="color:black;"><i class="fa-solid fa-print" style="font-size:22px;"></i></a>
                            </div>
                        </div>
                    </div>
                   

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
   @endsection



