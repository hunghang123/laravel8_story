@extends('user_layout')
@section('content')


<h2 align="center">Trang tin tức</h2>
<br>
<br></br>

                <div class="content_page">
                     <div class="box-title">
                        <div class="title-bar">
                           <h1 align="center">
                           @foreach($categorynews as $key => $tt)
                            <a href="{{URL::to('/danhmuctintuc',[$tt->news_category_id])}}" style="color:blue;"><i class="fa-solid fa-newspaper"></i>{{$tt->news_category_name}}</a>&nbsp;
                            @endforeach
                        </h1>
                        </div>
                     </div>
                     <div class="content_text" >
                        <ul class="list_ul">
                        @foreach($news as $key => $tintuc)
                           <li class="lists" >
                              <div class="img-list">
                                 <a href="{{URL::to('/chitiettintuc',[$tintuc->news_id])}}">
                                 <img src="{{asset($tintuc->news_image)}}" alt="" width="200" height="200">
                                 </a>
                              </div>
                              <div class="content-list">
                                 <div class="content-list_inm">
                                    <div class="title-list">
                                       <h4>
                                          <a >{{$tintuc->news_name}}</a>
                                       </h4>
                                       <p class="list-news-status-p">
                                          <a title="NXB Kim Đồng">NXB Kim Đồng</a> | <a title="{{$tintuc->news_date}}" >{{$tintuc->news_date}}</a>
                                       </p>
                                    </div>
                                    <div class="content-list-in">
                                       <p><span style="font-size:16px">{{$tintuc->news_content}}</span></p>
                                    </div>
                                    <div class="xt"><a href="{{URL::to('/chitiettintuc',[$tintuc->news_id])}}">Xem thêm</a></div>
                                 </div>
                              </div>
                              <div class="clear"></div>
                           </li>
                          @endforeach
                        </ul>
                        <div class="clear"></div>
                        <div class="wp_page">
                           <div class="page">
                           </div>
                        </div>
                     </div>
                  </div>
                 
@endsection