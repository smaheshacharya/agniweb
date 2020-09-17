<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CompanyDetail;
use App\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Mail;

class ContactController extends Controller
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
        // return $detail;

        return view('contact')->with('detail',$detail)->with('category',$category);
    }


    public function sendmail(Request $request){
        $detail = CompanyDetail::first();
        $category = ProductCategory::orderBy('created_at','ASC')->get();
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',

        ]);
        $post = new Mail;
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->message = $request->input('message');
        $post->save();
        return redirect()->back()->with('success', 'Send Mail Successfull');
     }

}
