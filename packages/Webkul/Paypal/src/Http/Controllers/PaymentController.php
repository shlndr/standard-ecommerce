<?php

namespace Webkul\Shop\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Webkul\Shop\Http\Controllers\Controller;

class PaymentController extends Controller
{
	public function redirect()
    {
    	$key="NpIWtY";
		$salt="1PdvQBLL";

		$action = 'https://test.payu.in/_payment';

		function getCallbackUrl()
		{
			$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
			$uri = str_replace('/index.php','/',$_SERVER['REQUEST_URI']);
			return $protocol . $_SERVER['HTTP_HOST'] . $uri . 'response.php';
		}

		$html='';
		$txnid = 'TP-'.substr(str_shuffle("0123456789"), 0, 5).''.time();
		$amount = str_replace('₹', '', $_POST['amount']);
		$amount = str_replace(',', '', $amount);
		
			
			//generate hash with mandatory parameters and udf5
			$hash=hash('sha512', $key.'|'.$txnid.'|'.$amount.'|'.$_POST['productinfo'].'|'.$_POST['firstname'].'|'.$_POST['email'].'|||||PayUBiz||||||'.$salt);
				
			$_SESSION['salt'] = $salt; //save salt in session to use during Hash validation in response
			
			$html = '<form action="'.$action.'" id="payment_form_submit" method="post">
					<input type="hidden" id="udf5" name="udf5" value="PayUBiz" />
					<input type="hidden" id="surl" name="surl" value="https://demo.onlinereviews.org.uk/paymentresponse.php" />
					<input type="hidden" id="furl" name="furl" value="https://demo.onlinereviews.org.uk/paymentresponse.php" />
					<input type="hidden" id="curl" name="curl" value="https://demo.onlinereviews.org.uk/paymentresponse.php" />
					<input type="hidden" id="key" name="key" value="'.$key.'" />
					<input type="hidden" id="txnid" name="txnid" value="'.$txnid.'" />
					<input type="hidden" id="amount" name="amount" value="'.$amount.'" />
					<input type="hidden" id="productinfo" name="productinfo" value="'.$_POST['productinfo'].'" />
					<input type="hidden" id="firstname" name="firstname" value="'.$_POST['firstname'].'" />
					<input type="hidden" id="Lastname" name="Lastname" value="'.$_POST['Lastname'].'" />
					<input type="hidden" id="Zipcode" name="Zipcode" value="'.$_POST['Zipcode'].'" />
					<input type="hidden" id="email" name="email" value="'.$_POST['email'].'" />
					<input type="hidden" id="phone" name="phone" value="'.$_POST['phone'].'" />
					<input type="hidden" id="address1" name="address1" value="'.$_POST['address1'].'" />
					<input type="hidden" id="address2" name="address2" value="'.(isset($_POST['address2'])? $_POST['address2'] : '').'" />
					<input type="hidden" id="city" name="city" value="'.$_POST['city'].'" />
					<input type="hidden" id="state" name="state" value="'.$_POST['state'].'" />
					<input type="hidden" id="country" name="country" value="'.$_POST['country'].'" />
					<input type="hidden" id="Pg" name="Pg" value="CC" />
					<input type="hidden" id="hash" name="hash" value="'.$hash.'" />

					<input type="submit" id="btnsubmitfrm" name="btnsubmitfrm" value="Submit" />
					</form>
					<script>
					
						$("form#payment_form_submit").submit();
					
					
					</script>';
			
		echo $html;

	
    }

    public function paymentresponse(Request $request)
    {
    	echo"<pre>";print_r($request);die;
    }

}