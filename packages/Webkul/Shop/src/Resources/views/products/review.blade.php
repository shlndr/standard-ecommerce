@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')

{!! view_render_event('bagisto.shop.products.review.before', ['product' => $product]) !!}

@if ($total = $reviewHelper->getTotalReviews($product))

<div class="star">
@for ($i = 1; $i <= 5; $i++)
              @if($i <= round($reviewHelper->getAverageRating($product)))
              <span class="fa fa-star checked"></span>
              @else
              <span class="fa fa-star"></span>
              @endif
            @endfor

  
                </div>
                <div class="rating">
                  {{
                      __('shop::app.products.total-rating', [
                              'total_rating' => $reviewHelper->getAverageRating($product),
                              'total_reviews' => $total,
                          ])
                  }}
                </div>
    
@endif

{!! view_render_event('bagisto.shop.products.review.after', ['product' => $product]) !!}
