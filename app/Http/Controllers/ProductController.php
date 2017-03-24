<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ProductController extends Controller {

    //

    public function single_product($id) {

        $single_product = DB::table('product')
                ->select("*")
                ->where('id', $id)
                ->first();
        DB::table('product')
                ->where('id', $id)
                ->increment('hit_count', 1);
        $cat_id = $single_product->category_id;
        $category_id = DB::table('category')
                ->select("*")
                ->where('id', $cat_id)
                ->first();
        $top_seller = DB::table('product')
                        ->where('sale_count', '>', 5)
                        ->orderBy('sale_count', 'desc')->take(3)->get();
        $category_wise_product = DB::table('product')
                ->select("*")
                ->where('category_id', $cat_id)
                ->Where('id', '<>', $id)
                ->get();
        return view('pages/single_product')
                        ->with('single_product', $single_product)
                        ->with('single_product_category', $category_id)
                        ->with('top_seller', $top_seller)
                        ->with('category_wise_product', $category_wise_product);
    }

    public function search_product($search) {
        $search_product = DB::table('product')
                ->where('product_title', 'LIKE', '%' . $search . '%')
                ->get();
        return view('pages.ajax.search_ajax')->with('search', $search_product);
    }

}
