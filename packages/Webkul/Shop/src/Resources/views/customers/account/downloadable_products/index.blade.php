@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.downloadable_products.title') }}
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
        <div class="account-layout">

            <div class="account-head mb-10">
                <span class="back-icon"><a href="{{ route('customer.profile.index') }}"><i class="icon icon-menu-back"></i></a></span>
                <span class="account-heading">
                    {{ __('shop::app.customer.account.downloadable_products.title') }}
                </span>

                <div class="horizontal-rule"></div>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.downloadable_products.list.before') !!}

            <div class="account-items-list">
                <div class="account-table-content">

                    {!! app('Webkul\Shop\DataGrids\DownloadableProductDataGrid')->render() !!}

                </div>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.downloadable_products.list.after') !!}

        </div>

        </div>
        </div>
        </div>
    </div>
</section>

    <!-- </div> -->

@endsection