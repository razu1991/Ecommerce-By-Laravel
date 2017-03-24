@extends('master')
@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shop</h2>
                </div>
            </div>
        </div>
    </div>
</div>   
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="">
                        <input type="text" name="search" placeholder="Search products..." onkeyup="search_product(this.value, 'res')">
                        <input type="submit"  value="Search">
                    </form>
                </div>               
                <div id="res">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <?php foreach ($top_seller as $v_top_seller) { ?>
                            <div class="thubmnail-recent">
                                <img src="{{ asset($v_top_seller->image) }}" class="recent-thumb" alt="">
                                <h2><a href="single-product.html">{{$v_top_seller->product_title}}</a></h2>
                                <div class="product-sidebar-price">
                                    <ins>BDT {{$v_top_seller->product_price}}</ins> 
                                </div>                             
                            </div>
                        <?php } ?>
                    </div>
                </div>                                       
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="{{URL::to('/')}}">Home</a>
                        <a href="{{URL::to('/category/'.$single_product_category->id)}}">{{$single_product_category->category_name}}</a>
                        <a href="#">{{$single_product->product_title}}</a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::open(array('url' => 'add-to-cart', 'method' => 'post' )) !!}
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="{{ asset($single_product->image) }}" alt="">
                                </div>                                                                      
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name">{{$single_product->product_title}}</h2>
                                <div class="product-inner-price">
                                    <ins>BDT {{$single_product->product_price}}</ins>
                                </div>               
                                <form action="" class="cart">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="qty" min="1" step="1">
                                        <input type="hidden" size="4" class="input-text qty text" title="Qty" value="{{$single_product->id}}" name="product_id" min="1" step="1">
                                    </div>
                                    <button class="add_to_cart_button" type="submit">Add to cart</button>
                                </form>   

                                <div class="product-inner-category">
                                    <p>Category: <a href="">{{$single_product_category->category_name}}</a>. </p>
                                </div> 

                                <div role="tabpanel">

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Product Description</h2>
                                            <p>{{$single_product->product_long_description}}</p>
                                        </div>                                           
                                    </div>
                                </div>

                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>  
                    @if(Session::has('wishlist'))
                    <h3 class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('wishlist') }}</h3>
                    @endif
                    <?php
                    $customer_id = Session::get('customer_id');
                    if ($customer_id != NULL) {
                        ?>
                        {!! Form::open(array('url' => 'add-to-wish', 'method' => 'post' )) !!}
                        <input type="hidden" name="product_id" value="{{$single_product->id}}">
                        <input type="hidden" name="category_id" value="{{$single_product_category->id}}">
                        <input type="hidden" name="hit_count_check" value="1">
                        <button class="add_to_cart_button" type="submit">Add to Wishlistt</button>
                        {!! Form::close() !!}
                    <?php } else { ?>
                        <div id="welcomeDiv"  style="display:none; font-size: 20px;" class="alert-danger" > Please Login For Add This In Your Wishlist</div>
                        <a class="btn btn-primary btn-lg" onclick="showDiv()">Add TO Wishlist</a> 
                    <?php } ?>
                    <div class="related-products-wrapper">
                        <h2 class="related-products-title">Related Products</h2>
                        <div class="related-products-carousel">  
                            <?php foreach ($category_wise_product as $v_category_wise_product) { ?>
                                {!! Form::open(array('url' => 'add-to-cart', 'method' => 'post' )) !!}
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{ asset($v_category_wise_product->image) }}" alt="">
                                        <div class="product-hover">
                                            <a href="{{URL::to('/single-product/'.$v_category_wise_product->id)}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="product_id" value="{{$v_category_wise_product->id}}">
                                        <input type="hidden" name="hit_count_check" value="1">
                                    </div>

                                    <h2><a href="">{{$v_category_wise_product->product_title}}</a></h2>
                                    <div class="product-carousel-price">
                                        <ins>BDT {{$v_category_wise_product->product_price}}</ins>
                                    </div> 
                                    <button type="submit" style="width:130px;" class="button" id="button-cart" title="Add to Cart"><span>Add to Cart</span></button>
                                </div>  
                                {!! Form::close() !!}
                            <?php } ?>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function showDiv() {
        document.getElementById('welcomeDiv').style.display = "block";
    }
</script>
@endsection