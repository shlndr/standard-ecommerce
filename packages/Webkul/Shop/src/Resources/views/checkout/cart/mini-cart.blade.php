<?php $cart = cart()->getCart(); ?>

@if ($cart)
    <?php $items = $cart->items; ?>

    <div class="dropdown-toggle">
        <a class="cart-link" href="{{ route('shop.checkout.cart.index') }}">
            <!-- <span class="icon cart-icon"></span> -->
            <img src="{{ asset('/themes/velocity/assets/images/cart.svg') }}" alt="Cart">
        </a>
        @if($cart->items->count() == 0)
        <span class="count" style="top:20px;right:0px;left:10px"> ({{ $cart->items->count() }})</span>
        @else
        <span class="count" style="top:20px;right:0px;left:10px"> ({{ $cart->items->count() }})</span>
        @endif
        <i class="icon arrow-down-icon"></i>
    </div>

    <!--
    <div class="dropdown-list" style="display: none; top: 52px; right: 0px;">
        <div class="dropdown-container">
            <div class="dropdown-cart">
                <div class="dropdown-header">
                    <p class="heading">
                        {{ __('shop::app.checkout.cart.cart-subtotal') }} -

                        {!! view_render_event('bagisto.shop.checkout.cart-mini.subtotal.before', ['cart' => $cart]) !!}

                        <b>{{ core()->currency($cart->base_sub_total) }}</b>

                        {!! view_render_event('bagisto.shop.checkout.cart-mini.subtotal.after', ['cart' => $cart]) !!}
                    </p>
                </div>

                <div class="dropdown-content">
                    @foreach ($items as $item)

                        <div class="item">
                            <div class="item-image" >
                                @php
                                    $images = $item->product->getTypeInstance()->getBaseImage($item);
                                @endphp
                                <img src="{{ $images['small_image_url'] }}"  alt=""/>
                            </div>

                            <div class="item-details">
                                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.name.before', ['item' => $item]) !!}

                                <div class="item-name">{{ $item->name }}</div>

                                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.name.after', ['item' => $item]) !!}


                                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.options.before', ['item' => $item]) !!}

                                @if (isset($item->additional['attributes']))
                                    <div class="item-options">

                                        @foreach ($item->additional['attributes'] as $attribute)
                                            <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                        @endforeach

                                    </div>
                                @endif

                                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.options.after', ['item' => $item]) !!}


                                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.price.before', ['item' => $item]) !!}

                                <div class="item-price"><b>{{ core()->currency($item->base_total) }}</b></div>

                                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.price.after', ['item' => $item]) !!}


                                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.quantity.before', ['item' => $item]) !!}

                                <div class="item-qty">Quantity - {{ $item->quantity }}</div>

                                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.quantity.after', ['item' => $item]) !!}
                            </div>
                        </div>

                    @endforeach
                </div>

                <div class="dropdown-footer">
                    <a href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.minicart.view-cart') }}</a>

                    @php
                        $minimumOrderAmount = (float) core()->getConfigData('sales.orderSettings.minimum-order.minimum_order_amount') ?? 0;
                    @endphp

                    <proceed-to-checkout
                        href="{{ route('shop.checkout.onepage.index') }}"
                        add-class="btn btn-primary btn-lg"
                        text="{{ __('shop::app.minicart.checkout') }}"
                        is-minimum-order-completed="{{ $cart->checkMinimumOrder() }}"
                        minimum-order-message="{{ __('shop::app.checkout.cart.minimum-order-message', ['amount' => core()->currency($minimumOrderAmount)]) }}"
                        style="color: white;">
                    </proceed-to-checkout>
                </div>
            </div>
        </div>
    </div> -->

@else

    <div class="dropdown-toggle" style="pointer-events: none;">
        <div style="display: inline-block; cursor: pointer;">
            <!-- <span class="icon cart-icon"></span> -->
            <img src="{{ asset('/themes/velocity/assets/images/cart.svg') }}" alt="Cart">
            <!-- <span class="name">{{ __('shop::app.minicart.cart') }}</span> -->
            <span class="count" style="top:20px;right:-10px;"> ({{ __('shop::app.minicart.zero') }}) </span>
        </div>
    </div>
@endif