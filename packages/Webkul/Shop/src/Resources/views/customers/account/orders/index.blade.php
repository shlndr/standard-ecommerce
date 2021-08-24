@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.order.index.page-title') }}
@endsection

@section('content-wrapper')

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
                                <?php foreach ($order as $key => $value) { 
                                    
                                    $attributes = json_decode(json_decode(json_encode($value['additional'])),true);
                                    
                                    ?>
                                    
                                <div class="all-orders">
                                    <div class="delivery-dtl">
                                        <p><img src="images/deliver-icon.png" alt=""></p>
                                        <?php if($value['status'] == 'completed') {?>
                                        <p class="green"><?php echo $value['status'];?></p>
                                        <?php }else{?>
                                        <p class="orange"><?php echo $value['status'];?></p>
                                        <?php } ?>
                                        <!-- changes -->
                                        <p><span>Arriving On:</span> 12th April 2021</p>
                                        <p class="tracker">Track Order</p><!-- changes -->
                                    </div>
                                    <div class="product-dtl">
                                        <div class="product-img">
                                           
                                        </div>
                                        <div class="product-txt">
                                                <div class="fus-text">
                                                    <p class="fus-title"><?php echo $value['name'];?></p>
                                                    <!-- <p class="fus-title2">Forest Brown</p> -->
                                                    <p class="fus-title3"><?php echo $value['sku'];?></p>
                                                </div>
                                                <div class="product-festures">
                                                    <ul>
                                                        <?php foreach ($attributes['attributes'] as $key => $result) { 
                                                            if($key == 'size'){
                                                            ?>

                                                        <li>Size : <b><?php echo $result['option_label'];?></b></li>
                                                        <?php }else{?>
                                                        <li>Model : <b><?php echo $result['option_label'];?></b></li>
                                                        <?php } } ?>
                                                        <!-- <li><b>Style</b></li>
                                                        <li><b>Color</b></li> -->
                                                    </ul>
                                                    <ul>
                                                        <!-- <li>Accessory 1</li>
                                                        <li>Accessory 2</li>
                                                        <li>Accessory 3</li>
                                                        <li>Accessory 4</li> -->
                                                    </ul>
                                                </div>
                                                <!-- changes -->
                                                <div class="payment">
                                                    <p>
                                                        Rs. <?php echo $value['price'];?>
                                                        <span class="green"><img src="images/paid-tick.png" alt=""> Paid</span>
                                                    </p>
                                                    <?php if($attributes['actual_amount'] != $value['price']){?>
                                                    <p>
                                                        <a href="#">Rs.<?php echo $attributes['actual_amount'] - $value['price'];?></a>
                                                        <span>Pay Balance</span>
                                                    </p>
                                                    <?php } ?>
                                                </div>
                                                <!-- end changes -->
                                            </div>
                                        <div class="clearfix"></div>
                                        <div class="btns">
                                            <a href="#" class="blue-btn">Download Invoice</a>
                                            <?php if($value['status'] == 'pending'){ ?>
                                            
                                            <a href="{{ route('customer.orders.cancel', $value['id']) }}" class="border-btn" v-alert:message="'{{ __('shop::app.customer.account.order.view.cancel-confirm-msg') }}'">
                                                Cancel Order
                                            </a>
                                             <?php } ?>
                                            <!-- changes -->
                                        </div>
                                        <!-- <div class="start-rating-module">
                                            <p>Rate Product</p>
                                            <div class="star">
                                                <input type="number" name="your_awesome_parameter" id="rating1" class="rating" />
                                            </div>
                                        </div> -->
                                    </div>
                                    <!-- Tracker dropdown changes -->
                                    <div class="tracking-dtl">
                                        <div class="topSec">
                                            <p class="ord-no">Purchase Date : <span><?php echo $value['created_at'];?></span></p>
                                            <p class="ord-no">Order No : <span><?php echo $value['id'];?></span></p>
                                            <!-- <p class="ord-no">Shipping No : <span>123456789</span></p>   -->
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
                                <?php } ?>
                                <!-- <a href="#" class="blue-btn-lrg">Show Older Orders</a> -->
                            </div>
        <!-- <div class="account-layout">

            <div class="account-head mb-10">
                <span class="back-icon"><a href="{{ route('customer.profile.index') }}"><i class="icon icon-menu-back"></i></a></span>
                <span class="account-heading">
                    {{ __('shop::app.customer.account.order.index.title') }}
                </span>

                <div class="horizontal-rule"></div>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.orders.list.before') !!}

            <div class="account-items-list">
                <div class="account-table-content">

                    {!! app('Webkul\Shop\DataGrids\OrderDataGrid')->render() !!}

                </div>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.orders.list.after') !!}

        </div> -->

        </div>
        </div>
        </div>
    </div>
</section>

    <!-- </div> -->

@endsection