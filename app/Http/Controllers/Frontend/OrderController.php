<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CompanyDetail;
use App\ProductCategory;
use App\Order;
use App\Billing;
use App\Country;
use App\Shipping;
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
            'ship_fullname'=>'required',
            'ship_address'=>'required',
            'ship_city'=>'required',
            'ship_state'=>'required',
            'ship_post_code'=>'required',
            'ship_country'=>'required',
            'ship_phone'=>'required',
            'oder_note'=>'required',
            'payment'=>'required',


        ]);
        $esewa_tran = $request->esewa_tran;
        $payment = $request->payment;
        if(isset($esewa_tran))
        {
            $payment = $payment.'=>'.$esewa_tran;
        }

        $phone_number = $request->phone;
        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $order_number = substr($phone_number,4).$today.$rand;
        $transaction_id = substr($phone_number,3).$today.$rand;


            if(session('cart'))
            {
                foreach(session('cart') as $id=> $details)
                {

                    $order = Order::create([
                        'order_number'=> $order_number,
                        'order_date'=> date("Y-m-d H:i:s"),
                        'status' => 'pending',
                        'total'=> $details['sale_price'],
                        'payment_method'=> $payment,
                        'transaction_id'=> $transaction_id,
                        'payment_status' => 'to-be-paid',
                        'image'=> $details['images'],
                        'product_name'=> $details['name'],
                        'order_notes'=> $request->oder_note,
                        'shipping_info' => $request->ship_address.$request->ship_city.$request->ship_state.$request->ship_country.$request->ship_phone




                    ]);
                }
                $order->save();
                $billing = Billing::create([
                    'full_name'=> $request->fullname,
                    'address'=> $request->address,
                    'city' => $request->city,
                    'state'=> $request->state,
                    'postcode'=> $request->post_code,
                    'country'=> $request->country,
                    'phone'=> $request->phone,
                    'email'=> auth()->user() ? auth()->user()->email : null,
                    'order_number' => $order_number
    
    
                ]);
                $billing->save();
    
                return redirect('thanks');
            }
        
       
           

            return redirect('checkout')->with('warning','Somthing went wrong when ordering');


    }



    public function checkout()
    {
        $detail = CompanyDetail::first();
        $category = ProductCategory::orderBy('created_at','ASC')->get();
        $country = Country::select('name')->get();
        return view('checkout')->with('category',$category)->with('detail',$detail)->with('country',$country);
    }

    public function thanks(){
        $detail = CompanyDetail::first();
        $category = ProductCategory::orderBy('created_at','ASC')->get();
        $last_data =  Order::latest('created_at')->first();
        // return $last_data;
        return view('thanks')->with('category',$category)->with('detail',$detail)->with('data',$last_data);
    }
}
