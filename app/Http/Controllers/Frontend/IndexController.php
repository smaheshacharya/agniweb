<?php

namespace App\Http\Controllers\Frontend;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CompanyDetail;
use App\ProductCategory;
use App\Product;
use App\Posts;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\Category;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $detail = CompanyDetail::first();
        $category = ProductCategory::orderBy('created_at','ASC')->get();
        $banner = Banner::where('status','enabled')->get();
        // return $banner;
        $fet_product = Product::where('featured','true')->limit(8)->get();
        // return $fet_product;
        $let_product = Product::orderBy('created_at','DESC')->get();
        // return array_chunk($let_product,3);
        // return $let_product;
        $reviewed = Product::where('reviews_allowed','true')->get();
        $top_rated = Product::orderBy('created_at','ASC')->get();
        $posts = Posts::orderBy('created_at','DESC')->where('status','PUBLISHED')->limit(3)->get();
        // return $posts;

        return view('index')->with('detail',$detail)->with('category',$category)->with('banner',$banner)->with('fet_product',$fet_product)->with('let_product',$let_product)->with('top_rated',$top_rated)->with('reviewed',$reviewed)->with('posts',$posts);
    }



}
