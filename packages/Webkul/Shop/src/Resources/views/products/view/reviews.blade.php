@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')

{!! view_render_event('bagisto.shop.products.view.reviews.after', ['product' => $product]) !!}
@if ($total = $reviewHelper->getTotalReviews($product))

<div class="flex-container rating-all">
    <span class="title">{{ $reviewHelper->getAverageRating($product) }}</span>
    <div class="flex-container rating-star">
        <div class="flex-item first-cotainer">
            <div class="star">
                @for ($i = 1; $i <= 5; $i++)

                @if($i <= round($reviewHelper->getAverageRating($product)))
                
                <span class="fa fa-star checked"></span>
                @else
                
                <span class="fa fa-star"></span>
                @endif

                @endfor

            </div>
            <div>Based on {{ __('shop::app.products.total-reviews', ['total' => $total]) }} </div>
        </div>
        <div class="flex-item">
            <button type="button" class="btn rating-pop" data-toggle="modal" data-target="#reviewmodel"
            data-whatever="@mdo">WRITE A REVIEW</button>
        </div>
    </div>
</div>

@foreach ($reviewHelper->getReviews($product)->paginate(10) as $review)
<div class="individual-rating border-bottom">
    <div class="flex-container">
        <div class="rating-name">
            <div class="rating">{{ $review->rating }}<span class="fa fa-star checked"></span></div>
            <div class="rating-text">{{ $review->comment }}</div>
            <div class="username">{{ __('shop::app.products.by', ['name' => $review->name]) }},</div>
            <div class="date">{{ core()->formatDate($review->created_at, 'F d, Y') }}</div>
        </div>
        <!-- <div class="images">
            <img src="images/product-page/placeholder.jpg" alt="">
            <img src="images/product-page/placeholder.jpg" alt="">
            <img src="images/product-page/placeholder.jpg" alt="">
        </div> -->
    </div>
</div>
 @endforeach
<!-- <div class="text-center">
    <a href="{{ route('shop.reviews.index', $product->url_key) }}" class="btn btn-default readallreview view-all">
        {{ __('shop::app.products.view-all') }}
    </a>
</div> -->
@else
    @if (core()->getConfigData('catalog.products.review.guest_review') || auth()->guard('customer')->check())
        <div class="flex-container rating-all">
            <span class="title"></span>
            <div class="flex-container rating-star">
                <div class="flex-item">
                    <button type="button" class="btn rating-pop" data-toggle="modal" data-target="#reviewmodel"
                    data-whatever="@mdo">WRITE A REVIEW</button>
                </div>
            </div>
        </div>

        <!-- <div class="rating-reviews">
            <div class="rating-header">
                <a href="{{ route('shop.reviews.create', $product->url_key) }}" class="btn btn-lg btn-primary">
                    {{ __('shop::app.products.write-review-btn') }}
                </a>
            </div>
        </div> -->
    @endif
@endif


{!! view_render_event('bagisto.shop.products.view.reviews.after', ['product' => $product]) !!}
