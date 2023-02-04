@extends('user_layout')
@section('content')
<style>
.product-img .product-tags .tag-saleoff {
    position: absolute;
    top: 0px;
    right: 0px;
    z-index: 1;
    background: #d51c24;
    height: 40px;
    width: 40px;
    line-height: 40px;
    border-radius: 50%;
    color: #fff;
}
</style>


    
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm Mới</span></h2>
            <h6  style="text-align:right; color:blue;"><b class="px-3"><a href="{{URL::to('/xemtatcasanpham')}}">Xem tất cả</a></b></h6>
      
        </div>
        <div class="row px-xl-5 pb-3">
        @foreach($product as $key => $sanpham)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            
                <div class="card product-item border-0 mb-4">
                    <form>
                    @csrf
                    <input type="hidden" id="viewed-products-id" value="{{$sanpham->product_id}}" 
                    class="cart_product_id_{{$sanpham->product_id}}">
                    <input type="hidden" id="viewed-products-name{{$sanpham->product_id}}" value="{{$sanpham->product_name}}"
                    class="cart_product_name_{{$sanpham->product_id}}">
                    <input type="hidden" id="viewed-products-quanlity{{$sanpham->product_id}}" value="1"
                    class="cart_product_quanlity_{{$sanpham->product_id}}">
                    <input type="hidden" id="viewed-products-imge{{$sanpham->product_id}}" value="{{$sanpham->product_imge}}"
                    class="cart_product_imge_{{$sanpham->product_id}}">
                    <input type="hidden" id="viewed-products-promotion{{$sanpham->product_id}}" value="{{$sanpham->product_promotion}}"
                    class="cart_product_promotion_{{$sanpham->product_id}}">
                    <input type="hidden" id="viewed-products-price{{$sanpham->product_id}}" value="{{$sanpham->product_price}}"
                    class="cart_product_price_{{$sanpham->product_id}}">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <a href="{{URL::to('/chitietsanpham',[$sanpham->product_id])}}" >
                        <img class="img-fluid w-100" src="{{asset($sanpham->product_imge)}}" alt="" >
                       </a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$sanpham->product_name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6 style="color:blue;">{{number_format($sanpham->product_price)}} VNĐ</i></h6><h6 class="text-muted ml-2 tag-saleoff" >Khuyến mãi: <ins style="color:red;">{{$sanpham->product_promotion}}</ins></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{URL::to('/chitietsanpham',[$sanpham->product_id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                        <button type="button" data-id_product="{{$sanpham->product_id}}" class="btn btn-sm text-dark p-0 add-to-cart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                    </div>
                    </form>
                </div>
            </div>
        @endforeach
        </div>
    </div>


    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm ngẫu nhiên</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
        @foreach($producthot as $key => $sanphamhot)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                <form>
                @csrf
                    <input type="hidden" id="viewed-products-id" value="{{$sanphamhot->product_id}}" 
                    class="cart_product_id_{{$sanphamhot->product_id}}">
                    <input type="hidden" id="viewed-products-name{{$sanphamhot->product_id}}" value="{{$sanphamhot->product_name}}"
                    class="cart_product_name_{{$sanphamhot->product_id}}">
                    <input type="hidden" id="viewed-products-quanlity{{$sanphamhot->product_id}}" value="1"
                    class="cart_product_quanlity_{{$sanphamhot->product_id}}">
                    <input type="hidden" id="viewed-products-imge{{$sanphamhot->product_id}}" value="{{$sanphamhot->product_imge}}"
                    class="cart_product_imge_{{$sanphamhot->product_id}}">
                    <input type="hidden" id="viewed-products-promotion{{$sanphamhot->product_id}}" value="{{$sanphamhot->product_promotion}}"
                    class="cart_product_promotion_{{$sanphamhot->product_id}}">
                    <input type="hidden" id="viewed-products-price{{$sanphamhot->product_id}}" value="{{$sanphamhot->product_price}}"
                    class="cart_product_price_{{$sanphamhot->product_id}}">
                    <input type="hidden" id="session_id">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <a href="{{URL::to('/chitietsanpham',[$sanphamhot->product_id])}}" >
                        <img class="img-fluid w-100" src="{{asset($sanphamhot->product_imge)}}" alt="">
                        </a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$sanphamhot->product_name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{number_format($sanphamhot->product_price)}} VNĐ</h6><h6 class="text-muted ml-2">Khuyến mãi: <ins style="color:red;">{{$sanphamhot->product_promotion}}</ins></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{URL::to('/chitietsanpham',[$sanphamhot->product_id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                        <button type="button" data-id_product="{{$sanphamhot->product_id}}" class="btn btn-sm text-dark p-0 add-to-cart"><i class="fas fa-shopping-cart text-primary mr-1 "></i>Add To Cart</button>
                    </div>
                    <form>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <!-- <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm được xem nhiều</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
        @foreach($productview as $key => $sanphamview)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                <form>
                @csrf
                    <input type="hidden" id="viewed-products-id" value="{{$sanphamview->product_id}}" 
                    class="cart_product_id_{{$sanphamview->product_id}}">
                    <input type="hidden" id="viewed-products-name{{$sanphamview->product_id}}" value="{{$sanphamview->product_name}}"
                    class="cart_product_name_{{$sanphamview->product_id}}">
                    <input type="hidden" id="viewed-products-quanlity{{$sanphamview->product_id}}" value="1"
                    class="cart_product_quanlity_{{$sanphamview->product_id}}">
                    <input type="hidden" id="viewed-products-imge{{$sanphamview->product_id}}" value="{{$sanphamview->product_imge}}"
                    class="cart_product_imge_{{$sanphamview->product_id}}">
                    <input type="hidden" id="viewed-products-promotion{{$sanphamview->product_id}}" value="{{$sanphamview->product_promotion}}"
                    class="cart_product_promotion_{{$sanphamview->product_id}}">
                    <input type="hidden" id="viewed-products-price{{$sanphamview->product_id}}" value="{{$sanphamview->product_price}}"
                    class="cart_product_price_{{$sanphamview->product_id}}">
                    <input type="hidden" id="session_id">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <a href="{{URL::to('/chitietsanpham',[$sanphamview->product_id])}}" >
                        <img class="img-fluid w-100" src="{{asset($sanphamview->product_imge)}}" alt="">
                        </a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$sanphamview->product_name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{number_format($sanphamview->product_price)}} VNĐ</h6><h6 class="text-muted ml-2">Khuyến mãi: <ins style="color:red;">{{$sanphamview->product_promotion}}</ins></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{URL::to('/chitietsanpham',[$sanphamview->product_id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                        <button type="button" data-id_product="{{$sanphamview->product_id}}" class="btn btn-sm text-dark p-0 add-to-cart"><i class="fas fa-shopping-cart text-primary mr-1 "></i>Add To Cart</button>
                    </div>
                    <form>
                </div>
            </div>
            @endforeach
        </div>
    </div> -->
   

    <!-- <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm mua nhiều nhất</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
        @foreach($order as $key => $donhang)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                <form>
                @csrf
                    <input type="hidden" id="viewed-products-id" value="{{$donhang->product->product_id}}" 
                    class="cart_product_id_{{$donhang->product->product_id}}">
                    <input type="hidden" id="viewed-products-name{{$donhang->product->product_id}}" value="{{$donhang->product->product_name}}"
                    class="cart_product_name_{{$donhang->product->product_id}}">
                    <input type="hidden" id="viewed-products-quanlity{{$donhang->product->product_id}}" value="1"
                    class="cart_product_quanlity_{{$donhang->product->product_id}}">
                    <input type="hidden" id="viewed-products-imge{{$donhang->product->product_id}}" value="{{$donhang->product->product_imge}}"
                    class="cart_product_imge_{{$donhang->product->product_id}}">
                    <input type="hidden" id="viewed-products-promotion{{$donhang->product->product_id}}" value="{{$donhang->product->product_promotion}}"
                    class="cart_product_promotion_{{$donhang->product->product_id}}">
                    <input type="hidden" id="viewed-products-price{{$donhang->product->product_id}}" value="{{$donhang->product->product_price}}"
                    class="cart_product_price_{{$donhang->product->product_id}}">
                    <input type="hidden" id="session_id">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <a href="{{URL::to('/chitietsanpham',[$donhang->product->product_id])}}" >
                        <img class="img-fluid w-100" src="{{asset($donhang->product->product_imge)}}" alt="">
                        </a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$donhang->product->product_name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{number_format($donhang->product->product_price)}} VNĐ</h6><h6 class="text-muted ml-2">Khuyến mãi: <ins style="color:red;">{{$donhang->product->product_promotion}}</ins></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{URL::to('/chitietsanpham',[$donhang->product->product_id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                        <button type="button" data-id_product="{{$donhang->product->product_id}}" class="btn btn-sm text-dark p-0 add-to-cart"><i class="fas fa-shopping-cart text-primary mr-1 "></i>Add To Cart</button>
                    </div>
                    <form>
                </div>
            </div>
            @endforeach
        </div>
    </div> -->
@endsection
