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
<div class="alert alert-danger">
{{ session('thong bao') }}
</div>
@endif
@if (session('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                <div class="col-lg-3">

                <!-- <form action="{{url('/import-excel')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-6 mb-4" style="display: flex">
                        <input type="file" name="import_file" accept=".xlsx">
                        <button type="submit" class="border-0" value="import_file_excel" name="import_csv"  style="color:black;"><i class="fas fa-upload" style="font-size:22px;"></i></button>
                    </div>
                </form>
            </div> -->
            <div class="col-lg-3">
                <form action="{{url('/export-excel')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-6 mb-4" style="display: flex">
                        <button type="submit" class="border-0" value="export_file_excel" name="export_csv" style="color:black;"><i class="fas fa-download" style="font-size:22px;"></i></button>
                    </div>
                </form>
            </div>
            
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Tình trạng đơn hàng</th>
                                        <th>Hình thức thanh toán</th>
                                        <th>Mã khuyến mãi</th>
                                        <th>Phí vận chuyển</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tác vụ</th>
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
                                            <b style="color:red;">Bằng Paypal</b>
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
                                            <a  href="{{URL::to('/show-order-detail/'.$value->order_code)}}" class="text-center"><button class="border-0" ><i class="fa-solid fa-asterisk text-warning"></i></button></a>
                                                <form action="{{route('order.destroy',[$value->order_id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf()
                                            <button class="border-0" onclick="return confirm('Bạn có muốn xóa ?')" ><i class="fa-solid fa-trash  text-danger"></i></button>
                                            </form>
                                            </span>
                                            
                                            </td>
                                            @php
                                              $qrcode_url = url('show-order-detail/'.$value->order_code);
                                              
                                            @endphp
                
                                            <td ><span>{!! QrCode::size(100)->backgroundColor(255,90,0)->generate($qrcode_url); !!}</span></td>
                                        </tr>
                                    @endforeach
                               
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                        {{$order->links()}}
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



