<p class="price-head">Price Details <span>({{ intval($cart->items_qty) }} Item)</span>
</p>
<ul>
    <li>Total MRP</li>
    <li>{{ core()->currency($cart->base_sub_total) }}</li>
</ul>
<ul>
    @if ($cart->selected_shipping_rate)
        <li>{{ __('shop::app.checkout.total.delivery-charges') }}</li>
        <li>{{ core()->currency($cart->selected_shipping_rate->base_price) }}</li>        
    @endif
    
</ul>
<ul>
    @if ($cart->base_tax_total)
        @foreach (Webkul\Tax\Helpers\Tax::getTaxRatesWithAmount($cart, true) as $taxRate => $baseTaxAmount )
        
        <li id="taxrate-{{ core()->taxRateAsIdentifier($taxRate) }}">{{ __('shop::app.checkout.total.tax') }} {{ $taxRate }} %</li>
        <li id="basetaxamount-{{ core()->taxRateAsIdentifier($taxRate) }}">{{ core()->currency($baseTaxAmount) }}</li>
        
        @endforeach
    @endif
</ul>
<ul>
    <li>{{ __('shop::app.checkout.total.disc-amount') }}</li>
    <li>-{{ core()->currency($cart->base_discount_amount) }}</li>
</ul>
<!-- <ul>
    <li>Coupon discount</li>
    <li>
        <button type="button" class="coupon0">Apply Coupon</button>
    </li>
</ul> -->
<!-- <ul>
    <li>Delivery Charge</li>
    <li><del>Rs. 99</del>
        <button type="button" class="free">Free</button>
    </li>
</ul> -->
<div class="devider"></div>
<ul>
    <li>
        <p class="total">{{ __('shop::app.checkout.total.grand-total') }}</p>
    </li>
    <li>
        <p class="total">{{ core()->currency($cart->base_grand_total) }}</p>
    </li>
</ul>


<!-- <div class="order-summary">
    <h3>{{ __('shop::app.checkout.total.order-summary') }}</h3>

    <div class="item-detail">
        <label>
            {{ intval($cart->items_qty) }}
            {{ __('shop::app.checkout.total.sub-total') }}
            {{ __('shop::app.checkout.total.price') }}
        </label>
        <label class="right">{{ core()->currency($cart->base_sub_total) }}</label>
    </div>

    @if ($cart->selected_shipping_rate)
        <div class="item-detail">
            <label>{{ __('shop::app.checkout.total.delivery-charges') }}</label>
            <label class="right">{{ core()->currency($cart->selected_shipping_rate->base_price) }}</label>
        </div>
    @endif

    @if ($cart->base_tax_total)
        @foreach (Webkul\Tax\Helpers\Tax::getTaxRatesWithAmount($cart, true) as $taxRate => $baseTaxAmount )
        <div class="item-detail">
            <label id="taxrate-{{ core()->taxRateAsIdentifier($taxRate) }}">{{ __('shop::app.checkout.total.tax') }} {{ $taxRate }} %</label>
            <label class="right" id="basetaxamount-{{ core()->taxRateAsIdentifier($taxRate) }}">{{ core()->currency($baseTaxAmount) }}</label>
        </div>
        @endforeach
    @endif

    <div class="item-detail" id="discount-detail" @if ($cart->base_discount_amount && $cart->base_discount_amount > 0) style="display: block;" @else style="display: none;" @endif>
        <label>
            {{ __('shop::app.checkout.total.disc-amount') }}
        </label>
        <label class="right">
            -{{ core()->currency($cart->base_discount_amount) }}
        </label>
    </div>


    <div class="payable-amount" id="grand-total-detail">
        <label>{{ __('shop::app.checkout.total.grand-total') }}</label>
        <label class="right" id="grand-total-amount-detail">
            {{ core()->currency($cart->base_grand_total) }}
        </label>
    </div>
</div> -->