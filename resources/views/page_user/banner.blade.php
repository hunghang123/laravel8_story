                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php
                         $i = 0;
                        @endphp
                    @foreach($banner as $value)

                    @php
                      $i++;
                    @endphp
                        <div class="carousel-item {{$i==1 ? 'active' : '' }}" style="height: 410px;">
                            <img class="img-fluid" src="{{asset($value->banner_image)}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">{{$value->banner_name}}</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4"></h3>
                                    
                                    <a href="#" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>