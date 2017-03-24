<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

session_start();

class AdminController extends Controller {
    ##Dashboard Index page method here-----------------------------------------------------

    public function index() {
        $admin_id = Session::get('admin_id');
        if ($admin_id != NULL) {
            return Redirect::to('/dashboard')->send();
        }

        return view('admin.login');
    }

    ##Admin Dashboard Login Method Here............

    public function admin_login_check(Request $request) {
        $admin_email_address = $request->admin_email_address;
        $admin_password = $request->admin_password;
        $result = DB::table('admin')
                ->where('admin_email_address', $admin_email_address)
                ->where('admin_password', $admin_password)
                ->first();
        if ($result) {
            Session::put('admin_id', $result->admin_id);
            Session::put('admin_name', $result->admin_name);
            return redirect::to('dashboard');
        } else {
            session::put('exception', 'user id or password is invalid');
            return Redirect::to('/razu');
        }
    }

}
