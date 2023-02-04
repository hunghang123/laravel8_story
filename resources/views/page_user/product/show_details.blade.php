@extends('user_layout')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi tiết sản phẩm</h1>
            <!-- <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div> -->
        </div>
    </div>
    <!-- Page Header End -->

    
    <!-- Shop Detail Start -->
    @foreach($product as $key => $sp)
    <form>
     @csrf
     <input type="hidden" id="viewed-products-id" value="{{$sp->product_id}}" 
                    class="cart_product_id_{{$sp->product_id}}">
                    <input type="hidden" id="viewed-products-name{{$sp->product_id}}" value="{{$sp->product_name}}"
                    class="cart_product_name_{{$sp->product_id}}">
                    <input type="hidden" id="viewed-products-quanlity{{$sp->product_id}}" value="1"
                    class="cart_product_quanlity_{{$sp->product_id}}">
                    <input type="hidden" id="viewed-products-imge{{$sp->product_id}}" value="{{$sp->product_imge}}"
                    class="cart_product_imge_{{$sp->product_id}}">
                    <input type="hidden" id="viewed-products-promotion{{$sp->product_id}}" value="{{$sp->product_promotion}}"
                    class="cart_product_promotion_{{$sp->product_id}}">
                    <input type="hidden" id="viewed-products-price{{$sp->product_id}}" value="{{$sp->product_price}}"
                    class="cart_product_price_{{$sp->product_id}}">
                    <input type="hidden" id="session_id">
    <div class="container-fluid py-5">
    
        <div class="row px-xl-5">
       
            <div class="col-lg-5 pb-5">
            
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                   
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{asset($sp->product_imge)}}" alt="Image">
                        </div>
                       
                      
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
           
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$sp->product_name}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">{{number_format($sp->product_price)}} VNĐ</h3>
                <p class="mb-4" style="font-size:16px; font-weight:bold;">Khuyến mãi & Ưu đãi tại Story store.</p>
                <p >-Bán hàng chính hãng (cam kết hoàn tiền nếu hàng nhái, hàng kém chất lượng).</p>
                <p >-Có thể đổi trong vòng 1 tuần.</p>
                <p ><b>-Thuộc danh mục: </b>{{$sp->danhmucsanpham->category_name}}</p>
                <p >-Hỗ trợ miễn phí trong việc trao đổi.</p>
               
                <div class="d-flex align-items-center mb-4 pt-2">
                    <!-- <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input name="qty" type="text" class="form-control bg-secondary text-center" value="1">
                        <input name="productid_hidden" type="hidden" value="{{$sp->product_id}}" >
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div> -->
                    
                    <button type="button"data-id_product="{{$sp->product_id}}" class="btn btn-primary px-3 add-to-cart"><i class="fa fa-shopping-cart mr-1"></i> Thêm giỏ hàng</button>
                    
                </div>
                
                <!-- <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div> -->
              
            </div>
           
        </div>
       
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Thông tin</a>
                    <!-- <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Đánh giá</a> -->
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Mô tả sản phẩm</h4>
                        <p>{!!$sp->product_desc!!}</p>
                        
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Thông tin chi tiết</h4>
                        <p>{!!$sp->product_details!!}</p>
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                  </ul> 
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                  </ul> 
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                                <div class="media mb-4">
                                    <img src="{{asset('img/user.jpg')}}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
       
    </div>
   </form>
    @endforeach
    <!-- Shop Detail End -->
    
   
    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2"> Sản phẩm gợi ý</span></h2>
        </div>
        
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                @foreach($product_suggestion as $key => $sp)
                <form>
                  @csrf
                    <input type="hidden" id="viewed-products-id" value="{{$sp->product_id}}" 
                    class="cart_product_id_{{$sp->product_id}}">
                    <input type="hidden" id="viewed-products-name{{$sp->product_id}}" value="{{$sp->product_name}}"
                    class="cart_product_name_{{$sp->product_id}}">
                    <input type="hidden" id="viewed-products-quanlity{{$sp->product_id}}" value="1"
                    class="cart_product_quanlity_{{$sp->product_id}}">
                    <input type="hidden" id="viewed-products-imge{{$sp->product_id}}" value="{{$sp->product_imge}}"
                    class="cart_product_imge_{{$sp->product_id}}">
                    <input type="hidden" id="viewed-products-promotion{{$sp->product_id}}" value="{{$sp->product_promotion}}"
                    class="cart_product_promotion_{{$sp->product_id}}">
                    <input type="hidden" id="viewed-products-price{{$sp->product_id}}" value="{{$sp->product_price}}"
                    class="cart_product_price_{{$sp->product_id}}">
                    <input type="hidden" id="session_id">
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <a href="{{URL::to('/chitietsanpham',[$sp->product_id])}}" >
                            <img class="img-fluid w-100" src="{{asset($sp->product_imge)}}" alt="">
                            </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$sp->product_name}}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{number_format($sp->product_price)}} VNĐ</h6><h6 class="text-muted ml-2">Khuyến mãi: <ins style="color:red;">{{$sp->product_promotion}}</ins></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{URL::to('/chitietsanpham',[$sp->product_id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                            <button type="button" data-id_product="{{$sp->product_id}}" class="btn btn-sm text-dark p-0 add-to-cart"><i class="fas fa-shopping-cart text-primary mr-1 "></i>Add To Cart</button>
                        </div>
                    </div>
                   </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection