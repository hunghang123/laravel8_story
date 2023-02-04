@extends('admin_layout')
@section('content')
  


                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Sửa danh mục</strong>
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
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Danh mục sản phẩm</h3>
                                            <h3 style="text-align:right;"><a href="{{URL::to('/category')}}"><i class="fa-solid fa-power-off text-danger"></i></a></h3>
                                        </div>
                                        <hr>
                                     
                                        <form action="{{route('category.update',[$danhmuc->category_id])}}" method="post" novalidate="novalidate">
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
                                                <label for="cc-payment" class="control-label mb-1">Tên danh mục</label>
                                                <input id="cc-payment" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$danhmuc->category_name}}">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Mô tả</label>
                                                <textarea id="cc-name" name="category_desc" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"  aria-required="true" aria-invalid="false" aria-describedby="cc-name"
                                                value="{{$danhmuc->category_desc}}">{{$danhmuc->category_desc}}</textarea>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                  <label for="file-input" class=" form-control-label">úp ảnh</label>
                                                  <input id="input" name="category_image" placeholder=" hình" type="text" class="form-control" value="{{$danhmuc->category_image}}"> 
                                                  <img src="{{asset($danhmuc->category_image)}}" height="150px" width="150px">
                                            </div>
                                            <div class="form-group" align="center" >
                                                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Hiển thị</label></div>
                                                    <div class="col-12 col-md-9">
                                             <select name="category_parent" id="selectSm" class="form-control-sm form-control">
                                             @if($danhmuc->category_parent==1)
                                                  <option selected value="1">Danh mục con</option>
                                                    <option value="0">Danh mục cha</option>
                                                  @else
                                                    <option value="1">Danh mục con</option>
                                                  <option  selected value="0">Danh mục cha</option>
                                                    @endif
                                                                     
                                            </select>
                                                     </div>
                                                </div>
                                            </div>
                                         
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="update_product">
                                                <i class="fa-sharp fa-solid fa-wrench"></i>&nbsp;
                                                    <span id="payment-button-amount">Update</span>
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


