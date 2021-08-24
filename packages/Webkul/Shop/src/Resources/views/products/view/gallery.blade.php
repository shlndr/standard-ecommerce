@inject ('wishListHelper', 'Webkul\Customer\Helpers\Wishlist')
@inject ('configurableOptionHelper', 'Webkul\Product\Helpers\ConfigurableOption')
<?php

    $images = productimage()->getGalleryImages($product);
    $videos = productvideo()->getVideos($product);
    $images = array_merge($images, $videos);
?>
{!! view_render_event('bagisto.shop.products.view.gallery.before', ['product' => $product]) !!}
<?php $imgUrl = str_replace('public','', url('/'));  ?>
<div class="door-function">
            <div class="img-back">
              <div class="door-name">
                <div class="title">{{ $product->name }}</div>
                <div class="subtitle">{{ $product->product_number }}</div>
              </div><?php if($product->name == 'Swing and Slide Window' || $product->name == 'Casement Windows' || $product->name == 'Sliding Aluminium Windows'){ ?>
                <div class="window-img"> <?php } ?>
              <product-gallery></product-gallery>
              <?php if($product->name == 'Swing and Slide Window' || $product->name == 'Casement Windows' || $product->name == 'Sliding Aluminium Windows'){ ?></div> <?php } ?>
            </div>
            <div class="chg-door-color">
              <?php
              if(Request::url() == URL::to('/embossed-wood-finish-doors'))
              {
                $img_he = 'style="height:150px;"';
                
                
              }
              else
              {
                $img_he = '';
              }
              ?>

              @if(Request::url() == URL::to('/embossed-wood-finish-doors'))
                <div class="door-design">
              @else
                <div class="door-design" style="width:100%;">
                  <input type="hidden" name="hid_1" id="hid_1" value="1">
              @endif
              <?php if($product->name == 'Swing and Slide Window' || $product->name == 'Casement Windows' || $product->name == 'Sliding Aluminium Windows'){ ?>
                <p>Choose The Color of Window</p>
                <?php }else{ ?>
                <p>Choose The Color of Door</p>
                <?php } ?>
                <div class="door-style">
                  <!-- <div class="owl-carousel owl-theme" id="door-style"> -->
                @if(Request::url() !== URL::to('/embossed-wood-finish-doors'))
                    <thumbnail-gallery></thumbnail-gallery>
                @else
                <div class="showfirstimg">
                <div class="owl-carousel owl-theme" id="door-style">
                    <div class="item " onclick="">
                      <div class="indiv-door active">
                        <img src="{{ asset($imgUrl.'/storage/product/280/E01/2sOeA5Zubj2X290tpt3IWNnz3H9IIwNHGrBQJG4O.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" <?php echo $img_he; ?> class="">
                      </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E01/GKUR6LjM6TkCbHDRqwGRkbiICHssDjesp1TirOdh.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" {{ $img_he }} class="">
                      </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E01/i1NXTC5Hr7HGvonk8cNNwcEd87FmCXOVsFC9mnEv.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" {{ $img_he }} class="">
                     </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E01/i1NXTC5Hr7HGvonk8cNNwcEd87FmCXOVsFC9mnEv.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" {{ $img_he }} class="">
                    </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E01/wLZETo1L4R2uvVh9VG4peo5PwhjtkG2AOxX3lrNI.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" {{ $img_he }} class="">
                      </div>
                    </div>                    
                  </div>
                  </div>

                  <div class="showsecondimg" style="display:none">
                    <div class="owl-carousel owl-theme" id="door-style">
                    <div class="item " onclick="">
                      <div class="indiv-door active">
                        <img src="{{ asset($imgUrl.'/storage/product/280/E05/D4yUdABCe4KXiosAPWMHkIo1DiObmWGtzmmcoRJy.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                      </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E05/fcTaKtN2JRMfcxWROrpWdXvUp3DFrCXtM7In9BAF.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                      </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E05/owraar8SQse3XdPTadPb4jSSfIagENxvq3d3QchJ.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                     </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E05/PHSNAWuh5OlliK6pvREiZxZMGUuwWItbA5Njktf3.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                    </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E05/RPGG1rsiF8MTacpCacYWpPmfOOm7JKidgMvgK9bo.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                      </div>
                    </div>                    
                  </div>
                  </div>

                <div class="showthirdimg" style="display:none">
                <div class="owl-carousel owl-theme" id="door-style">
                    <div class="item " onclick="">
                      <div class="indiv-door active">
                        <img src="{{ asset($imgUrl.'/storage/product/280/E18/00binWW6hXxt45bb9xGf5Bhj5Gb1kBnfqvvP47Cc.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                      </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E18/P08ChsD14cAYHYfN31xqRjsEvswe7vvjq62GEHSu.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                      </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E18/Sn4u3MoYr7XIiBwINzhOvjGBDaaBEgN2Rcoys0Sr.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                     </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E18/TKSf07BbIpLdBlpDVY0lECfu1HMJ2strpt7sRguW.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                    </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E18/vJupyVzfGLDdpQmUyWmvi98PTqsErSRtS2Du34VU.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                      </div>
                    </div>                    
                  </div>
                  </div>


                  <div class="showfourthimg" style="display:none">
                    <div class="owl-carousel owl-theme" id="door-style">
                    <div class="item " onclick="">
                      <div class="indiv-door active">
                        <img src="{{ asset($imgUrl.'/storage/product/280/E32/4sXh46WhxJ0uIZOOj7BrU7nzMhVHizcIjSNSzUMc.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                      </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E32/5xtCBfdtzkoft1045wIJ8Z3asEQbhTNvvlaqbGkq.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                      </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E32/7loqGaE6qSngv3HC1gS2TDfzztrBRdpBRiOzl3nJ.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                     </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E32/eeb5HdK3KLkfx1LapZhfcUYdDPsIasFsUpzBApWd.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                    </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                         <img src="{{ asset($imgUrl.'/storage/product/280/E32/oE6WrSW4NagG3xkqpc2Q5wSwBebUddiTOUy4P47g.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" class="">
                      </div>
                    </div>                    
                  </div>
                  </div>

                @endif
                  <!-- </div> -->
                </div>
              </div>

              
              @if(Request::url() == URL::to('/embossed-wood-finish-doors'))
              <div class="door-design">
                <p>Select the Design</p>
                <div class="door-style">
                  <div class="owl-carousel owl-theme" id="door-style">
                    
                    <div class="item " onclick="">
                      <div class="indiv-door active">
                        <!-- <img src="images/full-glass-doors.png" alt="" onclick="chnageImage(this)"> -->
                        
                        <img src="{{ asset($imgUrl.'/storage/product/280/emboss_design/CS7Miqh1EBsfkYQwwQMw5sRYoSU7rhQL9OoVW3s4.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" data-id="thirdimg" class="designimage">

                        </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                        <img src="{{ asset($imgUrl.'/storage/product/280/emboss_design/OEhvgnRGFpE9SjjiUVxCDImaT0qTyr1BCDbNFJPr.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" data-id="firstimg" class="designimage">

                        </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                        <img src="{{ asset($imgUrl.'/storage/product/280/emboss_design/TFGRcoflGIXTbsd8vlPARi9nscA5tkeOJSLj1MhV.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" data-id="secondimg" class="designimage">

                        </div>
                    </div>
                    <div class="item">
                      <div class="indiv-door">
                        <img src="{{ asset($imgUrl.'/storage/product/280/emboss_design/Ya96kFwIokmz9XH7Eeo6nypQ5LIr4o9KuIlJ5FhG.webp') }}" alt="Banner 1" style="width:37px;height:76px;" onclick="chnageImage(this)" data-id="fourthimg" class="designimage">

                        </div>
                    </div>
                        
                      
                    
                    <!-- <div class="item">
                      <div class="indiv-door"><img src="images/coral-doors.png" alt="" onclick="chnageImage(this)">
                      </div>
                    </div> -->
                    
                  </div>
                </div>
              </div>
              @endif

              <div class="wall-color">
                <!-- <p>Choose The Color of Your Wall</p> -->
                <div class="color-main">
                    <!-- <color-options></color-options> -->
                  <div class="color-container active first " onclick="changeColor(this,'#ffffff')"></div>
                  <div class="color-container second" onclick="changeColor(this,'#e4e4e4')"></div>
                  <div class="color-container third" onclick="changeColor(this,'#f28484')"></div>
                  <div class="color-container fourth" onclick="changeColor(this,'#b991cf')"></div>
                  <div class="color-container fifth" onclick="changeColor(this,'#6ab581')"></div>
                  <div class="color-container sixth" onclick="changeColor(this,'#3f6182')"></div>
                  <div class="color-container seven" onclick="changeColor(this,'#782d2d')"></div>
                  <div class="color-container eight" onclick="changeColor(this,'#4ade8a')"></div>
                  <div class="color-box"><label for="bgcolor" class="color-leble">More Color</label><input type="color"
                      class="color-input" id="bgcolor" name="favcolor" value="#d5e8f3"></div>
                </div>
              </div>
            </div>
          </div>



{!! view_render_event('bagisto.shop.products.view.gallery.after', ['product' => $product]) !!}

@push('scripts')
    <script type="text/x-template" id="color-options-template">
            <div class="attributes">
            <input type="hidden" id="selected_configurable_option" name="selected_configurable_option" :value="selectedProductId">

                <div v-for='(attribute, index) in childAttributes' class="attribute control-group" :class="[errors.has('super_attribute[' + attribute.id + ']') ? 'has-error' : '']">
                    

                    <span v-if="! attribute.swatch_type || attribute.swatch_type == '' || attribute.swatch_type == 'dropdown'">
                        <select
                            class="select-input"
                            v-validate="'required'"
                            :name="['super_attribute[' + attribute.id + ']']"
                            :disabled="attribute.disabled"
                            @change="configure(attribute, $event.target.value)"
                            :id="['attribute_' + attribute.id]"
                            :data-vv-as="'&quot;' + attribute.label + '&quot;'">

                            <option v-for='(option, index) in attribute.options'  :value="option.id">@{{ option.label }}</option>

                            

                        </select>
                    </span>

                    <span class="swatch-container" v-else>
                        <label class="swatch color-container"
                            v-for='(option, index) in attribute.options'
                            v-if="option.id"
                            :data-id="option.id"
                            :for="['attribute_' + attribute.id + '_option_' + option.id]">

                            <input type="radio"
                                v-validate="'required'"
                                :name="['super_attribute[' + attribute.id + ']']"
                                :id="['attribute_' + attribute.id + '_option_' + option.id]"
                                :value="option.id"
                                @click="changecolor(option.swatch_value)"
                                :data-vv-as="'&quot;' + attribute.label + '&quot;'"
                                @change="configure(attribute, $event.target.value)"/>

                            <span v-if="attribute.swatch_type == 'color'" :style="{ background: option.swatch_value }"></span>

                            <img v-if="attribute.swatch_type == 'image'" :src="option.swatch_value" :title="option.label" alt="" />

                            <span v-if="attribute.swatch_type == 'text'">
                                @{{ option.label }}
                            </span>

                        </label>

                        <span v-if="! attribute.options.length" class="no-options">{{ __('shop::app.products.select-above-options') }}</span>
                    </span>

                    <span class="control-error" v-if="errors.has('super_attribute[' + attribute.id + ']')">
                        @{{ errors.first('super_attribute[' + attribute.id + ']') }}
                    </span>
                </div>

            </div>


    </script>
    <?php $config = $configurableOptionHelper->getConfigurationConfig($product)  ?>

        <script>

            Vue.component('color-options', {

                template: '#color-options-template',

                inject: ['$validator'],

                data: function() {
                    return {
                        config: @json($config),

                        childAttributes: [],

                        selectedProductId: '',

                        simpleProduct: null,

                        galleryImages: []
                    }
                },

                created: function() {
                    this.galleryImages = galleryImages.slice(0)

                    var config = @json($config);

                    var childAttributes = this.childAttributes,
                        attributes = config.attributes.slice(),
                        index = attributes.length,
                        attribute;

                    while (index--) {
                        attribute = attributes[index];

                        attribute.options = [];

                        if (index) {
                            attribute.disabled = true;
                        } else {
                            this.fillSelect(attribute);
                        }

                        attribute = Object.assign(attribute, {
                            childAttributes: childAttributes.slice(),
                            prevAttribute: attributes[index - 1],
                            nextAttribute: attributes[index + 1]
                        });

                        childAttributes.unshift(attribute);
                    }
                },

                methods: {
                    configure: function(attribute, value) {
                        this.simpleProduct = this.getSelectedProductId(attribute, value);

                        if (value) {
                            attribute.selectedIndex = this.getSelectedIndex(attribute, value);

                            if (attribute.nextAttribute) {
                                attribute.nextAttribute.disabled = false;

                                this.fillSelect(attribute.nextAttribute);

                                this.resetChildren(attribute.nextAttribute);
                            } else {
                                this.selectedProductId = this.simpleProduct;
                            }
                        } else {
                            attribute.selectedIndex = 0;

                            this.resetChildren(attribute);

                            this.clearSelect(attribute.nextAttribute)
                        }

                        this.reloadPrice();
                        this.changeProductImages();
                        this.changeStock(this.simpleProduct);
                    },

                    getSelectedIndex: function(attribute, value) {
                        var selectedIndex = 0;

                        attribute.options.forEach(function(option, index) {
                            if (option.id == value) {
                                selectedIndex = index;
                            }
                        })

                        return selectedIndex;
                    },

                    getSelectedProductId: function(attribute, value) {
                        var options = attribute.options,
                            matchedOptions;

                        matchedOptions = options.filter(function (option) {
                            return option.id == value;
                        });

                        if (matchedOptions[0] != undefined && matchedOptions[0].allowedProducts != undefined) {
                            return matchedOptions[0].allowedProducts[0];
                        }

                        return undefined;
                    },

                    fillSelect: function(attribute) {
                        var options = this.getAttributeOptions(attribute.id),
                            prevOption,
                            index = 1,
                            allowedProducts,
                            i,
                            j;

                        this.clearSelect(attribute)

                        attribute.options = [{'id': '', 'label': this.config.chooseText, 'products': []}];

                        if (attribute.prevAttribute) {
                            prevOption = attribute.prevAttribute.options[attribute.prevAttribute.selectedIndex];
                        }

                        if (options) {
                            for (i = 0; i < options.length; i++) {
                                allowedProducts = [];

                                if (prevOption) {
                                    for (j = 0; j < options[i].products.length; j++) {
                                        if (prevOption.allowedProducts && prevOption.allowedProducts.indexOf(options[i].products[j]) > -1) {
                                            allowedProducts.push(options[i].products[j]);
                                        }
                                    }
                                } else {
                                    allowedProducts = options[i].products.slice(0);
                                }

                                if (allowedProducts.length > 0) {
                                    options[i].allowedProducts = allowedProducts;

                                    attribute.options[index] = options[i];

                                    index++;
                                }
                            }
                        }
                    },

                    resetChildren: function(attribute) {
                        if (attribute.childAttributes) {
                            attribute.childAttributes.forEach(function (set) {
                                set.selectedIndex = 0;
                                set.disabled = true;
                            });
                        }
                    },

                    clearSelect: function (attribute) {
                        if (! attribute)
                            return;

                        if (! attribute.swatch_type || attribute.swatch_type == '' || attribute.swatch_type == 'dropdown') {
                            var element = document.getElementById("attribute_" + attribute.id);

                            if (element) {
                                element.selectedIndex = "0";
                            }
                        } else {
                            var elements = document.getElementsByName('super_attribute[' + attribute.id + ']');

                            var this_this = this;

                            elements.forEach(function(element) {
                                element.checked = false;
                            })
                        }
                    },

                    getAttributeOptions: function (attributeId) {
                        var this_this = this,
                            options;

                        this.config.attributes.forEach(function(attribute, index) {
                            if (attribute.id == attributeId) {
                                options = attribute.options;
                            }
                        })

                        return options;
                    },

                    reloadPrice: function () {
                        var selectedOptionCount = 0;

                        this.childAttributes.forEach(function(attribute) {
                            if (attribute.selectedIndex) {
                                selectedOptionCount++;
                            }
                        });

                        var priceLabelElement = document.querySelector('.price-label');
                        var priceElement = document.querySelector('.final-price');
                        var regularPriceElement = document.querySelector('.regular-price');
                        var percentPriceElement = document.querySelector('.percent-price');

                        if (this.childAttributes.length == selectedOptionCount) {
                            priceLabelElement.style.display = 'none';

                            priceElement.innerHTML = this.config.variant_prices[this.simpleProduct].final_price.formated_price;

                            if (regularPriceElement) {
                                regularPriceElement.innerHTML = this.config.variant_prices[this.simpleProduct].regular_price.formated_price;
                                var percentPrice = 0.3 * this.config.variant_prices[this.simpleProduct].regular_price.price;
                                percentPriceElement.innerHTML = '₹ '+parseFloat(percentPrice).toFixed(2);
                                
                                $('#percent_amount').val(percentPrice);
                                var actualAmount = this.config.variant_prices[this.simpleProduct].regular_price.price;

                                $('#actual_amount').val(actualAmount);
                            }

                            eventBus.$emit('configurable-variant-selected-event', this.simpleProduct)
                        } else {
                            priceLabelElement.style.display = 'inline-block';

                            priceElement.innerHTML = this.config.regular_price.formated_price;

                            eventBus.$emit('configurable-variant-selected-event', 0)
                        }
                    },

                    changeProductImages: function () {
                        galleryImages.splice(0, galleryImages.length)

                        this.galleryImages.forEach(function(image) {
                            galleryImages.push(image)
                        });

                        if (this.simpleProduct) {
                            this.config.variant_images[this.simpleProduct].forEach(function(image) {
                                galleryImages.unshift(image)
                            });

                            this.config.variant_videos[this.simpleProduct].forEach(function(video) {
                                galleryImages.unshift(video)
                            });
                        }
                    },

                    changeStock: function (productId) {
                        var inStockElement = document.querySelector('.stock-status');

                        if (productId) {
                            inStockElement.style.display= "block";
                        } else {
                            inStockElement.style.display= "none";
                        }
                    },
                }

            });

         </script>
    <script type="text/x-template" id="thumbnail-gallery-template">
<div class="owl-carousel owl-theme" id="door-style">
    <div class="thumb-frame item" id="thumb-frame" v-for='(thumb, index) in thumbs' @mouseover="changeImage(thumb)" :class="[thumb.large_image_url == currentLargeImageUrl ? 'active' : '']" >
                          <video v-if="thumb.type == 'video'" width="100%" height="100%" onclick="this.paused ? this.play() : this.pause();">
                                    <source :src="thumb.video_url" onclick="chnageImage(this)" type="video/mp4">
                                    {{ __('admin::app.catalog.products.not-support-video') }}
                                </video>

                      <img v-else  :src="thumb.large_image_url" onclick="chnageImage(this)" alt="" style="height:150px;"/>
                      <div class="indiv-door" >
                      </div>
                    </div> 

     </div>




    </script>

    <script>
   //    (function() {
   // alert(document.getElementById("hid_1").value);

   //    })();
    </script>

    <script type="text/x-template" id="product-gallery-template">
        
                 

            <div class="product-hero-image door-img mgnifirHldr" id="product-hero-image">
                <video :key="currentVideoUrl" v-if="currentType == 'video'" width="100%" height="100%" controls>
                    <source :src="currentVideoUrl" :data-image="currentOriginalImageUrl"  type="video/mp4">
                        {{ __('admin::app.catalog.products.not-support-video') }}
                </video>

                <img v-else :src="currentLargeImageUrl" id="pro-img" class="door" :data-image="currentLargeImageUrl" alt=""/>

                @auth('customer')
                    @php
                        $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false;
                    @endphp

                    @if ($showWishlist)
                        <a @if ($wishListHelper->getWishlistProduct($product)) class="add-to-wishlist already" @else class="add-to-wishlist" @endif href="{{ route('customer.wishlist.add', $product->product_id) }}">
                        </a>
                    @endif
                @endauth
            </div>

        
    </script>

    <script>
        var galleryImages = @json($images);

        Vue.component('product-gallery', {

            template: '#product-gallery-template',

            data: function() {
                return {
                    images: galleryImages,

                    thumbs: [],

                    currentLargeImageUrl: '',

                    currentOriginalImageUrl: '',

                    currentVideoUrl: '',

                    currentType: '',

                    counter: {
                        up: 0,
                        down: 0,
                    },

                    is_move: {
                        up: true,
                        down: true,
                    }
                }
            },

            watch: {
                'images': function(newVal, oldVal) {
                    this.changeImage(this.images[0])

                    this.prepareThumbs()
                }
            },

            created: function() {
                this.changeImage(this.images[0])

                this.prepareThumbs()
            },

            methods: {
                prepareThumbs: function() {
                    var this_this = this;

                    this_this.thumbs = [];

                    this.images.forEach(function(image) {
                        this_this.thumbs.push(image);
                    });
                },

                changeImage: function(image) {

                    this.currentType = image.type;

                    if (image.type == 'video') {
                        this.currentVideoUrl = image.video_url;

                        this.currentLargeImageUrl = image.large_image_url = image.video_url;
                    } else {
                        this.currentLargeImageUrl = image.large_image_url;

                        this.currentOriginalImageUrl = image.large_image_url;
                    }

                    if ($(window).width() > 580 && image.original_image_url) {
                      $(".zoomContainer").css('z-index','0');
                       $('img#pro-img').data('zoom-image', image.large_image_url).ezPlus();
                    }
                },

                moveThumbs: function(direction) {
                    let len = this.thumbs.length;

                    if (direction === "top") {
                        const moveThumb = this.thumbs.splice(len - 1, 1);

                        this.thumbs = [moveThumb[0]].concat((this.thumbs));

                        this.counter.up = this.counter.up+1;

                        this.counter.down = this.counter.down-1;

                    } else {
                        const moveThumb = this.thumbs.splice(0, 1);

                        this.thumbs = [].concat((this.thumbs), [moveThumb[0]]);

                        this.counter.down = this.counter.down+1;

                        this.counter.up = this.counter.up-1;
                    }

                    if ((len-4) == this.counter.down) {
                        this.is_move.down = false;
                    } else {
                        this.is_move.down = true;
                    }

                    if ((len-4) == this.counter.up) {
                        this.is_move.up = false;
                    } else {
                        this.is_move.up = true;
                    }
                },
            }
        });

    </script>


    <script>
        var galleryImages = @json($images);

        Vue.component('thumbnail-gallery', {

            template: '#thumbnail-gallery-template',

            data: function() {
                return {
                    images: galleryImages,

                    thumbs: [],

                    currentLargeImageUrl: '',

                    currentOriginalImageUrl: '',

                    currentVideoUrl: '',

                    currentType: '',

                    counter: {
                        up: 0,
                        down: 0,
                    },

                    is_move: {
                        up: true,
                        down: true,
                    }
                }
            },

            watch: {
                'images': function(newVal, oldVal) {
                    this.changeImage(this.images[0])

                    this.prepareThumbs()
                }
            },

            created: function() {
                this.changeImage(this.images[0])

                this.prepareThumbs()
            },

            methods: {
                prepareThumbs: function() {
                    var this_this = this;

                    this_this.thumbs = [];

                    this.images.forEach(function(image) {
                        this_this.thumbs.push(image);
                    });
                },

                changeImage: function(image) {
                    this.currentType = image.type;

                    if (image.type == 'video') {
                        this.currentVideoUrl = image.video_url;

                        this.currentLargeImageUrl = image.large_image_url = image.video_url;
                    } else {
                        this.currentLargeImageUrl = image.large_image_url;

                        this.currentOriginalImageUrl = image.large_image_url;
                    }

                    if ($(window).width() > 580 && image.original_image_url) {
                      $(".zoomContainer").css('z-index','0');
                       $('img#pro-img').data('zoom-image', image.large_image_url).ezPlus();
                    }
                },

                moveThumbs: function(direction) {
                    let len = this.thumbs.length;

                    if (direction === "top") {
                        const moveThumb = this.thumbs.splice(len - 1, 1);

                        this.thumbs = [moveThumb[0]].concat((this.thumbs));

                        this.counter.up = this.counter.up+1;

                        this.counter.down = this.counter.down-1;

                    } else {
                        const moveThumb = this.thumbs.splice(0, 1);

                        this.thumbs = [].concat((this.thumbs), [moveThumb[0]]);

                        this.counter.down = this.counter.down+1;

                        this.counter.up = this.counter.up-1;
                    }

                    if ((len-4) == this.counter.down) {
                        this.is_move.down = false;
                    } else {
                        this.is_move.down = true;
                    }

                    if ((len-4) == this.counter.up) {
                        this.is_move.up = false;
                    } else {
                        this.is_move.up = true;
                    }
                },
            }
        });

    </script>

    <script>
        $(document).ready(function() {

            $('.indiv-door .designimage').click(function(){
                var getclass = $(this).attr('data-id');
                // console.log(getclass);
                if(getclass == 'firstimg')
                {
                    $('.showfirstimg').show();
                    $('.showsecondimg').hide();
                    $('.showthirdimg').hide();
                    $('.showfourthimg').hide();
                }
                if(getclass == 'secondimg')
                {
                    $('.showfirstimg').hide();
                    $('.showsecondimg').show();
                    $('.showthirdimg').hide();
                    $('.showfourthimg').hide();
                }
                if(getclass == 'thirdimg')
                {
                    $('.showfirstimg').hide();
                    $('.showsecondimg').hide();
                    $('.showthirdimg').show();
                    $('.showfourthimg').hide();
                }
                if(getclass == 'fourthimg')
                {
                    $('.showfirstimg').hide();
                    $('.showsecondimg').hide();
                    $('.showthirdimg').hide();
                    $('.showfourthimg').show();
                }

            });

            if ($(window).width() > 580) {
                $(".zoomContainer").css('z-index','0');
                $('img#pro-img').data('zoom-image', $('img#pro-img').data('image')).ezPlus();
            }

            var wishlist = "{{ $wishListHelper->getWishlistProduct($product) ? 'true' : 'false' }}";

            $(document).mousemove(function(event) {
              $(".zoomContainer").css('z-index','0');
                // if ($('.add-to-wishlist').length || wishlist != 0) {
                //     if (event.pageX > $('.add-to-wishlist').offset().left && event.pageX < $('.add-to-wishlist').offset().left+32 && event.pageY > $('.add-to-wishlist').offset().top && event.pageY < $('.add-to-wishlist').offset().top+32) {

                //         $(".zoomContainer").addClass("show-wishlist");

                //     } else {
                //         $(".zoomContainer").removeClass("show-wishlist");
                //     }
                // };

                // if ($("body").hasClass("rtl")) {
                //     $(".zoomWindow").addClass("zoom-image-direction");
                // } else {
                //     $(".zoomWindow").removeClass("zoom-image-direction");
                // }
            });
        })
    </script>

@endpush