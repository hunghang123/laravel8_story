@extends('admin_layout')
@section('content')
  


                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Thêm phí vận chuyển</strong>
                                
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
                                            <h3 class="text-center">Danh mục vận chuyển</h3>
                                            <h3 style="text-align:right;"><a href="{{URL::to('/transport')}}"><i class="fa-solid fa-power-off text-danger"></i></a></h3>
                                        </div>
                                        <hr>
                                        @if (session('status'))
                                          <div class="alert alert-success">
                                         {{ session('status') }}
                                           </div>
                                          @endif
                                        <form action="{{route('transport.store')}}" method="post" novalidate="novalidate">
                                           @csrf
                                            <div class="form-group text-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa-sharp fa-solid fa-store"></i></li>
                                                    <li class="list-inline-item"><i class="fa-sharp fa-solid fa-store"></i></li>
                                                    <li class="list-inline-item"><i class="fa-sharp fa-solid fa-store"></i></li>
                                                    <li class="list-inline-item"><i class="fa-sharp fa-solid fa-store"></i></li>
                                                </ul>
                                            </div>
                                           
                                            <div class="form-group" >
                                                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Chọn thành phố</label></div>
                                                    <div class="col-12 col-md-9">
                                                    <select name="city" id="city" class="form-control-sm form-control choose city">
                                                            <option value="">------Chọn thành phố------</option>
                                                            @foreach($city as $key =>$tp)
                                                            <option value="{{$tp->matp}}">{{$tp->nametp}}</option>
                                                            @endforeach
                                                           </select>
                                                     </div>
                                                </div>
                                                <div class="form-group" >
                                                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Chọn quận huyện</label></div>
                                                    <div class="col-12 col-md-9">
                                                    <select name="district" id="district" class="form-control-sm form-control district choose">
                                                            <option value="">------Chọn quận huyện------</option>
                                                            @foreach($district as $key =>$qh)
                                                            <option value="{{$qh->maqh}}">{{$qh->nameqh}}</option>
                                                            @endforeach
                                                           </select>
                                                     </div>
                                                </div>
                                                <div class="form-group" >
                                                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Chọn xã phường</label></div>
                                                    <div class="col-12 col-md-9">
                                                    <select name="ward" id="ward" class="form-control-sm form-control ward">
                                                            <option value="">------Chọn xã phường------</option>
                                                            @foreach($ward as $key =>$xp)
                                                            <option value="{{$xp->maxptt}}">{{$xp->namexptt}}</option>
                                                            @endforeach
                                                           </select>
                                                     </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Phí vận chuyển</label>
                                                <input name="shipping_fee" type="text" class="form-control shipping_fee" aria-required="true" aria-invalid="false" value="">
                                            </div>
                                                </div>
                                            </div>
                                            <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="add_transport">
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


