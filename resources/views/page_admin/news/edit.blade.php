@extends('admin_layout')
@section('content')
  

 

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Sửa tin tức</strong>
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
                                            <h3 class="text-center">Cập nhật tin tức</h3>
                                            <h3 style="text-align:right;"><a href="{{URL::to('/news')}}"><i class="fa-solid fa-power-off text-danger"></i></a></h3>
                                        </div>
                                        <hr>
                                        @if (session('status'))
                                          <div class="alert alert-success">
                                         {{ session('status') }}
                                           </div>
                                          @endif
                                        <form action="{{route('news.update',[$tintuc->news_id])}}" method="post" novalidate="novalidate" >
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
                                                <label for="cc-payment" class="control-label mb-1">Tên tin tức</label>
                                                <input id="cc-payment" name="news_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$tintuc->news_name}}">
                                            </div>
                                          
                                            
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Tên content</label>
                                                <input id="cc-payment" name="news_content" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$tintuc->news_content}}">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Mô tả</label>
                                                <textarea id="cc-name" name="news_desc" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"  aria-required="true" aria-invalid="false" aria-describedby="cc-name"
                                                value="{{$tintuc->news_desc}}">{{$tintuc->news_desc}}</textarea>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                           
                                            <div class="form-group has-success">
                                                  <label for="file-input" class=" form-control-label">úp ảnh</label>
                                                  <input id="input" name="news_image" placeholder=" hình" type="text" class="form-control" value="{{$tintuc->news_image}}"> 
                                                  <img src="{{asset($tintuc->news_image)}}" height="150px" width="150px">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tên capture</label>
                                                <input id="cc-payment" name="news_capture" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$tintuc->news_capture}}">
                                            </div>
                                    <div class="row form-group">
                                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Danh mục</label></div>
                                <div class="col-12 col">
                                    <select name="category" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">----Chọn danh mục----</option>
                                        @foreach($danhmuctintuc as $key=> $danhmuc)
                                        <option {{  $danhmuc->news_category_id == $tintuc->news_category_id ? 'selected' : ''}} value="{{$danhmuc->news_category_id}}">{{$danhmuc->news_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
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


