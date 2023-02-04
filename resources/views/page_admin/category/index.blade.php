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
                                <h1>Danh sách danh mục</h1>
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
        @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
             @endif
             @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
             @endif
             @php
           $i = 0;
           @endphp
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <a class="btn btn-primary" onclick="return confirm('Bạn có muốn thêm ?')" href="{{URL::to('/category/create')}}"><i class="fa-solid fa-plus"></i> Add</a>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>Tên</th>
                                            <th>Ngày tháng</th>
                                            <th>Update time</th>
                                            <th>Mô tả</th>
                                            <th>Ảnh</th>
                                            <th>Parent</th>
                                            <th>Trạng thái</th>
                                            <th>Tác vụ</th>
                                            <th>nối dữ liệu/th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach($category as $cate)
                                        <tr>
                                        
                                            <td>{{$cate->category_name}}</td>
                                            <td>{{$cate->create_at}}</td>
                                            <td>{{$cate->update_at}}</td>
                                            <td>{!!$cate->category_desc!!}</td>
                                            <td><img src="{{asset($cate->category_image)}}" height="150px" width="150px"></td>
                                            <td> @if($cate->category_parents==0)
                                                <span class = "text text-success">Danh mục cha </span>
                                                @else
                                                <span class = "text text-danger"> Danh mục con </span>
                                                @endif</td>
                                            <td >
                                            @if($cate->category_status==1)
                                                <span  ><a href="{{route('category.active',['id'=>$cate->category_id])}}"  class = "text text-success fs-2"><i class="fa-solid fa-toggle-on " style="font-size:22px;"></i> </a> </span>
                                            @else
                                                <span > <a href="{{route('category.active',['id'=>$cate->category_id])}}" class = "text text-danger fs-2"><i class="fa-solid fa-toggle-off " style="font-size:22px;"></i></a> </span>
                                            @endif
                                            </td>
                                            <td>
                                            
                                            <span>
                                            <a onclick="return confirm('Bạn có muốn sửa ?')" href="{{route('category.edit',[$cate->category_id])}}" class="text-center"><button class="border-0" ><i class="fa-solid fa-pen text-primary"></i></button></a>
                                                <form action="{{route('category.destroy',[$cate->category_id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf()
                                            <button class="border-0" onclick="return confirm('Bạn có muốn xóa ?')" ><i class="fa-solid fa-trash  text-danger"></i></button>
                                            </form>
                                            </span>
                                            
                                            </td>
                                            <td><p>{{$cate->category_name}}</p> <p>{{$cate->create_at}}</p></td>
                                        </tr>
                                      
                                   @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$category->links()}}
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



