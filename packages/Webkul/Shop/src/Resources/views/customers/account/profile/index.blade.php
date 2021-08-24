@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
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

        <div class="account-head">

            <span class="back-icon"><a href="{{ route('customer.profile.index') }}"><i class="icon icon-menu-back"></i></a></span>

            <!-- <span class="account-heading">{{ __('shop::app.customer.account.profile.index.title') }}</span> -->

            <!-- <span class="account-action">
                <a href="{{ route('customer.profile.edit') }}">{{ __('shop::app.customer.account.profile.index.edit') }}</a>
            </span> -->

            <div class="horizontal-rule"></div>
        </div>

         {!! view_render_event('bagisto.shop.customers.account.profile.view.before', ['customer' => $customer]) !!}

        <div class="account-table-content profile" style="width: 50%;">
            <div class="formbx">
                    <div class="input-list lfthalf">
                        {{ __('shop::app.customer.account.profile.fname') }}
                    </div>
                    <div class="input-list rgthalf">
                        {{ $customer->first_name }}
                    </div>

                    <div class="input-list lfthalf">
                        {{ __('shop::app.customer.account.profile.lname') }}
                    </div>
                    <div class="input-list rgthalf">
                        {{ $customer->last_name }}
                    </div>

                    <div class="input-list lfthalf">
                        {{ __('shop::app.customer.account.profile.gender') }}
                    </div>
                    <div class="input-list rgthalf">
                        {{ __($customer->gender) }}
                    </div>

                    <div class="input-list lfthalf">
                        {{ __('shop::app.customer.account.profile.dob') }}
                    </div>
                    <div class="input-list rgthalf">
                        {{ $customer->date_of_birth }}
                    </div>


                    <div class="input-list lfthalf">
                        {{ __('shop::app.customer.account.profile.email') }}
                    </div>
                    <div class="input-list rgthalf">
                        {{ $customer->email }}
                    </div>


            </div>
            


            <button type="submit" @click="showModal('deleteProfile')" class="btn btn-lg btn-primary mt-10">
                {{ __('shop::app.customer.account.address.index.delete') }}
            </button>

            <form method="POST" action="{{ route('customer.profile.destroy') }}" @submit.prevent="onSubmit">
                @csrf

                <modal id="deleteProfile" :is-open="modalIds.deleteProfile">
                    <h3 slot="header">{{ __('shop::app.customer.account.address.index.enter-password') }}</h3>

                    <div slot="body">
                        <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                            <label for="password" class="required">{{ __('admin::app.users.users.password') }}</label>
                            <input type="password" v-validate="'required|min:6|max:18'" class="control" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.users.password') }}&quot;"/>
                            <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                        </div>

                        <div class="page-action">
                            <button type="submit"  class="btn btn-lg btn-primary mt-10">
                            {{ __('shop::app.customer.account.address.index.delete') }}
                            </button>
                        </div>
                    </div>
                </modal>
            </form>
        </div>

        {!! view_render_event('bagisto.shop.customers.account.profile.view.after', ['customer' => $customer]) !!}
    </div>

    </div>
        </div>
        </div>
    </div>
</section>
        
<!-- </div> -->
@endsection
