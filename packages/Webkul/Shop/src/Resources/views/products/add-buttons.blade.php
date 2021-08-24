@inject ('toolbarHelper', 'Webkul\Product\Helpers\Toolbar')

@php
    $showCompare = core()->getConfigData('general.content.shop.compare_option') == "1" ? true : false;

    $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false;
@endphp

<div class="{{ $toolbarHelper->isModeActive('grid') ? 'cart-wish-wrap' : 'default-wrap' }}">
    <form action="{{ route('cart.add', $product->product_id) }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
        <input type="hidden" name="quantity" value="1">
        <button class="buy-btn addtocart" {{ $product->isSaleable() ? '' : 'disabled' }}>{{ ($product->type == 'booking') ?  __('shop::app.products.book-now') :  __('shop::app.products.buy-now') }}</button>
    </form>

 

    @if ($showCompare)
        @include('shop::products.compare', [
            'productId' => $product->id
        ])
    @endif
</div>