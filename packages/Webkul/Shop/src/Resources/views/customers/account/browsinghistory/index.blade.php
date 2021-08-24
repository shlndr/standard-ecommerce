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
                <?php
                  if(isset($_COOKIE['productname']) && isset($_COOKIE['image']) ) {
                      $productArr = explode(',', $_COOKIE['productname']);
                      $imageArr = explode(',', $_COOKIE['image']);
                      $urlArr = explode(',', $_COOKIE['producturl']);
                      $priceArr = explode(',', $_COOKIE['price']);
                      //echo"<pre>";print_r($priceArr);die;
                   ?>
                <div class="orders">
                  <div class="browsing-history">
                    <p class="heading">Recently viewed items</p>
                    <div class="on-off">
                      <p>Turn Browsing History</p>
                      <span class="red">Off</span>
                      <div class="button r" id="button-1">
                            <input type="checkbox" class="checkbox">
                            <div class="knobs"></div>
                            <div class="layer"></div>
                          </div>
                          <span class="green">On</span>
                    </div>
                    <div class="clear"></div>
                  </div>
                  <?php for($i=0;$i<count($productArr);$i++) { ?>
                  <div class="browsing-col">
                      <div class="wish-box1">
                                        <img src="<?php echo str_replace('large','small', $imageArr[$i]) ; ?>" alt="<?php echo $productArr[$i]; ?>" alt="" class="wish-dsk">
                        <img src="<?php echo str_replace('large','small', $imageArr[$i]) ; ?>" alt="<?php echo $productArr[$i]; ?>" alt="" class="wish-mb">
                    </div>
                    <div class="wish-box2">
                      <p class="fus-new"><?php echo $productArr[$i]; ?></p>
                      <p class="wish-price">Rs. <?php echo $priceArr[$i]; ?>/-</p>
                      <!-- <div class="star"><span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                              </div> -->
                      <!-- <a href="#" class="remove"><img src="images/remove.svg"></a> -->
                    </div>
                  </div>                  
                  <?php } ?>
                  
                  <div class="clear"></div>
                  <!-- <div class="navigation">
                    <ul>
                      <li><a href="#" class="active">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                    </ul>
                  </div> -->
                </div>
                <?php } ?>
                <a href="#" class="blue-btn mobOn">Logout</a>
              </div>
                  <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </section>

@endsection