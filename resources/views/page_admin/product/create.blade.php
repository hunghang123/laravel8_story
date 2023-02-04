@extends('admin_layout')
@section('content')
  

 

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Thêm sản phẩm</strong>
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
                                            <h3 class="text-center">Thêm sản phẩm</h3>
                                            <h3 style="text-align:right;"><a href="{{URL::to('/product')}}"><i class="fa-solid fa-power-off text-danger"></i></a></h3>
                                        </div>
                                        <hr>
                                        @if (session('status'))
                                          <div class="alert alert-success">
                                         {{ session('status') }}
                                           </div>
                                          @endif
                                        <form action="{{route('product.store')}}" method="post" novalidate="novalidate" >
                                            @csrf()
                                            <div class="form-group text-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa-sharp fa-solid fa-store"></i></li>
                                                    <li class="list-inline-item"><i class="fa-sharp fa-solid fa-store"></i></li>
                                                    <li class="list-inline-item"><i class="fa-sharp fa-solid fa-store"></i></li>
                                                    <li class="list-inline-item"><i class="fa-sharp fa-solid fa-store"></i></li>
                                                </ul>
                                            </div>
                                            <div class="row form-group">
                                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Danh mục</label></div>
                                <div class="col-12 col">
                                    <select name="category" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">----Chọn danh mục----</option>
                                        @foreach($danhmucsanpham as $key => $value)
                                                @if($value->category_name==0)
                                                    <option value="{{$value->category_id}}">{{$value->category_name}}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                                           
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tên sản phẩm</label>
                                                <input id="cc-payment" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">giá tiền</label>
                                                <input id="cc-payment" name="product_price" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">giá gốc</label>
                                                <input id="cc-payment" name="product_price_cost" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">giá khuyến mãi</label>
                                                <input id="cc-payment" name="product_promotion" type="promotion" class="form-control" aria-required="true" aria-invalid="false" value="">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Số lượng</label>
                                                <input id="cc-payment" name="product_quanlity" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Mô tả</label>
                                                <textarea id="cc-name" name="product_desc" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"  aria-required="true" aria-invalid="false" aria-describedby="cc-name"></textarea>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Chi tiết sản phẩm</label>
                                                <textarea id="cc-name" name="product_details" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"  aria-required="true" aria-invalid="false" aria-describedby="cc-name"></textarea>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                  <label for="file-input" class=" form-control-label">úp ảnh</label>
                                                  <input id="input" name="product_imge" placeholder=" hình" type="text" class="form-control" > 
                                            </div>

                                   
                                            
                                                     </div>
                                                </div>
                                            </div>
                                           
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="add_product">
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


