@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.review.view.page-title') }}
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
                <span class="account-heading">Reviews</span>
                <div class="horizontal-rule"></div>
            </div>

            <div class="account-items-list">
                @if (count($reviews))
                    @foreach ($reviews as $review)
                    <div class="account-item-card mt-15 mb-15">
                        <div class="media-info">
                            <?php $image = productimage()->getGalleryImages($review->product); ?>
                            <img class="media" src="{{ $image[0]['small_image_url'] }}" alt="" />

                            <div class="info mt-20">
                                <div class="product-name">{{$review->product->name}}</div>

                                <div>
                                    @for($i=0;$i<$review->rating;$i++)
                                        <span class="icon star-icon"></span>
                                    @endfor
                                </div>

                                <div>
                                    {{ $review->comment }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="horizontal-rule mb-10 mt-10"></div>
                    @endforeach
                @else
                    <div class="empty">
                        {{ __('customer::app.reviews.empty') }}
                    </div>
                @endif
            </div>
        </div>

        </div>
        </div>
        </div>
    </div>
</section>
    <!-- </div> -->
@endsection