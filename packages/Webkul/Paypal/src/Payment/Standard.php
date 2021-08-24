<?php

namespace Webkul\Paypal\Payment;

class Standard extends Paypal
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $code  = 'paypal_standard';

    /**
     * Line items fields mapping
     *
     * @var array
     */
    protected $itemFieldsFormat = [
        'id'       => 'item_number_%d',
        'name'     => 'item_name_%d',
        'quantity' => 'quantity_%d',
        'price'    => 'amount_%d',
    ];

    /**
     * Return paypal redirect url
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return route('paypal.standard.redirect');
        
    }

    /**
     * Return form field array
     *
     * @return array
     */
    public function getFormFields()
    {
        $cart = $this->getCart();
        $billingAddress = $cart->billing_address;
        // $key="NpIWtY";
        // $salt="1PdvQBLL";

        // $txnid = 'TP-'.substr(str_shuffle("0123456789"), 0, 5).''.time();
        // $amount = str_replace('₹', '', $cart->sub_total);
        // $amount = str_replace(',', '', $amount);

        // $hash=hash('sha512', $key.'|'.$txnid.'|'.$amount.'|'.core()->getCurrentChannel()->name.'|'.$billingAddress->first_name.'|'.$billingAddress->email.'|||||PayUBiz||||||'.$salt);


        $key="NpIWtY";
        $salt="1PdvQBLL";

        $action = 'https://test.payu.in/_payment';

        
        $txnid = 'TP-'.substr(str_shuffle("0123456789"), 0, 5).''.time();
        $amount = str_replace('₹', '', $cart->sub_total);
        $amount = str_replace(',', '', $amount);
        
            
            //generate hash with mandatory parameters and udf5
            $hash=hash('sha512', $key.'|'.$txnid.'|'.$amount.'|'.core()->getCurrentChannel()->name.'|'.$billingAddress->first_name.'|'.$billingAddress->email.'|||||PayUBiz||||||'.$salt);
                
            $_SESSION['salt'] = $salt; //save salt in session to use during Hash validation in response


        
            
        

        $fields = [
            'productinfo'       => core()->getCurrentChannel()->name,
            'amount'            => $cart->sub_total,
            'udf5'              => 'PayuBiz',
            'surl'              => route('paypal.standard.success'),
            'furl'              => route('paypal.standard.cancel'),
            'curl'              => route('paypal.standard.cancel'),
            'city'             => $billingAddress->city,
            'country'          => $billingAddress->country,
            'email'            => $billingAddress->email,
            'firstname'       => $billingAddress->first_name,
            'Lastname'        => $billingAddress->last_name,
            'phone'        => $billingAddress->phone,
            'Zipcode'              => $billingAddress->postcode,
            'state'            => $billingAddress->state,
            'address1'         => $billingAddress->address1,
            'address2'         => $billingAddress->address2,
            'key'         => $key,
            'txnid'         => $txnid,
            'hash'         => $hash,
        ];

        // if ($this->getIsLineItemsEnabled()) {
        //     $fields = array_merge($fields, array(
        //         'cmd'    => '_cart',
        //         'upload' => 1,
        //     ));

        //     $this->addLineItemsFields($fields);

        //     if ($cart->selected_shipping_rate)
        //         $this->addShippingAsLineItems($fields, $cart->items()->count() + 1);

        //     if (isset($fields['tax'])) {
        //         $fields['tax_cart'] = $fields['tax'];
        //     }

        //     if (isset($fields['discount_amount'])) {
        //         $fields['discount_amount_cart'] = $fields['discount_amount'];
        //     }
        // } else {
        //     $fields = array_merge($fields, array(
        //         'cmd'           => '_ext-enter',
        //         'redirect_cmd'  => '_xclick',
        //     ));
        // }

        //$this->addAddressFields($fields);

        return $fields;
    }

    /**
     * Add shipping as item
     *
     * @param  array  $fields
     * @param  int    $i
     * @return void
     */
    protected function addShippingAsLineItems(&$fields, $i)
    {
        $cart = $this->getCart();

        $fields[sprintf('item_number_%d', $i)] = $cart->selected_shipping_rate->carrier_title;
        $fields[sprintf('item_name_%d', $i)] = 'Shipping';
        $fields[sprintf('quantity_%d', $i)] = 1;
        $fields[sprintf('amount_%d', $i)] = $cart->selected_shipping_rate->price;
    }
}