@extends('user_layout')
@section('content')


<div class="container-fluid py-5">
    <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-0">
                    <a class="nav-item nav-link active" data-toggle="tab" style="color:red;">Các loại khuyến mãi</a>
                  
                </div>
                <br>
                
                <h5><b style = "color:Red;"> Lưu ý khách hàng chỉ chọn được một mã khuyến mãi duy nhất</b></h5>
                <br>
                @foreach($coupon as $value)
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                   
                        <h4 class="mb-3">{{$value->coupon_name}}</h4>
                        <p>
                            
                        @if($value->coupon_condition==1)
                    <b>Giảm giá lên đến {{$value->coupon_number}} % cho mỗi món sản phẩm  trên trang web của chúng tôi</b>
                    <p><b>Mã giảm giá: </b>{{$value->coupon_code}}</p>
                    @elseif($value->coupon_condition==2)
                    <b>Giảm giá lên đến {{$value->coupon_number}} VNĐ cho mỗi món sản phẩm  trên trang web của chúng tôi</b>
                    <p><b>Mã giảm giá: </b>{{$value->coupon_code}}</p>
                    @endif
                        </p>
                        <p id="date">Bắt đầu: {{$value->coupon_date_start}} - Kết thúc: {{$value->coupon_date_end}}</p>
                    </div>
                    <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                   
                   
                </div>
                   
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection