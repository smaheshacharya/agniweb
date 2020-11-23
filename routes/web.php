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

Route::get('/','Frontend\IndexController@index');

//product
Route::get('/shop',"Frontend\ProductController@index");
Route::get('/shop-detail/{slug}',"Frontend\ProductController@show");
Route::get('/cart',"Frontend\ProductController@cart");
Route::get('add-to-cart/{id}',"Frontend\ProductController@addToCart");
// Route::get('buy-product/{id}',"Frontend\ProductController@buyProduct");

Route::patch('/update-cart', 'Frontend\ProductController@update');

Route::delete('/remove-from-cart', 'Frontend\ProductController@remove');
//category
Route::get('/category/{slug}/{id}',"Frontend\CategoryController@show");
// Blog
Route::get('/blog',"Frontend\BlogController@index");
Route::get('blog-detail/{slug}',"Frontend\BlogController@show");

//contact
Route::get('contact',"Frontend\ContactController@index");
Route::post('sendmail/',"Frontend\ContactController@sendmail")->name('sendmail');

// checkout
Route::get('checkout/',"Frontend\OrderController@checkout")->name("checkout");
//order place
Route::post('order/',"Frontend\OrderController@store")->name('order');
//thanks
Route::get('thanks',"Frontend\OrderController@thanks");

//Search
Route::get('product',"Frontend\ProductController@search")->name('search');

//Track
Route::get('/track',"Frontend\TrackController@index");
Route::post('/track_order',"Frontend\TrackController@track")->name('track_order');
//customer services
Route::get('/how',"Frontend\Customer@how");
Route::get('/pay_process',"Frontend\Customer@pay_process");
Route::get('/terms_condition',"Frontend\Customer@terms_condition");

//autocomplete
Route::post('/autocomplete/fetch','AutocompleteController@fetch')->name('autocomplete.fetch');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

