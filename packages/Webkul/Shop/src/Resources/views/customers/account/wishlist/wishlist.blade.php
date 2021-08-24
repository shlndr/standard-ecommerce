@extends('shop::layouts.master')

@section('page_title')
{{ __('shop::app.customer.account.wishlist.page-title') }}
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
                @inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
                <div class="orders">

                   @if($items->count())
                   @foreach ($items as $item)  
                  
                   @php
                     $image = $item->product->getTypeInstance()->getBaseImage($item);
                   @endphp  
                   
                            
                   <div class="wish-col">
                    <div class="wish-box1">
                        <img src="{{ $image['small_image_url'] }}" alt="" class="wish-dsk">
                        <img src="{{ $image['small_image_url'] }}" alt="" class="wish-mb">
                    </div>
                    <div class="wish-box2">
                        <p class="fus-new">{{ $item->product->name }}</p>
                        <p class="fus-new2">{{ strip_tags($item->product->short_description) }}</p>
                        <span class="fus-new3">Sku: {{ $item->product->sku }}</span>
                        <a href="{{ route('customer.wishlist.move', $item->id) }}" class="move-btn">Move to cart</a>
                    </div>
                    <div class="wish-sect">
                        <!-- <p class="wish-price">Rs. {{ $item->product->max_price }}/-</p> -->
                        <!-- <div class="wish-r">
                            <form id="myform" method="POST" class="quantity" action="#">
                                <input type="button" value="-" class="qtyminus minus" field="quantity" />
                                <input type="text" name="quantity" value="1" class="qty" />
                                <input type="button" value="+" class="qtyplus plus" field="quantity" />
                            </form> 
                        </div> -->  
                    </div>
                </div>
                
                @endforeach

                <div class="bottom-toolbar">
                    {{ $items->links()  }}
                </div>
                @else
                <div class="empty">
                    {{ __('customer::app.wishlist.empty') }}
                </div>
               @endif
                
                
                
                <div class="clear"></div>
                <!-- <div class="navigation">
                    <ul>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div> -->
            </div>




            <!-- <div class="account-layout">

                <div class="account-head mb-15">
                    <span class="account-heading">{{ __('shop::app.customer.account.wishlist.title') }}</span>

                    @if (count($items))
                    <div class="account-action">
                        <a href="{{ route('customer.wishlist.removeall') }}">{{ __('shop::app.customer.account.wishlist.deleteall') }}</a>
                    </div>
                    @endif

                    <div class="horizontal-rule"></div>
                </div>

                {!! view_render_event('bagisto.shop.customers.account.wishlist.list.before', ['wishlist' => $items]) !!}

                <div class="account-items-list">

                    @if ($items->count())
                    @foreach ($items as $item)
                    <div class="account-item-card mt-15 mb-15">
                        <div class="media-info">
                            @php
                            $image = $item->product->getTypeInstance()->getBaseImage($item);
                            @endphp

                            <img class="media" src="{{ $image['small_image_url'] }}" alt="" />

                            <div class="info">
                                <div class="product-name">
                                    {{ $item->product->name }}

                                    @if (isset($item->additional['attributes']))
                                    <div class="item-options">

                                        @foreach ($item->additional['attributes'] as $attribute)
                                        <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                        @endforeach

                                    </div>
                                    @endif
                                </div>

                                <span class="stars" style="display: inline">
                                    @for ($i = 1; $i <= $reviewHelper->getAverageRating($item->product); $i++)
                                    <span class="icon star-icon"></span>
                                    @endfor
                                </span>
                            </div>
                        </div>

                        <div class="operations">
                            <a class="mb-50" href="{{ route('customer.wishlist.remove', $item->id) }}">
                                <span class="icon trash-icon"></span>
                            </a>

                            <a href="{{ route('customer.wishlist.move', $item->id) }}" class="btn btn-primary btn-md">
                                {{ __('shop::app.customer.account.wishlist.move-to-cart') }}
                            </a>
                        </div>
                    </div>

                    <div class="horizontal-rule mb-10 mt-10"></div>
                    @endforeach

                    <div class="bottom-toolbar">
                        {{ $items->links()  }}
                    </div>
                    @else
                    <div class="empty">
                        {{ __('customer::app.wishlist.empty') }}
                    </div>
                    @endif
                </div>

                {!! view_render_event('bagisto.shop.customers.account.wishlist.list.after', ['wishlist' => $items]) !!}

            </div> -->

        </div>
    </div>
</div>
</div>
</section>
<!-- </div> -->
@endsection