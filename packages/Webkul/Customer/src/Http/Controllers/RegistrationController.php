<?php

namespace Webkul\Customer\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Webkul\Customer\Mail\RegistrationEmail;
use Webkul\Customer\Mail\VerificationEmail;
use Webkul\Shop\Mail\SubscriptionEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\Core\Repositories\SubscribersListRepository;
use Cookie;

class RegistrationController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * CustomerRepository object
     *
     * @var \Webkul\Customer\Repositories\CustomerRepository
     */
    protected $customerRepository;

    /**
     * CustomerGroupRepository object
     *
     * @var \Webkul\Customer\Repositories\CustomerGroupRepository
     */
    protected $customerGroupRepository;

    /**
     * SubscribersListRepository
     *
     * @var \Webkul\Core\Repositories\SubscribersListRepository
     */
    protected $subscriptionRepository;

    /**
     * Create a new Repository instance.
     *
     * @param  \Webkul\Customer\Repositories\CustomerRepository  $customer
     * @param  \Webkul\Customer\Repositories\CustomerGroupRepository  $customerGroupRepository
     * @param  \Webkul\Core\Repositories\SubscribersListRepository  $subscriptionRepository
     *
     * @return void
     */
    public function __construct(
        CustomerRepository $customerRepository,
        CustomerGroupRepository $customerGroupRepository,
        SubscribersListRepository $subscriptionRepository
    )
    {
        $this->_config = request('_config');

        $this->customerRepository = $customerRepository;

        $this->customerGroupRepository = $customerGroupRepository;

        $this->subscriptionRepository = $subscriptionRepository;
    }

    /**
     * Opens up the user's sign up form.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view($this->_config['view']);
    }

    /**
     * Method to store user's sign up form data to DB.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'string|required',
        ]);

        $fullName = $request->name;
        $mobile = $request->phone;
        $extractName = explode(' ', $fullName);
        if(count($extractName) > 1)
        {
            $firstName = $extractName[0];
            $lastName = $extractName[1];
        }
        elseif (count($extractName) == 3) {
            $firstName = $extractName[0];
            $lastName = $extractName[2];
        }
        else
        {
            $firstName = $fullName;
            $lastName = '';
        }


        $password = bcrypt('1234');

        $dataInsert =array('first_name' => $firstName,'last_name' => $lastName ,'phone'=>$mobile,'is_verified' => 1,'password' => $password,'zipcode' => '410207','customer_group_id' => 2);
        if(DB::table('customers')->insert($dataInsert))
        {
            session()->flash('success', trans('shop::app.customer.signup-form.success'));
            return redirect()->route($this->_config['redirect']);
        }
        else
        {
            session()->flash('error', trans('shop::app.customer.signup-form.failed'));

            return redirect()->back();
        }

        /*$this->validate(request(), [
            'first_name' => 'string|required',
            'last_name'  => 'string|required',
            'zipcode'  => 'string|required',
            'email'      => 'email|required|unique:customers,email',
            'password'   => 'confirmed|min:6|required',
        ]);

        $data = array_merge(request()->input(), [
            'password'          => bcrypt(request()->input('password')),
            'api_token'         => Str::random(80),
            'is_verified'       => core()->getConfigData('customer.settings.email.verification') ? 0 : 1,
            'customer_group_id' => $this->customerGroupRepository->findOneWhere(['code' => 'general'])->id,
            'token'             => md5(uniqid(rand(), true)),
            'subscribed_to_news_letter' => isset(request()->input()['is_subscribed']) ? 1 : 0,
        ]);

        Event::dispatch('customer.registration.before');

        $customer = $this->customerRepository->create($data);

        Event::dispatch('customer.registration.after', $customer);

        if (! $customer) {
            session()->flash('error', trans('shop::app.customer.signup-form.failed'));

            return redirect()->back();
        }

        if (isset($data['is_subscribed'])) {
            $subscription = $this->subscriptionRepository->findOneWhere(['email' => $data['email']]);

            if ($subscription) {
                $this->subscriptionRepository->update([
                    'customer_id' => $customer->id,
                ], $subscription->id);
            } else {
                $this->subscriptionRepository->create([
                    'email'         => $data['email'],
                    'customer_id'   => $customer->id,
                    'channel_id'    => core()->getCurrentChannel()->id,
                    'is_subscribed' => 1,
                    'token'         => $token = uniqid(),
                ]);

                try {
                    Mail::queue(new SubscriptionEmail([
                        'email' => $data['email'],
                        'token' => $token,
                    ]));
                } catch (\Exception $e) { }
            }
        }

        if (core()->getConfigData('customer.settings.email.verification')) {
            try {
                if (core()->getConfigData('emails.general.notifications.emails.general.notifications.verification')) {
                    Mail::queue(new VerificationEmail(['email' => $data['email'], 'token' => $data['token']]));
                }

                session()->flash('success', trans('shop::app.customer.signup-form.success-verify'));
            } catch (\Exception $e) {
                report($e);

                session()->flash('info', trans('shop::app.customer.signup-form.success-verify-email-unsent'));
            }
        } else {
            try {
                if (core()->getConfigData('emails.general.notifications.emails.general.notifications.registration')) {
                    Mail::queue(new RegistrationEmail(request()->all()));
                }

                session()->flash('success', trans('shop::app.customer.signup-form.success-verify'));
            } catch (\Exception $e) {
                report($e);

                session()->flash('info', trans('shop::app.customer.signup-form.success-verify-email-unsent'));
            }

            session()->flash('success', trans('shop::app.customer.signup-form.success'));
        }

        return redirect()->route($this->_config['redirect']); */
    }

    /**
     * Method to verify account
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function verifyAccount($token)
    {
        $customer = $this->customerRepository->findOneByField('token', $token);

        if ($customer) {
            $customer->update(['is_verified' => 1, 'token' => 'NULL']);

            session()->flash('success', trans('shop::app.customer.signup-form.verified'));
        } else {
            session()->flash('warning', trans('shop::app.customer.signup-form.verify-failed'));
        }

        return redirect()->route('customer.session.index');
    }

    /**
     * @param  string  $email
     * @return \Illuminate\Http\Response
     */
    public function resendVerificationEmail($email)
    {
        $verificationData = [
            'email' => $email,
            'token' => md5(uniqid(rand(), true)),
        ];

        $customer = $this->customerRepository->findOneByField('email', $email);

        $this->customerRepository->update(['token' => $verificationData['token']], $customer->id);

        try {
            Mail::queue(new VerificationEmail($verificationData));

            if (Cookie::has('enable-resend')) {
                \Cookie::queue(\Cookie::forget('enable-resend'));
            }

            if (Cookie::has('email-for-resend')) {
                \Cookie::queue(\Cookie::forget('email-for-resend'));
            }
        } catch (\Exception $e) {
            report($e);

            session()->flash('error', trans('shop::app.customer.signup-form.verification-not-sent'));

            return redirect()->back();
        }

        session()->flash('success', trans('shop::app.customer.signup-form.verification-sent'));

        return redirect()->back();
    }

    public function generateOTP(){
        $otp = mt_rand(1000,9999);
        return $otp;
    }

    public function submitRegisterForm(){
        
        $first_name = request('first_name');
        $last_name = request('last_name');
        $mobile = request('mobile');
        $email = request('email');
        //$authKey =  env('AUTH_KEY',"");
        if($mobile==''){
            return json_encode(array('statusCode'=>400,'msg'=>"Mobile number not valid".$mobile));
        }
        // else if($authKey==""){
        //     return json_encode(array('statusCode'=>400,'msg'=>"sms gateway not intigrated"));
        // }
        else{
            //put in session
            $otp = $this->generateOTP();
            $message = 'you otp is '.$otp;
            //$number = '+91'.$mobile;
            //sms($number,$msg)
            // $route = "route=4";
            //  /*Prepare you post parameters*/
            //  $postData = array(
            //  'authkey' => $authKey,
            //  'mobiles' => $mobile,
            //  'message' => $message,
            //  'sender' => $senderId,
            //  'route' => $route
            //  );
            //  /*API URL*/
            //  $url="https://control.msg91.com/api/sendhttp.php";
            //  /* init the resource */
            //  $ch = curl_init();
            //  curl_setopt_array($ch, array(
            //  CURLOPT_URL => $url,
            //  CURLOPT_RETURNTRANSFER => true,
            //  CURLOPT_POST => true,
            //  CURLOPT_POSTFIELDS => $postData
            //  /*,CURLOPT_FOLLOWLOCATION => true*/
            //  ));
            //  /*Ignore SSL certificate verification*/
            //  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            //  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            //  /*get response*/
            //  $output = curl_exec($ch);
            //  /*Print error if any*/
            //  if(curl_errno($ch))
            //  {
            //     echo 'error:' . curl_error($ch);
            //     curl_close($ch);
            //     exit;
            //  }
            //  curl_close($ch);

           session(['first_name'=> $first_name]);
           session(['last_name'=> $last_name]);
           session(['mobile'=> $mobile]);
           session(['email'=> $email]);
           session(['zipcode'=> $zipcode]);
           session(['otp' => $otp]);
            return json_encode(array('statusCode'=>200,'msg'=>'otp sent successfully'.$otp));
        }
        
    }
    public function submitOtp(){
        $otp = trim(request('otp'));
        if($otp==''){
            return json_encode(array('statusCode'=>400,'msg'=>"otp not valid"));
        }
        else{
            
            if($otp == session('otp')){
            $first_name = session('first_name');
            $last_name = session('last_name');
            $phone = session('mobile');
            $email = session('email');
            $pincode = session('zipcode');

            $dataInsert =array('first_name' => $first_name,'last_name' => $last_name,'email' => $email ,'phone'=>$phone,"zipcode"=>$pincode,"is_verified" => 1 );
            DB::table('customers')->insert($dataInsert);
            
            session()->flush();
            return json_code(array('statusCode'=>200,'msg'=>'sucess'));

            }
            else{
                return json_encode(array('statusCode'=>400,'msg'=>"otp not valid"));
            }
        }
    }
}
