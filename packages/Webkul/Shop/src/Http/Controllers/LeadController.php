<?php

namespace Webkul\Shop\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Webkul\Shop\Http\Controllers\Controller;

class LeadController extends Controller
{
	public function leadForm(Request $request)
    {
    	$name = $request->name;
        $email = $request->email;        
        $mobile = $request->phone;
        $pincode = $request->pincode;
        $message = $request->message;
        $product = $request->product;
        
        // echo"<pre>";print_r($request);die;

        $dataInsert =array('name' => $name,'email' => $email ,'phone'=>$mobile,"pincode"=>$pincode,"product_name" =>$product,"message" => $message);
        DB::table('lead_details')->insert($dataInsert);    
        
        session()->flash('success', __('Data submitted Successfully !'));
        
        return Redirect::back()->with('message','Data submitted Successfully !');
        //return response()->json(['success'=>'Thank you for contact us!']);
    }

}