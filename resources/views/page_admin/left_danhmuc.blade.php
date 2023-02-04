<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{URL::to('/admin')}}"><i class="menu-icon fa fa-laptop"></i>Trang Admin </a>
                    </li>
                    <li class="menu-title">Quản lý chức năng</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>User</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            
                          
                            <li><i class="fa fa-bars"></i><a href="{{URL::to('/user')}}">Liệt kê</a></li>
                          
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Danh mục</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-id-badge"></i><a href="{{URL::to('/category')}}">Liệt kê danh mục</a></li>
                    
                     
                           
                        </ul>
                        <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Sản phẩm</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-id-badge"></i><a href="{{URL::to('/product')}}">Liệt kê sản phẩm</a></li>
                    
                     
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Danh mục tin tức</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-id-badge"></i><a href="{{URL::to('/news_category')}}">Liệt kê danh mục</a></li>
                    
                     
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i> Tin tức</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-id-badge"></i><a href="{{URL::to('/news')}}">Liệt kê tin tức</a></li>
                    
                     
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i> Slide-banner</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-id-badge"></i><a href="{{URL::to('/banner')}}">Liệt kê slide</a></li>
                    
                     
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i> Mã giảm giá</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-id-badge"></i><a href="{{URL::to('/coupon')}}">Liệt kê mã</a></li>
                    
                     
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i> Vận chuyển</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-id-badge"></i><a href="{{URL::to('/transport')}}">Liệt kê danh sách</a></li>
                    
                     
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i> Đơn hàng</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-id-badge"></i><a href="{{URL::to('/order')}}">Liệt kê đơn</a></li>
                    
                     
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i> Thống kê</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-id-badge"></i><a href="{{URL::to('/statistical')}}">Thống kê</a></li>
                    
                     
                           
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>