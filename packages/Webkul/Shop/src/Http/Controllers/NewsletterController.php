<?php

namespace Webkul\Shop\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Webkul\Shop\Http\Controllers\Controller;

class NewsletterController extends Controller
{
	public function newsletter(Request $request)
	{
		$email = $request->param;

		if($email != '')
		{
			$data = DB::table('newsletter')
                        ->where('email', '=', $email)                       
                        ->get()
                        ->toArray();

            if(count($data) > 0)
            {
            	return response()->json('You are already subscribed!');
            }
            else
            {

            	$dataInsert =array('email' => $email);
        		DB::table('newsletter')->insert($dataInsert); 
            	return response()->json('Thank you for subscription');            	
            }
		}
		else
		{
			return response()->json('Please enter valid email address');
		}
		

        // echo"<pre>";print_r($name);die;

        $dataInsert =array('name' => $name,'email' => $email ,'mobile'=>$mobile,"pincode"=>$pincode,"floorsize" =>$floorsize ,"date_of_installation"=>$date_of_installation,"support"=>$support,'description' => $description);
        DB::table('reach_out')->insert($dataInsert);       
        
        // return back()->with('success', 'Thank you for contact us!');
        return response()->json(['success'=>'Thank you for contact us!']);
	}
}