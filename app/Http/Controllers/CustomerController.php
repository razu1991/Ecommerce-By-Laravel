<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class CustomerController extends Controller {

    //
    public function index() {
        return view('pages.login');
    }

    public function signup_form() {

        return view('pages.registration');
    }

    ###SignUp Page Method

    public function signup(Request $request) {
        $v = $request->account_password;
        $len = strlen($v);
        if ($len < 5) {
            Session::flash('password', 'Passowrd Must be 5 character Long');
            return back();
        } else {
            $data = array();
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
            $data['account_password'] = $request->account_password;

            $billing_id = DB::table('customers')
                    ->insertGetId($data);
            Session::put('customer_id', $billing_id);
            Session::put('customer_phone', $data['billing_phone']);
            Session::put('customer_name', $data['billing_first_name'] . ' ' . $data['billing_last_name']);
            if ($request->checkout_page == 1) {
                return Redirect::to('checkout');
            } else {
                return Redirect::to('/');
            }
        }
    }

    ###SignIn page Method is active here....................................

    public function signIn(Request $request) {
        $user_email = $request->username;
        $user_pass = $request->password;

        $result = DB::table('customers')
                ->where('billing_email', $user_email)
                ->where('account_password', $user_pass)
                ->first();
        if ($result) {
            Session::put('customer_name', $result->billing_first_name . ' ' . $result->billing_last_name);
            Session::put('customer_id', $result->id);
            return Redirect::to('/');
        } else {

            Session::flash('login-error', 'User Id Or Password Invalide !');
            return Redirect::to('/customer-login');
        }
    }

    ###NewsLetter............................

    public function newsletter(Request $request) {
        $data = array();
        $data['newsletter_email'] = $request->newsletter_email;
        DB::table('newsletter')
                ->insert($data);
        return Redirect::to('/');
    }

    public function logout() {
        session::put('customer_id', NULL);
        session::put('customer_name', NULL);
        session::put('customer_phone', NULL);
        session::put('shipping_id', NULL);
        session::put('payment_id', NULL);
        session::flash('message', 'You Are Sucessfuly Logout');
        return Redirect::to('/');
    }

}
