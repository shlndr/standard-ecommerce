<?php

namespace Payubiz\Payment;

use Webkul\Payment\Payment\Payment;

class Payubiz extends Payment
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $code  = 'payubiz';

    public function getRedirectUrl()
    {
        
    }
}