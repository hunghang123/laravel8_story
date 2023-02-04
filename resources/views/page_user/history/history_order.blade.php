@extends('user_layout')
@section('content')

                       <h3 align="center"> <b>Lịch sử đơn hàng</b> </h3>
                            <br>
<table id="bootstrap-data-table" class="table table-striped table-bordered" border="1">
                                    <thead>
                                        <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Tình trạng đơn hàng</th>
                                        <th>Hình thức thanh toán</th>
                                        <th>Mã khuyến mãi</th>
                                        <th>Phí vận chuyển</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Chi tiết</th>
                                        <th>Qrcode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order as $key => $value)
                           
                                        <tr>
                                            <td>
                                            {{$value->order_code}}</td>
                                            <td><span>
                                            @if($value->order_status == 1)
                                                <b style="color:red;">Đơn hàng mới</b>
                                            @elseif($value->order_status == 2)
                                                <b style="color:green;">Đang giao hàng</b>
                                            @elseif($value->order_status == 3)
                                            <b style="color:yellow;">Thành công </b>
                                            @elseif($value->order_status == 4)
                                            <b style="color:violet;">Hủy đơn hàng </b>
                                            @endif
                                        </span></td>
                                           
                                            <td> 
                                            @if($value->shipping->shipping_default == 0)
                                                <b style="color:red;">Tiền mặt</b>
                                            @elseif($value->shipping->shipping_default == 1)
                                            <b style="color:red;">Chuyển khoản</b>

                                            @else
                                            <b style="color:red;">Paypal</b>
                                            @endif
                                            </td>
                                            <td>
                                            @if($value->order_coupon)
                                            <b><span>{{$value->order_coupon}}</span></b>
                                            @else
                                            <b><span>Không có mã</span></b>
                                            @endif
                                            </td>
                                            <td >
                                            {{number_format($value->order_feeship,0,',','.')}} VNĐ
                                            </td>

                                           

                                            <td>{{$value->order_date}}</td>
                                           
                                            <td>
                                            
                                            <span>
                                            <a  href="{{URL::to('/view-order-detail/'.$value->order_code)}}" class="text-center"><button class="border-0" ><i class="fa-solid fa-asterisk text-warning"></i></button></a>
                                                <!-- <form action="{{route('order.destroy',[$value->order_id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf()
                                            <button class="border-0" onclick="return confirm('Bạn có muốn xóa ?')" ><i class="fa-solid fa-trash  text-danger"></i></button>
                                            </form> -->
                                            </span>
                                            
                                            </td>
                                            @php
                                              $qrcode_url = url('view-order-detail/'.$value->order_code);
                                              
                                            @endphp
                
                                            <td ><span>{!! QrCode::size(100)->generate($qrcode_url); !!}</span></td>
                                        </tr>
                                    @endforeach
                               
                                    </tbody>
                                </table>
                                {{$order->links()}}
@endsection