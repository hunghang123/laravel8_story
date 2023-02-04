<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/title.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <script src="{{url('js/bootstrap.js')}}"></script>
    <!-- bieu tuong them gio hang sweetaleart -->
    <link href="{{url('css/sweetalert.css')}}" rel="stylesheet">
    <script src="{{url('js/sweetalert.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- {{url('public/mail/jqBootstrapValidation.min.js')}} -->
</head>

<body>
    <!-- Topbar Start -->
    @include('page_user.header')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">

        <!-- danh muc -->
           @include('page_user.category')
           <!-- menu -->

           @include('page_user.menu')


           <!-- banner_slide -->
           @include('page_user.banner')
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <!-- <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Featured End -->
   <!-- san pham -->
    @yield('content')

     <!-- Footer service -->
    @include('page_user.service')

    <!-- Footer Start -->
   
    <!-- Footer End -->
    @include('page_user.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <!-- bieu tuong them gio hang -->
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    
    <script src="{{url('js/bootstrap.js')}}"></script>
    <script src="{{url('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{url('lib/easing/easing.min.js')}}"></script>
    <script src="{{url('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{url('mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{url('mail/contact.js')}}"></script>
 
    <!-- Template Javascript -->
    <script src="{{url('js/main.js')}}"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
<!-- paypal -->
    <!-- <script>
         let usd = document.getElementById('sum-ok-hidden').value;
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AXPqjfhIGuWXIabkqzFmBH1QIy2GT75x5__D0nTxHLLQC5IFfo9u7FxaTvZUS5z8z-eJlpeExe5UAsKI',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Cảm ơn đã mua hàng nhen !');
      });
    }
  }, '#paypal-button');

</script> -->



    <!-- cart -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_quanlity = $('.cart_product_quanlity_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_promotion = $('.cart_product_promotion_' + id).val();
            var cart_product_imge = $('.cart_product_imge_' + id).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url("/add-cart-ajax")}}',
                method: 'POST',
                data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_imge:cart_product_imge,cart_product_price:cart_product_price
                    ,cart_product_quanlity:cart_product_quanlity,cart_product_promotion:cart_product_promotion,_token:_token},
                success:function(data){

                    // alert(data);
                   
                    swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-warning",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                        },function() {
                            window.location.href = "{{url('/show-cart')}}";
                        }
                    );
                        
                   
                    

                },error: function(xhr, status, error) {
                    alert('Sản phẩm này chưa có hoặc Đã hết hàng');
                }
            });
      });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var minus = document.getElementsByClassName("btn-minus");
        var plus = document.getElementsByClassName("btn-plus");

        var valueNew = 0;
        var click = '';
        for(var i=0 ; i<plus.length; i++){
            var buttonplus = plus[i];
            $(buttonplus).on('click',function (event) {
                click='plus';
                let session_id = $(this).data('session_id');
               
                let listElement = document.getElementById('quantiyCart'+session_id);
                console.log(listElement);
            
                var input = listElement.children[1];

                console.log('input', input);
                var inputValue = input.value;

                console.log('inputValue', input.value);
                // valueNew = parseInt(inputValue) +1;

                // input.value = valueNew;

                // console.log('inputValue', inputValue);
                
                var _token = $('input[name="_token"]').val();
                $.ajax({
                        url: '{{url("/cart/update-quantity-product")}}',
                        method: 'POST',
                        data: {click:click,session_id:session_id,inputValue:inputValue, _token:_token},
                        success:function(data) {
                            if(data=="1"){
                                alert("Bạn không thể tăng số lượng lên vì ở trong kho không còn sản phẩm này");
                                // input.value =parseInt(inputValue);
                            }
                            location.reload();
                        }
                });
            });
        }
        for(var i=0 ; i<minus.length; i++){
            var buttonminus = minus[i];

            buttonminus.addEventListener('click',function (event) {
                click = 'minus';
                let session_id = $(this).data('session_id');

                let listElement = document.getElementById('quantiyCart'+session_id);
                console.log(listElement);
               
                var input = listElement.children[1];
                var inputValue = input.value;
                // var valueNew = parseInt(inputValue) -1;

                console.log('inputValue', input.value);

                if(inputValue >= 1){
                    input.value = inputValue;
                }else{
                    inputValue=1;
                    input.value = 1;
                    alert('Bạn không thể giảm số lượng xuống 0');
                }
               
                var _token = $('input[name="_token"]').val();
                console.log('token', _token);
                $.ajax({
                        url: '{{url("/cart/update-quantity-product")}}',
                        method: 'POST',
                        data: {click:click,session_id:session_id,inputValue:inputValue, _token:_token},
                        success:function(data) {
                            if(data=="1"){
                                alert("Bạn không thể giảm số lượng vì ở trong kho không còn sản phẩm này");
                                // input.value =parseInt(inputValue) +1;
                            }
                            location.reload();
                        }
                });
            })
        }
    })
</script>


<!-- 
<script type="text/javascript">
    $(document).ready(function () {
        var minus = document.getElementsByClassName("btn-minus");
        var plus = document.getElementsByClassName("btn-plus");

        var valueNew = 0;
        var click = '';
        for(var i=0 ; i<plus.length; i++){
            var buttonplus = plus[i];
            $(buttonplus).on('click',function (event) {
                click='plus';
                let session_id = $(this).data('session_id');
               
                let listElement = document.getElementById('quantiyCartDetails'+session_id);
                console.log(listElement);
            
                var input = listElement.children[1];

                console.log('input', input);
                var inputValue = input.value;

                console.log('inputValue', input.value);
                // valueNew = parseInt(inputValue) +1;

                // input.value = valueNew;

                // console.log('inputValue', inputValue);
                
                var _token = $('input[name="_token"]').val();
                $.ajax({
                        url: '{{url("/cart/update-quantity-details")}}',
                        method: 'POST',
                        data: {click:click,session_id:session_id,inputValue:inputValue, _token:_token},
                      
                });
            });
        }
        for(var i=0 ; i<minus.length; i++){
            var buttonminus = minus[i];

            buttonminus.addEventListener('click',function (event) {
                click = 'minus';
                let session_id = $(this).data('session_id');

                let listElement = document.getElementById('quantiyCartDetails'+session_id);
                console.log(listElement);
               
                var input = listElement.children[1];
                var inputValue = input.value;
                // var valueNew = parseInt(inputValue) -1;

                console.log('inputValue', input.value);

                if(inputValue >= 1){
                    input.value = inputValue;
                }else{
                    inputValue=1;
                    input.value = 1;
                    alert('Bạn không thể giảm số lượng xuống 0');
                }
               
                var _token = $('input[name="_token"]').val();
                console.log('token', _token);
                $.ajax({
                        url: '{{url("/cart/update-quantity-details")}}',
                        method: 'POST',
                        data: {click:click,session_id:session_id,inputValue:inputValue, _token:_token},
                       
                });
            })
        }
    })
</script> -->

<!-- xác nhận đơn hàng khắp cả nước -->


<!-- vận chuyển -->

<script type="text/javascript">
    $(document).ready(function(){
     $('.choose').on('change',function(){
    var action = $(this).attr('id');
    var ma = $(this).val();
    var _token = $('input[name="_token"]').val();
    var result = '';
    // alert(action);
    // alert(matp);
    // alert(_token);
    if(action=='city'){
        result = 'district';
    }else{
        result = 'ward';
    }
    $.ajax({
        url : '{{url('/select-delivery-home')}}',
        method : 'POST',
        data : {action:action,ma:ma,_token:_token},
        success:function(data){
            $('#'+result).html(data);
        }
    });
    });
});
</script>


<script type="text/javascript">
 $(document).ready(function(){
       $('.calculate_delivery').click(function(){
        var matp = $('.city').val();
        var maqh = $('.district').val()  ;
        var maxptt =$('.ward').val() ;
        var _token = $('input[name="_token"]').val();
        // alert(matp);
        // alert(maqh);
        // alert(maxptt);
        // alert(_token);
        if(matp == '' && maqh == ''&& maxptt == ''){
          alert('Chọn phí vận chuyển để được giao hàng');
        }else{ 
            $.ajax({
             url : '{{url('/calculate-fee')}}',
              method : 'POST',
              data : {matp:matp,maqh:maqh,maxptt:maxptt,_token:_token},
            success:function(){
                location.reload();
            }
           });
         }
       
    });
});
</script>




<!-- xac nhan don hang -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.send_order').click(function(){
            swal("Xác nhận thành công!", "Chúng tôi rất cảm ơn quý khách!", "success")
           
      });
    });
</script>












</body>

</html>