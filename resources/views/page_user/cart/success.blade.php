@extends('user_layout')
@section('content')

@if(\Session::has('error'))
        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
        {{ \Session::forget('error') }}
    @endif
    @if(\Session::has('success'))
        <div class="alert alert-success">{{ \Session::get('success') }}</div>
        {{ \Session::forget('success') }}
    @endif
 <!-- Page Header Start -->
 <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh Toán Thành Công</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{URL::to('/trang-chu')}}">Quay về trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                @if(session()->get('id'))
                <p class="m-0"><a href="{{URL::to('/history')}}">Lịch sử đơn hàng</a></p>
                @else
                <p class="m-0">Đăng ký tài khoản để xem lịch sử đơn hàng trên web</p>
                @endif
            </div>
            <div class="d-inline-flex">
                <p class="m-0">Hoặc cũng có thể kiểm tra lịch sử đơn hàng qua mail</a></p>
                
               
            </div>
        </div>
    </div>
    <!-- Page Header End -->

@endsection