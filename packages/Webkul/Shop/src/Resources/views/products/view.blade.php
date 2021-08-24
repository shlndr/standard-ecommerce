@extends('shop::layouts.master')

@section('page_title')
    {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
@stop

@section('seo')
    <meta name="description" content="{{ trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '') }}"/>

    <meta name="keywords" content="{{ $product->meta_keywords }}"/>

    @if (core()->getConfigData('catalog.rich_snippets.products.enable'))
        <script type="application/ld+json">
            {{ app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product) }}
        </script>
    @endif

    <?php $productBaseImage = productimage()->getProductBaseImage($product); ?>

    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:title" content="{{ $product->name }}" />

    <meta name="twitter:description" content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" />

    <meta name="twitter:image:alt" content="" />

    <meta name="twitter:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:type" content="og:product" />

    <meta property="og:title" content="{{ $product->name }}" />

    <meta property="og:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:description" content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" />

    <meta property="og:url" content="{{ route('shop.productOrCategory.index', $product->url_key) }}" />
    <link rel="stylesheet" type="text/css" href="http://demos.codexworld.com/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.css" />
@stop

@section('content-wrapper')

    {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}
    <?php
    $customer = auth()->guard('customer')->user();
    if(isset($customer) && isset($customer['zipcode']))
    {
      $zipcode = trim($customer['zipcode']); 
    }
    // print"checkkk";echo"<pre>";print_r($customer);
    ?>
    <section id="door-desigin" class="product-detail">
      <div class="container">
        <product-view>
        <div class="door-container">
            <div class="door-info mobOn">
              <div class="brochure">
                @include('shop::products.wishlist')
                <a href="" data-toggle="modal" data-target="#download" data-whatever="@mdo"> <img src="images/product-page/map.svg" alt=""></a></div>
              <div class="title"><strong> {{ $product->name }}</strong></div>
              <div class="subtitle"><span>{{ strip_tags($product->short_description) }}</span></div>
              <div class="total-rating">
               
                @include ('shop::products.review', ['product' => $product])
              </div>
              <div class="price-row">
                @include ('shop::products.price', ['product' => $product])
                
                <div class="discription">
                  <p><b style="color:#000">Inclusive of all taxes.</b>
                  <span class="subtilte"><b>Price Includes Delivery Charges & Installation</b></span></p>
                </div> 
              </div>
              <div class="row price-row other-info-pro">
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <strong>30 %</strong>
                  <div class="subtilte">Advance Payment</div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                  <strong>1 Year</strong>
                  <div class="subtilte">Warranty</div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5">
                  <strong>EMI</strong>
                  <div class="subtilte">Starts From 499 / Month</div>
                </div>
              </div>
            </div>
            
            @csrf()

            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="product_name" id="product_name" value="{{ $product->name }}">
            <input type="hidden" name="url_key" id="url_key" value="{{ $product->url_key }}">

            @include ('shop::products.view.gallery')
 
          <div class="door-info">
            <div class="deskOn">
              <div class="brochure">
              @include('shop::products.wishlist')
              <a href="" data-toggle="modal" data-target="#download" data-whatever="@mdo"> <img src="{{ asset('/themes/velocity/assets/images/product-page/map.svg')}}" alt=""></a></div>
              <div class="title"><strong> {{ $product->name }} </strong></div>
              <div class="subtitle"><span> {{ strip_tags($product->short_description) }}</span></div>
              <div class="total-rating">
                @include ('shop::products.review', ['product' => $product])
                
              </div>
              <div class="price-row">
                @include ('shop::products.price', ['product' => $product])

                <div class="discription">
                  <p><b style="color:#000">Inclusive of all taxes.</b>
                  <span class="subtilte"><b>Price Includes Delivery Charges & Installation</b></span></p>
                </div>
              </div>
              <div class="row price-row other-info-pro">
                <div class="col-sm col-md-4">
                  <strong>30 %</strong>
                  <div class="subtilte">Advance Payment</div>
                </div>
                <div class="col-sm col-md-3">
                  <strong>1 Year</strong>
                  <div class="subtilte">Warranty</div>
                </div>
                <div class="col-sm col-md-5">
                  <strong>EMI</strong>
                  <div class="subtilte">Starts From 499 / Month</div>
                </div>
              </div>
            </div>

            <div class="row1 bulk-quantity" style="display: none;">
                @php
                  $num = $product->getTypeInstance()->getPriceHtml();

                  $num = str_replace('₹','',$num);
                  $num = str_replace(',','',$num);

                  $getnum = preg_replace('#[^0-9\.]#', '', $num);                  

                  $offAmountfirst = 0.015 * $getnum;
                  $getnumfirst = $getnum - $offAmountfirst;

                  $offAmountsecond = 0.025 * $getnum;
                  $getnumsecond = $getnum - $offAmountsecond;

                  $offAmountthird = 0.035 * $getnum;
                  $getnumthird = $getnum - $offAmountthird;

                @endphp
                <div class="panel-bulk-qty">
                  <p class="clearfix heading">Bulk Quantity Discount <a href="javascript:void(0);"><img src="{{ asset('/themes/velocity/assets/images/product-page/icon-angle-double-down.png') }}" alt="arrow"></a></p>
                  <div class="slide-bulk-qty open">
                    <div class="qty-card">
                      <img src="{{ asset('/themes/velocity/assets/images/product-page/gray-check.png') }}" alt="">
                      <div class="qty">5-9</div>
                      <p class="price">₹ <?php echo $getnumfirst;?></p><p class="piece">Per piece</p>
                      <p class="discount"><span>1.50%</span> OFF</p>
                    </div>
                    
                    
                    <div class="qty-card highlight">
                      <img src="{{ asset('/themes/velocity/assets/images/product-page/green-check.png') }}" alt="">
                      <div class="qty">10-14</div>
                      <p class="price">₹ <?php echo $getnumsecond;?></p><p class="piece">Per piece</p>
                      <p class="discount"><span>2.50%</span> OFF</p>
                    </div>
                    <div class="qty-card">
                      <img src="{{ asset('/themes/velocity/assets/images/product-page/gray-check.png') }}" alt="">
                      <div class="qty">15-20</div>
                      <p class="price">₹ <?php echo $getnumthird;?></p><p class="piece">Per piece</p>
                      <p class="discount"><span>3.50%</span> OFF</p>
                    </div>
                  </div>
                </div>
              </div>

            <div class="modeldescription"></div> 
            @include ('shop::products.view.configurable-options')
            @include ('shop::products.view.attributes')
            
            <div class="shwdoortype"></div>
            
          </div>
        </div>
        <!-- door container end hear -->
        <!-- .door-container .door-info -->
        <div id="code-pin" class=" door-container">
          <div class="pin-code">
            <div class="flex-container">
              <div class="pincode-box">
                <div class="input-group">
                  <input type="text" class="form-control" id="chkpincode" name="text" placeholder="City / Pin Code"> <span
                    class="input-group-btn">
                    <button class="btn btn-default" onClick="getzipcode()" type="button"><img src="{{ asset('/themes/velocity/assets/images/product-page/arrow-left.svg') }}" alt=""></button>
                  </span>
                </div>
              </div>
              <div class="emi-box" style="display:none;">
                    <div class="wish-r wish-n"><p class="wish-text">Quantity</p><div class="from-box"><form id="myform" method="POST" class="quantity" action="#"><input type="button" value="-" class="qtyminus minus" field="quantity"><input type="text" name="quantity" value="5" class="qty" min="5" max="20"><input type="button" value="+" class="qtyplus plus" field="quantity"></form></div></div>            
              </div>
            </div>
            <!-- <div class="confirmlocation">Whoa! We Deliver To Your Location!!</div> -->
            <div class="confirmlocation"></div>
          </div>
          <div class="door-info">
            <div class="flex-container cartbtn">
                              
            </div>
          </div>
        </div>
        <!-- <div class="confirmlocation">Whoa! We Deliver To Your Location!!</div> -->
        <div class="note-text">     
          <ul>
           <li>Architrave And Threshold Available For Doors Free Of Cost On Request. Kindly Specify Requirement At The Time Of Booking.</li>
                <li> Not Sure About Size, Our Experts Will Get In Touch With You.</li>
          <li>Guranteed Money Back Within Seven Days.</li>
          </ul>     
          </div>
          </product-view>
      </div>

    </section>
    <!-- Table content  -->

    

    <section class="tabbed-content">
    <nav class="tabs">
      <div class="container">
        <ul>
          <li><a href="#tab1" class="active">Product Description</a></li>
          <li><a href="#tab2">Technical Specification</a></li>
          <li><a href="#tab3">Reviews & Ratings</a></li>
          <li><a href="#tab4">FAQ’s</a></li>
        </ul>
      </div>
    </nav>
    <div id="tab1" class="item active" data-title="Product Description">
      <div class="item-content">
        <div class="product-info" id="product-discription">
          <div class="container">
            <div class="title">Product Description</div>
            <p class="discription">{{ strip_tags($product->description) }}</p>
            <div class="flex-container product-discription">
              <div class="flex-item">
                <img src="{{ asset('/themes/velocity/assets/images/product-page/disc-i-1.svg') }}" alt="">
                <p>Match With The Decor Of Your House</p>
              </div>
              <div class="flex-item">
                <img src="{{ asset('/themes/velocity/assets/images/product-page/disc-i-2.svg') }}" alt="">
                <p>Strength &amp; Durable</p>
              </div>
              <div class="flex-item">
                <img src="{{ asset('/themes/velocity/assets/images/product-page/disc-i-3.svg') }}" alt="">
                <p>Termite & Fire Resistant</p>
              </div>
              <div class="flex-item">
                <img src="{{ asset('/themes/velocity/assets/images/product-page/disc-i-4.svg') }}" alt="">
                <p>Maintenance Free</p>
              </div>
              <div class="flex-item">
                <img src="{{ asset('/themes/velocity/assets/images/product-page/disc-i-5.svg') }}" alt="">
                <p>Pocket Friendly</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="tab2" class="item" data-title="Technical Specification">
      <div class="item-content">
        <div class="product-info" id="technical-specification">
          <div class="container">
            <div class="tech-title title">technical specification</div>
              <p class="discription"><?php echo html_entity_decode($product->TechnicalSpecification) ;?>
              </p>
          </div>
        </div>
      </div>
    </div>
    <div id="tab3" class="item" data-title="Reviews & Ratings">
      <div class="item-content">
        <div class="product-info">
          <div class="for-trangle" id="reviewandrating">
            <div class="container">
              
                @include ('shop::products.view.reviews')
              
            </div>
            <!-- <img src="{{ asset('/themes/velocity/assets/images/product-page/trangle-left.png') }}" class="left" alt=""> -->
            <!-- <img src="{{ asset('/themes/velocity/assets/images/product-page/trangle-right.png') }}" class="right" alt=""> -->
          </div>
        </div>
      </div>
    </div>
    <div id="tab4" class="item" data-title="FAQ’s">
      <div class="item-content">
        <div class="faqs">
          <div class="container">
            <h2>
              <strong>Frequently Asked Questions</strong>
              <a href="#" class="btn-blue">View All</a>
            </h2> 
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <i class="more-less glyphicon glyphicon-plus"></i>
                      How to book Tata Pravesh doors and what are the payment options available?
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                      One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
                  </div>
                </div>
              </div>
              <div class="panel panel-default in">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <i class="more-less glyphicon glyphicon-plus"></i>
                      Can I cancel my order?
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                     One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <i class="more-less glyphicon glyphicon-plus"></i>
                      Can I change or modify my order after placing it?
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                     One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFour">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      <i class="more-less glyphicon glyphicon-plus"></i>
                      Can I get the size Tata Pravesh door(s) customised as per my requirement(s)?
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                  <div class="panel-body">
                     One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading5">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                      <i class="more-less glyphicon glyphicon-plus"></i>
                      Tata Pravesh doors are available in how many sizes?
                    </a>
                  </h4>
                </div>
                <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                  <div class="panel-body">
                     One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading6">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                      <i class="more-less glyphicon glyphicon-plus"></i>
                      Can I get a refund on the booking amount?
                    </a>
                  </h4>
                </div>
                <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                  <div class="panel-body">
                     One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading7">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                      <i class="more-less glyphicon glyphicon-plus"></i>
                      How do I get a Tata Pravesh Door installed?
                    </a>
                  </h4>
                </div>
                <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                  <div class="panel-body">
                     One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading8">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                      <i class="more-less glyphicon glyphicon-plus"></i>
                      How long will it take for my door to get delivered?
                    </a>
                  </h4>
                </div>
                <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                  <div class="panel-body">
                     One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading9">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
                      <i class="more-less glyphicon glyphicon-plus"></i>
                      What is the right size of the wall opening to be kept for installing Tata Pravesh Door?
                    </a>
                  </h4>
                </div>
                <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
                  <div class="panel-body">
                     One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
                  </div>
                </div>
              </div>
            </div><!-- panel-group -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="relatedproducts">
      <div class="container">
        <div class="flex-container">
          <div class="title">Related Products</div>
        </div>
      </div>
      <div class="relate-container">
        <div class="owl-carousel owl-theme">
          
          @include ('shop::products.view.individual-product-related')
        </div>
      </div>
    </section>
    <section class="helpandsupport">
      <div class="container">
        <div class="flex-container contact-info">
          <div class="flex-item">
            <img src="{{ asset('/themes/default/assets/images/fusion-door-payment/support.png') }}" alt="">
            <div class="header">PHONE </div>
            <div class="title">SUPPORT</div>
            <p>Speak directly to a member of our support team</p>
            <a href="tel:18004199200" class="number">1800 4199 200</a>
          </div>
          <div class="flex-item">
            <img src="{{ asset('/themes/default/assets/images/fusion-door-payment/chat.png') }}" alt="">
            <div class="header">LIVE </div>
            <div class="title">CHAT</div>
            <p>Neque porro quisquam est qui dolorem ipsum quia</p>
            <a href="" class="footer-btn btn btn-default">CHAT WITH US</a>
          </div>
 <!--          <div class="flex-item">
            <img src="{{ asset('/themes/default/assets/images/fusion-door-payment/whatsapp.png') }}" alt="">
            <div class="header">TALK WITH US ON</div>
            <div class="title">Whatsapp</div>
            <p>Neque porro quisquam est qui dolorem ipsum quia</p>
            <a href="" class="footer-btn btn btn-default">TALK WITH US</a>
          </div> -->
          <div class="flex-item">
            <img src="{{ asset('/themes/default/assets/images/fusion-door-payment/mail.png') }}" alt="">
            <div class="header">ESCALATION</div>
            <div class="title">Mail us</div>
            <p>Neque porro quisquam est qui dolorem ipsum quia</p>
            <a href="" class="footer-btn btn btn-default">EMAIL TO US</a>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="reviewmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- <div class="modal-header"> -->
        <button type="button" class="close review-close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <!-- <h4 class="modal-title" id="exampleModalLabel">New message</h4>
        </div> -->
        <div class="modal-body">
          <!-- <form>
            <div class="form-group">
              <label for="message-text" class="control-label">SUBMIT PRODUCT REVIEW:</label>
              <textarea rows="4" class="form-control" id="message-text" placeholder="Review Description"></textarea>
            </div>
            <div class="upload-label">Upload Images</div>
            <div class="flex-container button-images">
              <button type="button" class="btn btn-primary images-camera ml-3">Camera <img src="{{ asset('/themes/velocity/assets/images/product-page/camera-icon.svg') }}"
                  alt=""></button>
              <button type="button" class="btn btn-primary images-gallery ml-3">Gallery <img
                  src="{{ asset('/themes/velocity/assets/images/product-page/gallary-icon.svg') }}" alt=""></button>
            </div>
            <div class="flex-container start-rating-module">
              <div class="star">
                
                <input type="number" name="your_awesome_parameter" id="rating1" class="rating" />
              </div>
              <div class="userrating">Your Rating For This Product 4 <span class="fa fa-star checked"></span>
              </div>
            </div>
          </form> -->
          <form method="POST" action="{{ route('shop.reviews.store', $product->product_id ) }}">
                    @csrf
                    <div class="form-group">
                      <label for="message-text" class="control-label">SUBMIT PRODUCT REVIEW:</label>
                      
                    </div>
                    
                    <!-- <div class="heading mt-10 mb-25">
                        <span>{{ __('shop::app.reviews.write-review') }}</span>
                    </div> -->

                    <div class="control-group" :class="[errors.has('rating') ? 'has-error' : '']">
                        <label for="title" class="required">
                            {{ __('admin::app.customers.reviews.rating') }}
                        </label>
                        <div class="flex-container start-rating-module">
                          <div class="star">
                            <!-- rating module -->
                            <input type="number" name="rating" id="rating" class="rating" min="1"/>
                          </div>
                          <div class="userrating">Your Rating For This Product  <span class="selfrating"></span><span class="fa fa-star checked"></span>
                          </div>
                        </div>

                        <!-- <input type="hidden" id="rating" name="rating"> -->

                        <div class="control-error" v-if="errors.has('rating')">@{{ errors.first('rating') }}</div>
                    </div>

                    <div class="control-group" :class="[errors.has('title') ? 'has-error' : '']">
                        <label for="title" class="required">
                            {{ __('shop::app.reviews.title') }}
                        </label>
                        <input  type="text" class="control" name="title" v-validate="'required'" value="{{ old('title') }}">
                        <span class="control-error" v-if="errors.has('title')">@{{ errors.first('title') }}</span>
                    </div>

                    @if (core()->getConfigData('catalog.products.review.guest_review') && ! auth()->guard('customer')->user())
                        <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                            <label for="title" class="required">
                                {{ __('shop::app.reviews.name') }}
                            </label>
                            <input  type="text" class="control" name="name" v-validate="'required'" value="{{ old('name') }}">
                            <span class="control-error" v-if="errors.has('name')">@{{ errors.first('name') }}</span>
                        </div>
                    @endif

                    <div class="control-group" :class="[errors.has('comment') ? 'has-error' : '']">
                        <label for="comment" class="required">
                            {{ __('admin::app.customers.reviews.comment') }}
                        </label>
                        <textarea type="text" class="control" name="comment" v-validate="'required'" value="{{ old('comment') }}">
                        </textarea>
                        <span class="control-error" v-if="errors.has('comment')">@{{ errors.first('comment') }}</span>
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary">
                        {{ __('shop::app.reviews.submit') }}
                    </button>

                </form>
          <!-- <button type="button" class="btn btn-primary submit-review">SUBMIT</button> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for Lead Form     -->
  
  <div class="modal fade" id="leadform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog enquire-now" role="document">
      <div class="modal-content content">
        <div class="modal-body heading">
          <button type="button" class="close review-close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>

        
        <!-- <div class="enquire-now">           
            <div class="content">               
                
                <div class="heading"> -->
                  
                  <!-- <h2>Enter lead details</h2> -->
                      <form method="post" action="{{ url('/lead-form') }}">
                      {{ csrf_field() }} 
                        <div class="from-grop">
                          <div class="input-field2">
                            <label for="">Name</label>
                            <input type="text" placeholder="" name="name" id="name" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g)" required="">
                          </div>
                          <div class="input-field2">
                            <label for="">Email ID</label>
                            <input type="email" placeholder="" name="email" v-validate="'required|email'" id="email2">
                          </div>
                          <div class="input-field2">
                            <label for="">Zip Code</label>
                            <input type="text" placeholder="" name="pincode" id="pin2" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required="">
                          </div>
                          <div class="input-field2">
                            <label for="">Mobile Number</label>
                            <input type="text" placeholder="" name="phone" id="phone2" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength ="10" required="">
                          </div>
                          <div class="input-field3">
                            <label for="">Message</label>
                            <textarea name="message" maxlength="32000" placeholder=""></textarea>
                          </div>
                          <input type="hidden" name="product_name" value="{{ $product->name }}">
                          <input type="hidden" name="product_quantity" id="product_quantity" value="5">
                          <div class="input-field4">
                            <div class="btn-sect">
                              <button class="cancel-btn" type="button" data-dismiss="modal">CANCEL</button>
                              <button class="sub-btn" type="button">SUBMIT</button>
                            </div>
                          </div>
                        </div>
                      </form>
                <!-- </div>
                
            </div>
        </div> -->
     
        </div>
      </div>
    </div>
  </div>

  <!--  Lead form end  -->
  <!-- ===========model for rating ================== -->

  <!-- ===========model for doenload brochure ================== -->
   <div class="modal fade" id="download" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close review-close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
          <p class="title">Download Brochure</p>
          <p class="subtilte">Looking For Advice To Choose The Right Doors And Windows? Reach Out To Us! Our Executive Will Get Back To You Very Soon.</p>
          <form action="" id="dwnBrochure" novalidate="novalidate">
            <div class="form-group">
              <input type="text" placeholder="Name*" name="fName" id="fName" required onkeypress="return onlyCharacters(event);" maxlength="80">
            </div>
            <div class="form-group">
              <input type="text" placeholder="Mobile No*" name="phone" id="phone" required onkeypress="return onlyNumbersAndPlus(event);" maxlength="20">
            </div>
            <div class="form-group">
              <input type="text" placeholder="Email Addess*" name="email" id="email" maxlength="80">
            </div>
            <div class="form-group">
              <input type="text" placeholder="Pincode*" name="pin" id="pin" required onkeypress="return onlyNumbersAndPlus(event);" maxlength="7">
            </div>
            <div class="form-group nomargin">
              <select name="category" id="category">
                <option value="">Select Product*</option>
                <option value="{{ $product->name }}" selected>{{ $product->name }}</option>
              </select>
            </div>
            <div class="termcnd">
              <div class="check-lt clearfix chkbx">
                     <input class="styled-checkbox" id="styled-checkbox-5" type="checkbox" value="value4" name="tnc" checked>

                      <label for="styled-checkbox-5">
            <p>Yes, I would like to receive call from tata pravesh expert.</p></label>
                      <p class="chkeror" style="margin-top:5px;"></p>
                    </div>
                           <div class="check-rt" id="loader_img">
                              <button type="submiy" id="sub" class="green-btn"> Download</button>
                           </div>
                        </div>
                        <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
  </div>  
  <!-- ===========model for doenload brochure ================== -->

  <!-- ===========model for register ================== -->
<!-- <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close review-close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>

           
      <section class="log-sign" style="float: none;">
        <div class="container">           
            <div class="login-box" style="width: 100%;">               
                
                <div class="signupform">
                  <div class="sign-up-text" style="text-align:center;">
                      {{ __('shop::app.customer.signup-text.account_exists') }} - {{ __('shop::app.customer.signup-text.title') }}
                  </div>
                  <h2>Create Account</h2>
                <form id="frm_register" name="frm_register">
                {{ csrf_field() }}

                <input type="text" class="log-input" placeholder="First Name" name="first_name" onkeypress="return onlyCharacters(event);" value="" style="width:49%" required>
               
                <input type="text" class="log-input" placeholder="Last Name" name="last_name"  value="" style="width:49%" onkeypress="return onlyCharacters(event);" required>

                <input type="email" class="log-input" placeholder="Email" name="email" value="" style="width:49%" required>

                <input type="text" class="log-input" placeholder="Zipcode" name="zipcode"  value="" style="width:49%" required>

                <input type="text" class="log-input" placeholder="Mobile Number" name="phone"  value="" style="width:49%" >
                
                <input type="password" class="log-input" placeholder="Password" name="password" min-length="6" ref="password" value="" style="width:49%">
                
                <div class="errorreg" style="color:red"></div>

                <button class="sub-btn0" type="button" onclick="register()">
                    {{ __('shop::app.customer.signup-form.button_title') }}
                </button>

                
                    
                </form>
                </div>
                <div class="loginform">
                 <div class="log-in-text" style="text-align:center;">
                    {{ __('shop::app.customer.login-text.no_account') }} - {{ __('shop::app.customer.login-text.title') }}
                </div>
                <h2>Customer Login</h2>
                <form name="frm_login" id="frm_login">
                    {{ csrf_field() }}
                                      
                    <input type="text" data-name="Email" placeholder="Your Email" class="log-input" name="email" v-validate="'required|email'" style="width:49%" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.login-form.email') }}&quot;">
                  
                    

                    <input type="password" data-name="password" placeholder="Password" v-validate="'required|min:6'" class="log-input" style="width:49%" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.sessions.password') }}&quot;" value=""/>
                    

                    <div class="errorcreds" style="color:red"></div>
                    

                    <input class="sub-btn0" type="button" onclick="login()" value="{{ __('shop::app.customer.login-form.button_title') }}">

                    

                    <a href="{{ route('customer.forgot-password.create') }}" class="forgot">Forgot your password?</a>

                    <div class="mt-10">
                        @if (Cookie::has('enable-resend'))
                            @if (Cookie::get('enable-resend') == true)
                                <a href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                            @endif
                        @endif
                    </div>

                </form>
                </div>
            </div>
        </div>
      </section>

        </div>
      </div>
    </div>
  </div> -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="width: 70% !important;margin: 30px auto;">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close review-close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>

<div id="signinform" class="">
  <!-- <div class="popup_close fade_close" title="Close" aria-label="Close" id="closepopup2"><span aria-hidden="true" class="closePop">×</span></div> -->
  <div class="enquire-now">
    <div class="content">
      <div class="heading"> 
      <div class="login-window sign-in">
            <div class="tbl">
                <div class="poster"><!--<img src="images/sign-in.png" alt="">--></div>
            </div>
            <div class="tbl">
                <h1>Welcome to Tata Pravesh</h1>
                <p>India's only High Security Doors & Windows Manufacturer<br>
                with wide range of Variety</p>
                <form action="{{ route('customer.session.create') }}" method="post" id="login" novalidate="novalidate" class="login-form">
                    {{ csrf_field() }}
                <div class="input-row">
                    <input type="text" name="phone" id="phone" placeholder="User id / Mobile No." max-length="10" required class="log-input">
                    <img src="{{ asset('/themes/default/assets/images/user-check.png') }}" alt="" class="icon user-check">
                    <label class=""><a class="sendotp">Send otp</a> </label>
                    <div class="cf"></div>
                  </div>
                <div class="input-row otpsection" style="display:none">
                    <input type="password" name="pwd" placeholder="Password / OTP" max-length="4" required class="log-input">
                    <input type="hidden" name="password" value="1234">
                    <!--<img src="images/icon-eye-off.png" alt="" class="icon eye-off">-->
                    <i class="fa fa-eye-slash icon eye-off" id="togglePassword"></i>
                    <label class=""><a class="resend">Forgot password?</a></label>
                    <div class="cf"></div>
                    <!-- <a class="resend">Forgot password?</a> -->
                  </div>
                <div class="input-row flx chek">
                    <div class="checkbox">
                    <label>
                        <input type="checkbox">
                        Remember me</label>
                  </div>
                    <input name="submit" type="submit" id="contactBtn" class="sub-btn0 signup">
                  </div>
                <div class="input-row flx flx2">
                    <button name="google-signup" class="sub-btn0 gsignup"><img src="{{ asset('/themes/default/assets/images/google-icon.svg') }}" alt="">sign up google</button>
                    <button name="fb-signup" class="sub-btn0 fsignup"><img src="{{ asset('/themes/default/assets/images/fb-icon.svg') }}" alt="">sign up facebook</button>
                  </div>
                <p class="login-link">Don't have account? <a href="#" class="login-link sign-up-text">Sign Up</a></p>
              </form>
              </div>
          </div>
        
        
      </div>
    </div>
  </div>
</div>

  <div id="signupform" class="">
  <!-- <div class="popup_close fade_close" title="Close" aria-label="Close" id="closepopup2"><span aria-hidden="true" class="closePop">×</span></div> -->
  <div class="enquire-now">
    <div class="content">
      <div class="heading"> 
      <div class="login-window sign-up">
            <div class="tbl">
                <div class="poster"></div>
            </div>
            <div class="tbl">
                <h1>Welcome to Tata Pravesh</h1>
                <p>India's only High Security Doors & Windows Manufacturer<br>
                with wide range of Variety</p>
                <form action="{{ route('customer.register.create') }}" method="post" id="login" novalidate="novalidate" class="login-form">
                    {{ csrf_field() }}
                <div class="input-row">
                    <input type="text" name="name" placeholder="Enter Your Name" class="log-input" required>
                  </div>
                <div class="input-row">
                    <input type="text" name="phone" id="phone" max-length="10" placeholder="Enter Your Mobile No." class="log-input phone ">
                    <img src="{{ asset('/themes/default/assets/images/phone-circle-arrow.svg') }}" alt="" class="icon phone-circle"> </div>
                <div class="input-row flx otpsection" style="display:none;">
                    <div class="otp">
                    <label>Enter your otp</label>
                    <div id="otp" class="flex justify-center otp-no align-items-center">
                        <input class="m-2 text-center form-control otpbox" type="text" id="first" maxlength="1" />
                        <input class="m-2 text-center form-control otpbox" type="text" id="second" maxlength="1" />
                        <input class="m-2 text-center form-control otpbox" type="text" id="third" maxlength="1" />
                        <input class="m-2 text-center form-control otpbox" type="text" id="fourth" maxlength="1" />
                      </div>
                    <label class="m0"><a class="resend">Resend otp</a></label>
                    <input type="hidden" class="getotp" value="" />
                  </div>
                    <input name="submit" type="submit" id="contactBtn" class="sub-btn0 signup">
                  </div>
                <div class="input-row flx flx2">
                    <button name="google-signup" class="sub-btn0 gsignup"><img src="{{ asset('/themes/default/assets/images/google-icon.svg') }}" alt="">sign up google</button>
                    <button name="fb-signup" class="sub-btn0 fsignup"><img src="{{ asset('/themes/default/assets/images/fb-icon.svg') }}" alt="">sign up facebook</button>
                  </div>
                <p class="login-link">Already have account? <a href="#" class="login-link log-in-text">Sign in</a></p>
              </form>
              </div>
          </div>
        
        
      </div>
    </div>
  </div>
</div>



</div>
      </div>
    </div>
  </div>
  <!-- ===========model for register ================== -->
    

    {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}
@endsection

@push('scripts')

<script src="http://demos.codexworld.com/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.js"></script>
    <script type="text/x-template" id="product-view-template">
        <form method="POST" id="product-form" action="{{ route('cart.add', $product->product_id) }}" @click="onSubmit($event)">

            <input type="hidden" name="is_buy_now" v-model="is_buy_now">

            <slot></slot>

        </form>
    </script>
    
    <script type="text/x-template" id="quantity-changer-template">
        <div class="quantity control-group" :class="[errors.has(controlName) ? 'has-error' : '']">
            <label class="required">{{ __('shop::app.products.quantity') }}</label>
            <span class="quantity-container">
                <button type="button" class="decrease" @click="decreaseQty()">-</button>

                <input :name="controlName" class="control" :value="qty" :v-validate="validations" data-vv-as="&quot;{{ __('shop::app.products.quantity') }}&quot;" readonly>

                <button type="button" class="increase" @click="increaseQty()">+</button>

                <span class="control-error" v-if="errors.has(controlName)">@{{ errors.first(controlName) }}</span>
            </span>
        </div>
    </script>

    <script>

        Vue.component('product-view', {

            template: '#product-view-template',

            inject: ['$validator'],

            data: function() {
                return {
                    is_buy_now: 0,
                }
            },

            methods: {
                onSubmit: function(e) {                   

                    var this_this = this;

                    this.$validator.validateAll().then(function (result) {

                        if (result) {
                            this_this.is_buy_now = e.target.classList.contains('buynow') ? 1 : 0;

                            setTimeout(function() {
                                document.getElementById('product-form').submit();
                            }, 0);
                        }
                        else
                        {
                            this_this.is_buy_now = e.target.classList.contains('buynow') ? 1 : 0;
                        }
                    });
                }
            }
        });

        Vue.component('quantity-changer', {
            template: '#quantity-changer-template',

            inject: ['$validator'],

            props: {
                controlName: {
                    type: String,
                    default: 'quantity'
                },

                quantity: {
                    type: [Number, String],
                    default: 1
                },

                minQuantity: {
                    type: [Number, String],
                    default: 1
                },

                validations: {
                    type: String,
                    default: 'required|numeric|min_value:1'
                }
            },

            data: function() {
                return {
                    qty: this.quantity
                }
            },

            watch: {
                quantity: function (val) {
                    this.qty = val;

                    this.$emit('onQtyUpdated', this.qty)
                }
            },

            methods: {
                decreaseQty: function() {
                    if (this.qty > this.minQuantity)
                        this.qty = parseInt(this.qty) - 1;

                    this.$emit('onQtyUpdated', this.qty)
                },

                increaseQty: function() {
                    this.qty = parseInt(this.qty) + 1;

                    this.$emit('onQtyUpdated', this.qty)
                }
            }
        });

        $(document).ready(function() {
            var addTOButton = document.getElementsByClassName('add-to-buttons')[0];
            document.getElementById('loader').style.display="none";
            addTOButton.style.display="flex";

            

        });

        window.onload = function() {
            var thumbList = document.getElementsByClassName('thumb-list')[0];
            var thumbFrame = document.getElementsByClassName('thumb-frame');
            var productHeroImage = document.getElementsByClassName('product-hero-image')[0];

            if (thumbList && productHeroImage) {

                for(let i=0; i < thumbFrame.length ; i++) {
                    thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                    thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                }

                if (screen.width > 720) {
                    thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.height = productHeroImage.offsetHeight + "px";
                }
            }

            window.onresize = function() {
                if (thumbList && productHeroImage) {

                    for(let i=0; i < thumbFrame.length; i++) {
                        thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                        thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                    }

                    if (screen.width > 720) {
                        thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.height = productHeroImage.offsetHeight + "px";
                    }
                }
            }
        };
    </script>
    <script type="application/javascript">
$(document).ready(function(){
$('#signupform .phone-circle').click(function(){
    
    var APP_URL = {!! json_encode(url('/')) !!}
    var mobile = $('#signupform #phone').val();
    if(mobile.length == 10 && mobile !='')
    {
        $.ajax({
                  url: APP_URL+"/checkmobileexist",
                  type:"GET",                                    
                  data:{                                    
                    param:mobile
                  },
                  beforeSend: function (request) {
                    
                    },
                  success:function(response){                   
                    
                    
                    if(response.success == 1)
                    {                        
                         $('#signupform .otpsection').css('display','none');  
                         alert('This number is already used.Try another one.')                 
                    }
                    else
                    {
                        $('#signupform .otpsection').css('display','flex');
                        $('.getotp').val(response.otp);
                    }
                        
                   
                  },
                 });
    }
    else
    {
        alert('Enter valid mobile number.')
        return false;
    }

});
});
</script>
<script type="application/javascript">
$(document).ready(function(){
getcategory();
$('.otpbox').keyup(function(){
    if(this.value.length==$(this).attr("maxlength")){
        $(this).next().focus();
    }
});
$('#signinform .sendotp').click(function(){
    var mobile = $('#signinform #phone').val();
    if(mobile.length == 10 && mobile !='')
    {
        $('#signinform .otpsection').css('display','block');
    }
    else
    {
        alert('Enter valid mobile number.')
        return false;
    }

});

    $('.panel-bulk-qty p').click(function(){
      $('.panel-bulk-qty p a').toggleClass('open');
      $('.slide-bulk-qty').fadeToggle(100);
    });

        
});
</script> 

<script>
  
  jQuery(document).ready($ => {
      $('.quantity').on('click', '.plus', function (e) {
        let $input = $(this).prev('input.qty');
        let val = parseInt($input.val());
        $input.val(val + 1).change();
        $('#leadform #product_quantity').val(val + 1);
      });

      $('.quantity').on('click', '.minus',
      function (e) {
        let $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        if (val > 5) {
          $input.val(val - 1).change();
          $('#leadform #product_quantity').val(val - 1);
        }
      });
    }); 
</script>


    <script type="text/javascript">

    
    function login()
    {
      var APP_URL = {!! json_encode(url('/')) !!}
      $('.errorcreds').html('');
      var email = $("#frm_login input[name=email").val();    
      if(email == '')
      {
        alert('Enter email');
        return false;
      }                 
      var password = $("#frm_login input[name=password").val();  
      if(password == '')
      {
        alert('Enter password');
        return false;
      }                   
      var data = $('#frm_login').serialize();
              // console.log(textboxval);
            $.ajax({
                  url: APP_URL+"/login",
                  type:"POST",                                    
                  data:data,
                  beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                  success:function(response){
                    
                  console.log(response);
                  if(response == 1)
                  {
                    location.reload();
                  }
                  else
                  {
                    $('.errorcreds').html('Username or Password is incorrect.Please check');
                  }
                   
                  },
                 });
    }

    function register()
    {
      var APP_URL = {!! json_encode(url('/')) !!}
      $('.errorreg').html('');
      var first_name = $("#frm_register input[name=first_name").val();    
      var last_name = $("#frm_register input[name=last_name").val();    
      var email = $("#frm_register input[name=email").val();    
      var zipcode = $("#frm_register input[name=zipcode").val();    
      var phone = $("#frm_register input[name=phone").val();    
      var password = $("#frm_register input[name=password").val();   
      if(first_name == '' && last_name == '' && email == '' && zipcode == '' && phone == '' && password == '')
      {
        alert('Please fill all details');
        return false;
      } 
      if(password.length < 6)
      {
        alert('Password length should atleast 6 characters.');
        return false;
      }                  
      var data = $('#frm_register').serialize();
              // console.log(textboxval);
            $.ajax({
                  url: APP_URL+"/register",
                  type:"POST",                                    
                  data:data,
                  beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                  success:function(response){
                    
                  console.log(response);
                  if(response == 1)
                  {
                    location.reload();
                  }
                  else
                  {
                    $('.errorreg').html('This email is already taken.Please try different email.');
                  }
                   
                  },
                 });
    }
    
    function onlyNumbersAndPlus(evt) {
      // alert(evt);
             var e = window.event || evt; // for trans-browser compatibility
         
             var charCode = e.which || e.keyCode;
         
             if (charCode > 31 && (charCode < 45 || charCode > 57) && charCode != 43)
                 return false;
         
             return true;
         }
         
         function onlyCharacters(evt) {
             var e = window.event || evt; // for trans-browser compatibility
         
             var charCode = e.which || e.keyCode;
             //alert(charCode);
         
             if (charCode < 65 && charCode < 123)
                 return false;
         
             return true;
         }
    function getcategory()
    {
      // console.log('category listed');
      var APP_URL = {!! json_encode(url('/')) !!}
            var textboxval = '<?php echo $product->id;?>';                        
              // console.log(textboxval);
            $.ajax({
                  url: APP_URL+"/getCategoryByProduct",
                  type:"GET",                                    
                  data:{                                    
                    param:textboxval
                  },
                  beforeSend: function (request) {
                    },
                  success:function(response){
                    
                    var html = '';
                    
                    var zipcode = '';
                    '<?php if(isset($zipcode)){?>';
                     zipcode =  '<?php echo $zipcode;?>';
                     '<?php } ?>';
                     
                     if(zipcode != '')
                     {
                      
                        if(response.category_id == 3)
                        {
                          html = '<a href="" data-toggle="modal" data-target="#leadform" data-whatever="@mdo"><button type="button" class="btn btn-default regbuynow" style="width:200px;padding:14px;font-size:17px;font-weight:600;margin-right: 12px;background-color: #2d68c4;color: #fff;">Submit</button> </a>';

                         $('.emi-box').css('display','block');

                          $('.bulk-quantity').css('display','block');
                        }
                        else
                        {
                          html = '<button type="submit" class="btn btn-default buynow">Buy Now</button><button type="submit" class="btn btn-default addtocart">Add To Cart</button>';
                        }

                     }
                     else
                     {
                        if(response.category_id == 3)
                        {
                          html = '<a href="" data-toggle="modal" data-target="#leadform" data-whatever="@mdo"><button type="button" class="btn btn-default regbuynow" style="width:200px;padding:14px;font-size:17px;font-weight:600;margin-right: 12px;background-color: #2d68c4;color: #fff;">Submit</button> </a>';


                          $('.emi-box').css('display','block');

                          $('.bulk-quantity').css('display','block');

                        }
                        else
                        {
                          html = '<a href="" data-toggle="modal" data-target="#register" data-whatever="@mdo"><button type="button" class="btn btn-default buynow" style="width:100%;margin-right: 100px;background-color: #2d68c4;color: #fff;">Buy Now</button> </a><a href="" data-toggle="modal" data-target="#register" data-whatever="@mdo"><button type="button" class="btn btn-default addtocart" style="width:100%;margin-right: 10px;background-color: #2d68c4;color: #fff;">Add to Cart</button> </a>';
                        }
                        
                      
                     }
                  
                    $('.cartbtn').append(html);
                   
                  },
                 });
        }
    </script>
    <script type="text/javascript">
// Cookie functionality Start
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        //console.log(ca);
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    setTimeout(function(){ 
     
      var value = readCookie('productname');
      var value1 = readCookie('image');     
      var url = readCookie('producturl');     
      var amount = readCookie('price');     
      
      var imageArr = [];
      var productArr = [];
      var urlArr = [];
      var priceArr = [];
      var cookieUrlArr = [];
      var cookieImageArr = [];
      var cookieProductArr = [];
      var cookieProductPriceArr = [];

      // console.log(value);
      if(value != null)
      {
        cookieProductArr = value.split(",");
      }

      if(value1 != null)
      {
        cookieImageArr = value1.split(",");
      }

      if(url != null)
      {
        cookieUrlArr = url.split(",");
      }
      
      if(amount != null)
      {
        cookieProductPriceArr = amount.split(",");
      }
      
      
      if(cookieImageArr.length > 0 )
      {
        imageArr.push(value1);
      }

      if(cookieProductArr.length > 0 )
      {
        productArr.push(value);
      }

      if(cookieUrlArr.length > 0 )
      {
        urlArr.push(url);
      }   

      if(cookieProductPriceArr.length > 0 )
      {
        priceArr.push(amount);
      }      

      var image = document.getElementById('pro-img'); 
      var productname = document.getElementById("product_name");
      var urlkey = document.getElementById("url_key");
      var price = document.getElementById("actual_amount");
       //console.log(productname);
      if(productname != null && image != null && price != null)
      {
        if(!cookieImageArr.includes(image.src))
        {
          imageArr.push(image.src);
        }

        if(!cookieProductArr.includes(productname.value))
        {
          productArr.push(productname.value);
        }

        if(!cookieUrlArr.includes(urlkey.value))
        {
          urlArr.push(urlkey.value);
        }

        if(!cookieProductPriceArr.includes(price.value))
        {
          priceArr.push(price.value);
        }
      }
      
      imageArr.join();
      productArr.join();
      urlArr.join();
      priceArr.join();
      $('.ms-options-wrap button').html("Accessory List");
      
      
      //Delete Cookie
        // document.cookie = "productname=;max-age=0";
        // document.cookie = "image=;max-age=0";
        // document.cookie = "producturl=;max-age=0";
        // document.cookie = "price=;max-age=0";
      //Delete cookie end

      document.cookie = "productname="+productArr;
      document.cookie = "image="+imageArr;
      document.cookie = "producturl="+urlArr;
      document.cookie = "price="+priceArr;

    }, 3000);

  // Cookie functionality end
    $(document).ready(function() {

      $('.clsaccess').multiselect({
    columns: 1,
    placeholder: 'Select Accessories'
});
      // $('.buynow').prop('disabled',true);
      // $('.addtocart').prop('disabled',true);
      // $("input.group1").attr("disabled", true);
      $('.default input[type="checkbox"]').attr("disabled", true);
      

    
     $('#register #signinform').hide();
        tabControl();
        
        var resizeTimer;
        $(window).on('resize', function(e) {
          clearTimeout(resizeTimer);
          resizeTimer = setTimeout(function() {
            tabControl();
          }, 250);
        });

        $("#door-style.owl-carousel").owlCarousel({
          margin: 5,
          loop: false,
          autoplay: false,
          // autoHeight: true,
          // autoplayHoverPause: true,
          autoplayTimeout: 8000,
          smartSpeed: 1500,
          nav: false,
          dots: false,
          // center: true,
          startPosition: 2,
          responsiveClass: true,
          responsive: {
            0: {
              items: 6,
              touchDrag: true,
            },
            600: {
              items: 6,
              touchDrag: true,
            },
            800: {
              items: 6,
              touchDrag: true,
            },
            992: {
              items: 6,
            },
          },
        });

        $('.relatedproducts .owl-carousel').owlCarousel({
          loop:false,
          margin:30,
          nav:true,
          autoplay:false,
          center: true,
          navText:["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
          onTranslated:callBack,
          responsive:{
              0:{
                  items:2,
                  startPosition:1,
                  center: false,
              },
              600:{
                  items:3,
                  startPosition:1,
              },
              1000:{
                  items:5.8,
                  startPosition:2,
              }
          }
        })

        function callBack(){
          if($('.owl-carousel .owl-item').last().hasClass('active')){
                $('.owl-next').css('background-color','#C1C1C1'); 
                $('.owl-prev').css('background-color','#000'); 
                console.log('true');
             }else if($('.owl-carousel .owl-item').first().hasClass('active')){
                $('.owl-prev').css('background-color','#C1C1C1'); 
                $('.owl-next').css('background-color','#000'); 
                console.log('false');
             }
        }
        $('#owlCarousel .owl-prev').hide();

        $(".login-link .sign-up-text").click(function(){

         $('#signupform').show();
         $('#signinform').hide();
    });

        $(".login-link .log-in-text").click(function(){

         $('#signupform').hide();
         $('#signinform').show();
    });

    });

   


    function tabControl() {
    
  var tabs = $('.tabbed-content').find('.tabs');
  if(tabs.is(':visible')) {
    tabs.find('a').on('click', function(event) {
      event.preventDefault();
      var target = $(this).attr('href'),
          tabs = $(this).parents('.tabs'),
          buttons = tabs.find('a'),
          item = tabs.parents('.tabbed-content').find('.item');
      buttons.removeClass('active');
      item.removeClass('active');
      $(this).addClass('active');
      $(target).addClass('active');
    });
  } else {
    $('.item').on('click', function() {
        alert('yes');
      var container = $(this).parents('.tabbed-content'),
          currId = $(this).attr('id'),
          items = container.find('.item');
      container.find('.tabs a').removeClass('active');
      items.removeClass('active');
      $(this).addClass('active');
      container.find('.tabs a[href$="#'+ currId +'"]').addClass('active');
    });
  } 
}

    /******** PRODUCT PAGE SCRIPT**********/

function getzipcode()
{
  var pincode = $('#chkpincode').val();
  var modelId = $('#attribute_35 option:selected').val();
  // console.log(modelId);
  
  if(modelId == '')
  {
    alert('Please select product attributes');
    return false;
  }

  if(pincode == '' || pincode.length < 5)
  {
    alert('Please enter valid pincode');
    return false;
  }
  var productId = '<?php echo $product->id;?>';                        
  var APP_URL = {!! json_encode(url('/')) !!}                     
            
  $.ajax({
        url: APP_URL+"/get-zipcode",
        type:"GET",                                    
        data:{                                    
          pincode:pincode,
          product_id : productId,
          model_id : modelId,
        },
        beforeSend: function (request) {
          },
        success:function(response){
          // console.log(response);
          $('.confirmlocation').html('');
          if(response.success == 1)
          {
            $('.confirmlocation').append('Whoa! We Deliver To Your Location!!');
            $('.confirmlocation').css('font-size','25px','important');
            $('.confirmlocation').css('color','#009a00','important');
            $('.confirmlocation').css('font-family','Myriad Pro Regular','important');
            $('.confirmlocation').css('margin-top','12px','important');
            $('.buynow').prop('disabled',false);
            $('.addtocart').prop('disabled',false);

            $.each(response.data, function(index, value) {
              if(value.product_id == productId)
              {
                var amount = value.price;
                var percentPrice = amount * 0.3;
                $('.percent-price').html('');
                $('.regular-price').html('');
                $('.percent-price').html('₹ '+ parseFloat(percentPrice).toFixed(2));
                $('.regular-price').html('₹ '+parseFloat(amount).toFixed(2));
                $('.percent_amount').val(percentPrice);
                $('.actual_amount').val(amount);
              }
              
            });

          }
          else
          {
            $('.confirmlocation').append('Sorry we are not serving at your location at the moment, please give us ur details we will get back to you shortly');
            $('.confirmlocation').css('font-size','25px','important');
            $('.confirmlocation').css('color','#e80000','important');
            $('.confirmlocation').css('font-family','Myriad Pro Regular','important');
            $('.confirmlocation').css('margin-top','12px','important');
              
            $('.buynow').prop('disabled',true);
            $('.addtocart').prop('disabled',true);
          }
          
          
          
         
        },
       });
}

function changecolor(color)
{
   $(".img-back").css("background-color", color); 
}

function changeColor(value, color) {
  // console.log("in function");
  //$(document).find(".color-container .active").removeClass("active");
  $(value).addClass("active");
  $(".img-back").css("background-color", color);
}
function chnageImage(value) {
    
  // console.log("in function");
  $(document).find(".indiv-door .active").removeClass("active");
  $(value).addClass("active");
  $(".door").attr("src", value.src);
  $(".door").attr("data-image", value.src);
}
$("#bgcolor").on("input", function () {
    
  $(".img-back").css("background-color", $(this).val());
});
// var elemnt = $(document).find('.other-info a .active');
// for rating model
$('#reviewmodel').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
})



$(function(){

  $('.doortype').change(function() {
    $('.shwdoortype').html('');
    var type = $('.doortype option:selected').text();
    console.log(type);
    if(type == 'Internal')
    {
      $('.shwdoortype').html('Peephole not available');
    }
    else
    {
      $('.shwdoortype').html('Peephole available');      
    }
  });

  $('.modelchange').change(function() {
    var modelId = $('.modelchange option:selected').val();
    var APP_URL = {!! json_encode(url('/')) !!}                     
            
  $.ajax({
        url: APP_URL+"/model-description",
        type:"GET",                                    
        data:{                   
          model_id : modelId,
        },
        beforeSend: function (request) {
          },
        success:function(response){
          // console.log(response);
          $('.modeldescription').html('');
          if(response.success == 1)
          {
            $('.modeldescription').append(response.data);
          }
          else
          {
            $('.modeldescription').append('');            
          }
          
          
          
         
        },
       });
});

  $('#bgcolor').on('change', function(){

    $(".img-back").css("background-color", $(this).val());
  });

  $('input').on('change', function(){
    // console.log("Changed: " + $(this).val())
    var rating = $('#rating').val();
    $('.selfrating').html(rating);
    
  });
});
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
} 

//FILER POPUP leadeform pr-28-07-21
    $(document).ready(function () {
        $('.well').popup({
          transition: 'all 0.3s',
          closebutton: true
        });
        $('.closePop').click(function(){
          $('.well').popup('hide');
        });
      });
    //END popup

    </script>
@endpush
