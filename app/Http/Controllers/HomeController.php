<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller {

    public function index() {

        $latest_products = DB::table('product')
                        ->orderBy('id', 'desc')->take(7)->get();
        $featured_products = DB::table('product')
                ->where('featured_product', 1)
                ->get();
        $top_seller = DB::table('product')
                        ->where('sale_count', '>', 1)
                        ->orderBy('sale_count', 'desc')->take(4)->get();
        $top_new = DB::table('product')
                        ->orderBy('id', 'desc')->take(3)->get();
        $recent_view = DB::table('product')
                        ->orderBy('hit_count', 'desc')->take(4)->get();
        return view('pages.index')
                        ->with('latest_products', $latest_products)
                        ->with('top_seller', $top_seller)
                        ->with('top_new', $top_new)
                        ->with('recent_view', $recent_view)
                        ->with('featured_products', $featured_products);
    }

    public function category($category_id) {
        $category_by_id = DB::table('category')
                ->select("*")
                ->where('id', $category_id)
                ->first();

        $product_by_category_id = DB::table('product')
                ->select("*")
                ->where('publication_status', 1)
                ->where('category_id', $category_id)
                ->get();
//        $category_wise_product=view('pages.shop')
//                ->with('category_by_id', $category_by_id)
//                ->with('product_by_category_id', $product_by_category_id);
//        return view('master')->with('content', $category_wise_product);
        return view('pages.shop')->with('category_by_id', $category_by_id)->with('product_by_category_id', $product_by_category_id);
    }

    public function shop() {
        return view('pages.shop');
    }

    public function single_product() {
        return view('pages.single_product');
    }

    public function cart() {
        return view('pages.cart');
    }

    public function checkout() {
        return view('pages.checkout');
    }

}
