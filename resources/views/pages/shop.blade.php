@extends('master')
@section('content')

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>{{$category_by_id->category_name}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            @if(Session::has('message'))
            <h3 class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</h3>
            @endif
            @if(Session::has('add_success'))
            <h3 class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('add_success') }}</h3>
            @endif
            <?php
            foreach ($product_by_category_id as $v_category_product) {
                ?>
                <div class="col-md-3 col-sm-6">
                    {!! Form::open(array('url' => 'add-to-cart', 'method' => 'post' )) !!}
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{ asset($v_category_product->image) }}" alt="">
                        </div>
                        <h2><a href="{{URL::to('/single-product/'.$v_category_product->id)}}">{{$v_category_product->product_title}}</a></h2>
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="product_id" value="{{$v_category_product->id}}">
                        <input type="hidden" name="hit_count_check" value="1">
                        <div class="product-carousel-price">
                            <ins>BDT {{$v_category_product->product_price}}</ins> 
                        </div>  
                        <div class="product-option-shop">
                            <!--                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>-->
                            <button type="submit" style="width:130px;" class="button" id="button-cart" title="Add to Cart"><span>Add to Cart</span></button>
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