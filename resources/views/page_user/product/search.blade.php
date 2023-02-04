@extends('user_layout')
@section('content')
<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Kết quả tìm kiếm</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @if($keyword == null)
            <tr><td colspan="6">Không tìm thấy</td></td></tr>
            @else
        @foreach($search_product as $key => $sanpham)
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
                    <input type="hidden" id="session_id">
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
                    <form>
                </div>
            </div>
        @endforeach
        @endif
        </div>
    </div>
@endsection