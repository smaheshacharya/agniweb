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
    public function show($slug,$id)
    {
        $detail = DB::table('company_detail')->first();
        $category = ProductCategory::orderBy('created_at','ASC')->get();
        $productcategory = Product::where('category_id', $id)->paginate(15);
        return view('category')->with('detail',$detail)->with('category',$category)->with('product',$productcategory);



    }

}
