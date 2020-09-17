<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $productcategory = Product::where('category_id',$id )->get();
        return $productcategory;
        $product = Product::where('category_id',$productcategory)->get();
        return $product;


    }

}
