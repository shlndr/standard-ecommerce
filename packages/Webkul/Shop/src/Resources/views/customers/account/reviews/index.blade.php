@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.review.index.page-title') }}
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

                <span class="account-heading">{{ __('shop::app.customer.account.review.index.title') }}</span>

                @if (count($reviews) > 1)
                    <div class="account-action">
                        <a href="{{ route('customer.review.deleteall') }}">{{ __('shop::app.customer.account.wishlist.deleteall') }}</a>
                    </div>
                @endif

                <span></span>
                <div class="horizontal-rule"></div>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.reviews.list.before', ['reviews' => $reviews]) !!}

            <div class="account-items-list">
                @if (! $reviews->isEmpty())
                    @foreach ($reviews as $review)
                        <div class="account-item-card mt-15 mb-15">
                            <div class="media-info">
                                <?php $image = productimage()->getProductBaseImage($review->product); ?>
                                <a href="{{ route('shop.productOrCategory.index', $review->product->url_key) }}" title="{{ $review->product->name }}">
                                    <img class="media" src="{{ $image['small_image_url'] }}" alt=""/>
                                </a>

                                <div class="info">
                                    <div class="product-name">
                                        <a href="{{ route('shop.productOrCategory.index', $review->product->url_key) }}" title="{{ $review->product->name }}">
                                            {{$review->product->name}}
                                        </a>
                                    </div>

                                    <div class="stars mt-10">
                                        @for($i=0 ; $i < $review->rating ; $i++)
                                            <span class="icon star-icon"></span>
                                        @endfor
                                    </div>

                                    <div class="mt-10">
                                        {{ $review->comment }}
                                    </div>
                                </div>
                            </div>

                            <div class="operations">
                                <a class="mb-50" href="{{ route('customer.review.delete', $review->id) }}"><span class="icon trash-icon"></span></a>
                            </div>
                        </div>
                        <div class="horizontal-rule mb-10 mt-10"></div>
                    @endforeach

                    <div class="bottom-toolbar">
                        {{ $reviews->links()  }}
                    </div>
                @else
                    <div class="empty mt-15">
                        {{ __('customer::app.reviews.empty') }}
                    </div>
                @endif

            </div>

            {!! view_render_event('bagisto.shop.customers.account.reviews.list.after', ['reviews' => $reviews]) !!}
        </div>

        </div>
        </div>
        </div>
    </div>
</section>
    <!-- </div> -->
@endsection