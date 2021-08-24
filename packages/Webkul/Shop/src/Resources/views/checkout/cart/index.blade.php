@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.cart.title') }}
@stop

@section('content-wrapper')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')
<?php $customer = auth()->guard('customer')->user();  
function count_array($value)
{                                        
    return ($value['type'] == 'multiselect');
}
?>
    
    <section class="products-payment cart">
        @if ($cart)
            <!-- <div class="title">
                {{ __('shop::app.checkout.cart.title') }}
            </div> -->
            <div class="container">
                <div class="cart-content">
                    <div class="left-sect">
                        <!-- <div class="deliver-sect">
                        <div class="del-lt">
                            <div class="top-n">
                                <p class="pay-title">
                                    <img src="images/deliver-icon.png" alt="">Deliver to:</p>
                            </div>
                            <div class="top-t">
                                <p class="pay-title2">Nitin Chaudhary &nbsp;&nbsp; 400705</p>
                                <p class="address">405, Ace Park, Sector 34, Plot No. 25, Palm Beach Road, Airoli</p>
                            </div>
                        </div>
                        <div class="del-rt">
                            <input type="submit" name="payment-login" value="change address" class="btn-pink btn-pay">
                        </div>
                        <div class="clearfix"></div>
                    </div> -->
                    <div class="deliver-sect">
                        <div class="top-n">
                            <p class="pay-title">
                                <img src="{{ asset('/themes/velocity/assets/images/offers-icon.png') }}" alt="">Available Offers:</p>
                        </div>
                        <div class="top-t">
                            <form class="form">
                                <div class="regular-field">
                                    <?php foreach ($cartdata as $key => $cartValue) {?>
                                    <label for="radio-nine" class="disc-lable">
                                        <p class="disc-text"><?php echo $cartValue->name;?>  USE :<?php echo $cartValue->description;?></span>
                                        </p>
                                    </label>
                                    <br>
                                    <?php } ?>
                                    <!-- <input type="radio" id="radio-ten" name="notaswitch-two" value="maybe" />
                                    <label for="radio-ten" class="disc-lable">
                                        <p class="disc-text">5 % Instant Cashback with Axis Credit Card <span>Maximum Cashback upto Rs. 3,000. TCA</span>
                                        </p>
                                    </label>
                                    <div class="moretext">
                                        <input type="radio" id="radio-nine01" name="notaswitch-two" value="yes" />
                                        <label for="radio-nine" class="disc-lable">
                                            <p class="disc-text">10 % Discount with HDFC Credit Card <span>on Minimum Spend of Rs. 3,000. TCA</span>
                                            </p>
                                        </label>
                                        <br>
                                        <input type="radio" id="radio-ten02" name="notaswitch-two" value="maybe" />
                                        <label for="radio-ten" class="disc-lable">
                                            <p class="disc-text">5 % Instant Cashback with Axis Credit Card <span>Maximum Cashback upto Rs. 3,000. TCA</span>
                                            </p>
                                        </label>
                                    </div>  <a href="javascript:void();" class="moreless-button btn">Show More</a> -->
                                </div>
                            </form>
                        </div>
                    </div>
                        <form action="{{ route('shop.checkout.cart.update') }}" method="POST" @submit.prevent="onSubmit">

                            <div class="cart-item-list">
                                @csrf
                                @foreach ($cart->items as $key => $item)
                                    @php
                                        $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);

                                        if (is_null ($item->product->url_key)) {
                                            if (! is_null($item->product->parent)) {
                                                $url_key = $item->product->parent->url_key;
                                            }
                                        } else {
                                            $url_key = $item->product->url_key;
                                        }
                                    @endphp

                                    <div class="del-now" style="margin-top:0px;">
                                        <div class="lt-now">
                                            <img src="{{ $productBaseImage['small_image_url'] }}" alt="">
                                        </div>
                                        <!-- <div class="item-image" style="margin-right: 15px;">
                                            <a href="{{ route('shop.productOrCategory.index', $url_key) }}"><img src="{{ $productBaseImage['medium_image_url'] }}" alt="" /></a>
                                        </div> -->

                                        <div class="rt-now">

                                            {!! view_render_event('bagisto.shop.checkout.cart.item.name.before', ['item' => $item]) !!}

                                            <div class="price-row">
                                                <div class="fus-text">
                                                    <div class="lt-now-mb">
                                                        <img src="{{ $productBaseImage['small_image_url'] }}" alt="">
                                                    </div>
                                                    <p class="fus-title"><a href="{{ route('shop.productOrCategory.index', $url_key) }}">{{ $item->product->name }}</a></p>
                                                    <p class="fus-title2">{{ strip_tags($item->product->short_description) }}</p>
                                                    <p class="fus-title3">SKU: {{ $item->product->sku }}</p>
                                                </div>
                                                <div class="price-sect">
                                                    <p class="price-title">{{ core()->currency($item->base_price) }}</p>

                                                    @if ($item->product->getTypeInstance()->showQuantityBox() === true)
                                                        <quantity-changer
                                                            :control-name="'qty[{{$item->id}}]'"
                                                            quantity="{{$item->quantity}}">
                                                        </quantity-changer>
                                                    @endif

                                                    
                                                </div>
                                            </div>
                                            
                                <div class="cont-row">
                                    @if (isset($item->additional['attributes']))
                                       

                                            @foreach ($item->additional['attributes'] as $attribute)
                                             <div class="lt-extn">
                                            <select name="{{ $attribute['attribute_name'] }}" class="extension">
                                                <option value="{{ $attribute['option_label'] }}">{{ $attribute['option_label'] }}</option>
                                            </select>
                                               </div>
                                            @endforeach
                                           
                                            
                                    @endif
                                                                                    
                                </div>

                                <?php 

                                 $customAttributeValues = $productViewHelper->getAdditionalData($item->product);

                                 

                                ?>
                                @foreach ($customAttributeValues as $check => $attribute)
                                @if ($attribute['type'] == 'multiselect')
                                    <?php 
                                    
                                    $listData = count(array_filter($customAttributeValues,"count_array"));
                                   
                                    $arr = explode(',', $attribute['value']);
                                    $valId = explode(',', $attribute['value_id']);
                                    

                                    if($check == 0 || $check == 2 || $check == 4){
                                        
                                    ?>
                                    <div class="cont-row">
                                        <?php } ?>
                                        <div class="lt-extn">    
                                    <?php 

                                    foreach ($item->additional['super_attribute'] as $key => $superattribute)
                                    {
                                        // echo"<pre>";print_r($superattribute);die;
                                        if($key == $attribute['id'] )
                                        {

                                    ?> 
                                    
                                                               
                                <?php if($attribute['code'] !== 'accessories'){
                                    
                                    ?>

                                    
                                        <select name="super_attribute[<?php echo $attribute['id'].'_'.$item->id;?>]" id="attribute_<?php echo $attribute['id'];?>" data-vv-as="<?php echo $attribute['code'];?>" class="extension">
                                    <?php foreach ($arr as $key => $value) {
                                       if($valId[$key] == $superattribute){
                                        ?>    

                                        <b><?php echo $attribute['code'];?> : </b><?php echo $value;?></br>                        
                                         <option value="<?php echo $valId[$key];?>" selected><?php echo $value;?></option>

                                        <?php
                                         }
                                         else
                                         { ?>
                                            <option value="<?php echo $valId[$key];?>"><?php echo $value;?></option>
                                       <?php  } } ?>
                                    </select>
                                   <?php  } ?>
                                    
                                    <?php } } ?>
                                    </div>
                                    <?php if($check == 1 || $check == 3 || $check == 5 || $check == 7 || $listData == $check + 1){ ?>    
                                    </div>
                                    <?php } ?>
                                    
                                @endif
                                 @endforeach
                                

                                @foreach ($customAttributeValues as $check => $attribute)
                                @if ($attribute['code'] == 'accessories')
                                    <?php 
                                    
                                    $arr = explode(',', $attribute['value']);
                                    $valId = explode(',', $attribute['value_id']);
                                    ?>
                                <div class="sele-sect">
                                <p>Selected Accessories:</p>
                                <div class="sele-row">
                                     <?php foreach ($arr as $key => $value) { ?> 
                                    <div class="sele-lt">
                                        <div class="inputgroup"><span></span>  <span><?php echo $value;?></span><span class="close-btn"></span>
                                        </div>
                                    </div>

                                    <?php } ?>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                                            <div class="move-wishlist">
                                                <a href="{{ route('shop.checkout.cart.remove', $item->id) }}" onclick="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')" class="remove">
                                                    <img src="{{ asset('/themes/velocity/assets/images/fusion-door-payment/remove.svg') }}" alt="">Remove</a>
                                                @auth('customer')
                                                        @php
                                                            $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false;
                                                        @endphp

                                                        @if ($showWishlist)    
                                                            
                                                            <span class="towishlist">
                                                                @if ($item->parent_id != 'null' ||$item->parent_id != null)
                                                                    <a href="{{ route('shop.movetowishlist', $item->id) }}" onclick="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')" class="wishlist0"><img src="{{ asset('/themes/velocity/assets/images/fusion-door-payment/icon-feather-heart.svg') }}" alt="">{{ __('shop::app.checkout.cart.move-to-wishlist') }}</a>
                                                                @else
                                                                    <a href="{{ route('shop.movetowishlist', $item->child->id) }}" class="wishlist0" onclick="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')"><img src="{{ asset('/themes/velocity/assets/images/fusion-door-payment/icon-feather-heart.svg') }}" alt="">{{ __('shop::app.checkout.cart.move-to-wishlist') }}</a>
                                                                @endif
                                                            </span>  
                                                        @endif
                                                    @endauth  
                                            </div>


                                            {!! view_render_event('bagisto.shop.checkout.cart.item.quantity.after', ['item' => $item]) !!}

                                            @if (! cart()->isItemHaveQuantity($item))
                                                <div class="error-message mt-15">
                                                    * {{ __('shop::app.checkout.cart.quantity-error') }}
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                            

                            {!! view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]) !!}

                            <div class="misc-controls" style="float: right;margin-top: 10px;">
                                

                                <div>
                                    @if ($cart->hasProductsWithQuantityBox())
                                    <button type="submit" class="btn btn-lg btn-primary" id="update_cart_button">
                                        {{ __('shop::app.checkout.cart.update-cart') }}
                                    </button>
                                    @endif

                                    @if (! cart()->hasError())
                                        @php
                                            $minimumOrderAmount = (float) core()->getConfigData('sales.orderSettings.minimum-order.minimum_order_amount') ?? 0;
                                        @endphp

                                        <!-- <proceed-to-checkout
                                            href="{{ route('shop.checkout.onepage.index') }}"
                                            add-class="btn btn-lg btn-primary"
                                            text="{{ __('shop::app.checkout.cart.proceed-to-checkout') }}"
                                            is-minimum-order-completed="{{ $cart->checkMinimumOrder() }}"
                                            minimum-order-message="{{ __('shop::app.checkout.cart.minimum-order-message', ['amount' => core()->currency($minimumOrderAmount)]) }}">
                                        </proceed-to-checkout> -->
                                        

                                    @endif
                                    <a href="{{ route('shop.home.index') }}" class="link"><button type="button" class="btn btn-lg btn-primary" id="cont_shopping_button">{{ __('shop::app.checkout.cart.continue-shopping') }}</button></a>
                                </div>
                            </div>

                            {!! view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]) !!}
                        </form>
                    </div>

                    <div class="right-sect">
                        <div class="right-sect2">
                            <div class="coupons-sect">
                                
                                <p class="pay-title">
                                    <img src="images/fusion-door-payment/coupons.svg" alt="">Apply Coupons</p>
                                <div class="inputgroup3">
                                    <coupon-component></coupon-component>
                                </div>
                            </div>
                            <div class="price-details">
                                {!! view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]) !!}

                                @include('shop::checkout.total.summary', ['cart' => $cart])

                                {!! view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]) !!}

                                <a href="{{ route('shop.checkout.onepage.index') }}" class="contbtn" style="color:#fff">Place Order</a>
                            </div>
                        </div>
                        <!-- <div class="add-product">
                            <a href="#" class="wishlist">
                                <img src="images/fusion-door-payment/icon-feather-heart.svg" alt="">Add More Products From Wishlist</a>
                        </div> -->
                    </div>
                    
                </div>
            </div>
            <!-- @include ('shop::products.view.cross-sells') -->

        @else

            <!-- <div class="title">
                {{ __('shop::app.checkout.cart.title') }}
            </div> -->

            <div class="cart-empty">
                <p>Your Cart is Empty!!</p>
                
            </div>
            <div class="cart-content">
                
                <p style="display: inline-block;">
                    <a style="display: inline-block;" href="{{ route('shop.home.index') }}" class="btn btn-lg btn-primary">{{ __('shop::app.checkout.cart.continue-shopping') }}</a>
                </p>
            </div>

        @endif
    </section>
    <?php
        if(isset($_COOKIE['productname']) && isset($_COOKIE['image']) ) {
            $productArr = explode(',', $_COOKIE['productname']);
            $imageArr = explode(',', $_COOKIE['image']);
            $urlArr = explode(',', $_COOKIE['producturl']);
            // echo"<pre>";
            // // print_r($productArr);
            // echo count($productArr);die;
         ?>

    <section class="browsing-sect">
            <div class="container">
                <h2><strong>Your Browsing History</strong></h2>
                <!-- <div class="edit-sect dsk"><a href="#">View Or Edit Your Browsing History</a>
                </div> -->
                <div class="best-row">
                    <div class="owl-carousel owl-theme owl8">
                        <?php for($i=0;$i<count($productArr);$i++) {

                            ?>
                        <div class="item">
                            <div class="brows-thumb">
                                <div class="best-col">
                                    <div class="door-thumb door1">
                                        <img src="<?php echo str_replace('large','small', $imageArr[$i]) ; ?>" alt="<?php echo $productArr[$i]; ?>">
                                    </div>
                                    <p class="head-title"><a href="{{ url($urlArr[$i]) }}"><?php echo $productArr[$i]; ?></a></p>
                                </div>
                            </div>
                        </div>                       
                        <?php } ?>
                    </div>
                    <!-- <div class="edit-sect mb"><a href="#">View Or Edit Your Browsing History</a>
                    </div> -->
                </div>
            </div>
        </section>
<?php } ?>

@endsection

@push('scripts')
    @include('shop::checkout.cart.coupon')

    <script type="text/x-template" id="quantity-changer-template">
        <div class="quantity" :class="[errors.has(controlName) ? 'has-error' : '']">
            

                <button type="button" class="qtyminus minus" @click="decreaseQty()">-</button>

                <input :name="controlName" class="qty" :value="qty" v-validate="'required|numeric|min_value:1'" data-vv-as="&quot;{{ __('shop::app.products.quantity') }}&quot;" readonly>

                <button type="button" class="qtyplus plus" @click="increaseQty()">+</button>

                <span class="control-error" v-if="errors.has(controlName)">@{{ errors.first(controlName) }}</span>
            
        </div>
    </script>

    <script>
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
                    if (this.qty > 1)
                        this.qty = parseInt(this.qty) - 1;

                    this.$emit('onQtyUpdated', this.qty)
                },

                increaseQty: function() {
                    this.qty = parseInt(this.qty) + 1;

                    this.$emit('onQtyUpdated', this.qty)
                }
            }
        });

        function removeLink(message) {
            if (!confirm(message))
            event.preventDefault();
        }

        function updateCartQunatity(operation, index) {
            var quantity = document.getElementById('cart-quantity'+index).value;

            if (operation == 'add') {
                quantity = parseInt(quantity) + 1;
            } else if (operation == 'remove') {
                if (quantity > 1) {
                    quantity = parseInt(quantity) - 1;
                } else {
                    alert('{{ __('shop::app.products.less-quantity') }}');
                }
            }
            document.getElementById('cart-quantity'+index).value = quantity;
            event.preventDefault();
        }
    </script>
    <script type="text/javascript">

        //Owl Slider 8
        $(document).ready(function() {

            $('.moreless-button').click(function() {
              $('.moretext').slideToggle();
              if ($('.moreless-button').text() == "Show More") {
                $(this).text("Show Less")
              } else {
                $(this).text("Show More")
              }
                });     

            $('.owl8').owlCarousel({
            margin: 12,
            autoplay: true,
            autoplayTimeout: 110005000,
            autoplayHoverPause: true,
            autoHeight:true,
            nav: true,
            loop: false,
            navText: ["<img src='/themes/default/assets/images/arrow-prev.png'>","<img src='/themes/default/assets/images/arrow-next.png'>"],
            responsive: {
              0: {
                items: 1
              },
              991: {
                items: 6
              },
              1280: {
                items: 6,
              }
            }
          })
        });
     //END Owl Slider 8 
</script>
@endpush