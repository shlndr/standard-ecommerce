@extends('shop::layouts.master')
@section('page_title')
    {{ __('shop::app.customer.signup-form.page-title') }}
@endsection
@section('content-wrapper')
<div class="about-banner cf">
            <img src="{{ asset('/themes/velocity/assets/images/about-us/about-us-banner.jpg') }}" alt="Banner">
            <div class="container">
                <h1>Sign Up</h1>
            </div>
    </div>

    <section class="log-sign p-0">
        <div class="container1">
          <div class="login-window sign-up">
            <div class="tbl">
                <div class="poster"><!--<img src="images/signup.png" alt="">--></div>
            </div>
            <div class="tbl">
                <h1>Welcome to Tata Pravesh</h1>
                <p>India's only High Security Doors & Windows Manufacturer<br>
                with wide range of Variety</p>
                <form action="{{ route('customer.register.create') }}" method="post" id="login" class="login-form">
                    {{ csrf_field() }}
                    
                <div class="input-row">
                    <input type="text" name="name" placeholder="Enter Your Name" class="log-input" required>
                  </div>
                <div class="input-row">
                    <input type="text" name="phone" id="phone" max-length="10" placeholder="Enter Your Mobile No." class="log-input phone ">
                    <img src="{{ asset('/themes/default/assets/images/phone-circle-arrow.svg') }}" alt="" class="icon phone-circle"> </div>
                <div class="input-row flx otpsection" style="display:none;">
                    <div class="otp">
                    <label>Enter your otp</label>
                    <div id="otp" class="flex justify-center otp-no align-items-center">
                        <input class="m-2 text-center form-control otpbox" type="text" id="first" maxlength="1" required/>
                        <input class="m-2 text-center form-control otpbox" type="text" id="second" maxlength="1" required />
                        <input class="m-2 text-center form-control otpbox" type="text" id="third" maxlength="1" required/>
                        <input class="m-2 text-center form-control otpbox" type="text" id="fourth" maxlength="1" required/>
                      </div>
                    <label class="m0"><a class="resend">Resend otp</a></label>
                    <input type="hidden" class="getotp" value="" />
                  </div>

                    <input name="submit" type="submit" id="contactBtn" class="sub-btn0 signup">
                  </div>
                
                <div class="input-row flx flx2">
                    <a href="https://demo.onlinereviews.org.uk/customer/social-login/google">
                        <!-- <button name="google-signup" class="sub-btn0 gsignup"> -->
                            <img src="{{ asset('/themes/default/assets/images/google-icon.svg') }}" alt="">sign up google
                        <!-- </button> -->
                    </a>
                    <a href="https://demo.onlinereviews.org.uk/customer/social-login/facebook">
                        <!-- <button name="fb-signup" class="sub-btn0 fsignup"> -->
                            <img src="{{ asset('/themes/default/assets/images/fb-icon.svg') }}" alt="">sign up facebook
                        <!-- </button> -->
                    </a>
                </div>
                </form>
                <p class="login-link">Already have account? <a href="{{ route('customer.session.index') }}" class="login-link">Sign in</a></p>
              
              </div>
          </div>
          </div>
      </section>


    <!--<section class="log-sign">
        <div class="container">
            
            <div class="login-box">
                <div class="sign-up-text" style="text-align:center;">
                    {{ __('shop::app.customer.signup-text.account_exists') }} - <a href="{{ route('customer.session.index') }}">{{ __('shop::app.customer.signup-text.title') }}</a>
                </div>
                <h2>Create Account</h2>

                <form method="post" action="{{ route('customer.register.create') }}" @submit.prevent="onSubmit">
                {{ csrf_field() }}

                <input type="text" class="log-input" placeholder="First Name" name="first_name" v-validate="'required'" value="{{ old('first_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.firstname') }}&quot;">
                <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>

                <input type="text" class="log-input" placeholder="Last Name" name="last_name" v-validate="'required'" value="{{ old('last_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.lastname') }}&quot;">
                <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>

                <input type="email" class="log-input" placeholder="Email" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.email') }}&quot;">
                <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>

                <input type="text" class="log-input" placeholder="Zipcode" name="zipcode"  value="{{ old('zipcode') }}" data-vv-as="&quot;Zipcode&quot;">
                <span class="control-error" v-if="errors.has('zipcode')">@{{ errors.first('zipcode') }}</span>

                <input type="password" class="log-input" placeholder="Password" name="password" v-validate="'required|min:6'" ref="password" value="{{ old('password') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.password') }}&quot;">
                <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>

                <input type="password" class="log-input" placeholder="Confirm Password" name="password_confirmation"  v-validate="'required|min:6|confirmed:password'" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.confirm_pass') }}&quot;">
                <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>

                <button class="sub-btn0" type="submit">
                    {{ __('shop::app.customer.signup-form.button_title') }}
                </button>

                
                    
                </form>
            </div>
        </div>
    </section> -->





<!-- <div class="auth-content">

    <div class="sign-up-text">
        {{ __('shop::app.customer.signup-text.account_exists') }} - <a href="{{ route('customer.session.index') }}">{{ __('shop::app.customer.signup-text.title') }}</a>
    </div>

    {!! view_render_event('bagisto.shop.customers.signup.before') !!}

    <form method="post" action="{{ route('customer.register.create') }}" @submit.prevent="onSubmit">

        {{ csrf_field() }}

        <div class="login-form">
            <div class="login-text">{{ __('shop::app.customer.signup-form.title') }}</div>

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.before') !!}

            <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                <label for="first_name" class="required">{{ __('shop::app.customer.signup-form.firstname') }}</label>
                <input type="text" class="control" name="first_name" v-validate="'required'" value="{{ old('first_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.firstname') }}&quot;">
                <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
            </div>

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.firstname.after') !!}

            <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                <label for="last_name" class="required">{{ __('shop::app.customer.signup-form.lastname') }}</label>
                <input type="text" class="control" name="last_name" v-validate="'required'" value="{{ old('last_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.lastname') }}&quot;">
                <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
            </div>

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.lastname.after') !!}

            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                <label for="email" class="required">{{ __('shop::app.customer.signup-form.email') }}</label>
                <input type="email" class="control" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.email') }}&quot;">
                <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
            </div>

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.email.after') !!}

            <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                <label for="password" class="required">{{ __('shop::app.customer.signup-form.password') }}</label>
                <input type="password" class="control" name="password" v-validate="'required|min:6'" ref="password" value="{{ old('password') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.password') }}&quot;">
                <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
            </div>

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.password.after') !!}

            <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                <label for="password_confirmation" class="required">{{ __('shop::app.customer.signup-form.confirm_pass') }}</label>
                <input type="password" class="control" name="password_confirmation"  v-validate="'required|min:6|confirmed:password'" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.confirm_pass') }}&quot;">
                <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
            </div>

            {{-- <div class="signup-confirm" :class="[errors.has('agreement') ? 'has-error' : '']">
                <span class="checkbox">
                    <input type="checkbox" id="checkbox2" name="agreement" v-validate="'required'">
                    <label class="checkbox-view" for="checkbox2"></label>
                    <span>{{ __('shop::app.customer.signup-form.agree') }}
                        <a href="">{{ __('shop::app.customer.signup-form.terms') }}</a> & <a href="">{{ __('shop::app.customer.signup-form.conditions') }}</a> {{ __('shop::app.customer.signup-form.using') }}.
                    </span>
                </span>
                <span class="control-error" v-if="errors.has('agreement')">@{{ errors.first('agreement') }}</span>
            </div> --}}

            {{-- <span class="checkbox">
                <input type="checkbox" id="checkbox1" name="checkbox[]">
                <label class="checkbox-view" for="checkbox1"></label>
                Checkbox Value 1
            </span> --}}

            @if (core()->getConfigData('customer.settings.newsletter.subscription'))
                <div class="control-group">
                    <input type="checkbox" id="checkbox2" name="is_subscribed">
                    <span>{{ __('shop::app.customer.signup-form.subscribe-to-newsletter') }}</span>
                </div>
            @endif

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.after') !!}

            <button class="btn btn-primary btn-lg" type="submit">
                {{ __('shop::app.customer.signup-form.button_title') }}
            </button>

        </div>
    </form>

    {!! view_render_event('bagisto.shop.customers.signup.after') !!}
</div> -->
@endsection
@push('scripts')

<script type="application/javascript">
$(document).ready(function(){

$('.otpbox').keyup(function(){
    if(this.value.length==$(this).attr("maxlength")){
        $(this).next().focus();
    }
});

$('.phone-circle').click(function(){
    
    var APP_URL = {!! json_encode(url('/')) !!}
    var mobile = $('#phone').val();
    if(mobile.length == 10 && mobile !='')
    {
        $.ajax({
                  url: APP_URL+"/checkmobileexist",
                  type:"GET",                                    
                  data:{                                    
                    param:mobile
                  },
                  beforeSend: function (request) {
                    
                    },
                  success:function(response){                   
                    
                    
                    if(response.success == 1)
                    {                        
                         $('.otpsection').css('display','none');  
                         alert('This number is already used.Try another one.')                 
                    }
                    else
                    {
                        $('.otpsection').css('display','flex');
                        $('.getotp').val(response.otp);
                    }
                        
                   
                  },
                 });
    }
    else
    {
        alert('Enter valid mobile number.')
        return false;
    }

});
});
</script>
@endpush