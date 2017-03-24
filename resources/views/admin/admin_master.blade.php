<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>Ecommerce Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="Mosaddek" name="author" />
    <link href="{{URL::to('admin_asset/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{URL::to('admin_asset/assets/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{URL::to('admin_asset/assets/bootstrap/css/bootstrap-fileupload.css') }}" rel="stylesheet" />
    <link href="{{URL::to('admin_asset/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{URL::to('admin_asset/css/style.css') }}" rel="stylesheet" />
    <link href="{{URL::to('admin_asset/css/style-responsive.css') }}" rel="stylesheet" />
    <link href="{{URL::to('admin_asset/css/style-default.css') }}" rel="stylesheet" id="style_color" />
    <link href="{{URL::to('admin_asset/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
    <link href="{{URL::to('admin_asset/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <script src="{{ URL::to('backend/js/bootstrap.min.js') }}"></script>
    <script type='text/javascript'>
function check_delete() {
    var chk = confirm("Are You Sure To Delete  This");
    if (chk)
    {
        return true;
    } else
    {
        return false;
    }
}
    </script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
    <!-- BEGIN HEADER -->
    <div id="header" class="navbar navbar-inverse navbar-fixed-top">
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <div class="container-fluid">
                <!--BEGIN SIDEBAR TOGGLE-->
                <div class="sidebar-toggle-box hidden-phone">
                    <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <!--END SIDEBAR TOGGLE-->
                <!-- BEGIN LOGO -->

                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="arrow"></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->

                <!-- END  NOTIFICATION -->
                <div class="top-nav ">
                    <ul class="nav pull-right top-menu" >
                        <!-- BEGIN SUPPORT -->


                        <!-- END SUPPORT -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="img/avatar1_small.jpg" alt="">
                                <span class="username"><?php echo Session::get('admin_name') ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <li><a href="{{URL::to('/logout')}}"><i class="icon-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div id="container" class="row-fluid">
        <!-- BEGIN SIDEBAR -->
        <div class="sidebar-scroll">
            <div id="sidebar" class="nav-collapse collapse">

                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <div class="navbar-inverse">
                    <form class="navbar-search visible-phone">
                        <input type="text" class="search-query" placeholder="Search" />
                    </form>
                </div>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                <!-- BEGIN SIDEBAR MENU -->
                <ul class="sidebar-menu">
                    <li class="sub-menu active">
                        <a class="" href="{{URL::to('/dashboard')}}">
                            <i class="icon-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>Category</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="{{URL::to('/add-category')}}">Add Category</a></li>
                            <li><a class="" href="{{URL::to('/manage-category')}}">Mange Category</a></li>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-cogs"></i>
                            <span>Product</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="{{URL::to('add-product')}}">Add Product</a></li>
                            <li><a class="" href="{{URL::to('manage-product')}}">Manage Product</a></li>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a class="" href="{{URL::to('/stock')}}">
                            <i class="icon-dashboard"></i>
                            <span>Stock</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="" href="{{URL::to('/stockout')}}">
                            <i class="icon-dashboard"></i>
                            <span>Stockout List</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="" href="{{URL::to('/reorder')}}">
                            <i class="icon-dashboard"></i>
                            <span>Reorder List</span>
                        </a>
                    </li>                                                                
                    <li>
                        <a class="" href="{{URL::to('/logout')}}">
                            <i class="icon-user"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN PAGE -->  
        <div id="main-content">
            <!-- BEGIN PAGE CONTAINER-->
            @yield('admin_maincontent')

            <!-- END PAGE CONTAINER-->
        </div>
        <!-- END PAGE -->  
    </div>
    <!-- END CONTAINER -->

    <!-- BEGIN FOOTER -->
    <div id="footer">
        2013 &copy;  Dashboard.
    </div>
    <!-- END FOOTER -->

    <!-- BEGIN JAVASCRIPTS -->
    <!-- Load javascripts at bottom, this will reduce page load time -->
    <script src="admin_asset/js/jquery-1.8.3.min.js"></script>
    <script src="admin_asset/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="admin_asset/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" src="admin_asset/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="admin_asset/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
    <script src="admin_asset/assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- ie8 fixes -->
    <!--[if lt IE 9]>
    <script src="admin_asset/js/excanvas.js"></script>
    <script src="admin_asset/js/respond.js"></script>
    <![endif]-->

    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
    <script src="admin_asset/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/chart-master/Chart.js"></script>
    <script src="admin_asset/js/jquery.scrollTo.min.js"></script>


    <!--common script for all pages-->
    <script src="admin_asset/js/common-scripts.js"></script>

    <!--script for this page only-->

    <script src="admin_asset/js/easy-pie-chart.js"></script>
    <script src="admin_asset/js/sparkline-chart.js"></script>
    <script src="admin_asset/js/home-page-calender.js"></script>
    <script src="admin_asset/js/home-chartjs.js"></script>

    <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>