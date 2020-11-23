<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Product;
use App\CompanyDetail;
use App\ProductCategory;
use App\Order;
use App\Billing;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class TrackController extends Controller
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
        return view('track')->with('detail',$detail)->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function track(Request $request)
    {
        $detail = CompanyDetail::first();
        $category = ProductCategory::orderBy('created_at','ASC')->get();
        $this->validate($request,[
            'order_number'=>'required',
            // 'email'=>'required',

        ]);
        $order_number = $request->input('order_number');
        $email = $request->input('email');
        // $email = $request->input('email');

        $status = Order::where('order_number', $order_number)->get();
        $email = Billing::where('email', $email)->get();
        // return $status;
        if(count($status)>0)
        {
            return view('track')->with('detail',$detail)->with('category',$category)->with('status',$status);

        }
        else{

            return redirect()->back()->with('success', 'Order number not found');
        }



    }


}
