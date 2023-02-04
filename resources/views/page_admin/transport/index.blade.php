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
                                <h1>Danh sách vận chuyển</h1>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <a class="btn btn-primary" onclick="return confirm('Bạn có muốn thêm ?')" href="{{URL::to('/transport/create')}}"><i class="fa-solid fa-plus"></i> Add</a>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                   
                                        <tr>
                                            <th>Tên thành phố</th>
                                            <th>Tên quận huyện</th>
                                            <th>Tên xã phường</th>
                                            <th>Phí ship</th>
                                            <th>Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach($transportFee as $key => $value)
                                        <tr>
                                        
                                            
                                           
                                            <td>
                                            {{$value->city->nametp}}</td>
                                            <td>{{$value->district->nameqh}}</td>
                                           
                                            <td> {{$value->ward->namexptt}}</td>
                                            <td contenteditable data-feeshipping_id="{{$value->feeship_id}}" class="fee_feeship_edit">{{$value->shipping_fee}}</td>

                                            <td>
                                            
                                            <span>
                                            
                                                <form action="{{route('transport.destroy',[$value->feeship_id])}}" method="POST">
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



