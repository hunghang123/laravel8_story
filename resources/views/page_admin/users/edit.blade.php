@extends('admin_layout')
@section('content')
  


                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Sửa danh sách khách hàng</strong>
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
                                            <h3 class="text-center">Update</h3>
                                            <h3 style="text-align:right;"><a href="{{URL::to('/user')}}"><i class="fa-solid fa-power-off text-danger"></i></a></h3>
                                        </div>
                                        </div>
                                        <hr>
                                        @if (session('status'))
                                          <div class="alert alert-success">
                                         {{ session('status') }}
                                           </div>
                                          @endif
                                        <form action="{{route('user.update',[$user->id])}}" method="post" novalidate="novalidate">
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
                                                <label for="cc-payment" class="control-label mb-1">Tên khách hàng</label>
                                                <input id="cc-payment" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$user->name}}">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">email</label>
                                                <input id="cc-payment" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" value="{{$user->email}}">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">phone</label>
                                                <input id="cc-payment" name="phone" type="phone" class="form-control" aria-required="true" aria-invalid="false" value="{{$user->phone}}">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Password</label>
                                                <input id="cc-payment" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" value="{{$user->password}}">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Address</label>
                                                <input id="cc-payment" name="address" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$user->address}}">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="form-group has-success">
                                                  <label for="file-input" class=" form-control-label">úp ảnh</label>
                                                  <input id="input" name="image" placeholder=" hình" type="text" class="form-control" value="{{$user->image}}"> 
                                                  <img src="{{asset($user->image)}}" height="150px" width="150px">
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Quyền</label>
                                                <input id="cc-payment" name="role" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$user->role}}">
                                            </div>
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


