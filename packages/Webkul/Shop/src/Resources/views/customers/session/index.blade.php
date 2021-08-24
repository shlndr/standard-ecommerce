@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.login-form.page-title') }}
@endsection

@section('content-wrapper')
    <div class="about-banner cf">
            <img src="{{ asset('/themes/velocity/assets/images/about-us/about-us-banner.jpg') }}" alt="Banner">
            <div class="container">
                <h1>Login</h1>
            </div>
    </div>

    <section class="log-sign p-0">
        <div class="container1">          
            
          <div class="login-window sign-in">
            <div class="tbl">
                <div class="poster"><!--<img src="images/sign-in.png" alt="">--></div>
            </div>
            <div class="tbl">
                <h1>Welcome to Tata Pravesh</h1>
                <p>India's only High Security Doors & Windows Manufacturer<br>
                with wide range of Variety</p>
                <form action="{{ route('customer.session.create') }}" method="post" id="login"  class="login-form">
                    {{ csrf_field() }}
                <div class="input-row">
                    <input type="text" name="phone" id="phone" placeholder="User id / Mobile No." max-length="10" required class="log-input">
                    <img src="{{ asset('/themes/default/assets/images/user-check.png') }}" alt="" class="icon user-check">
                    <label class=""><a class="sendotp">Send otp</a> </label>
                    <div class="cf"></div>
                  </div>
                <div class="input-row otpsection" style="display:none">
                    <input type="password" name="pwd" placeholder="Password / OTP" max-length="4" required class="log-input">
                    <input type="hidden" name="password" value="1234">
                    <!--<img src="images/icon-eye-off.png" alt="" class="icon eye-off">-->
                    <i class="fa fa-eye-slash icon eye-off" id="togglePassword"></i>
                    <label class=""><a class="resend">Forgot password?</a></label>
                    <div class="cf"></div>
                    <!-- <a class="resend">Forgot password?</a> -->
                  </div>
                <div class="input-row flx chek">
                    <div class="checkbox">
                    <label>
                        <input type="checkbox">
                        Remember me</label>
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
                <p class="login-link">Don't have account? <a href="{{ route('customer.register.index') }}" class="login-link">Sign Up</a></p>
              </form>
              </div>
          </div>
          
          </div>
      </section>
    <!-- <section class="log-sign">
        <div class="container">
            <div class="login-box">
                <div class="sign-up-text" style="text-align:center;">
                    {{ __('shop::app.customer.login-text.no_account') }} - <a href="{{ route('customer.register.index') }}">{{ __('shop::app.customer.login-text.title') }}</a>
                </div>
                <h2>Customer Login</h2>

                <form method="POST" action="{{ route('customer.session.create') }}" @submit.prevent="onSubmit">
                    {{ csrf_field() }}
                                        
                    <input type="text" data-name="Email" placeholder="Your Email" class="log-input" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.login-form.email') }}&quot;">
                    <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>

                    <input type="password" data-name="password" placeholder="Password" v-validate="'required|min:6'" class="log-input" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.sessions.password') }}&quot;" value=""/>
                    <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>

                    <input class="sub-btn0" type="submit" value="{{ __('shop::app.customer.login-form.button_title') }}">

                    <a href="{{ route('customer.forgot-password.create') }}" class="forgot">Forgot your password?</a>

                    <div class="mt-10">
                        @if (Cookie::has('enable-resend'))
                            @if (Cookie::get('enable-resend') == true)
                                <a href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                            @endif
                        @endif
                    </div>

                </form>
            </div>
        </div>
    </section> -->

    <!-- <div class="auth-content">
        <div class="sign-up-text">
            {{ __('shop::app.customer.login-text.no_account') }} - <a href="{{ route('customer.register.index') }}">{{ __('shop::app.customer.login-text.title') }}</a>
        </div>

        {!! view_render_event('bagisto.shop.customers.login.before') !!}

        <form method="POST" action="{{ route('customer.session.create') }}" @submit.prevent="onSubmit">
            {{ csrf_field() }}
            <div class="login-form">
                <div class="login-text">{{ __('shop::app.customer.login-form.title') }}</div>

                {!! view_render_event('bagisto.shop.customers.login_form_controls.before') !!}

                <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                    <label for="email" class="required">{{ __('shop::app.customer.login-form.email') }}</label>
                    <input type="text" class="control" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.login-form.email') }}&quot;">
                    <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                </div>

                <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                    <label for="password" class="required">{{ __('shop::app.customer.login-form.password') }}</label>
                    <input type="password" v-validate="'required|min:6'" class="control" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.sessions.password') }}&quot;" value=""/>
                    <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                </div>

                {!! view_render_event('bagisto.shop.customers.login_form_controls.after') !!}

                <div class="forgot-password-link">
                    <a href="{{ route('customer.forgot-password.create') }}">{{ __('shop::app.customer.login-form.forgot_pass') }}</a>

                    <div class="mt-10">
                        @if (Cookie::has('enable-resend'))
                            @if (Cookie::get('enable-resend') == true)
                                <a href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                            @endif
                        @endif
                    </div>
                </div>

                <input class="btn btn-primary btn-lg" type="submit" value="{{ __('shop::app.customer.login-form.button_title') }}">
            </div>
        </form>

        {!! view_render_event('bagisto.shop.customers.login.after') !!}
    </div> -->

@stop
@push('scripts')

<script type="application/javascript">
$(document).ready(function(){
$('.sendotp').click(function(){
    var mobile = $('#phone').val();
    if(mobile.length == 10 && mobile !='')
    {
        $('.otpsection').css('display','block');
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
