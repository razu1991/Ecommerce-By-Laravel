<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use DB;
use Session;

class CartController extends Controller {

    //
    public function add_to_cart(Request $request) {
        $qty = $request->qty;
        $product_id = $request->product_id;
        $hit_count_check = $request->hit_count_check;
        if ($hit_count_check) {
            DB::table('product')
                    ->where('id', $product_id)
                    ->increment('hit_count', 1);
        }

        $product_info = DB::table('product')->select('*')
                ->where('id', $product_id)
                ->first();
        if ($qty <= $product_info->product_qty) {
            Cart::add(array('id' => $product_info->id, 'name' => $product_info->product_title, 'qty' => $qty, 'price' => $product_info->product_price, 'options' => array('image' => $product_info->image)));
            Session::flash('add_success', 'Sucessfully Added To Your Cart');
            return back();
        } else {
            Session::flash('message', 'Quantity Limit Exceed');
            return back();
        }
    }

    public function show_cart() {
        $top_seller = DB::table('product')
                        ->where('sale_count', '>', 5)
                        ->orderBy('sale_count', 'desc')->take(3)->get();
        $featured_products = DB::table('product')
                ->where('featured_product', 1)
                ->take(2)
                ->get();
        return view('pages.cart')
                        ->with('top_seller', $top_seller)
                        ->with('featured_products', $featured_products);
    }

    public function remove_product($rowId) {
        Cart::remove($rowId);
        return redirect('show-cart');
    }

    public function update_cart(Request $request) {
        $product_id = $request->product_id;
        $qty = $request->qty;
        $rowId = $request->rowId;
        $product_info = DB::table('product')->select('*')
                ->where('id', $product_id)
                ->first();
        if ($qty <= $product_info->product_qty) {
            Cart::update($rowId, $qty);
            return redirect('show-cart');
        } else {
            Session::flash('message', 'Quantity Limit Exceed');
            return redirect('show-cart');
        }
    }

    public function add_to_wish(Request $request) {
        $product_id = $request->product_id;
        $category_id = $request->category_id;
        $customer_id = Session::get('customer_id');

        $product_info = DB::table('product')->select('*')
                ->where('id', $product_id)
                ->first();

        $data = array();
        $data['customer_id'] = $customer_id;
        $data['category_id'] = $category_id;
        $data['product_id'] = $product_info->id;
        $data['product_name'] = $product_info->product_title;
        $data['image'] = $product_info->image;
        $data['image'] = $product_info->image;
        $data['product_price'] = $product_info->product_price;

        $check_wishlist = DB::table('wishlist')
                ->where('customer_id', $customer_id)
                ->where('product_id', $product_id)
                ->first();
        if ($check_wishlist) {
            Session::flash('wishlist', 'Already In Your Wishlist');
            return redirect('single-product/' . $product_id);
        } else {
            DB::table('wishlist')
                    ->insert($data);
            Session::flash('wishlist', 'Sucessfully Added');
            return redirect('single-product/' . $product_id);
        }
    }

    public function wishlist() {
        $customer_id = Session::get('customer_id');
        $wish_list = DB::table('wishlist')
                ->select("*")
                ->where('customer_id', $customer_id)
                ->get();


        return view('pages.wishlist')
                        ->with('wishlist_product', $wish_list);
    }

    public function remove_wishlist($id) {
        DB::table('wishlist')
                ->where('id', $id)
                ->delete();
        return back();
    }

}
