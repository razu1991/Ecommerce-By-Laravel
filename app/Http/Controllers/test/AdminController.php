<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

//use App\Http\Requests;

use DB;
use Session;
session_start();

class AdminController extends Controller
{
	#url abnormal action close method here by defualt auto loading---------------------------
    public function __construct() {
          $admin_id=Session::get('admin_id');
        if($admin_id != NULL)
        {
            return Redirect::to('/dashboard')->send();
        }
    }
	#url action finish here----------------------------------------------------------------
	
	##Dashboard Index page method here-----------------------------------------------------
    public function index(){
		
		return view("admin.login");
    }
	
	##Dashboard Login mehtod start here----------------------------------------------------
    public function admin_login_check(Request $request){
        $admin_email_address=$request->admin_email_address;
        $admin_password=md5($request->admin_password);    
		
        $result = DB::table('tbl_admin')
                ->where('admin_email_address',$admin_email_address)
                ->where('admin_password',$admin_password)
                ->first();
        if($result){
            session::put('admin_id',$result->admin_id);
            session::put('admin_name',$result->admin_name);
            
            return Redirect::to('/dashboard');
        }else
        {
            session::put('exception','user id or password is invalid');
            return Redirect::to('/talha');
        }
        
    }
	##Dashboard Login finish here---------------------------------------------------------
}

