@extends('shop::layouts.master')

@section('page_title')
{{ __('shop::app.customer.account.order.view.page-tile', ['order_id' => $order->increment_id]) }}
@endsection

@section('content-wrapper')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')
<section class="profile">
    <div class="container">
        <h2>Account</h2>
        <div class="details">
            <div class="user">
                <!-- <img src="images/user-profile.png" alt="User Profile"> -->
                <span>{{ auth()->guard('customer')->user()->name }}</span>
            </div>
            <a href="{{ route('customer.profile.edit') }}" class="grey-border">Edit Profile <img src="{{ asset('/themes/velocity/assets/images/edit.svg') }}" alt="Edit"></a>
            <div class="clear"></div>
        </div>
    </div>
</section>
<!-- <div class="account-content"> -->
<section class="dashboard-tabs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 nopadding">
                <div class="col-md-4 col-sm-12">
                    @include('shop::customers.account.partials.sidemenu')
                    <a href="{{ route('customer.session.destroy') }}" class="blue-btn deskOn">Logout</a>
                </div>


                <div class="col-md-8 col-sm-12">
                    <div class="orders">
                        <div class="select-orders">
                            <p>Showing <span class="order-listing">All Orders</span></p>
                            <select id="filters">
                                <option value="all-orders">All Orders</option>
                                <option value="Pending">Pending</option>
                                <option value="Canceled">Canceled</option>
                                <option value="Delivered">Delivered</option>
                            </select>
                            <div class="clear"></div>
                        </div>

                        @foreach ($order->items as $item)

                            <div class="all-orders">
                            <div class="delivery-dtl">
                                <p><img src="images/deliver-icon.png" alt=""></p>
                                <p class="orange">Pending</p><!-- changes -->
                                <p><span>Arriving On:</span> 12th April 2021</p>
                                <p class="tracker">Track Order</p><!-- changes -->
                            </div>
                            <div class="product-dtl">
                                <div class="product-img">
                                    <img src="images/dashboard/product.png" alt="">
                                </div>
                                <div class="product-txt">
                                        <div class="fus-text">
                                            <p class="fus-title">{{ $item->name }}</p>
                                            <p class="fus-title2">Forest Brown</p>
                                            <p class="fus-title3">RAL 8017 + 2455 HG</p>
                                        </div>
                                        <div class="product-festures">
                                            <ul>
                                                @foreach ($item->additional['attributes'] as $attribute)
                                                    <li>{{ $attribute['attribute_name'] }} : <b>{{ $attribute['option_label'] }}</b></li>
                                                @endforeach
                                                
                                                <li><b>ABC Model</b></li>
                                                <li><b>Style</b></li>
                                                <li><b>Color</b></li>
                                            </ul>
                                            <ul>
                                                <li>Accessory 1</li>
                                                <li>Accessory 2</li>
                                                <li>Accessory 3</li>
                                                <li>Accessory 4</li>
                                            </ul>
                                        </div>
                                        <!-- changes -->
                                        <div class="payment">
                                            <p>
                                                Rs. 4,999
                                                <span class="green"><img src="images/paid-tick.png" alt=""> Paid</span>
                                            </p>
                                            <p>
                                                <a href="#">Rs. 9,999</a>
                                                <span>Pay Balance</span>
                                            </p>
                                        </div>
                                        <!-- end changes -->
                                    </div>
                                <div class="clearfix"></div>
                                <div class="btns">
                                    <a href="#" class="blue-btn">Download Invoice</a>
                                    <a href="#" class="border-btn">Cancel Order</a><!-- changes -->
                                </div>
                                <div class="start-rating-module">
                                    <p>Rate Product</p>
                                    <div class="star">
                                        <input type="number" name="your_awesome_parameter" id="rating1" class="rating" />
                                    </div>
                                </div>
                            </div>
                            <!-- Tracker dropdown changes -->
                            <div class="tracking-dtl">
                                <div class="topSec">
                                    <p class="ord-no">Purchase Date : <span>12/12/2020</span></p>
                                    <p class="ord-no">Order No : <span>123456789</span></p>
                                    <p class="ord-no">Shipping No : <span>123456789</span></p>  
                                </div>
                                <div class="order-dtl">
                                    <div class="lftSec">
                                        <ul>
                                            <li class="active">Order Placed <span>On Mon, 26th April 2021</span></li>
                                            <li class="orange">Manufacturing <span>By Sat, 1st March 2021</span></li>
                                            <li class="blue">Shipped <span>By Wed, 28th April 2021</span></li>
                                            <li class="green">Arriving <span>By Tue, 26th April 2021</span></li>
                                        </ul>
                                    </div>
                                    <div class="rgtSec">
                                        <p class="price">Payment Mode <span>Prepaid</span></p>
                                        <p class="name">Nitin Chaudhary</p>
                                        <p class="address">405, Ace Park, Sector 34, Plot No. 25, Palm Beach Road, Airoli Navi Mumbai - 400705</p>
                                    </div>
                                </div>
                            </div> 
                            <!-- END -->
                        </div>

                        @endforeach

                        <div class="all-orders">
                            <div class="delivery-dtl">
                                <p><img src="images/deliver-icon.png" alt=""></p>
                                <p class="orange">Pending</p><!-- changes -->
                                <p><span>Arriving On:</span> 12th April 2021</p>
                                <p class="tracker">Track Order</p><!-- changes -->
                            </div>
                            <div class="product-dtl">
                                <div class="product-img">
                                    <img src="images/dashboard/product.png" alt="">
                                </div>
                                <div class="product-txt">
                                        <div class="fus-text">
                                            <p class="fus-title">Fusion Door</p>
                                            <p class="fus-title2">Forest Brown</p>
                                            <p class="fus-title3">RAL 8017 + 2455 HG</p>
                                        </div>
                                        <div class="product-festures">
                                            <ul>
                                                <li>Size : <b>1200 x 300</b></li>
                                                <li><b>ABC Model</b></li>
                                                <li><b>Style</b></li>
                                                <li><b>Color</b></li>
                                            </ul>
                                            <ul>
                                                <li>Accessory 1</li>
                                                <li>Accessory 2</li>
                                                <li>Accessory 3</li>
                                                <li>Accessory 4</li>
                                            </ul>
                                        </div>
                                        <!-- changes -->
                                        <div class="payment">
                                            <p>
                                                Rs. 4,999
                                                <span class="green"><img src="images/paid-tick.png" alt=""> Paid</span>
                                            </p>
                                            <p>
                                                <a href="#">Rs. 9,999</a>
                                                <span>Pay Balance</span>
                                            </p>
                                        </div>
                                        <!-- end changes -->
                                    </div>
                                <div class="clearfix"></div>
                                <div class="btns">
                                    <a href="#" class="blue-btn">Download Invoice</a>
                                    <a href="#" class="border-btn">Cancel Order</a><!-- changes -->
                                </div>
                                <div class="start-rating-module">
                                    <p>Rate Product</p>
                                    <div class="star">
                                        <input type="number" name="your_awesome_parameter" id="rating1" class="rating" />
                                    </div>
                                </div>
                            </div>
                            <!-- Tracker dropdown changes -->
                            <div class="tracking-dtl">
                                <div class="topSec">
                                    <p class="ord-no">Purchase Date : <span>12/12/2020</span></p>
                                    <p class="ord-no">Order No : <span>123456789</span></p>
                                    <p class="ord-no">Shipping No : <span>123456789</span></p>  
                                </div>
                                <div class="order-dtl">
                                    <div class="lftSec">
                                        <ul>
                                            <li class="active">Order Placed <span>On Mon, 26th April 2021</span></li>
                                            <li class="orange">Manufacturing <span>By Sat, 1st March 2021</span></li>
                                            <li class="blue">Shipped <span>By Wed, 28th April 2021</span></li>
                                            <li class="green">Arriving <span>By Tue, 26th April 2021</span></li>
                                        </ul>
                                    </div>
                                    <div class="rgtSec">
                                        <p class="price">Payment Mode <span>Prepaid</span></p>
                                        <p class="name">Nitin Chaudhary</p>
                                        <p class="address">405, Ace Park, Sector 34, Plot No. 25, Palm Beach Road, Airoli Navi Mumbai - 400705</p>
                                    </div>
                                </div>
                            </div> 
                            <!-- END -->
                        </div>
                        <div class="all-orders">
                            <div class="delivery-dtl">
                                <p><img src="images/deliver-icon.png" alt=""></p>
                                <p class="green">Delivered</p>
                                <p>On 12th April 2021</p>
                            </div>
                            <div class="product-dtl">
                                <div class="product-img">
                                    <img src="images/dashboard/product.png" alt="">
                                </div>
                                <div class="product-txt">
                                        <div class="fus-text">
                                            <p class="fus-title">Fusion Door</p>
                                            <p class="fus-title2">Forest Brown</p>
                                            <p class="fus-title3">RAL 8017 + 2455 HG</p>
                                        </div>
                                        <div class="product-festures">
                                            <ul>
                                                <li>Size : <b>1200 x 300</b></li>
                                                <li><b>ABC Model</b></li>
                                                <li><b>Style</b></li>
                                                <li><b>Color</b></li>
                                            </ul>
                                            <ul>
                                                <li>Accessory 1</li>
                                                <li>Accessory 2</li>
                                                <li>Accessory 3</li>
                                                <li>Accessory 4</li>
                                            </ul>
                                        </div>
                                        <!-- changes -->
                                        <div class="payment">
                                            <p>
                                                Rs. 4,999
                                                <span class="green">Paid</span>
                                            </p>
                                        </div>
                                        <!-- end changes -->
                                    </div>
                                <div class="clearfix"></div>
                                <div class="btns">
                                    <a href="#" class="blue-btn">Download Invoice</a>
                                    <a href="#" class="border-btn">Support</a><!-- changes -->
                                </div>
                                <div class="start-rating-module">
                                    <p>Rate Product</p>
                                    <div class="star">
                                        <input type="number" name="your_awesome_parameter" id="rating1" class="rating" />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <a href="#" class="blue-btn-lrg">Show Older Orders</a>
                    </div>
                    <a href="#" class="blue-btn mobOn">Logout</a>
                </div>


                <div class="col-md-8 col-sm-12">
                    <div class="account-layout">

                        <div class="account-head">
                            <span class="back-icon"><a href="{{ route('customer.orders.index') }}"><i class="icon icon-menu-back"></i></a></span>

                            <span class="account-heading">
                                {{ __('shop::app.customer.account.order.view.page-tile', ['order_id' => $order->increment_id]) }}
                            </span>
                            <span></span>


                            @if ($order->canCancel())
                            <a href="{{ route('customer.orders.cancel', $order->id) }}" class="btn btn-lg btn-primary" v-alert:message="'{{ __('shop::app.customer.account.order.view.cancel-confirm-msg') }}'" style="float: right;">
                                {{ __('shop::app.customer.account.order.view.cancel-btn-title') }}
                            </a>
                            @endif
                        </div>

                        {!! view_render_event('bagisto.shop.customers.account.orders.view.before', ['order' => $order]) !!}

                        <div class="sale-container">

                            <tabs>
                                <tab name="{{ __('shop::app.customer.account.order.view.info') }}" :selected="true">

                                    <div class="sale-section">
                                        <div class="section-content">
                                            <div class="row">
                                                <span class="title">
                                                    {{ __('shop::app.customer.account.order.view.placed-on') }}
                                                </span>

                                                <span class="value">
                                                    {{ core()->formatDate($order->created_at, 'd M Y') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sale-section">
                                        <div class="secton-title">
                                            <span>{{ __('shop::app.customer.account.order.view.products-ordered') }}</span>
                                        </div>
                                        
                                        <div class="section-content">
                                            <div class="table">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('shop::app.customer.account.order.view.SKU') }}</th>
                                                            <th>{{ __('shop::app.customer.account.order.view.product-name') }}</th>
                                                            <th>{{ __('shop::app.customer.account.order.view.price') }}</th>
                                                            <th>{{ __('shop::app.customer.account.order.view.item-status') }}</th>
                                                            <th>{{ __('shop::app.customer.account.order.view.subtotal') }}</th>
                                                            <th>{{ __('shop::app.customer.account.order.view.tax-percent') }}</th>
                                                            <th>{{ __('shop::app.customer.account.order.view.tax-amount') }}</th>
                                                            <th>{{ __('shop::app.customer.account.order.view.grand-total') }}</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @foreach ($order->items as $item)

                                                        <tr>
                                                            <td data-value="{{ __('shop::app.customer.account.order.view.SKU') }}">
                                                                {{ $item->getTypeInstance()->getOrderedItem($item)->sku }}
                                                            </td>

                                                            <td data-value="{{ __('shop::app.customer.account.order.view.product-name') }}">
                                                                {{ $item->name }}

                                                                @if (isset($item->additional['attributes']))
                                                                <div class="item-options">

                                                                    @foreach ($item->additional['attributes'] as $attribute)
                                                                    <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                                                    @endforeach

                                                                    
                                                                    <?php
                                                                    foreach ($item->additional['super_attribute'] as $key => $superattribute)
                                                                    { 

                                                                     $customAttributeValues = $productViewHelper->getAttributes($key);

                                                                     if(!empty($customAttributeValues)){              
                                                                        foreach ($customAttributeValues as $key => $value) {
                                                                         

                                                                            if($value['id'] == $superattribute ){
                                                                                ?>    

                                                                                <b><?php echo $value['code'];?> : </b><?php echo $value['admin_name'];?></br> 

                                                                                <?php
                                                                            } } } } ?>
                                                                            

                                                                        </div>
                                                                        @endif
                                                                    </td>

                                                                    <td data-value="{{ __('shop::app.customer.account.order.view.price') }}">
                                                                        {{ core()->formatPrice($item->price, $order->order_currency_code) }}
                                                                    </td>

                                                                    <td data-value="{{ __('shop::app.customer.account.order.view.item-status') }}">
                                                                        <span class="qty-row">
                                                                            {{ __('shop::app.customer.account.order.view.item-ordered', ['qty_ordered' => $item->qty_ordered]) }}
                                                                        </span>

                                                                        <span class="qty-row">
                                                                            {{ $item->qty_invoiced ? __('shop::app.customer.account.order.view.item-invoice', ['qty_invoiced' => $item->qty_invoiced]) : '' }}
                                                                        </span>

                                                                        <span class="qty-row">
                                                                            {{ $item->qty_shipped ? __('shop::app.customer.account.order.view.item-shipped', ['qty_shipped' => $item->qty_shipped]) : '' }}
                                                                        </span>

                                                                        <span class="qty-row">
                                                                            {{ $item->qty_refunded ? __('shop::app.customer.account.order.view.item-refunded', ['qty_refunded' => $item->qty_refunded]) : '' }}
                                                                        </span>

                                                                        <span class="qty-row">
                                                                            {{ $item->qty_canceled ? __('shop::app.customer.account.order.view.item-canceled', ['qty_canceled' => $item->qty_canceled]) : '' }}
                                                                        </span>
                                                                    </td>

                                                                    <td data-value="{{ __('shop::app.customer.account.order.view.subtotal') }}">
                                                                        {{ core()->formatPrice($item->total, $order->order_currency_code) }}
                                                                    </td>

                                                                    <td data-value="{{ __('shop::app.customer.account.order.view.tax-percent') }}">
                                                                        {{ number_format($item->tax_percent, 2) }}%
                                                                    </td>

                                                                    <td data-value="{{ __('shop::app.customer.account.order.view.tax-amount') }}">
                                                                        {{ core()->formatPrice($item->tax_amount, $order->order_currency_code) }}
                                                                    </td>

                                                                    <td data-value="{{ __('shop::app.customer.account.order.view.grand-total') }}">
                                                                        {{ core()->formatPrice($item->total + $item->tax_amount - $item->discount_amount, $order->order_currency_code) }}
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>

                                                        </table>
                                                    </div>

                                                    <div class="totals">
                                                        <table class="sale-summary">
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ __('shop::app.customer.account.order.view.subtotal') }}</td>
                                                                    <td>-</td>
                                                                    <td>{{ core()->formatPrice($order->sub_total, $order->order_currency_code) }}</td>
                                                                </tr>

                                                                @if ($order->haveStockableItems())
                                                                <tr>
                                                                    <td>{{ __('shop::app.customer.account.order.view.shipping-handling') }}</td>
                                                                    <td>-</td>
                                                                    <td>{{ core()->formatPrice($order->shipping_amount, $order->order_currency_code) }}</td>
                                                                </tr>
                                                                @endif

                                                                @if ($order->base_discount_amount > 0)
                                                                <tr>
                                                                    <td>{{ __('shop::app.customer.account.order.view.discount') }}
                                                                        @if ($order->coupon_code)
                                                                        ({{ $order->coupon_code }})
                                                                        @endif
                                                                    </td>
                                                                    <td>-</td>
                                                                    <td>{{ core()->formatPrice($order->discount_amount, $order->order_currency_code) }}</td>
                                                                </tr>
                                                                @endif

                                                                <tr class="border">
                                                                    <td>{{ __('shop::app.customer.account.order.view.tax') }}</td>
                                                                    <td>-</td>
                                                                    <td>{{ core()->formatPrice($order->tax_amount, $order->order_currency_code) }}</td>
                                                                </tr>

                                                                <tr class="bold">
                                                                    <td>{{ __('shop::app.customer.account.order.view.grand-total') }}</td>
                                                                    <td>-</td>
                                                                    <td>{{ core()->formatPrice($order->grand_total, $order->order_currency_code) }}</td>
                                                                </tr>

                                                                <tr class="bold">
                                                                    <td>{{ __('shop::app.customer.account.order.view.total-paid') }}</td>
                                                                    <td>-</td>
                                                                    <td>{{ core()->formatPrice($order->grand_total_invoiced, $order->order_currency_code) }}</td>
                                                                </tr>

                                                                <tr class="bold">
                                                                    <td>{{ __('shop::app.customer.account.order.view.total-refunded') }}</td>
                                                                    <td>-</td>
                                                                    <td>{{ core()->formatPrice($order->grand_total_refunded, $order->order_currency_code) }}</td>
                                                                </tr>

                                                                <tr class="bold">
                                                                    <td>{{ __('shop::app.customer.account.order.view.total-due') }}</td>
                                                                    
                                                                    <td>-</td>

                                                                    @if($order->status !== 'canceled')
                                                                    <td>{{ core()->formatPrice($order->total_due, $order->order_currency_code) }}</td>
                                                                    @else
                                                                    <td>{{ core()->formatPrice(0.00, $order->order_currency_code) }}</td>
                                                                    @endif
                                                                </tr>
                                                                <tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tab>

                                                @if ($order->invoices->count())
                                                <tab name="{{ __('shop::app.customer.account.order.view.invoices') }}">

                                                    @foreach ($order->invoices as $invoice)

                                                    <div class="sale-section">
                                                        <div class="secton-title">
                                                            <span>{{ __('shop::app.customer.account.order.view.individual-invoice', ['invoice_id' => $invoice->id]) }}</span>

                                                            <a href="{{ route('customer.orders.print', $invoice->id) }}" class="pull-right">
                                                                {{ __('shop::app.customer.account.order.view.print') }}
                                                            </a>
                                                        </div>

                                                        <div class="section-content">
                                                            <div class="table">
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>{{ __('shop::app.customer.account.order.view.SKU') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.product-name') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.price') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.qty') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.subtotal') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.tax-amount') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.grand-total') }}</th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>

                                                                        @foreach ($invoice->items as $item)
                                                                        <tr>
                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.SKU') }}">
                                                                                {{ $item->getTypeInstance()->getOrderedItem($item)->sku }}
                                                                            </td>

                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.product-name') }}">
                                                                                {{ $item->name }}
                                                                            </td>

                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.price') }}">
                                                                                {{ core()->formatPrice($item->price, $order->order_currency_code) }}
                                                                            </td>

                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.qty') }}">
                                                                                {{ $item->qty }}
                                                                            </td>

                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.subtotal') }}">
                                                                                {{ core()->formatPrice($item->total, $order->order_currency_code) }}
                                                                            </td>

                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.tax-amount') }}">
                                                                                {{ core()->formatPrice($item->tax_amount, $order->order_currency_code) }}
                                                                            </td>

                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.grand-total') }}">
                                                                                {{ core()->formatPrice($item->total + $item->tax_amount, $order->order_currency_code) }}
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="totals">
                                                                <table class="sale-summary">
                                                                    <tr>
                                                                        <td>{{ __('shop::app.customer.account.order.view.subtotal') }}</td>
                                                                        <td>-</td>
                                                                        <td>{{ core()->formatPrice($invoice->sub_total, $order->order_currency_code) }}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>{{ __('shop::app.customer.account.order.view.shipping-handling') }}</td>
                                                                        <td>-</td>
                                                                        <td>{{ core()->formatPrice($invoice->shipping_amount, $order->order_currency_code) }}</td>
                                                                    </tr>

                                                                    @if ($order->base_discount_amount > 0)
                                                                    <tr>
                                                                        <td>{{ __('shop::app.customer.account.order.view.discount') }}</td>
                                                                        <td>-</td>
                                                                        <td>{{ core()->formatPrice($order->discount_amount, $order->order_currency_code) }}</td>
                                                                    </tr>
                                                                    @endif

                                                                    <tr>
                                                                        <td>{{ __('shop::app.customer.account.order.view.tax') }}</td>
                                                                        <td>-</td>
                                                                        <td>{{ core()->formatPrice($invoice->tax_amount, $order->order_currency_code) }}</td>
                                                                    </tr>

                                                                    <tr class="bold">
                                                                        <td>{{ __('shop::app.customer.account.order.view.grand-total') }}</td>
                                                                        <td>-</td>
                                                                        <td>{{ core()->formatPrice($invoice->grand_total, $order->order_currency_code) }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach

                                                </tab>
                                                @endif

                                                @if ($order->shipments->count())
                                                <tab name="{{ __('shop::app.customer.account.order.view.shipments') }}">

                                                    @foreach ($order->shipments as $shipment)

                                                    <div class="sale-section">
                                                        <div class="section-content">
                                                            <div class="row">
                                                                <span class="title">
                                                                    {{ __('shop::app.customer.account.order.view.tracking-number') }}
                                                                </span>

                                                                <span class="value">
                                                                    {{  $shipment->track_number }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="sale-section">
                                                        <div class="secton-title">
                                                            <span>{{ __('shop::app.customer.account.order.view.individual-shipment', ['shipment_id' => $shipment->id]) }}</span>
                                                        </div>

                                                        <div class="section-content">

                                                            <div class="table">
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>{{ __('shop::app.customer.account.order.view.SKU') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.product-name') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.qty') }}</th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>

                                                                        @foreach ($shipment->items as $item)

                                                                        <tr>
                                                                            <td data-value="{{  __('shop::app.customer.account.order.view.SKU') }}">{{ $item->sku }}</td>
                                                                            <td data-value="{{  __('shop::app.customer.account.order.view.product-name') }}">{{ $item->name }}</td>
                                                                            <td data-value="{{  __('shop::app.customer.account.order.view.qty') }}">{{ $item->qty }}</td>
                                                                        </tr>

                                                                        @endforeach

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach

                                                </tab>
                                                @endif

                                                @if ($order->refunds->count())
                                                <tab name="{{ __('shop::app.customer.account.order.view.refunds') }}">

                                                    @foreach ($order->refunds as $refund)

                                                    <div class="sale-section">
                                                        <div class="secton-title">
                                                            <span>{{ __('shop::app.customer.account.order.view.individual-refund', ['refund_id' => $refund->id]) }}</span>
                                                        </div>

                                                        <div class="section-content">
                                                            <div class="table">
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>{{ __('shop::app.customer.account.order.view.SKU') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.product-name') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.price') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.qty') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.subtotal') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.tax-amount') }}</th>
                                                                            <th>{{ __('shop::app.customer.account.order.view.grand-total') }}</th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>

                                                                        @foreach ($refund->items as $item)
                                                                        <tr>
                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.SKU') }}">{{ $item->child ? $item->child->sku : $item->sku }}</td>
                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.product-name') }}">{{ $item->name }}</td>
                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.price') }}">{{ core()->formatPrice($item->price, $order->order_currency_code) }}</td>
                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.qty') }}">{{ $item->qty }}</td>
                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.subtotal') }}">{{ core()->formatPrice($item->total, $order->order_currency_code) }}</td>
                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.tax-amount') }}">{{ core()->formatPrice($item->tax_amount, $order->order_currency_code) }}</td>
                                                                            <td data-value="{{ __('shop::app.customer.account.order.view.grand-total') }}">{{ core()->formatPrice($item->total + $item->tax_amount, $order->order_currency_code) }}</td>
                                                                        </tr>
                                                                        @endforeach

                                                                        @if (! $refund->items->count())
                                                                        <tr>
                                                                            <td class="empty" colspan="7">{{ __('shop::app.common.no-result-found') }}</td>
                                                                            <tr>
                                                                                @endif
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                    <div class="totals">
                                                                        <table class="sale-summary">
                                                                            <tr>
                                                                                <td>{{ __('shop::app.customer.account.order.view.subtotal') }}</td>
                                                                                <td>-</td>
                                                                                <td>{{ core()->formatPrice($refund->sub_total, $order->order_currency_code) }}</td>
                                                                            </tr>

                                                                            @if ($refund->shipping_amount > 0)
                                                                            <tr>
                                                                                <td>{{ __('shop::app.customer.account.order.view.shipping-handling') }}</td>
                                                                                <td>-</td>
                                                                                <td>{{ core()->formatPrice($refund->shipping_amount, $order->order_currency_code) }}</td>
                                                                            </tr>
                                                                            @endif

                                                                            @if ($refund->discount_amount > 0)
                                                                            <tr>
                                                                                <td>{{ __('shop::app.customer.account.order.view.discount') }}</td>
                                                                                <td>-</td>
                                                                                <td>{{ core()->formatPrice($order->discount_amount, $order->order_currency_code) }}</td>
                                                                            </tr>
                                                                            @endif

                                                                            @if ($refund->tax_amount > 0)
                                                                            <tr>
                                                                                <td>{{ __('shop::app.customer.account.order.view.tax') }}</td>
                                                                                <td>-</td>
                                                                                <td>{{ core()->formatPrice($refund->tax_amount, $order->order_currency_code) }}</td>
                                                                            </tr>
                                                                            @endif

                                                                            <tr>
                                                                                <td>{{ __('shop::app.customer.account.order.view.adjustment-refund') }}</td>
                                                                                <td>-</td>
                                                                                <td>{{ core()->formatPrice($refund->adjustment_refund, $order->order_currency_code) }}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td>{{ __('shop::app.customer.account.order.view.adjustment-fee') }}</td>
                                                                                <td>-</td>
                                                                                <td>{{ core()->formatPrice($refund->adjustment_fee, $order->order_currency_code) }}</td>
                                                                            </tr>

                                                                            <tr class="bold">
                                                                                <td>{{ __('shop::app.customer.account.order.view.grand-total') }}</td>
                                                                                <td>-</td>
                                                                                <td>{{ core()->formatPrice($refund->grand_total, $order->order_currency_code) }}</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @endforeach

                                                        </tab>
                                                        @endif
                                                    </tabs>

                                                    <div class="sale-section">
                                                        <div class="section-content" style="border-bottom: 0">
                                                            <div class="order-box-container">
                                                                <div class="box">
                                                                    <div class="box-title">
                                                                        {{ __('shop::app.customer.account.order.view.billing-address') }}
                                                                    </div>

                                                                    <div class="box-content">
                                                                        @include ('admin::sales.address', ['address' => $order->billing_address])

                                                                        {!! view_render_event('bagisto.shop.customers.account.orders.view.billing-address.after', ['order' => $order]) !!}
                                                                    </div>
                                                                </div>

                                                                @if ($order->shipping_address)
                                                                <div class="box">
                                                                    <div class="box-title">
                                                                        {{ __('shop::app.customer.account.order.view.shipping-address') }}
                                                                    </div>

                                                                    <div class="box-content">
                                                                        @include ('admin::sales.address', ['address' => $order->shipping_address])

                                                                        {!! view_render_event('bagisto.shop.customers.account.orders.view.shipping-address.after', ['order' => $order]) !!}
                                                                    </div>
                                                                </div>

                                                                <div class="box">
                                                                    <div class="box-title">
                                                                        {{ __('shop::app.customer.account.order.view.shipping-method') }}
                                                                    </div>

                                                                    <div class="box-content">
                                                                        {{ $order->shipping_title }}

                                                                        {!! view_render_event('bagisto.shop.customers.account.orders.view.shipping-method.after', ['order' => $order]) !!}
                                                                    </div>
                                                                </div>
                                                                @endif

                                                                <div class="box">
                                                                    <div class="box-title">
                                                                        {{ __('shop::app.customer.account.order.view.payment-method') }}
                                                                    </div>

                                                                    <div class="box-content">
                                                                        {{ core()->getConfigData('sales.paymentmethods.' . $order->payment->method . '.title') }}

                                                                        @php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($order->payment->method); @endphp

                                                                        @if (! empty($additionalDetails))
                                                                        <div class="instructions">
                                                                            <label>{{ $additionalDetails['title'] }}</label>
                                                                            <p>{{ $additionalDetails['value'] }}</p>
                                                                        </div>
                                                                        @endif

                                                                        {!! view_render_event('bagisto.shop.customers.account.orders.view.payment-method.after', ['order' => $order]) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                {!! view_render_event('bagisto.shop.customers.account.orders.view.after', ['order' => $order]) !!}

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- </div> -->

                        @endsection
