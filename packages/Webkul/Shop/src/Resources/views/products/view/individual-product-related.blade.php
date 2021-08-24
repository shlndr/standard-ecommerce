<?php
    $relatedProducts = $product->related_products()->get();
    $id = '';
?>

@if ($relatedProducts->count())
    
            @foreach ($relatedProducts as $related_product)           
                @if($related_product->id != $id)
                <?php $id = $related_product->id; ?>
                <div class="item">
                    <?php $productBaseImage = productimage()->getProductBaseImage($related_product); ?>
                    <div class="product-images">
                        <a href="{{ route('shop.productOrCategory.index', $related_product->url_key) }}" title="{{ $related_product->name }}">
                            <img src="{{ $productBaseImage['large_image_url'] }}" onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png') }}'" alt="" style="height:185px;" />
                        </a>
                    </div>
                    <div class="product-title"><strong><a href="{{ route('shop.productOrCategory.index', $related_product->url_key) }}" title="{{ $related_product->name }}">{{ $related_product->name }}</a></strong></div>
                </div>
                
                @endif

            @endforeach

       
@endif