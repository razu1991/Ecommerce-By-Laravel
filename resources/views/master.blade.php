<!DOCTYPE html>
<!--
        ustora by freshdesignweb.com
        Twitter: https://twitter.com/freshdesignweb
        URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ecommerce</title>

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{URL::to('css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{URL::to('css/style.css') }}">
        <link rel="stylesheet" href="{{URL::to('css/responsive.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="header-area"style="background-color: blue;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="user-menu">
                            <ul>      

                                <li><a style="color: #fff;" href="{{URL::to('wishlist')}}"><i class="fa fa-heart"></i> Wishlist</a></li>
                                <li><a  style="color: #fff;" href="{{URL::to('show-cart')}}"><i class="fa fa-user"></i> My Cart</a></li>
                                <li><a  style="color: #fff;" href="{{URL::to('checkout')}}"><i class="fa fa-user"></i> Checkout</a></li>
                                <?php
                                $customer_id = Session::get('customer_id');
                                if ($customer_id != NULL) {
                                    ?>
                                    <li><a  style="color: #fff;" href="{{URL::to('customer-logout')}}"><i class="fa fa-user"></i> Logout</a></li>
                                    <li><a  style="color: #fff;" href="#"><i class="fa fa-user"></i> <?php echo Session::get('customer_name') ?></a></li>
                                <?php } else { ?>
                                    <li><a  style="color: #fff;" href="{{URL::to('customer-login')}}"><i class="fa fa-user"></i> Login</a></li>
                                    <li><a  style="color: #fff;" href="{{URL::to('signup-form')}}"><i class="fa fa-user"></i> Registration</a></li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div> <!-- End header area -->

        <div class="site-branding-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                            <h1><a href="./"><img src="{{URL::to('img/logo3.png')}}"></a></h1>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="shopping-item">
                            <a href="{{URL::to('/show-cart')}}">Cart - <span class="cart-amunt">{{Cart::total()}}</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">{{Cart::count()}}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End site branding area -->
        <div class="mainmenu-area" >
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div> 
                    <div class="navbar-collapse collapse">
                        <?php
                        $all_published_category = DB::table('category')
                                ->select("*")
                                ->where('publication_status', 1)
                                ->get();
                        ?>

                        <ul class="nav navbar-nav">
                            <li><a href={{URL::to('index')}}>Home</a></li>
                            <?php
                            foreach ($all_published_category as $v_category) {
                                ?>
                                <li><a href="{{URL::to('/category/'.$v_category->id)}}">{{$v_category->category_name}}</a></li>
                            <?php } ?>
                            <li><a href="{{URL::to('show-cart')}}">My Cart</a></li>
                            <li><a href="{{URL::to('checkout')}}">Checkout</a></li>
                        </ul>

                    </div>  
                </div>
            </div>
        </div> <!-- End mainmenu area --> 
        @yield('content')					    
        <div class="footer-top-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-about-us">
                            <h2>E<span>Commerce</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                            <div class="footer-social">
                                <a href="https://www.facebook.com/sharif217" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.youtube.com" target="_blank"><i class="fa fa-youtube"></i></a>
                                <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-menu">
                            <h2 class="footer-wid-title">User Navigation </h2>
                            <ul>
                                <li><a href="{{URL::to('customer-login')}}">My Account</a></li>
                                <li><a href="{{URL::to('wishlist')}}">Wishlist</a></li>
                                <li><a href="#">Front page</a></li>
                            </ul>                        
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-menu">
                            <h2 class="footer-wid-title">Categories</h2>
                            <ul>                               
                                <?php
                                foreach ($all_published_category as $v_category) {
                                    ?>
                                    <li><a href="{{URL::to('/category/'.$v_category->id)}}">{{$v_category->category_name}}</a></li>
                                <?php } ?>
                            </ul>                        
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-newsletter">
                            <h2 class="footer-wid-title">Newsletter</h2>
                            <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                            <div class="newsletter-form">
                                {!! Form::open(array('url' => 'newsletter', 'method' => 'post' )) !!} 
                                <input type="email" name="newsletter_email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End footer top area -->

        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright">
                            <p>&copy; 2017 E-Commerce. All Rights Reserved. <a href="http://www.raazu.com" target="_blank">raazu.com</a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="footer-card-icon">
                            <i class="fa fa-cc-discover"></i>
                            <i class="fa fa-cc-mastercard"></i>
                            <i class="fa fa-cc-paypal"></i>
                            <i class="fa fa-cc-visa"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End footer bottom area -->

        <!-- Latest jQuery form server -->
        <script src="https://code.jquery.com/jquery.min.js"></script>

        <!-- Bootstrap JS form CDN -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- jQuery sticky menu -->
        <script src="{{URL::to('js/owl.carousel.min.js') }}"></script>
        <script src="{{URL::to('js/ajax.js') }}"></script>
        <script src="{{URL::to('js/jquery.sticky.js') }}"></script>

        <!-- jQuery easing -->
        <script src="{{URL::to('js/jquery.easing.1.3.min.js') }}"></script>

        <!-- Main Script -->
        <script src="{{URL::to('js/main.js') }}"></script>

        <!-- Slider -->
        <script type="text/javascript" src="{{URL::to('js/bxslider.min.js') }}"></script>
        <script type="text/javascript" src="{{URL::to('js/script.slider.js') }}"></script>
    </body>
</html