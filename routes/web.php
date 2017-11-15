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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/mongodb', 'testController@index');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/shop', 'HomeController@shop');
Route::post('/search', 'HomeController@search');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/product_details/{id}', 'HomeController@product_details');
Route::get('/admin', 'AdminController@index');
Route::get('/products', 'AdminController@view_products');
Route::get('/addProduct', 'AdminController@addpro_form');
Route::post('/addProduct', 'AdminController@add_product');
Route::get('ProductEditForm/{id}', 'AdminController@ProductEditForm');
Route::post('/editProduct', 'AdminController@editProduct');
Route::get('EditImage/{id}', 'AdminController@ImageEditForm');
Route::post('/editProImage', 'AdminController@editProImage');
Route::get('addAlt/{id}', 'AdminController@addAlt');
Route::post('submitAlt','AdminController@submitAlt');
Route::get('/addPropertyAll', function(){
    return view('admin.addProperty');
});
Route::post('sumbitProperty','AdminController@sumbitProperty');
Route::post('editProperty','AdminController@editProperty');
Route::get('addSale', 'AdminController@addSale');
Route::get('deleteCat/{id}', 'AdminController@deleteCat');
Route::get('deleteProd/{id}', 'AdminController@deleteProd');
Route::get('/addProperty/{id}', function($id){
    return view('admin.addProperty')->with('id', $id);
});
Route::get('/addCat', 'AdminController@add_cat');
Route::Post('/catForm', 'AdminController@catForm');
Route::get('/categories', 'AdminController@view_cats');
Route::get('/CatEditForm/{id}', 'AdminController@CatEditForm');
Route::post('/editCat', 'AdminController@editCat');

// Route::get('/test',function(){

//     $users = Users::all();
//     DebugBar::info($users);
//     return view('front.home');
// });


// Route::get('/test', function(){

//     return View::make('front.home')->with('data',Catagorys::all());

// });