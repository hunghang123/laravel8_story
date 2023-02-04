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
                                <h1>Thống kê</h1>
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
     <form autocomplete="off">
                    @csrf
              <div class="row">
               
                    <div class="col-lg-3">
                        <p>Từ ngày: <input type="text"  id="datepicker"></p>
                        <div><button type="button" id="filter-date" class="btn btn-danger">Lọc</button></div>
                    </div>
                    <div class="col-lg-3">
                        <p>Đến ngày: <input type="text" id="datepicker1"></p>
                    </div>
                    <div class="col-lg-3">
                        <p>Lọc theo:
                            <select class="filter-statistical-profit">
                                <option>-- Chọn lọc theo --</option>
                                <option value="sevenDay">7 ngày qua</option>
                                <option value="monthPrev">Tháng trước</option>
                                <option value="monthNext">Tháng này</option>
                                <option value="oneYear">1 năm qua</option>
                            </select>
                        </p>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="myfirstchart" style="height: 250px;"></div>
                    </div>
                </div>

                </form>
                
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <a class=""> Thống kê truy cập</a>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                   
                                        <tr>
                                        <th scope="col">Số người đang online</th>
                            <th scope="col">Số người truy cập tháng này</th>
                            <th scope="col">Số người truy cập tháng trước</th>
                            <th scope="col">Số người truy cập năm này</th>
                            <th scope="col">Tổng số người truy cập</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                         
                                        <tr>
                                        
                                            
                                           
                                        <td>{{$count}}</td>
                            <td>{{$countVisitorThisMonth}}</td>
                            <td>{{$countVisitorLastMonth}}</td>
                            <td>{{$countVisitorThisYear}}</td>
                            <td>{{$visitorAll}}</td>
                                        </tr>
                         
                                    </tbody>
                                </table>
                          
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="row">
                    <div class="col-lg-4">
                        <div id="statisticalTotal" style="height: 250px;"></div>
                    </div>
                    <div class="col-lg-4">
                        <h4>Sản phẩm xem nhiều</h4>
                        <ol>
                            @foreach ($product_customer_view as $item)
                            <li>
                                <a target="_blank" style="color: blueviolet" href="{{URL::to('/chitietsanpham',[$item->product_id])}}">{{$item->product_name}}|lượt xem:({{$item->product_view}})</a>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                    <div class="col-lg-4">
                        <h4>Bài viết xem nhiều</h4>
                        <ol>
                        @foreach ($news_customer_view as $itemnews)
                            <li>
                                <a target="_blank" style="color: blueviolet" href="{{URL::to('/chitiettintuc',[$itemnews->news_id])}}">{{$itemnews->news_name}}|lượt xem:({{$itemnews->news_view}})</a>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
</div>    

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



