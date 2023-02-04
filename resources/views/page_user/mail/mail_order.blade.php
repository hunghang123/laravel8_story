<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đặt hàng thành công</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="col-lg-6" style="text-align: center;">
        <h3>CÔNG TY BÁN TRUYỆN TRANH HNH</h3>
        <h5>UY TÍN - CHẤT LƯỢNG - GIÁ CẢ PHÙ HỢP</h5>
    </div>
    <div class="col-lg-6">
        <h4>Chào bạn: {{$arrayShipping['shipping_name']}}</h4>
        <h4>Số điện thoại: {{$arrayShipping['shipping_phone']}}</h4>
        <h4>Địa chỉ: {{$arrayShipping['shipping_address']}}</h4>
       
        <h4>Ghi chú: {{$arrayShipping['shipping_note']}}</h4>
    </div>
                                              @php
                                              $qrcode_url = url('show-order-detail/'.$codeOrder['order_code']);
                                            @endphp
                                    
      <br>
    <div class="col-lg-12">
        <h2 style="text-align: center">Bạn có đơn hàng vào ngày hôm nay, thông tin đơn hàng như sau:</h2>
        <h4 style="color:aqua; text-transform:uppercase;">Bạn có đơn hàng vào ngày hôm nay, thông tin đơn hàng như sau:</h4>
        <p>Mã đơn hàng: {{$codeOrder['order_code']}}</p>
        <p>Mã khuyến mãi: {{$codeOrder['coupon_code']}}</p>
        <p>Phí vận chuyển: {{$codeOrder['order_feeship']}}đ</p>
        <p>Phương thức thanh toán: 
            @if($arrayShipping['shipping_default']==0)
              <span style="color:red;"><b>Tiền mặt</b></span>
            @elseif($arrayShipping['shipping_default']==1)
            <span style="color:orange;"><b>Chuyển khoản</b></span>
            @else
            <span style="color:orange;"><b>Paypal</b></span>
            @endif
        </p>
        <p ><span>{!! QrCode::size(100)->backgroundColor(255,90,0)->generate($qrcode_url); !!}</span></p>
    </div>
        <h4>Thông tin sản phẩm</h4>
        <table class="table table-dark table-hover" border="1">
            <thead>
              <tr>
                <th>Sản phẩm</th>
                <th>Giá tiền</th>
                <th>Số lượng đã đặt</th>
                <th>Thành tiền</th>
              </tr>
            </thead>
            <tbody>
                @php
                $subTotal = 0;
                $total = 0;
                $discountCode = 0;
                $transportFee = 0;
                $totalAfter= 0;
                @endphp
                @foreach($arrayCartOrder as $value)
                    @php
                        $subTotal = $value['product_price']* $value['product_quanlity'];
                        $total += $subTotal
                    @endphp
                    
              <tr>
                <td>{{$value['product_name']}}</td>
                <td>{{number_format($value['product_price'],0,',','.')}} VNĐ</td>
                <td>{{$value['product_quanlity']}}</td>
                <td>{{number_format($subTotal,0,',','.')}} VNĐ</td>
              </tr>
              @endforeach
              <tr>
                    <td>Tổng: {{number_format($total,0,',','.')}}đ</td>
              </tr>
              <tr>
                @php
                if($codeOrder['coupon_condition']==1){
                    $discountCode = ($total * $codeOrder['coupon_number'])/100;
                    echo  '<td><span style="padding-left: 0px">Giá khuyến mãi:</span></td><td><span style="padding-left: 5px">'.number_format($discountCode,0,',','.').'VNĐ</span></td>';
                    $totalAfter = $total- $discountCode;
                }else{
                    echo  '<td><span>Giá khuyến mãi:</span></td><td><span style="padding-left: 5px">'.number_format($codeOrder['coupon_number'],0,',','.').'VNĐ</span></td>';
                    $totalAfter = $total- $codeOrder['coupon_number'];
                }
                @endphp
              </tr>
              <tr>
                <td>
                    <span>Phí vận chuyển:</span>
                </td>
                <td>
                    <span>{{number_format($codeOrder['order_feeship'],0,',','.')}} VNĐ</span>
                    @php
                            $totalAfter += $codeOrder['order_feeship'] ;
                    @endphp
                </td>
            </tr>
            <tr>
                <td>Tổng thanh toán: {{number_format($totalAfter,0,',','.')}} VNĐ</td>
            </tr>
            </tbody>
          </table>
    <div class="row">
        <h1 style="color:brown">Mọi chi tiết xin liên hệ đến sdt: 0937693170 để được chúng tôi liên lạc sớm nhất!</h1>
    </div>

</body>
</html>
