<!--  -->
@if (count(app('Webkul\Product\Repositories\ProductRepository')->getNewProducts()))
    <section class="best-selling animated zoomIn wow">
            <div class="container">
                <h2><strong>Best Selling</strong> Products</h2>
                <div class="best-row">
                    <div class="owl-carousel owl-theme owl6">
                        @foreach (app('Webkul\Product\Repositories\ProductRepository')->getNewProducts() as $productFlat)

                            @if (core()->getConfigData('catalog.products.homepage.out_of_stock_items'))
                                @include ('shop::products.list.card', ['product' => $productFlat])
                            @else
                                @if ($productFlat->isSaleable())
                                    @include ('shop::products.list.card', ['product' => $productFlat])
                                @endif
                            @endif

                        @endforeach 
                    </div>
                </div>
            </div>
        </section>
@endif
