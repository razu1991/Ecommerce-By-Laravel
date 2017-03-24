@extends('master')
@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="#">
                        <input type="text" name="search" placeholder="Search products..." onkeyup="search_product(this.value, 'res')">
                        <input type="submit" value="Search">
                    </form>
                </div>
                <div id="res">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <?php foreach ($top_seller as $v_top_seller) { ?>
                            <div class="thubmnail-recent">
                                <img src="{{ asset($v_top_seller->image) }}" class="recent-thumb" alt="">
                                <h2><a href="{{URL::to('/single-product/'.$v_top_seller->id)}}">{{$v_top_seller->product_title}}</a></h2>
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
                    <div class="woocommerce">
                        <table cellspacing="0" class="shop_table cart">
                            <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contents = Cart::content();
                                $count = Cart::count();
                                if ($count) {
                                    foreach ($contents as $v_contents) {
                                        ?>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a href="{{URL::to('remove_product/'.$v_contents->rowId)}}" title="Remove this item" class="remove">×</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="{{URL::to('/single-product/'.$v_contents->id)}}"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{asset($v_contents->options['image'])}}"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="{{URL::to('/single-product/'.$v_contents->id)}}">{{$v_contents->name}}</a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">{{$v_contents->price}}</span> 
                                            </td>
                                            {!! Form::open(array('url' => 'update-cart', 'method' => 'post' )) !!} 
                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="number" size="4" class="input-text qty text" title="Qty" name="qty" value="{{$v_contents->qty}}" min="0" step="1">
                                                    <input type="hidden" name="rowId" size="3" value="{{$v_contents->rowId}}" />
                                                    <input type="hidden" name="product_id" size="3" value="{{$v_contents->id}}" />
                                                    <button type="submit" >Update</button>
                                                </div>
                                            </td>
                                            {!! Form::close() !!}
                                            <td class="product-subtotal">
                                                <span class="amount">{{$v_contents->subtotal}} Tk</span> 
                                            </td> 
                                        </tr>
                                    <?php } ?>
                                    @if(Session::has('message'))
                                <h3 class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</h3>
                                @endif
                                <tr>
                                    <td class="actions" colspan="6">                                         
                                        <a href="{{URL::to('/checkout')}}" class="btn btn-primary btn-lg">Checkout</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;<span style="font-size: 21px;"><label>Total:</label>
                                            <?php
                                            $grand_total = Cart::total();
                                            Session::put('g_total', $grand_total);
                                            echo Cart::total();
                                            ?>
                                            Tk
                                        </span>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td class="actions" colspan="6">
                                        <h3 style="color:blue;">Your Cart Is Empty</h3> 
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div class="cart-collaterals">
                            <div class="cross-sells">
                                <h2>You may be interested in...</h2>
                                <ul class="products">
                                    <?php
                                    foreach ($featured_products as $v_featured_products) {
                                        ?>
                                        <li class="product">
                                            <a href="{{URL::to('/single-product/'.$v_featured_products->id)}}">
                                                <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="{{ asset($v_featured_products->image) }}">
                                                <h3>{{$v_featured_products->product_title}}</h3>
                                                <span class="price"><span class="amount">BDT {{$v_featured_products->product_price}}</span></span>
                                            </a>
                                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="{{URL::to('/single-product/'.$v_featured_products->id)}}">Select options</a>
                                        </li>  
                                    <?php } ?>
                                </ul>
                            </div>                          
                        </div>
                    </div>                        
                </div>                    
            </div>
        </div>
    </div>
</div>
@endsection