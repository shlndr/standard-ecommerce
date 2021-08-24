@extends('shop::layouts.master')

@section('page_title')
{{ __('shop::app.search.page-title') }}
@endsection

@section('content-wrapper')
@if (request('image-search'))
<image-search-result-component></image-search-result-component>
@endif

@if (! $results)
{{  __('shop::app.search.no-results') }}
@endif

@if ($results)

<section class="search-sect">
  <div class="container">
    <div class="top-now"><h2>Search Results</h2>
      <p class="results0">Results for <strong>"<?php echo $_GET['term'];?>"</strong></p>
      <p class="results1">{{ $results->count() }} Products found</p>

</div><div class="clearfix"></div>
    <div class="search-row">
        <!-- <div class="lt"> -->
                   <!--  <div class="stock-top">
                        <p class="stock-text">Exclude Out Of Stock Items</p>
                        <label class="switch"><input type="checkbox"><span class="slider round"></span></label>
                        <div class="clearfix"></div>
                    </div>

                    <div class="filter-now">
                        <p class="sort-text">Sort By</p>
                        <div class="select-box my-3">
                            <select name="varient" id="varient" class="select-input">
                                <option value="4">Featured</option>
                                <option value="4">Standard Sizes (W x H)</option>
                                <option value="4">Standard Sizes (W x H)</option>
                                <option value="4">Standard Sizes (W x H)</option>
                            </select>
                        </div>
                    </div> -->

            <!--<div class="filter-buy">
                <p class="sort-text2">Filter By</p>

                <div class="acc">
                     <div class="faqbx wow slideInUp animated">
                        <div class="faqtitle"><p>Category</p></div>
                        <div class="faqdesc">
                            <ul class="checkdiv1" id="chkdiv1">
                              <li>
                                  <label for="Accessories1" class="lab2">Residential Doors</label>
                                  <input type="checkbox" id="Accessories1" name="Accessories1" value="Accessories">

                              </li>
                              <li>
                                  <label for="Accessories2" class="lab2">Commercial Doors</label>
                                  <input type="checkbox" id="Accessories2" name="Accessories2" value="Accessories">

                              </li>
                              <li>
                                  <label for="Accessories3" class="lab2">Windows</label>
                                  <input type="checkbox" id="Accessories3" name="Accessories3" value="Accessories">

                              </li>
                            </ul>
                        </div>
                    </div> -->

                    <!-- <div class="faqbx wow slideInUp animated">
                        <div class="faqtitle"><p>Price</p></div>
                        <div class="faqdesc">
                            <ul class="checkdiv1" id="chkdiv2">
                              <li>
                                  <label for="Accessories1" class="lab2">Residential Doors</label>
                                  <input type="checkbox" id="Accessories4" name="Accessories1" value="Accessories">

                              </li>
                              <li>
                                  <label for="Accessories2" class="lab2">Commercial Doors</label>
                                  <input type="checkbox" id="Accessories5" name="Accessories2" value="Accessories">

                              </li>
                              <li>
                                  <label for="Accessories3" class="lab2">Windows</label>
                                  <input type="checkbox" id="Accessories6" name="Accessories3" value="Accessories">

                              </li>
                            </ul>
                        </div>
                    </div> -->

                    <!-- <div class="faqbx wow slideInUp animated">
                        <div class="faqtitle"><p>Filter</p></div>
                        <div class="faqdesc">
                            <ul class="checkdiv1" id="chkdiv3">
                              <li>
                                  <label for="Accessories1" class="lab2">Filter1</label>
                                  <input type="checkbox" id="Accessories7" name="Accessories1" value="Accessories">

                              </li>
                              <li>
                                  <label for="Accessories2" class="lab2">Filter2</label>
                                  <input type="checkbox" id="Accessories8" name="Accessories2" value="Accessories">

                              </li>
                              <li>
                                  <label for="Accessories3" class="lab2">Filter3</label>
                                  <input type="checkbox" id="Accessories9" name="Accessories3" value="Accessories">

                              </li>
                            </ul>
                        </div>
                    </div>

                    <div class="faqbx wow slideInUp animated">
                        <div class="faqtitle"><p>Filter</p></div>
                        <div class="faqdesc">
                           <p>Filter</p>
                        </div>
                    </div> 
                </div>
            </div>-->
        <!-- </div> -->

        <div class="rt">
            @foreach ($results as $productFlat)
             <?php
               // echo"<pre>";print_r($results);die;
             $productBaseImage = productimage()->getProductBaseImage($productFlat);
              ?>
            <div class="search-new">
                <div class="ser-lt">
                    <a href="{{ route('shop.productOrCategory.index', $productFlat->url_key) }}" title="{{ $productFlat->name }}">
                        <img src="{{ $productBaseImage['small_image_url'] }}" onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/small-product-placeholder.png') }}'" alt="" height='190px' />
                    </a>
                </div>
                <div class="ser-rt">
                    <div class="left-now">
                        <div class="title"><strong> {{ $productFlat->name }} </strong></div>
                        <div class="subtitle"><span> {{ strip_tags($productFlat->short_description) }}</span></div>
                        <div class="total-rating"> 
                           @include ('shop::products.review', ['product' => $productFlat])
                        </div>
                        <p class="prices">Starts From <span>Rs. {{ number_format($productFlat->min_price) }}</span></p>   
                        <p class="inclu-text">Inclusive Of All Taxes.<span class="inclu-text2">Price Includes Delivery Charges & Installation</span></p>    
                    </div>

                    <div class="right-new">
                       
                       @include('shop::products.add-buttons', ['product' => $productFlat])
                       <a href="{{ route('customer.wishlist.add', $productFlat->product_id) }}" class="buy-btn wish-btn">Wishlist</a>

                    </div>
                </div> 
                <div class="clearfix"></div>
            </div>

            @endforeach

            <div class="load-sect">
                @include('ui::datagrid.pagination')
               
            </div>
        </div>
    </div>
</div>      

</section>  


        
        @endif
        @endsection

        @push('scripts')

        <script type="text/x-template" id="image-search-result-component-template">
        <div class="image-search-result">
        <div class="searched-image">
        <img :src="searched_image_url" alt=""/>
        </div>

        <div class="searched-terms">
        <h3>{{ __('shop::app.search.analysed-keywords') }}</h3>

        <div class="term-list">
        <a v-for="term in searched_terms" :href="'{{ route('shop.search.index') }}?term=' + term">
        @{{ term }}
        </a>
        </div>
        </div>
        </div>
        </script>

        <script>
        Vue.component('image-search-result-component', {

            template: '#image-search-result-component-template',

            data: function() {
                return {
                    searched_image_url: localStorage.searched_image_url,

                    searched_terms: []
                }
            },

            created: function() {
                if (localStorage.searched_terms && localStorage.searched_terms != '') {
                    this.searched_terms = localStorage.searched_terms.split('_');
                }
            }
        });
        </script>
        <script>
            $(document).ready(function(){
              $(".search-new").slice(0, 20).show();
              $("#loadMore").on("click", function(e){
                e.preventDefault();
                $(" .search-new:hidden").slice(0, 1).slideDown();
                if($(".search-new:hidden").length == 0) {
                  $("#loadMore").text("No Content").addClass("noContent");
                }
              });
              
            })
    
        </script>

        @endpush