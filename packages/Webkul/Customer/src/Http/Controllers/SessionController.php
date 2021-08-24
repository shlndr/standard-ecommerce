<?php

namespace Webkul\Customer\Http\Controllers;

use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Cookie;

class SessionController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Create a new Repository instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('customer')->except(['show','create']);

        $this->_config = request('_config');
    }

    /**
     * Display the resource.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        if (auth()->guard('customer')->check()) {
            return redirect()->route('customer.profile.index');
        } else {
            return view($this->_config['view']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        // $this->validate($request, [
        //     'phone' => 'required|regex:/[0-9]{10}/|digits:10',            
        // ]);

        $mobileNo = $request->phone;
        $password = $request->pwd;
        //print_r($mobileNo.'-'.$password);die;
        if($mobileNo == '' || strlen($password) < 4 || $password != 1234)
        {
           // echo"hii";die;
            session()->flash('error', trans('shop::app.customer.login-form.invalid-creds'));

            return redirect()->back();
        }

        // Get user record
        $user = DB::table('customers')
                            ->where('phone', '=', $mobileNo)
                            ->first();
        
        if($user)
        {
            // Check Condition Mobile No. Found or Not
            
            if($mobileNo != $user->phone) {
                
                session()->flash('error', 'Your mobile number not match in our system..!!');
                return redirect()->back();
            }        
            
            // Set Auth Details
            $credentials = $request->only('phone','password');
            if (auth()->guard('customer')->attempt($credentials)) {
                // Authentication passed...
               return redirect()->intended(route($this->_config['redirect']));
            }
        }

        //print_r($user->phone);die;
        
        // if (auth()->guard('customer')->attempt(request(['phone']))) {
            

        //     return redirect()->route($this->_config['redirect']);
        // }
        
        session()->flash('error', 'Please register the number.');
         return redirect()->back();



        /*$this->validate(request(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (! auth()->guard('customer')->attempt(request(['email', 'password']))) {
            session()->flash('error', trans('shop::app.customer.login-form.invalid-creds'));

            return redirect()->back();
        }

        if (auth()->guard('customer')->user()->status == 0) {
            auth()->guard('customer')->logout();

            session()->flash('warning', trans('shop::app.customer.login-form.not-activated'));

            return redirect()->back();
        }

        if (auth()->guard('customer')->user()->is_verified == 0) {
            session()->flash('info', trans('shop::app.customer.login-form.verify-first'));

            Cookie::queue(Cookie::make('enable-resend', 'true', 1));

            Cookie::queue(Cookie::make('email-for-resend', request('email'), 1));

            auth()->guard('customer')->logout();

            return redirect()->back();
        }

        //Event passed to prepare cart after login
        Event::dispatch('customer.after.login', request('email'));

        return redirect()->intended(route($this->_config['redirect'])); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->guard('customer')->logout();

        Event::dispatch('customer.after.logout', $id);

        return redirect()->route($this->_config['redirect']);
    }


}