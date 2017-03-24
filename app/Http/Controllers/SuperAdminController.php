<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class SuperAdminController extends Controller {

    public function Index() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        //$dashboard=view('admin.pages.dashboard');
        return view('admin.pages.dashboard'); //->with('admin_maincontent',$dashboard);
    }

    public function addCategory() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        return view('admin.pages.add_category_form');
    }

    public function saveCategory(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;

        DB::table('category')->insert($data);
        session::put('message', 'Save Category Sucessfully');
        return Redirect::to('/add-category');
    }

    public function manageCategory(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_category = DB::table('category')
                ->select("*")
                ->get();

        return view('admin.pages.manage_category')->with('all_category', $all_category);
    }

    public function unpublishCategory($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_category = DB::table('category')
                ->where('id', $id)
                ->update(['publication_status' => 0]);
        return redirect::to('manage-category');
    }

    public function publishCategory($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_category = DB::table('category')
                ->where('id', $id)
                ->update(['publication_status' => 1]);
        return Redirect::to('/manage-category');
    }

    public function editCategory($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $category_info = DB::table('category')
                ->select("*")
                ->where('id', $id)
                ->first();
//     $update_category = view('admin.pages.update_category')->with('category_info', $category_info);
//     return view('admin.admin_master')
//                     ->with('admin_maincontent', $update_category);
        return view('admin.pages.update_category')->with('category_info', $category_info);
    }

    public function updateCategory(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

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
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        DB::table('category')
                ->where('id', $id)
                ->delete();
        return Redirect::to('/manage-category');
    }

    public function logout() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        Session::put('admin_id', NULL);
        Session::put('admin_name', NULL);
        Session::put('message', 'You Are Sucessfuly Logout');
        return Redirect::to('/razu');
    }

    public function addProduct() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $add_product = view('admin.pages.add_product');
        return view('admin.admin_master')
                        ->with('admin_subcontent', $add_product);
    }

    public function saveProduct(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        //Image File validation here............
        $image = $request->file('image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif') {
                echo 'File Type is not Valid.please try new one';
                exit();
            } else {
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'product_image/';
                $image_url = $upload_path . $image_full_name;
                $success = $image->move($upload_path, $image_full_name);
            }
            if ($success) {
                $data = array();
                $data['product_title'] = $request->product_title;
                $data['manufacturer_name'] = $request->manufacturer_name;
                $data['product_price'] = $request->product_price;
                $data['product_qty'] = $request->product_qty;
                $data['reorder_level'] = $request->reorder_level;
                $data['category_id'] = $request->category_id;
                $data['product_short_description'] = $request->product_short_description;
                $data['product_long_description'] = $request->product_long_description;
                $data['author_name'] = Session::get('admin_name');
                $data['image'] = $image_url;
                $data['publication_status'] = $request->publication_status;
                $data['featured_product'] = $request->featured_product;
                DB::table('product')->insert($data);
                Session::put('message', 'Save Product Information Successfully !');
                return Redirect::to('add-product');
            }
        }
    }

    public function manageProduct(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_manage_product = DB::table('product')
                ->select("*")
                ->get();
        return view('admin.pages.manage_product')->with('all_manage_product', $all_manage_product);
    }

    public function unpublishProduct($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_product = DB::table('product')
                ->where('id', $id)
                ->update(['publication_status' => 0]);
        return Redirect::to('/manage-product');
    }

    public function publishProduct($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_product = DB::table('product')
                ->where('id', $id)
                ->update(['publication_status' => 1]);
        return Redirect::to('/manage-product');
    }

    public function searchProduct(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $search_text = $request->search_text;
        $all_manage_product = DB::table('product')
                ->select("*")
                ->where('product_title', 'like', "%$search_text%")
                ->get();

        $manage_product = view('admin.pages.manage_product')->with('all_manage_product', $all_manage_product);
        return view('admin.admin_master')
                        ->with('admin_maincontent', $manage_product);
    }

    public function deleteProduct($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        DB::table('product')
                ->where('id', $id)
                ->delete();
        return Redirect::to('/manage-product');
    }

    public function editProduct($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $product_info = DB::table('product')
                ->select("*")
                ->where('id', $id)
                ->get();
        $edit_product = view('admin.pages.edit_product')->with('product_info', $product_info);
        return view('admin.admin_master')
                        ->with('admin_maincontent', $edit_product);
    }

    ##Product info update method here----------------------------------------------------------

    public function updateProduct(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }
        $image = $request->file('image');

        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif') {
                echo 'Image extension Must be JPG Or PNG Format';
                exit();
            } else {

                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'product_image/';
                $image_url = $upload_path . $image_full_name;
                $success = $image->move($upload_path, $image_full_name);
            }

            if ($success) {
                $data = array();
                $id = $request->id;

                $data['product_title'] = $request->product_title;
                $data['manufacturer_name'] = $request->manufacturer_name;
                $data['product_price'] = $request->product_price;
                $data['category_id'] = $request->category_id;
                $data['product_short_description'] = $request->product_short_description;
                $data['product_long_description'] = $request->product_long_description;
                $data['author_name'] = Session::get('admin_name');
                $data['image'] = $image_url;
                $data['publication_status'] = $request->publication_status;
                DB::table('product')
                        ->where('id', $id)
                        ->update($data);

                Session::put('message', 'Update product Information Successfully !');
                return Redirect::to('manage-product');
            }
        }
    }

    public function product_stock() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $stock_product = DB::table('product')
                ->select("*")
                ->where('product_qty', '>', 1)
                ->get();

        return view('admin.pages.stock')
                        ->with('stock_product', $stock_product);
    }

    public function stockout() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $stockout_product = DB::table('product')
                ->select("*")
                ->where('product_qty', '=', 0)
                ->get();
        return view('admin.pages.stockout')
                        ->with('stockout_product', $stockout_product);
    }

    public function product_reorder() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $reorder_product = DB::table('product')
                ->select("*")
                ->where('product_qty', '<', 11)
                ->get();

        return view('admin.pages.reorder')
                        ->with('reorder_product', $reorder_product);
    }

    public function add_old_product($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $reorder = DB::table('product')
                ->where('id', $id)
                ->first();
        return view('admin.pages.reorder_product')
                        ->with('reorder_product', $reorder);
    }

    public function reorder_product_sucess(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $id = $request->product_id;
        $qty = $request->product_qty;
        $check = DB::table('product')
                ->where('id', $id)
                ->first();

        $add = $qty + $check->product_qty;
        if ($check->product_qty < $qty) {
            DB::table('product')
                    ->where('id', $id)
                    ->update(['product_qty' => $add]);
            Session::flash('reorder_success', 'Reorder Quantity Must Be Greater Than Old Quantity!');
            return Redirect::to('/manage-product');
        } else {
            Session::flash('reorder_Fail', 'Reorder Quantity Must Be Greater Than Old Quantity!');
            return back();
        }
    }

}
