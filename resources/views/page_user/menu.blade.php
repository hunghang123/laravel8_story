<?php
                                                        $customer_name = Session::get('name');
                                                        $userId = Session::get('id');
                                                    ?>
<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                        @if($customer_name)
                            <a href="{{URL::to('/trang-chu')}}" class="nav-item nav-link active">Trang chủ</a>
                            <a href="{{URL::to('/xemtatcasanpham')}}" class="nav-item nav-link">Sản phẩm</a>
                            <a href="{{URL::to('/show-cart')}}" class="nav-item nav-link">giỏ hàng</a>
                            <a href="{{URL::to('/tintuc')}}" class="nav-item nav-link">Tin tức</a>
                            <a href="{{URL::to('/khuyenmai')}}" class="nav-item nav-link">Khuyến mãi</a>
                            <!-- <a href="#" class="nav-item nav-link">Liên hệ</a> -->
                         @else
                         <a href="{{URL::to('/trang-chu')}}" class="nav-item nav-link active">Trang chủ</a>
                            <a href="{{URL::to('/xemtatcasanpham')}}" class="nav-item nav-link">Sản phẩm</a>
                            <a href="{{URL::to('/show-cart')}}" class="nav-item nav-link">giỏ hàng</a>
                            <a href="{{URL::to('/tintuc')}}" class="nav-item nav-link">Tin tức</a>
                            <!-- <a href="#" class="nav-item nav-link">Liên hệ</a> -->
                         @endif
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                       
                            @if($customer_name)
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa-solid fa-user"></i>Xin chào:<?php echo $customer_name ; ?></a>
                                <!-- <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div> -->
                            </div>
                            <a href="{{URL::to('/history')}}" class="nav-item nav-link">Lịch sử đơn hàng</a>
                            <a href="{{URL::to('/user_logout')}}" class="nav-item nav-link">Logout</a>
                            
                            @else
                            <a href="{{URL::to('/user/login')}}" class="nav-item nav-link">Đăng nhập</a>
                            <a href="{{URL::to('/user/register')}}" class="nav-item nav-link">Đăng ký</a>
                            @endif
                        </div>
                    </div>
                </nav>
