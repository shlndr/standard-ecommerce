{!! view_render_event('bagisto.shop.products.view.product-add.before', ['product' => $product]) !!}

	@include ('shop::products.buy-now')
    @include ('shop::products.add-to-cart', ['product' => $product])
{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}