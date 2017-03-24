<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;

class CheckoutController extends Controller {

    //
    public function checkout() {
        $recent_view = DB::table('product')
                        ->orderBy('hit_count', 'desc')->take(5)->get();
        $top_new = DB::table('product')
                        ->orderBy('id', 'desc')->take(3)->get();
        return view('pages.checkout')
                        ->with('recent_view', $recent_view)
                        ->with('top_new', $top_new);
    }

    public function ajax_email_check($email_address = NULL) {
        $customer_info = DB::table('customers')
                ->select('*')
                ->where('billing_email', $email_address)
                ->first();
        if ($customer_info) {
            echo 'Alredy Exists !';
        } else {
            echo 'Avilable';
        }
    }

    public function billing_info(Request $request) {
        $data = array();
        $customer_id = Session::get('customer_id');
        $data['billing_company'] = $request->billing_company;
        $data['billing_first_name'] = $request->billing_first_name;
        $data['billing_last_name'] = $request->billing_last_name;
        $data['billing_email'] = $request->billing_email;
        $data['billing_phone'] = $request->billing_phone;
        $data['billing_address'] = $request->billing_address;
        $data['billing_city'] = $request->billing_city;
        $data['billing_state'] = $request->billing_state;
        $data['billing_country'] = $request->billing_country;
        $data['billing_postcode'] = $request->billing_postcode;
        Session::put('billing_info', true);
        Session::put('customer_phone', $data['billing_phone']);
        Session::put('billing_email', $data['billing_email']);
        DB::table('customers')
                ->where('id', $customer_id)
                ->update($data);
        $sdata = array();
        $sdata['shipping_company'] = $request->shipping_company;
        $sdata['shipping_first_name'] = $request->shipping_first_name;
        $sdata['shipping_last_name'] = $request->shipping_last_name;
        $sdata['shipping_address'] = $request->shipping_address;
        $sdata['shipping_city'] = $request->shipping_city;
        $sdata['shipping_state'] = $request->shipping_state;
        $sdata['shipping_country'] = $request->shipping_country;
        $sdata['shipping_postcode'] = $request->shipping_postcode;
        $shipping_id = DB::table('shipping')
                ->insertGetId($sdata);
        Session::put('shipping_id', $shipping_id);
        $pdata = array();
        $pdata['payment_method'] = $request->payment_method;
        $pdata['comments'] = $request->order_comments;
        $payment_id = DB::table('payment')
                ->insertGetId($pdata);

        Session::put('payment_id', $payment_id);
        $odata = array();
        $oddata = array();
        if ($pdata['payment_method'] == 'cash_on_delivery') {
            $odata['customer_id'] = Session::get('customer_id');
            $odata['shipping_id'] = Session::get('shipping_id');
            $odata['payment_id'] = $payment_id;
            $odata['payment_id'] = $payment_id;
            $odata['order_total'] = Session::get('g_total');
            $odata['order_date'] = Carbon::Now();
            $order_id = DB::table('orders')
                    ->insertGetId($odata);
            $contents = Cart::content();
            foreach ($contents as $v_contents) {
                $oddata['order_id'] = $order_id;
                $oddata['product_id'] = $v_contents->id;
                $oddata['product_name'] = $v_contents->name;
                $oddata['product_price'] = $v_contents->price;
                $oddata['product_sales_qty'] = $v_contents->qty;
                $order_purchase_id = DB::table('order_details')
                        ->insertGetId($oddata);
                Session::put('order_purchase_id', $order_purchase_id);
            }

            DB::statement("UPDATE product,order_details SET product.product_qty=product.product_qty-order_details.product_sales_qty,product.sale_count=product.sale_count+order_details.product_sales_qty WHERE product.id=order_details.product_id AND order_details.order_id='$order_id' ");
            return redirect('/show-pdf');
        }
        if ($pdata['payment_method'] == 'paypal') {
            $odata['customer_id'] = Session::get('customer_id');
            $odata['shipping_id'] = Session::get('shipping_id');
            $odata['payment_id'] = $payment_id;
            $odata['order_total'] = Session::get('g_total');
            $odata['order_date'] = Carbon::Now();
            $order_id = DB::table('orders')
                    ->insertGetId($odata);
            $customer_id = Session::get('customer_id');
            $customer_info = DB::table('customers')
                    ->select("*")
                    ->where('id', $customer_id)
                    ->first();

            $contents = Cart::content();
            foreach ($contents as $v_contents) {
                $oddata['order_id'] = $order_id;
                $oddata['product_id'] = $v_contents->id;
                $oddata['product_name'] = $v_contents->name;
                $oddata['product_price'] = $v_contents->price;
                $oddata['product_sales_qty'] = $v_contents->qty;
                DB::table('order_details')
                        ->insertGetId($oddata);
            }
            //Cart::Destroy();
            DB::statement("UPDATE product,order_details SET product.product_qty=product.product_qty-order_details.product_sales_qty,product.sale_count=product.sale_count+order_details.product_sales_qty WHERE product.id=order_details.product_id AND order_details.order_id='$order_id' ");
            $try = Session::get('billing_email');
            $mail = 'r_shahnaouz21@yahoo.com';
            Mail::to($mail)->send(new \App\Mail\OrderMail());
            return view('pages/htmlWebsiteStandardPayment')
                            ->with('customer_info', $customer_info);
            //return redirect('/show-pdf');
        }
        return Redirect::to('/');
    }

}
