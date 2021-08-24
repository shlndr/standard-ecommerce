@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.overview.index.title') }}
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

<section class="dashboard-tabs">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 nopadding">
							<div class="col-md-4 col-sm-12">
								@include('shop::customers.account.partials.sidemenu')
								<a href="{{ route('customer.session.destroy') }}" class="blue-btn deskOn">Logout</a>
							</div>
							<div class="col-md-8 col-sm-12">
								<div class="overview">
									<a href="{{ route('customer.orders.index') }}" class="options">
										<img src="{{ asset('/themes/velocity/assets/images/dashboard/my-orders.svg') }}" alt="">
										<p>My Orders</p>
										<p class="sml">check your order status & past orders</p>
									</a>
									<a href="{{ route('customer.wishlist.index') }}" class="options mid">
										<img src="{{ asset('/themes/velocity/assets/images/dashboard/my-wishlist.svg') }}" alt="">
										<p>my wishlist</p>
										<p class="sml">check your order status & past orders</p>
									</a>
									<!-- <a  class="options">
										<img src="images/dashboard/my-cards.svg" alt="">
										<p>my saved cards</p>
										<p class="sml">check your order status & past orders</p>
									</a> -->
									<a href="{{ route('customer.address.index') }}" class="options">
										<img src="{{ asset('/themes/velocity/assets/images/dashboard/my-address.svg') }}" alt="">
										<p>my address</p>
										<p class="sml">check your order status & past orders</p>
									</a>
									 <a href="{{ route('customer.coupon.index') }}" class="options mid">
										<img src="{{ asset('/themes/velocity/assets/images/dashboard/my-coupons.svg') }}" alt="">
										<p>my Coupons</p>
										<p class="sml">check your order status & past orders</p>
									</a> 
									<a href="{{ route('customer.profile.edit') }}" class="options">
										<img src="{{ asset('/themes/velocity/assets/images/dashboard/my-profile.svg') }}" alt="">
										<p>profile details</p>
										<p class="sml">check your order status & past orders</p>
									</a>
									<div class="clearfix"></div>
								</div>
								<a href="#" class="blue-btn mobOn">Logout</a>
							</div>
					        <div class="clearfix"></div>
						</div>
					</div>
				</div>
			</section>

@endsection