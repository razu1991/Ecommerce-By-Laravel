<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

session_start();

class SuperAdminController extends Controller {

    public function __construct() {

        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }
    }

    public function index() {
        $dashboard = view('admin.pages.dashboard');
        return view('admin.admin_master')->with('admin_maincontent', $dashboard);
    }

    public function addCategory() {
        $add_category_page = view('admin.pages.add_category_form');
        return view('admin.admin_master')->with('admin_maincontent', $add_category_page);
    }

    public function saveCategory(Request $request) {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;

        DB::table('category')->insert($data);
        session::put('message', 'Save Category Sucessfully');
        return Redirect::to('/add-category');
    }

    public function manageCategory(Request $request) {
        $all_category = DB::table('category')
                ->select("*")
                ->get();

        $manage_category = view('admin.pages.manage_category')->with('all_category', $all_category);
        return view('admin.admin_master')
                        ->with('admin_maincontent', $manage_category);
    }

    public function unpublishCategory($id) {
        $all_category = DB::table('category')
                ->where('id', $id)
                ->update(['publication_status' => 0]);
        return Redirect::to('/manage-category');
    }

    public function publishCategory($id) {
        $all_category = DB::table('category')
                ->where('id', $id)
                ->update(['publication_status' => 1]);
        return Redirect::to('/manage-category');
    }

    public function editCategory($id) {
        $category_info = DB::table('category')
                ->select("*")
                ->where('id', $id)
                ->first();
        $update_category = view('admin.pages.update_category')->with('category_info', $category_info);
        return view('admin.admin_master')
                        ->with('admin_maincontent', $update_category);
    }
	##categroy info update method here----------------------------------------------------------
    public function updateCategory(Request $request) {
        $data = array();
        $id = $request->id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        DB::table('category')
                ->where('id', $id)
                ->update($data);
        return Redirect::to('manage-category');
    }

    public function deleteCategory($id) {
        DB::table('category')
                ->where('id', $id)
                ->delete();
        return Redirect::to('/manage-category');
    }

    public function addBook() {
        $add_book = view('admin.pages.add_book');
        return view('admin.admin_master')
                        ->with('admin_subcontent', $add_book);
    }
	
	###SAVE book method is action code here---------------------------------------------

    public function saveBook(Request $request) {
		
		##image file validation here---------------------------------------------------
        $image = $request->file('image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif') {
                echo 'File Type is not Valid.please try new one';
                exit();
            } else {
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'book_image/';
                $image_url = $upload_path . $image_full_name;
                $success = $image->move($upload_path, $image_full_name);
            }
		#validation finish here----------------------------------------------------------
            if ($success) {
                $data = array();
                $data['book_title'] = $request->book_title;
                $data['writer_name'] = $request->writer_name;
                $data['book_price'] = $request->book_price;
                $data['book_qty'] = $request->book_qty;
                $data['reorder_level'] = $request->reorder_level;				
                $data['category_id'] = $request->category_id;
                $data['book_short_description'] = $request->book_short_description;
                $data['book_long_description'] = $request->book_long_description;
                $data['author_name'] = Session::get('admin_name');
                $data['image'] = $image_url;
                $data['publication_status'] = $request->publication_status;
                $data['featured_book'] = $request->featured_book;
                DB::table('book')->insert($data);
                Session::put('message', 'Save book Information Successfully !');
                return Redirect::to('add-book');
            }
        }
    }
	#save mehtod finish here----------------------------------------------------------------
	
    public function manageBook(Request $request) {
        $all_manage_book = DB::table('book')
                ->select("*")
                ->get();

        $manage_book = view('admin.pages.manage_book')->with('all_manage_book', $all_manage_book);
        return view('admin.admin_master')
                        ->with('admin_maincontent', $manage_book);
    }

    public function unpublishBook($id) {
        $all_book = DB::table('book')
                ->where('id', $id)
                ->update(['publication_status' => 0]);
        return Redirect::to('/manage-book');
    }

    public function publishBook($id) {
        $all_book = DB::table('book')
                ->where('id', $id)
                ->update(['publication_status' => 1]);
        return Redirect::to('/manage-book');
    }

    public function searchBook(Request $request){
        $search_text=$request->search_text;
        $all_manage_book = DB::table('book')
                ->select("*")
                ->where('book_title','like',"%$search_text%")
                ->get();

        $manage_book = view('admin.pages.manage_book')->with('all_manage_book', $all_manage_book);
        return view('admin.admin_master')
                        ->with('admin_maincontent', $manage_book);
    }
    public function deleteBook($id) {
        DB::table('book')
                ->where('id', $id)
                ->delete();
        return Redirect::to('/manage-book');
    }

    public function editBook($id) {
        $book_info = DB::table('book')
                ->select("*")
                ->where('id', $id)
                ->get();
        $edit_book = view('admin.pages.edit_book')->with('book_info', $book_info);
        return view('admin.admin_master')
                        ->with('admin_maincontent', $edit_book);
    }
	
    ##Book info update method here----------------------------------------------------------
    public function updateBook(Request $request) {

        $image = $request->file('image');

        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif') {
                echo 'Image extension Must be JPG Or PNG Format';
                exit();
            } else {

                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'book_image/';
                $image_url = $upload_path . $image_full_name;
                $success = $image->move($upload_path, $image_full_name);
            }

            if ($success) {
                $data = array();
                $id = $request->id;

                $data['book_title'] = $request->book_title;
                $data['writer_name'] = $request->writer_name;
                $data['book_price'] = $request->book_price;
                $data['category_id'] = $request->category_id;
                $data['book_short_description'] = $request->book_short_description;
                $data['book_long_description'] = $request->book_long_description;
                $data['author_name'] = Session::get('admin_name');
                $data['image'] = $image_url;
                $data['publication_status'] = $request->publication_status;
                DB::table('book')
                        ->where('id', $id)
                        ->update($data);

                Session::put('message', 'Update book Information Successfully !');
                return Redirect::to('manage-book');
            }
        }
    }

    public function logout() {
        session::put('admin_id', NULL);
        session::put('admin_name', NULL);
        session::put('message', 'You Are Sucessfuly Logout');
        return Redirect::to('/razu');
    }

}
