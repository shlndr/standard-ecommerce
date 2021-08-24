
{!! view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]) !!}
    <div class="item">
        <div class="sell-thumb">
            <div class="best-col">
                <?php $productBaseImage = productimage()->getProductBaseImage($product); ?>

                @if ($product->new)
                    <p class="new">NEW</p>
                @endif
                <div class="door-thumb door1">
                    <picture>
                        <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}" title="{{ $product->name }}">
                            <img src="{{ $productBaseImage['medium_image_url'] }}" onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png') }}'"  alt="" />
                        </a>
                    </picture>
                </div>
                <p class="head-title"><a href="{{ route('shop.productOrCategory.index', $product->url_key) }}" title="{{ $product->name }}">{{ $product->name }}</a></p> 
                <!-- <span>{{ strip_tags($product->short_description) }}</span> -->

                
                <div class="buy-sect">
                    
                    @include ('shop::products.price', ['product' => $product])

                    @include('shop::products.add-buttons', ['product' => $product])
                </div>
            </div>
        </div>
    </div>
    {!! view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]) !!}