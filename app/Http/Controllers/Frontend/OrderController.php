<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CompanyDetail;
use App\ProductCategory;
use App\Order;
use App\Billing;
// use App\Shipping;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'fullname'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'post_code'=>'required',
            'country'=>'required',
            'phone'=>'required',
            'oder_note'=>'required',
            'payment'=>'required',


        ]);
        $phone_number = $request->phone;
        $order_number = substr($phone_number,4).rand(1000,9999);
        $transaction_id = substr($phone_number,3).rand(10000,99999);

        $billing = Billing::create([
            'full_name'=> $request->fullname,
            'address'=> $request->address,
            'city' => $request->city,
            'state'=> $request->state,
            'postcode'=> $request->post_code,
            'country'=> $request->country,
            'phone'=> $request->phone,
            'email'=> auth()->user() ? auth()->user()->email : null,
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'orders' => $order_number


        ]);
            if(session('cart'))
            {
                foreach(session('cart') as $id=> $details)
                {

                    $order = Order::create([
                        'order_number'=> $order_number,
                        'order_date'=> date("Y-m-d H:i:s"),
                        'status' => 'pending',
                        'total'=> $details['sale_price'],
                        'user_id'=> auth()->user() ? auth()->user()->id : null,
                        'payment_method'=> $request->payment,
                        'transaction_id'=> $transaction_id,
                        'payment_status' => 'to-be-paid',
                        'image'=> $details['images'],
                        'product_name'=> $details['name'],
                        'order_notes'=> $request->oder_note,



                    ]);
                }
                $order->save();

            }
            $billing->save();

            return redirect('thanks');


    }



    public function checkout()
    {
        $detail = CompanyDetail::first();
        $category = ProductCategory::orderBy('created_at','ASC')->get();
        return view('checkout')->with('category',$category)->with('detail',$detail);
    }

    public function thanks(){
        $detail = CompanyDetail::first();
        $category = ProductCategory::orderBy('created_at','ASC')->get();
        $last_data =  Order::latest('created_at')->first();
        // return $last_data;
        return view('thanks')->with('category',$category)->with('detail',$detail)->with('data',$last_data);
    }
}
