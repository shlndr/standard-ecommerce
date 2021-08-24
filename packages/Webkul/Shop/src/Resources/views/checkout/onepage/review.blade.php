@inject ('productViewHelper', 'Webkul\Product\Helpers\View')


<section class="products-payment cart">
            <div class="container">
                
                <h2 class="order-title">ORDER SUMMARY</h2>
                <meta name="csrf-token" content="{{ csrf_token() }}">
        @if ($cart->haveStockableItems() && $shippingAddress = $cart->shipping_address)
        @if($billingAddress = $cart->billing_address)
                <div class="left-sect">
                    <div class="deliver-sect">
                        <div class="del-lt">
                            <div class="top-n">
                                <p class="pay-title">
                                    <img src="images/deliver-icon.png" alt="">Deliver to:</p>
                            </div>
                            <div class="top-t">

                                
                                <p class="pay-title2">{{ $shippingAddress->first_name }} {{ $shippingAddress->last_name }} &nbsp;&nbsp; {{ $shippingAddress->postcode }}</p>
                                <p class="address">{{ $shippingAddress->address1 }},{{ core()->country_name($shippingAddress->country) }} {{ $shippingAddress->state }}</p>
                            </div>
                        </div>
                        <!-- <div class="del-rt">
                            <input type="submit" name="payment-login" value="change address" class="btn-pink btn-pay">
                        </div> -->
                        <div class="clearfix"></div>
                    </div>

         @php
        $productNameArr = [];
        @endphp
        @foreach ($cart->items as $item)
            @php
                $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
            @endphp
                    
                    <div class="del-now review-row">
                        <div class="rt-now">
                            <div class="review-lt">
                            <img src="{{ $productBaseImage['medium_image_url'] }}" alt="">
                        </div>
                        
                        <div class="review-rt">
                            <div class="price-row">
                                <div class="fus-text">
                                    <div class="lt-now-mb">
                                        <img src="{{ $productBaseImage['medium_image_url'] }}" alt="">
                                    </div>
                                    @php
                                        $productNameArr[]= $item->product->name; 
                                    @endphp
                                    <p class="fus-title">{{ $item->product->name }}</p>
                                    <!-- <p class="fus-title2">Forest Brown</p> -->
                                    <!-- <p class="fus-title3">RAL 8017 + 2455 HG</p> -->
                                </div>
                                <div class="price-sect">
                                    <p class="price-title">{{ core()->currency($item->base_price) }}</p>
                                    <p class="price-title2">Quantity <span>{{ $item->quantity }}</span></p>
                                </div>
                            </div>
                            
                            @if (isset($item->additional['attributes']))                            
                            <div class="model-text">
                            <?php 
                                $customAttributeValues = $productViewHelper->getAdditionalData($item->product);
                            ?>
                                   <ul>
                                        @foreach ($item->additional['attributes'] as $attribute)
                                            <li><strong>{{ $attribute['attribute_name'] }}:</strong> <span>{{ $attribute['option_label'] }}</span> </li>                                       
                                        @endforeach

                                        @foreach ($customAttributeValues as $attribute)
                                            @if ($attribute['type'] == 'multiselect')
                                                <?php 
                                                // echo"<pre>";print_r($attribute);die;
                                                $arr = explode(',', $attribute['value']);
                                                $valId = explode(',', $attribute['value_id']);
                                                
                                                
                                                foreach ($item->additional['super_attribute'] as $key => $superattribute)
                                                {                                        
                                                    if($key == $attribute['id'] )
                                                    {
                                                ?> 
                                                <?php foreach ($arr as $key => $value) {
                                                   if($valId[$key] == $superattribute){
                                                    ?>    
                                                    <li><strong><?php echo $attribute['code'];?>:</strong> <span><?php echo $value;?></span> </li>
                                                    
                                                    <?php
                                                     }} ?>
                                                <?php }} ?>
                                            @endif
                                        @endforeach
                                                                        
                                    </ul>
                            </div>
                            @endif
                            <!-- <div class="sele-row0">
                                <div class="new-rt0">
                                    <p class="delivery-btn">Delivery by:&nbsp;&nbsp; <strong>20th January , 2020</strong>
                                    </p>
                                </div>
                            </div> -->
                            </div>
                            
                        </div>
                    </div>

        @endforeach
        @php
        $proname = implode(',', $productNameArr);
        @endphp
         
          <input type="hidden" name="first_name" id="first_name" value="<?php echo $billingAddress->first_name;?>">
        <input type="hidden" name="last_name" id="last_name" value="<?php echo $billingAddress->last_name;?>">
        <input type="hidden" name="phone" id="phone" value="<?php echo $billingAddress->phone;?>">
        <input type="hidden" name="email" id="email" value="<?php echo $billingAddress->email;?>">
        <input type="hidden" name="product_name" id="product_name" value="<?php echo $proname;?>">
        <input type="hidden" name="city" id="city" value="<?php echo $shippingAddress->city;?>">
        <input type="hidden" name="state" id="state" value="<?php echo $shippingAddress->state;?>">
        <input type="hidden" name="country" id="country" value="<?php echo $shippingAddress->country;?>">
        <input type="hidden" name="address1" id="address1" value="<?php echo $shippingAddress->address1;?>">
        <input type="hidden" name="address2" id="address2" value="<?php echo $shippingAddress->address2;?>">
        <input type="hidden" name="postcode" id="postcode" value="<?php echo $shippingAddress->postcode;?>">                    

    </div>

    @endif
    @endif


                <div class="right-sect review-sect">
                    <div class="right-sect2">
                        <div class="coupons-sect">
                            <p class="pay-title">
                                <img src="images/card-img.jpg" alt=""><strong>Payment Method</strong></p>
                            <div class="inputgroup3">
                                Payubiz
                               <!--  <div class="visa"><img src="images/visa-img.png" alt=""></div>
                                <input type="text" name="" value="" placeholder="**** **** **** 1254" class="code-input2">
                                <button type="button" value="Apply" class="apply">Change</button> -->
                            </div>
                        </div>
                        <div class="price-details">
                            <slot name="summary-section"></slot>                            
                        </div>
                        
                        <div class="price-details0">
                           <ul>
                                <li>
                                    <p class="total">Total Amount<br> <span>Inclusive Of All Taxes</span></p>
                                    
                                </li>
                                <li>
                                    <p class="total">{{ core()->currency($cart->base_grand_total) }}</p>
                                </li>
                            </ul>
                            <a href="#" id="checkout-place-order-button" onclick="frmsubmit()" class="contbtn">Place Order</a>
                        </div>
                        
                    </div>

                </div>
                <div class="clearfix"></div>
                
            </div>
        </section>




<!-- 

<button type="button" class="btn btn-lg btn-primary" @click="placeOrder()" :disabled="disable_button" id="checkout-place-order-button" v-if="selected_payment_method.method != 'paypal_standard'">
                            {{ __('shop::app.checkout.onepage.place-order') }}
                            </button>

                            <button type="button" class="btn btn-lg btn-primary" @click="frmsubmit()" :disabled="disable_button" id="checkout-place-order-button" v-if="selected_payment_method.method == 'paypal_standard'">
                                {{ __('shop::app.checkout.onepage.place-order') }}
                            </button>
    <div class="form-container"> -->
    <!-- <div class="form-header mb-30">
        <span class="checkout-step-heading">{{ __('shop::app.checkout.onepage.summary') }}</span>
    </div> -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <!-- <div class="address-summary">
        @if ($billingAddress = $cart->billing_address)
            <div class="billing-address">
                <div class="card-title mb-20">
                    <b>{{ __('shop::app.checkout.onepage.billing-address') }}</b>
                </div>

                <div class="card-content">
                    <ul>
                        <li class="mb-10">
                            {{ $billingAddress->company_name ?? '' }}
                        </li>
                        <li class="mb-10">
                            <b>{{ $billingAddress->first_name }} {{ $billingAddress->last_name }}</b>
                        </li>
                        <li class="mb-10">
                            {{ $billingAddress->address1 }},<br/> {{ $billingAddress->state }}
                        </li>
                        <li class="mb-10">
                            {{ core()->country_name($billingAddress->country) }} {{ $billingAddress->postcode }}
                        </li>

                        <span class="horizontal-rule mb-15 mt-15"></span>

                        <li class="mb-10">
                            {{ __('shop::app.checkout.onepage.contact') }} : {{ $billingAddress->phone }}
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        @if ($cart->haveStockableItems() && $shippingAddress = $cart->shipping_address)
            <div class="shipping-address">
                <div class="card-title mb-20">
                    <b>{{ __('shop::app.checkout.onepage.shipping-address') }}</b>
                </div>

                <div class="card-content">
                    <ul>
                        <li class="mb-10">
                            {{ $shippingAddress->company_name ?? '' }}
                        </li>
                        <li class="mb-10">
                            <b>{{ $shippingAddress->first_name }} {{ $shippingAddress->last_name }}</b>
                        </li>
                        <li class="mb-10">
                            {{ $shippingAddress->address1 }},<br/> {{ $shippingAddress->state }}
                        </li>
                        <li class="mb-10">
                            {{ core()->country_name($shippingAddress->country) }} {{ $shippingAddress->postcode }}
                        </li>

                        <span class="horizontal-rule mb-15 mt-15"></span>

                        <li class="mb-10">
                            {{ __('shop::app.checkout.onepage.contact') }} : {{ $shippingAddress->phone }}
                        </li>
                    </ul>
                </div>
            </div>
        @endif

    </div> -->

    <!-- <div class="cart-item-list mt-20">
        @php
        $productNameArr = [];
        @endphp
        @foreach ($cart->items as $item)
            @php
                $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
            @endphp

            <div class="item mb-5" style="margin-bottom: 5px;">
                <div class="item-image">
                    <img src="{{ $productBaseImage['medium_image_url'] }}"  alt=""/>
                </div>

                <div class="item-details">

                    {!! view_render_event('bagisto.shop.checkout.name.before', ['item' => $item]) !!}

                    <div class="item-title">
                        {{ $item->product->name }}
                        @php
                        $productNameArr[]= $item->product->name; 
                        @endphp
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.name.after', ['item' => $item]) !!}
                    {!! view_render_event('bagisto.shop.checkout.price.before', ['item' => $item]) !!}

                    <div class="row">
                        <span class="title">
                            {{ __('shop::app.checkout.onepage.price') }}
                        </span>
                        <span class="value">
                            {{ core()->currency($item->base_price) }}
                        </span>
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.price.after', ['item' => $item]) !!}
                    {!! view_render_event('bagisto.shop.checkout.quantity.before', ['item' => $item]) !!}

                    <div class="row">
                        <span class="title">
                            {{ __('shop::app.checkout.onepage.quantity') }}
                        </span>
                        <span class="value">
                            {{ $item->quantity }}
                        </span>
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.quantity.after', ['item' => $item]) !!}

                    {!! view_render_event('bagisto.shop.checkout.options.before', ['item' => $item]) !!}

                    <?php 
                        $customAttributeValues = $productViewHelper->getAdditionalData($item->product);
                    ?>

                    @if (isset($item->additional['attributes']))
                        <div class="item-options">

                            @foreach ($item->additional['attributes'] as $attribute)
                                <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                            @endforeach

                            

                        </div>
                    @endif

                    {!! view_render_event('bagisto.shop.checkout.options.after', ['item' => $item]) !!}
                </div>
            </div>
        @endforeach
        @php
        $proname = implode(',', $productNameArr);
        @endphp
         
          
    </div> -->

    <!-- <div class="order-description mt-20">
        <div class="pull-left" style="width: 60%; float: left;">
            @if (!$cart->haveStockableItems())
                <div class="shipping">
                    <div class="decorator">
                        <i class="icon shipping-icon"></i>
                    </div>

                    <div class="text">
                        {{ core()->currency($cart->selected_shipping_rate->base_price) }}

                        <div class="info">
                            {{ $cart->selected_shipping_rate->method_title }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="payment">
                <div class="decorator">
                    <i class="icon payment-icon"></i>
                </div>

                <div class="text">
                    @if( core()->getConfigData('sales.paymentmethods.' . $cart->payment->method . '.title') != 'PayPal Standard')
                    {{ core()->getConfigData('sales.paymentmethods.' . $cart->payment->method . '.title') }}
                    @else
                    Payubiz
                    @endif
                </div>
            </div>

        </div>

        
    </div> -->
<!-- </div> -->

<!-- <div class="pull-right" style="width: 40%; float: left;">
            <slot name="summary-section"></slot>
        </div> -->