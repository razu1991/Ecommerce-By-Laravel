<div class="single-sidebar">
    <h2 class="sidebar-title">Products</h2>
    <?php foreach($search as $v_search) { ?>
    <div class="thubmnail-recent">
        <img src="{{ asset($v_search->image) }}" class="recent-thumb" alt="">
        <h2><a href="single-product.html">{{$v_search->product_title}}</a></h2>
        <div class="product-sidebar-price">
            <ins>BDT {{$v_search->product_price}}</ins> 
        </div>                             
    </div>
    <?php } ?>
</div>
