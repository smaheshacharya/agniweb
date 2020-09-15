<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Coupon;
use App\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = DB::table('company_detail')->first();
        $product = Product::orderBy('created_at','DESC')->paginate(16);
        $let_product = Product::where('featured','true')->limit(3)->get();
        $category = ProductCategory::orderBy('created_at','ASC')->get();
        return view('shop')->with('detail',$detail)->with('product',$product)->with('category',$category)->with('let_product',$let_product);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try{
            $detail = DB::table('company_detail')->first();
            $category = ProductCategory::orderBy('created_at','ASC')->get();
            $body = Product::where('slug', $slug)->first();
            // return $body;
            $product = Product::where('featured','true')->limit(4)->get();
        }
        catch(ModelNotFoundException $e){
            return back()->withError($e->getMessage())->withInput();

        }
        return view('shop-details')->with('product',$product)->with('product_detail',$body)->with('detail',$detail)->with('category',$category);


    }
    public function cart()
    {
        $detail = DB::table('company_detail')->first();
        $category = ProductCategory::orderBy('created_at','ASC')->get();
        return view('cart')->with('detail',$detail)->with('category',$category);
    }
    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "images"=>$product->images,
                        "name" => $product->name,
                        "sale_price"=> $product->sale_price,
                        "quantity" => 1,


                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;



            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "images"=>$product->images,
            "name" => $product->name,
            "sale_price"=> $product->sale_price,
            "quantity" => 1,

        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

}
