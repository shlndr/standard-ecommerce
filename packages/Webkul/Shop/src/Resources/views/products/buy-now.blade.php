{!! view_render_event('bagisto.shop.products.buy_now.before', ['product' => $product]) !!}

<button type="submit" class="btn btn-default buynow" {{ ! $product->isSaleable(1) ? 'disabled' : '' }}>
    {{ __('shop::app.products.buy-now') }}
</button>


{!! view_render_event('bagisto.shop.products.buy_now.after', ['product' => $product]) !!}