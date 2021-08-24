<?php

namespace Webkul\Shop\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
   
    public function check(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if(auth()->guard('customer')->attempt(array('email' => $email,'password' => $password)))
        {
            return response()->json([[1]]);            
        }
        else
        {
            return response()->json([[3]]);
        }
    }

    public function register(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $zipcode = $request->zipcode;
        $phone = $request->phone;

        if($email != '' && $password !='' && $first_name != '' && $last_name != '' && $zipcode != '' && $phone != '')
        {
            $data = DB::table('customers')
                            ->select('id')
                            ->where('email', '=', $email)    
                            ->get()              
                            ->toArray();

            if(count($data) > 0)
            {
                return response()->json([[2]]);  
            } 
            else
            {
                $encryptpassword = bcrypt($password);
                $apiToken = Str::random(80);
                $token = md5(uniqid(rand(), true));

                $dataInsert =array('first_name' => $first_name,'last_name' => $last_name,'email' => $email ,'phone'=>$phone,"zipcode"=>$zipcode,"api_token" =>$apiToken ,"password"=>$encryptpassword,"status"=> 1,'token' => $token,'is_verified' => 1);

               if(DB::table('customers')->insert($dataInsert))
               {
                    if(auth()->guard('customer')->attempt(array('email' => $email,'password' => $password)))
                    {
                        return response()->json([[1]]);            
                    }
                  return response()->json([[1]]);
               }
               else
               {
                  return response()->json([[2]]);
               }
            }               
        }

        if(auth()->guard('customer')->attempt(array('email' => $username,'password' => $password)))
        {
            return response()->json([[1]]);            
        }
        else
        {
            return response()->json([[3]]);
        }
    }
    
    
}
