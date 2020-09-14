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
Route::get('/shop-detail/{id}',"Frontend\ProductController@show");
Route::get('/cart',"Frontend\ProductController@cart");
Route::get('add-to-cart/{id}',"Frontend\ProductController@addToCart");

Route::patch('/update-cart', 'Frontend\ProductController@update');

Route::delete('/remove-from-cart', 'Frontend\ProductController@remove');

// Blog
Route::get('/blog',"Frontend\BlogController@index");
Route::get('blog-detail/{id}',"Frontend\BlogController@show");

//contact
Route::get('contact',"Frontend\ContactController@index");

// checjout
Route::get('checkout/',"Frontend\OrderController@checkout");
//order place
Route::post('order/',"Frontend\OrderController@store")->name('order');
//thanks
Route::get('thanks',"Frontend\OrderController@thanks");

//sendmail
Route::post('sendmail/',"Frontend\MailController@sendmail")->name('sendmail');
//Track
Route::get('/track',"Frontend\TrackController@index");
Route::post('/track_order',"Frontend\TrackController@track")->name('track_order');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
