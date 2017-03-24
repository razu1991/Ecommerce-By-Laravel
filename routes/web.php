<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
//User
Route::get('/', 'HomeController@index');
Route::get('signup-form', 'CustomerController@signup_form');
Route::post('/customer-registration', 'CustomerController@signup');
Route::post('/customer-signin', 'CustomerController@signIn');
Route::get('customer-login', 'CustomerController@index');
Route::get('customer-logout', 'CustomerController@logout');
Route::get('/category/{id}', 'HomeController@category');
Route::post('/add-to-cart', 'CartController@add_to_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/remove_product/{id}', 'CartController@remove_product');
Route::post('/update-cart', 'CartController@update_cart');
Route::get('index', 'HomeController@index');
Route::get('shop', 'HomeController@shop');
Route::get('single_product', 'CartController@single_product');
//Route::get('cart','HomeController@cart');
Route::get('checkout', 'HomeController@checkout');
###.................................................
Route::get('/wishlist', 'CartController@wishlist');
Route::get('/remove_wishlist/{id}', 'CartController@remove_wishlist');
Route::post('/add-to-wish', 'CartController@add_to_wish');

###NewsLetter
Route::post('newsletter', 'CustomerController@newsletter');
###Search..............
Route::get('/search/{id}', 'ProductController@search_product');
###Product 
Route::get('/single-product/{id}', 'ProductController@single_product');

###Start Checkout Controlelr..............................
Route::get('checkout', 'CheckoutController@checkout');
Route::get('/ajax-email-check/{id}', 'CheckoutController@ajax_email_check');
Route::post('/billing_info', 'CheckoutController@billing_info');
###Start PDF
Route::get('show-pdf', 'PdfController@index');
Route::get('/complete_order/', 'PdfController@complete_order');
Route::get('/complete_paypal/', 'PdfController@complete_paypal');
Route::post('/complete_paypalas/', 'PdfController@complete_order');
###For Mail........................................................................
Route::get('/test_mail', 'PdfController@testmail');

### Start Admin Controller---------------------------------------------------------
Route::get('/razu', 'AdminController@index');
Route::post('/admin-login', 'AdminController@admin_login_check');


#work with SuperAdminController start here----------------------------------------- 
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/add-category', 'SuperAdminController@addCategory');
Route::post('/save-category', 'SuperAdminController@saveCategory');
Route::get('/manage-category', 'SuperAdminController@manageCategory');
Route::get('/unpublish-category/{id}', 'SuperAdminController@unpublishCategory');
Route::get('/publish-category/{id}', 'SuperAdminController@publishCategory');
Route::get('/edit-category/{id}', 'SuperAdminController@editCategory');
Route::post('/update-category', 'SuperAdminController@updateCategory');
Route::get('/delete-category/{id}', 'SuperAdminController@deleteCategory');
Route::get('/add-product', 'SuperAdminController@addProduct');
Route::post('/save-product', 'SuperAdminController@saveProduct');
Route::get('/manage-product', 'SuperAdminController@manageProduct');
Route::get('/unpublish-product/{id}', 'SuperAdminController@unpublishproduct');
Route::get('/publish-product/{id}', 'SuperAdminController@publishproduct');
Route::get('/edit-product/{id}', 'SuperAdminController@editproduct');
Route::post('/update-product', 'SuperAdminController@updateproduct');
Route::get('/delete-product/{id}', 'SuperAdminController@deleteproduct');
Route::get('/logout', 'SuperAdminController@logout');
Route::post('/search-product', 'SuperAdminController@searchproduct');
Route::get('/stock', 'SuperAdminController@product_stock');
Route::get('/stockout', 'SuperAdminController@stockout');
Route::get('/reorder', 'SuperAdminController@product_reorder');
Route::get('/add_old_product/{id}', 'SuperAdminController@add_old_product');
Route::post('/reorder-product-sucess', 'SuperAdminController@reorder_product_sucess');


