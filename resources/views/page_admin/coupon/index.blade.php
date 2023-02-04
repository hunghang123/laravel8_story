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
                                <h1>Danh sách mã giảm giá</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('/send-coupon-vip')}}" class="btn btn-default">Gửi giảm giá khách víp</a></li>
                                    <li><a href="{{url('/send-coupon')}}" class="btn btn-default">Gửi giảm giá khách</a></li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <a class="btn btn-primary" onclick="return confirm('Bạn có muốn thêm ?')" href="{{URL::to('/coupon/create')}}"><i class="fa-solid fa-plus"></i> Add</a>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Mã</th>
                                            <th>Số lượng</th>
                                            <th>Số giảm giá</th>
                                            <th>Điều kiện giảm giá</th>
                                            <th>Ngày bắt đầu</th>
                                            <th>Ngày kết thúc</th>
                                            <th>Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach($coupon as $ma)
                                        <tr>
                                        
                                            
                                           
                                            <td>
                                            {{$ma->coupon_name}}</td>
                                            <td>{{$ma->coupon_code}}</td>
                                           
                                            <td> {{$ma->coupon_time}}</td>
                                            <td >
                                             @if($ma->coupon_condition==1)
                                             <b class = "text text-success">giảm theo %</b>
                                             @else
                                             <b class = "text text-danger ">giảm theo VNĐ</b>

                                            @endif
                                            </td>
                                            <td >
                                             @if($ma->coupon_condition==1)
                                             <b class = "text text-success">giảm {{$ma->coupon_number}} %</b>
                                             @else
                                             <b class = "text text-danger ">giảm {{$ma->coupon_number}} VNĐ</b>

                                            @endif
                                            </td>
                                            <td>{{$ma->coupon_date_start}}</td>
                                            <td>{{$ma->coupon_date_end}}</td>
                                            <td>
                                            
                                            <span>
                                            <a onclick="return confirm('Bạn có muốn sửa ?')" href="{{route('coupon.edit',[$ma->coupon_id])}}" class="text-center"><button class="border-0" ><i class="fa-solid fa-pen text-primary"></i></button></a>
                                                <form action="{{route('coupon.destroy',[$ma->coupon_id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf()
                                            <button class="border-0" onclick="return confirm('Bạn có muốn xóa ?')" ><i class="fa-solid fa-trash  text-danger"></i></button>
                                            </form>
                                            </span>
                                            
                                            </td>
                                        </tr>
                                      @endforeach
                               
                                    </tbody>
                                </table>
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



