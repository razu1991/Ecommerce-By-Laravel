@extends('master')
@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Wishlist</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">

            <?php
            $customer_id = Session::get('customer_id');
            if ($customer_id == NULL) {
                ?>
                <h3 class="alert alert-info">Please Login First To View Your WishList</h3>
                <?php
            }
            foreach ($wishlist_product as $v_wishlist_product) {
                ?>
                <div class="col-md-3 col-sm-6">
                    {!! Form::open(array('url' => 'add-to-cart', 'method' => 'post' )) !!}
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{ asset($v_wishlist_product->image) }}" alt="">
                        </div>
                        <h2><a href="{{URL::to('/single-product/'.$v_wishlist_product->product_id)}}">{{$v_wishlist_product->product_name}}</a></h2>
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="product_id" value="{{$v_wishlist_product->product_id}}">
                        <input type="hidden" name="hit_count_check" value="1">
                        <div class="product-carousel-price">
                            <ins>BDT {{$v_wishlist_product->product_price}}</ins> 
                        </div>  
                        <div class="product-option-shop">
                            <!--                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>-->
                            <button type="submit" style="width:130px;" class="button" id="button-cart" title="Add to Cart"><span>Add to Cart</span></button>
                            <a href="{{URL::to('remove_wishlist/'.$v_wishlist_product->id)}}" class="btn btn-danger">Delete</a> 
                        </div>                       
                    </div>
                    {!! Form::close() !!}
                </div>
<?php } ?>
        </div>           
        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection