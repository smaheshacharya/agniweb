<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail;
use App\CompanyDetail;
use App\ProductCategory;


class MailController extends Controller
{

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
        return view('thanks')->with('detail',$detail)->with('category',$category)->with('success',"Message Send");
    }



}
