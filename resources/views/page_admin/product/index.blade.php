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
                                <h1>Danh sách sản phẩm</h1>
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
        </div>
             @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
             
             @elseif (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
             @endif
         
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <a class="btn btn-primary" onclick="return confirm('Bạn có muốn thêm ?')" href="{{URL::to('/product/create')}}"><i class="fa-solid fa-plus"></i> Add</a>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                 
                                            <th>Tên</th>
                                            <th>Số lượng</th>
                                            <th>Hình ảnh</th>
                                            <th>Gía</th>
                                            <th>Gía gốc</th>
                                            <th>Khuyến mãi</th>
                                            <th>Danh mục</th>
                                            <th>Tác vụ</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $key => $sanpham)
                                        <tr>
                                      
                                            <td>{{$sanpham->product_name}}</td>
                                            <td>{{$sanpham->product_quanlity}}</td>
                                            <td><img src="{{asset($sanpham->product_imge)}}" height="150px" width="150px"></td>
                                            <td>{{number_format($sanpham->product_price)}}</td>
                                            <td>{{number_format($sanpham->product_price_cost)}}</td>
                                            <td>{{$sanpham->product_promotion}}</td>
                                            <td>{{$sanpham->danhmucsanpham->category_name}}</td>
                                          
                                            <td>
                                            <span>
                                            <a onclick="return confirm('Bạn có muốn sửa ?')" href="{{route('product.edit',[$sanpham->product_id])}}" class="text-center"><button class="border-0" ><i class="fa-solid fa-pen text-primary"></i></button></a>
                                                <form action="{{route('product.destroy',[$sanpham->product_id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf()
                                            <button class="border-0" onclick="return confirm('Bạn có muốn xóa ?')" ><i class="fa-solid fa-trash  text-danger"></i></button>
                                            </form>
                                            </span>
                                            
                                            </td>
                                        
                                            <td >
                                            @if($sanpham->product_active==1)
                                                <span  ><a href="{{route('product.active',['id'=>$sanpham->product_id])}}"  class = "text text-success fs-2"><i class="fa-solid fa-toggle-on " style="font-size:22px;"></i> </a> </span>
                                            @else
                                                <span > <a href="{{route('product.active',['id'=>$sanpham->product_id])}}" class = "text text-danger fs-2"><i class="fa-solid fa-toggle-off " style="font-size:22px;"></i></a> </span>
                                            @endif
                                            </td>
                                        </tr>
                                      @endforeach
                                   
                                    </tbody>
                                </table>
                            </div>
                            {{$product->links()}}
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



