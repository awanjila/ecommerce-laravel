<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::post('/updateproduct', 'ProductController@updateproduct');
Route::get('/', 'ClientController@home');
Route::get('/checkout', 'ClientController@checkout');
Route::post('/updateqty', 'ClientController@updateqty');
Route::get('/removeitem/{id}', 'ClientController@removeitem');
Route::post('/postcheckout','ClientController@postcheckout');


Route::get('/shop', 'ClientController@shop');
Route::get('/cart', 'ClientController@cart');
Route::get('/login', 'ClientController@login');
Route::get('/signup', 'ClientController@signup');
Route::get('/view_by_cat/{name}', 'ClientController@view_by_cat');

Route::get('/dashboard', 'AdminController@dashboard');


Route::get('/addcategories', 'CategoryController@addcategories');
Route::post('/savecategories', 'CategoryController@savecategories');
Route::get('/categories', 'CategoryController@categories');
Route::get('/edit_category/{id}', 'CategoryController@edit');
Route::get('/delete/{id}', 'CategoryController@delete');
Route::get('/mpesa_transactions', 'MpesaController@mpesa_transactions');



Route::get('/addslider', 'SliderController@addslider');
Route::get('/sliders', 'SliderController@sliders');
Route::post('/saveslider', 'SliderController@saveslider');
Route::get('/deactivate_slider/{id}', 'SliderController@deactivateslider');
Route::get('/activate_slider/{id}', 'SliderController@activateslider');
Route::get('/delete_slider/{id}', 'SliderController@delete');
Route::get('/edit_slider/{id}', 'SliderController@editslider');
Route::post('/updateslider', 'SliderController@updateslider');


Route::get('/addproducts', 'ProductController@addproducts');
Route::get('/products', 'ProductController@products');
Route::get('/delete_product/{id}', 'ProductController@delete');
Route::get('/deactivate_product/{id}', 'ProductController@deactivateproduct');
Route::get('/activate_product/{id}', 'ProductController@activateproduct');
Route::get('/addToCart/{id}', 'ProductController@addToCart');


Route::post('/saveproducts', 'ProductController@saveproduct');
Route::get('/edit_product/{id}', 'ProductController@editproduct');

Route::get('/orders', 'OrderController@orders');





