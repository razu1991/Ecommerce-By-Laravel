@extends('master')
@section('content')
<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            <li>
                <img src="img/ca1.jpg" alt="Slide">
                <div class="caption-group">

                    <a class="caption button-radius" href="{{URL::to('/single-product/13')}}"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            <li><img src="img/h4-slide2.png" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        school supplies & backpacks.* 
                    </h2>
                    <h4 class="caption subtitle"></h4>
                    <a class="caption button-radius" href="{{URL::to('/category/6')}}"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            <li><img src="img/h4-slide3.png" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        Smart <span class="primary">Phone </span>
                    </h2>
                    <a class="caption button-radius" href="{{URL::to('/category/3')}}"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            <li><img src="img/h4-slide4.png" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        Computer <span class="primary"> Accesories </span>
                    </h2>
                    <a class="caption button-radius" href="{{URL::to('/category/4')}}"><span class="icon"></span>Shop now</a>
                </div>
            </li>
        </ul>
    </div>
    <!-- ./Slider -->
</div> <!-- End slider area -->

<div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo1">
                    <i class="fa fa-refresh"></i>
                    <p>30 Days return</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo2">
                    <i class="fa fa-truck"></i>
                    <p>Free shipping</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo3">
                    <i class="fa fa-lock"></i>
                    <p>Secure payments</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo4">
                    <i class="fa fa-gift"></i>
                    <p>New products</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Latest Products</h2>
                    <div class="product-carousel">
                        <?php
                        foreach ($latest_products as $v_latest_products) {
                            ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{ asset($v_latest_products->image) }}" alt="">
                                    <div class="product-hover">
                                        <a href="{{URL::to('/single-product/'.$v_latest_products->id)}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                <h2><a href="{{URL::to('/single-product/'.$v_latest_products->id)}}">{{$v_latest_products->product_title}}</a></h2>
                                <div class="product-carousel-price">
                                    <ins>BDT {{$v_latest_products->product_price}}</ins>
                                </div>                            
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->
<div class="maincontent-area" style="margin-top:-20px;">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">           
                    <h2  class="section-title">Featured Products</h2>
                    <div class="product-carousel" >
                        <?php
                        foreach ($featured_products as $v_featured_products) {
                            ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{ asset($v_featured_products->image) }}" alt="">
                                    <div class="product-hover">
                                        <a href="{{URL::to('/single-product/'.$v_featured_products->id)}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                <h2><a href="{{URL::to('/single-product/'.$v_featured_products->id)}}">{{$v_featured_products->product_title}}</a></h2>
                                <div class="product-carousel-price">
                                    <ins>BDT {{$v_featured_products->product_price}}</ins>
                                </div>                            
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->
<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Top Sellers</h2>
                    <!--                    <a href="" class="wid-view-more">View All</a> -->
                    <?php foreach ($top_seller as $v_top_seller) { ?>
                        <div class="single-wid-product">
                            <a href="{{URL::to('/single-product/'.$v_top_seller->id)}}"><img src="{{ asset($v_top_seller->image) }}" alt="" class="product-thumb"></a>
                            <h2><a href="{{URL::to('/single-product/'.$v_top_seller->id)}}">{{$v_top_seller->product_title}}</a></h2>                       
                            <div class="product-wid-price">
                                <ins>BDT {{$v_top_seller->product_price}}</ins> 
                            </div>                            
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Recently Viewed</h2>
                    <!--<a href="#" class="wid-view-more">View All</a>--> 
                    <?php foreach ($recent_view as $v_recent_view) { ?>
                        <div class="single-wid-product">
                            <a href="{{URL::to('/single-product/'.$v_recent_view->id)}}"><img src="{{ asset($v_recent_view->image)}}" alt="" class="product-thumb"></a>
                            <h2><a href="{{URL::to('/single-product/'.$v_recent_view->id)}}">{{$v_recent_view->product_title}}</a></h2>                 
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>{{$v_recent_view->product_price}}</del>
                            </div>                            
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Top New</h2>
                    <?php foreach ($top_new as $v_top_new) { ?>
                        <div class="single-wid-product">
                            <a href="{{URL::to('/single-product/'.$v_top_new->id)}}"><img src="{{ asset($v_top_new->image) }}" alt="" class="product-thumb"></a>
                            <h2><a href="{{URL::to('/single-product/'.$v_top_new->id)}}"> {{$v_top_new->product_title}}</a></h2>

                            <div class="product-wid-price">
                                <ins>BDT {{$v_top_new->product_price}}</ins>
                            </div>                            
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End product widget area -->
@endsection
