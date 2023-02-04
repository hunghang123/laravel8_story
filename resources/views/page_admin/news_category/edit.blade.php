@extends('admin_layout')
@section('content')
  


                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Sửa danh mục tin tức</strong>
                                
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
                                            <h3 class="text-center">Danh mục tin tức</h3>
                                            <h3 style="text-align:right;"><a href="{{URL::to('/news_category')}}"><i class="fa-solid fa-power-off text-danger"></i></a></h3>
                                        </div>
                                        <hr>
                                        @if (session('status'))
                                          <div class="alert alert-success">
                                         {{ session('status') }}
                                           </div>
                                          @endif
                                        <form action="{{route('news_category.update',[$danhmuc->news_category_id])}}" method="post" novalidate="novalidate">
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
                                                <input id="cc-payment" name="news_category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$danhmuc->news_category_name}}">
                                            </div>
                                           
                                           
                                           
                                                </div>
                                            </div>
                                         
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="add_product">
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


