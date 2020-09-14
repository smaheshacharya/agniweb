<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Products
Route::get('products','Api\ProductController@index');

Route::get('products/{id}','Api\ProductController@show');
// create new
// Route::post('products','Api\ProductController@store');
// //update
// Route::put('products','Api\ProductController@store');
// //delete
// Route::delete('products/{id}','Api\ProductController@destroy');


// Order
Route::get('orders','Api\OrderController@index');

Route::get('orders/{id}','Api\OrderController@show');
// create new
Route::post('orders','Api\OrderController@store');
//update
Route::put('orders','Api\OrderController@store');
//delete
Route::delete('orders/{id}','Api\OrderController@destroy');



// Reviews
Route::get('reviews','Api\ReviewsController@index');

Route::get('reviews/{id}','Api\ReviewsController@show');
// create new
Route::post('reviews','Api\ReviewsController@store');
//update
Route::put('reviews','Api\ReviewsController@store');
//delete
Route::delete('reviews/{id}','Api\ReviewsController@destroy');
