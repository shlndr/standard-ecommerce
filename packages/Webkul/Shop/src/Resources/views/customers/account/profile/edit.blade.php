@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.edit-profile.page-title') }}
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
            <div class="profile">

            <!-- <div class="account-head mb-10">
                <span class="back-icon"><a href="{{ route('customer.profile.index') }}"><i class="icon icon-menu-back"></i></a></span>

                <span class="account-heading">{{ __('shop::app.customer.account.profile.edit-profile.title') }}</span>

                <span></span>
            </div> -->

            {!! view_render_event('bagisto.shop.customers.account.profile.edit.before', ['customer' => $customer]) !!}

            <form method="post" action="{{ route('customer.profile.store') }}" @submit.prevent="onSubmit">
                @csrf

                    {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.before', ['customer' => $customer]) !!}

                <p>Profile</p>
                <div class="formbx">
                    <div class="input-list lfthalf">
                        <input type="text" class="control" name="first_name" value="{{ old('first_name') ?? $customer->first_name }}" onkeypress="return onlyCharacters(event);" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.fname') }}&quot;">
                        <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                        <!-- <input type="text" placeholder="Full Name" name="fName" id="fName" required="" onkeypress="return onlyCharacters(event);" maxlength="80"> -->
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.profile.edit.first_name.after') !!}

                    <div class="input-list rgthalf">
                        
                        <input type="text" class="control" name="last_name" value="{{ old('last_name') ?? $customer->last_name }}" onkeypress="return onlyCharacters(event);" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.lname') }}&quot;">
                        <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
                    </div>

                    <div class="input-list lfthalf" :class="[errors.has('gender') ? 'has-error' : '']">                        
                        <select name="gender" class="control" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.gender') }}&quot;">
                            <option value=""  @if ($customer->gender == "") selected @endif></option>
                            <option value="Other"  @if ($customer->gender == "Other") selected @endif>{{ __('shop::app.customer.account.profile.other') }}</option>
                            <option value="Male"  @if ($customer->gender == "Male") selected @endif>{{ __('shop::app.customer.account.profile.male') }}</option>
                            <option value="Female" @if ($customer->gender == "Female") selected @endif>{{ __('shop::app.customer.account.profile.female') }}</option>
                        </select>
                        <span class="control-error" v-if="errors.has('gender')">@{{ errors.first('gender') }}</span>
                    </div>

                    <div class="input-list rgthalf">
                        
                        <input type="date" class="control" name="date_of_birth" value="{{ old('date_of_birth') ?? $customer->date_of_birth }}" v-validate="" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.dob') }}&quot;">
                        <span class="control-error" v-if="errors.has('date_of_birth')">@{{ errors.first('date_of_birth') }}</span>
                    </div>

                    <div class="input-list lfthalf">
                       
                        <input type="email" class="control" placeholder="Enter email" name="email" value="{{ old('email') ?? $customer->email }}" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.email') }}&quot;">
                        <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                    </div>

                    <div class="input-list rgthalf">
                        <input type="text" class="control" placeholder="Enter Mobile number" name="phone" value="{{ old('phone') ?? $customer->phone }}" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.phone') }}&quot;">
                        <span class="control-error" v-if="errors.has('phone')">@{{ errors.first('phone') }}</span>
                    </div>

                    <div class="input-list lfthalf">
                        <input type="password" class="control" placeholder="Old Password" name="oldpassword" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.opassword') }}&quot;" v-validate="'min:6'">
                        <span class="control-error" v-if="errors.has('oldpassword')">@{{ errors.first('oldpassword') }}</span>
                    </div>
                    <div class="input-list rgthalf">
                        <input type="password" id="password" placeholder="New Password" class="control" name="password" ref="password" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.password') }}&quot;" v-validate="'min:6'">
                        <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                    </div>
                    <div class="input-list lfthalf">
                        <input type="password" id="password_confirmation" placeholder="Confirm Password" class="control" name="password_confirmation" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.cpassword') }}&quot;" v-validate="'min:6|confirmed:password'">
                        <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
                    </div>
                    
                    <!-- <div class="input-list rgthalf">
                        <input type="checkbox" id="checkbox2" name="subscribed_to_news_letter"@if (isset($customer->subscription)) value="{{ $customer->subscription->is_subscribed }}" {{ $customer->subscription->is_subscribed ? 'checked' : ''}} @endif>
                            <span>{{ __('shop::app.customer.signup-form.subscribe-to-newsletter') }}</span>
                    </div> -->

                    
                        <input class="btn btn-primary btn-lg" type="submit" value="{{ __('shop::app.customer.account.profile.submit') }}">
                    
                </div>





            </form>

            {!! view_render_event('bagisto.shop.customers.account.profile.edit.after', ['customer' => $customer]) !!}

        </div>
        </div>
        </div>
        </div>
    </div>
</section>

        

    <!-- </div> -->
@endsection
