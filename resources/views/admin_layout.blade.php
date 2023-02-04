<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{url('assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <script src="{{url('assets/ckfinder/ckfinder.js')}}"></script>
   
   
  
    <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
   

</head>

<body>
    <!-- Left Panel -->
   @include('page_admin.left_danhmuc')
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
    @include('page_admin.right_danhmuc')

    <!-- /#right-panel -->
   <!-- Content -->
      
      
   <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6" >
                        <div class="card" style="background-color:red;">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text" style="color:white"><span class="count">{{$sum}}</span></div>
                                            <div class="stat-heading "style="color:white">Tổng doanh thu</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card" style="background-color:yellow;">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"style="color:black"><span class="count">{{$sumprofit}}</span></div>
                                            <div class="stat-heading"style="color:black"> Tổng lợi nhuận</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body"style="background-color:green;">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"style="color:black"><span class="count">{{$orderAll}}</span></div>
                                            <div class="stat-heading"style="color:black">Đơn hàng</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body"style="background-color:purple;">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"style="color:white"><span class="count">{{$customerAll}}</span></div>
                                            <div class="stat-heading"style="color:white">Tài khoản hiện có</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              
   @yield('content')

        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        
        <!-- /.site-footer -->
    </div>
   
   
    
    
                <!-- /Widgets -->
                <!--  Traffic  -->
              
                <!--  /Traffic -->
                
                <!-- Orders -->
              
                <!-- /.orders -->
                <!-- To Do and Live Chat -->
               
                <!-- /To Do and Live Chat -->
                <!-- Calender Chart Weather  -->
              
                <!-- /Calender Chart Weather -->
                <!-- Modal - Calendar - Add New Event -->
              
                <!-- /#event-modal -->
                <!-- Modal - Calendar - Add Category -->
                
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
    <!-- Scripts -->
   

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{url('assets/js/main.js')}}"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="{{url('assets/js/init/weather-init.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="{{url('assets/js/init/fullcalendar-init.js')}}"></script>

 
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
 
   <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
               <script>
                        CKEDITOR.replace( 'category_details' );
                        CKEDITOR.replace( 'category_desc' );
                        CKEDITOR.replace( 'product_desc' );
                        CKEDITOR.replace( 'product_details' );
                        CKEDITOR.replace( 'news_desc' );
                </script>
    

 <script type="text/javascript">
     $(document).ready(function(){
    //  $('.add_delivery').click(function()
    //  {
    //   var city = $('.city').val();
    //   var district = $('.district').val();
    //   var ward = $('.ward').val();
    //   var shipping_fee = $('.shipping_fee').val();
    //   var _token = $('input[name="_token"]').val();
    // //   alert(city);
    // //   alert(district);
    // //   alert(ward);
    // //   alert(shipping_fee);
    // //   alert(_token);
    // $.ajax({
    //     url : '{{url('/add-transport-fee')}}',
    //     method : 'POST',
    //     data : {city:city,district:district,ward:ward,shipping_fee:shipping_fee,_token:_token},
    //     success:function(data){
    //         alert('Thêm phí vận chuyển thành công');
    //     }
    //     });
    //  });
    // cap nhat ma van chuyen
    $(document).ready(function(){
        $(document).on('blur','.fee_feeship_edit',function(){
           
            var feeshipping_id = $(this).data('feeshipping_id');
            var fee_value = $(this).text();
            // alert(feeshipping_id);
            // alert(fee_value);
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url("/update-transport-fee-freeship")}}',
                method: 'POST',
                data: {feeshipping_id:feeshipping_id, fee_value:fee_value,_token:_token},
                success:function(data){
                    alert('Cập nhật phí vận chuyển thành công');
                    location.reload();
                }
            });
        });
// chon thanh pho, quan, xa
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
        url : '{{url('/select-delivery')}}',
        method : 'POST',
        data : {action:action,ma:ma,_token:_token},
        success:function(data){
            $('#'+result).html(data);
        }
    });
    });
     });
    });
    </script>

<!-- trang thai don hang chi tiet -->
<script type="text/javascript">
     $('.order_details').change(function(){
        var orderStatus = $(this).val();
        var orderId = $(this).children(":selected").attr('id');
        var _token = $('input[name="_token"]').val();
       
        quantity = [];

        $('input[name="product_sales_quanlity"]').each(function(){
        quantity.push($(this).val());
        });

        productIdWashouse = [];

           $('input[name="quantity_wasehouse"]').each(function(){
              productIdWashouse.push($(this).val());
            });

            j = 0;
            for(i=0;i<productIdWashouse.length;i++){
                
          
              var qty = $('.qty_'+ productIdWashouse[i]).val();
          
              var order_qty_storage = $('.order_qty_storage_'+ productIdWashouse[i]).val();

               if(parseInt(qty) > parseInt(order_qty_storage)){
                j = j +1 ;
                if(j==1){
                alert('Số lượng sản phẩm trong kho không đủ');
                $('.color_qty_'+ productIdWashouse[i]).css('background','red');
                 }
               }
            }

            if(j==0){
            $.ajax({
                    url: '{{url("/update-order-quanlity")}}',
                    method: 'POST',
                    data: {productIdWashouse:productIdWashouse,quantity:quantity,orderStatus:orderStatus,orderId:orderId,_token:_token},
                    success:function(data){
                        alert('Thay đổi trạng thái trong kho thành công');
                        location.reload();
                    }
                });
            }
          
     });
</script>
<!-- nút cập nhật số lượng bán tồn kho -->
<script type="text/javascript">
    $('.update_quanlity_order').click(function(){
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.qty_' + order_product_id).val();
        var order_code = $('.order_code').val();
        var _token = $('input[name="_token"]').val();
    //  alert(order_product_id);
    //  alert(order_qty);
    //  alert(order_code);
     $.ajax({
                    url: '{{url("/update-order-quanlity-button")}}',
                    method: 'POST',
                    data: {order_product_id:order_product_id,order_qty:order_qty,order_code:order_code,_token:_token},
                    success:function(data){
                        alert('Cập nhật số lượng thành công');
                        location.reload();
                    }
                });
    });

</script>
<script>
   $( function() {
      $( "#datepicker" ).datepicker({
        monthNames: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
        dayNamesMin: [ "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy", "Chủ nhật" ],
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "yy-mm-dd",
      });
    } );
    $( function() {
      $( "#datepicker1" ).datepicker({
        monthNames: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
        dayNamesMin: [ "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy", "Chủ nhật" ],
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "yy-mm-dd"
      });
    } );
  </script>
         <script type="text/javascript">
            $(document).ready(function(){
              showStatistical30days();
                 var myfirstchart = new Morris.Bar({
  
                    element: 'myfirstchart',

                    colors: ['#327fa8','#6332a8','#9e32a8','#a8326d','#a83236'],
                    linecolors: ['#0b62a4','#D58665','#37619d','#fefefe','#A87D8E'],
                    pointFillColors: ['#ffffff'],
                    pointStrokeColors:['#a8326d'],
                    parseTime:false,
                    fillOpacity: 0.4,
                    behaveLikeLine: true,
                    hideHover: 'auto',
                    xkey: 'orderDate',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['sales','quantity','profit','totalOrder'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['Doanh số', 'Số lượng', 'Lợi nhuận', 'Đơn hàng']
                });

                function showStatistical30days(){
            let _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{url("/show-statistical-one-year")}}',
                method: 'POST',
                dataType: 'JSON',
                data: {_token:_token},
                success:function(data) {
                    myfirstchart.setData(data);

                }
            });
        }
                    $('#filter-date').click(function(){
                        
            let _token = $('input[name="_token"]').val();
            let dateFrom = $('#datepicker').val();
            let dateTo = $('#datepicker1').val();
          
            $.ajax({
                url: '{{url("/get-date-filter")}}',
                method: 'POST',
                dataType: 'JSON',
                data: {dateFrom:dateFrom,dateTo:dateTo, _token:_token},
                success:function(data) {
                    myfirstchart.setData(data);

                }
            });
        });

            $('.filter-statistical-profit').change(function(){
            var value = $(this).val();
            var _token = $('input[name="_token"]').val();
            //  alert(value);
             
            $.ajax({
                url: '{{url("/filter-statistical-profit")}}',
                method: 'POST',
                dataType: 'JSON',
                data: {value:value, _token:_token},
                success:function(data) {
                    myfirstchart.setData(data);

                }
            });
        });
      
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
            Morris.Donut({
            element: 'statisticalTotal',
            colors: [
    '#f5bf42',
    '#f54242',
     '#42f584',
    '#006064'
  ],
            data: [
                {label: "Sản phẩm", value: <?php echo $productAll?>},
                {label: "Đơn hàng", value: <?php echo $orderAll?>},
                {label: "Bài viết", value: <?php echo $blogAll?>},
                {label: "Khách hàng", value: <?php echo $customerAll?>}
            ]
            });
    });
</script>
    <!--Local Stuff-->
    <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script>
</body>
</html>
