@extends('user_layout')
@section('content')
<div class="container-fluid py-5">

<div class="row px-xl-5">

            <div class="col">
            @foreach($news as $key => $tt)
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 style="color:red;" class="mb-3" align="center">{{$tt->news_name}}</h4>
                        <img width="50%" style="display: block;margin-left: auto;margin-right: auto;" src="{{asset($tt->news_image)}}">
                 <h6  align="center">{{$tt->news_capture}}</h6>
                 <br></br>
                        <p>{!!$tt->news_desc!!}</p>
                        
                    </div>
                  
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>



@endsection