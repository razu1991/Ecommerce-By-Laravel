<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Barryvdh\DomPDF\Facade as PDF;
use Mail;
use Session;

class PdfController extends Controller {

    //
    public function Index() {
//        $try = Session::get('billing_email');
//        $mail = 'r_shahnaouz21@yahoo.com';
//        Mail::to($mail)->send(new \App\Mail\OrderMail());
        $pdf = PDF::loadView('pages.pdf.invoice');
        Cart::Destroy();
        return $pdf->download('invoice.pdf');
    }

    public function complete_order() {
        $order_purchase_id = Session::get('order_purchase_id');
        if ($order_purchase_id == NULL) {
            Session::flash('checkout_error', 'All Field not fillup correctly');
            return Redirect::to('/checkout')->send();
        }
        Session::put('order_purchase_id', NULL);
        return view('pages.ordercomplete');
    }

    public function complete_paypal() {
        return view('pages/htmlWebsiteStandardPayment');
    }

    public function testmail() {
        
    }

}
