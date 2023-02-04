@extends('admin_layout')
@section('content')
  


                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Sửa mã</strong>
                                
                            </div>
                            @if ($errors->any())
                        <div class="alert alert-danger">
                             <ul>
                          @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                             @endforeach
                                  </ul>
                          </div>
                        @endif
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Danh mục mã giảm giá</h3>
                                            <h3 style="text-align:right;"><a href="{{URL::to('/coupon')}}"><i class="fa-solid fa-power-off text-danger"></i></a></h3>
                                        </div>
                                        <hr>
                                        @if (session('status'))
                                          <div class="alert alert-success">
                                         {{ session('status') }}
                                           </div>
                                          @endif
                                        <form action="{{route('coupon.update',[$danhmuc->coupon_id])}}" method="post" novalidate="novalidate">
                                        @method('PUT')
                                         @csrf
                                            <div class="form-group text-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa-sharp fa-solid fa-store"></i></li>
                                                    <li class="list-inline-item"><i class="fa-sharp fa-solid fa-store"></i></li>
                                                    <li class="list-inline-item"><i class="fa-sharp fa-solid fa-store"></i></li>
                                                    <li class="list-inline-item"><i class="fa-sharp fa-solid fa-store"></i></li>
                                                </ul>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tên mã</label>
                                                <input id="cc-payment" name="coupon_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$danhmuc->coupon_name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Mã giảm giá</label>
                                                <input id="cc-payment" name="coupon_code" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$danhmuc->coupon_code}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Số lượng mã</label>
                                                <input id="cc-payment" name="coupon_time" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$danhmuc->coupon_time}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nhập số % hoặc tiền giảm</label>
                                                <input id="cc-payment" name="coupon_number" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$danhmuc->coupon_number}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Ngày bắt đầu</label>
                                                <input id="cc-payment" name="coupon_date_start" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$danhmuc->coupon_date_start}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Ngày kết thúc</label>
                                                <input id="cc-payment" name="coupon_date_end" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$danhmuc->coupon_date_end}}">
                                            </div>
                                            <div class="form-group" align="center" >
                                                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Tính năng mã</label></div>
                                                    <div class="col-12 col-md-9">
                                                    <select name="coupon_condition" id="selectSm" class="form-control-sm form-control">
                                                            <option value="0">------Chọn------</option>
                                                            @if($danhmuc->coupon_condition==1)
                                                  <option selected value="1">giảm theo mã</option>
                                                    <option value="2">giảm theo tiền</option>
                                                  @else
                                                     <option value="2">giảm theo tiền</option>
                                                  <option  selected value="1">giảm theo mã</option>
                                                    @endif
                                                           </select>
                                                     </div>
                                                </div>
                                                </div>
                                            </div>
                                         
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="add_banner">
                                                <i class="fa-solid fa-plus"></i>&nbsp;
                                                    <span id="payment-button-amount">Thêm</span>
                                                    <!-- <span id="payment-button-sending" style="display:none;">Sending…</span> -->
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->
                        <script>
var button1 = document.getElementById( 'input' );
var button2 = document.getElementById( 'ckfinder-popup-2' );

button1.onclick = function() {
	selectFileWithCKFinder( 'input' );
};
button2.onclick = function() {
	selectFileWithCKFinder( 'ckfinder-input-2' );
};

function selectFileWithCKFinder( elementId ) {
	CKFinder.popup( {
		chooseFiles: true,
		width: 800,
		height: 600,
		onInit: function( finder ) {
			finder.on( 'files:choose', function( evt ) {
				var file = evt.data.files.first();
				var output = document.getElementById( 'input' );
				output.value = file.getUrl();
			} );

			finder.on( 'file:choose:resizedImage', function( evt ) {
				var output = document.getElementById( 'input' );
				output.value = evt.data.resizedUrl;
			} );
		}
	} );
}
                </script>
                   
 @endsection


