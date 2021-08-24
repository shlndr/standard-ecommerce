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
                <div class="orders">
                  <div class="select-orders">
                    <p class="coupen-text">Availed / Expired Coupons</p>
                    <div class="clear"></div>
                  </div>
                  
                  <div class="coupen-row">
                    <?php foreach ($data as $key => $cartValue) {?>
                  <div class="coupen-col">
                    <div class="coupen-lt">
                      <div class="coupen-n">
                      <p class="pur-text"><?php echo $cartValue->name;?></p>
                        <p class="pur-text0">Code: <strong><?php echo $cartValue->description;?></strong></p>
                      </div>
                      <div class="coupen-r"><img src="{{ asset('/themes/velocity/assets/images/dashboard/coupons-img.svg') }}" alt="">
                            <div class="offer-text"><strong><?php echo (int)$cartValue->discount_amount;?>% </strong>OFF</div>
                      </div>
                    </div>
                     <div class="coupen-time">
                      <?php if($cartValue->ends_till){?>
                      <p class="expiry-text">Expiry: <strong><?php echo date('Y-m-d',strtotime($cartValue->ends_till));?></strong></p>
                      <p class="expiry-text">Time: <strong>11:59:00</strong></p>
                      <?php }?>
                    </div>
                  </div>

                  <?php } ?>
                  
                </div></div>
                <a href="#" class="blue-btn mobOn">Logout</a>
              </div>
                  <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </section>

@endsection