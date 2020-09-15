<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use App\ProductCategory;
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = DB::table('company_detail')->first();
        $category = ProductCategory::orderBy('created_at','ASC')->get();
        $post_category = Category::orderBy('created_at','DESC')->limit(5)->get();
        // return $post_category;
        $recent = Posts::orderBy('created_at','ASC')->where('status','PUBLISHED')->limit(3)->get();
        // return $recent;
        $posts = Posts::orderBy('created_at','DESC')->where('status','PUBLISHED')->limit(6)->get();
        return view('blog')->with('detail',$detail)->with('category',$category)->with('post_category',$post_category)->with('recent',$recent)->with('posts',$posts);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $detail = DB::table('company_detail')->first();
        $category = ProductCategory::orderBy('created_at','ASC')->get();
        $post_category = Category::orderBy('created_at','DESC')->limit(5)->get();
        $recent = Posts::orderBy('created_at','ASC')->where('status','PUBLISHED')->limit(3)->get();
        $posts = Posts::where('slug', $slug)->first();
        return view('blog-detail')->with('detail',$detail)->with('category',$category)->with('post_category',$post_category)->with('recent',$recent)->with('posts',$posts);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
