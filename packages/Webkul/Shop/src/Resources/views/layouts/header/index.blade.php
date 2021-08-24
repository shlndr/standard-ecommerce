<?php
$term = request()->input('term');
$image_search = request()->input('image-search');

if (! is_null($term)) {
$serachQuery = 'term='.request()->input('term');
}
?>
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')
<?php $commercialProducts = $productViewHelper->getAluminiumProductLists();
// print_r($commercialProducts);die;
?>
<div id="wrap" class="cf">
<div class="top-header cf">
<div class="container">
<ul class="contact-link">
    <li><img src="{{ asset('/themes/velocity/assets/images/call.svg') }}" alt=""> <a href="tel:18004199200"> 1800 4199 200</a>
    </li>
    <li><img src="{{ asset('/themes/velocity/assets/images/support.svg') }}" alt=""> <a href="mailto:18004199200"> enquiry@tatapravesh.com</a>
    </li>
</ul>
<ul class="quick-link">
    <li><a href="{{ url('about-us') }}">About Us</a>
    </li>
    <li><a href="{{ url('page/blog') }}">Blogs</a>
    </li>
    <li><a href="{{ url('faq') }}">FAQ's</a>
    </li>
    <li><a href="{{ url('contact-us') }}">Contact Us</a>
    </li>
    <li><a href="{{ url('brochures') }}">Brochures</a>
    </li>
</ul>
<div class="clear"></div>
</div>
</div>
<header class="header cf" id="header-sroll">
<div class="over-menu"></div>
<div class="">
<div class="desk-menu">
    <div class="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('/themes/velocity/assets/images/tata-steel-logo.png') }}" alt="Logo">
        </a>
        <div class="tata-logo">
            <img src="{{ asset('/themes/velocity/assets/images/tata-pravesh-logo.jpg') }}" alt="TATA Steel Logo">
        </div>
        <div class="clear"></div>
    </div>
    <div class="mid-menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light product-dropdown">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{ url('doors') }}">Doors</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{ url('category/residential-doors') }}">Residential Doors</a>

                                        <?php
                                            $residentialProducts = $productViewHelper->getResidentialProductLists();
                                        ?>

                                        <ul class="dropdown-menu">
                                            <?php foreach ($residentialProducts as $key => $value) { ?>

                                            <li><a class="dropdown-item" href="/<?php echo trim($value['url_key']);?>"><?php echo trim($value['name']);?></a>
                                            </li>

                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{ url('category/commercial-doors') }}">Commercial Doors</a>
                                        <?php
                                            $commercialProducts = $productViewHelper->getCommercialProductLists();
                                        ?>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($commercialProducts as $key => $value) { ?>
                                            <li><a class="dropdown-item" href="/<?php echo trim($value['url_key']);?>"><?php echo trim($value['name']);?></a>
                                            </li>
                                             <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{ url('windows') }}">Windows</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{ url('category/aluminium-windows') }}">Aluminium Windows</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ url('sliding-aluminium-windows') }}">Sliding Aluminium Windows</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{ url('category/steel-windows') }}">Steel Windows</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ url('swing-and-slide-window') }}">Swing and Slide Window</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ url('casement-windows') }}">Casement Windows</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <nav class="box-menu">
            <div class="menu-container">
                <div class="menu-header-container">
                    <p class="menu-title mobOn">MENU <a href="#" class="over-menu">x Close</a>
                    <ul id="cd-primary-nav" class="menu">
                        <li class="contact menu-item">  <a class="partner" href="https://showroom.tatapravesh.com/">VIRTUAL SHOWROOM</a></li><!-- changes -->
                        <li class="menu-item menu-item-has-children mobOn"> <a href="#">PRODUCTS</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-has-children"><a class="dropdown-item dropdown-toggle" href="{{ url('doors') }}">Doors</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-has-children"><a class="dropdown-item dropdown-toggle" href="{{ url('category/residential-doors') }}">Residential Doors</a>

                                        <?php
                                            $residentialProducts = $productViewHelper->getResidentialProductLists();
                                        ?>

                                        <ul class="sub-menu">
                                            <?php foreach ($residentialProducts as $key => $value) { ?>

                                            <li><a class="menu-item" href="/<?php echo trim($value['url_key']);?>"><?php echo trim($value['name']);?></a>
                                            </li>

                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-has-children"><a class="dropdown-item dropdown-toggle" href="{{ url('category/commercial-doors') }}">Commercial Doors</a>
                                        <?php
                                            $commercialProducts = $productViewHelper->getCommercialProductLists();
                                        ?>
                                        <ul class="sub-menu">
                                            <?php foreach ($commercialProducts as $key => $value) { ?>
                                            <li><a class="menu-item" href="/<?php echo trim($value['url_key']);?>"><?php echo trim($value['name']);?></a>
                                            </li>
                                             <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                                <li class="menu-item menu-item-has-children"><a class="dropdown-item dropdown-toggle" href="{{ url('windows') }}">Windows</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-has-children"><a class="dropdown-item dropdown-toggle" href="{{ url('category/aluminium-windows') }}">Aluminium Windows</a>
                                        <ul class="sub-menu">
                                            <li><a class="menu-item" href="{{ url('sliding-aluminium-windows') }}">Sliding Aluminium Windows</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-has-children"><a class="dropdown-item dropdown-toggle" href="{{ url('category/steel-windows') }}">Steel Windows</a>
                                        <ul class="sub-menu">
                                            <li><a class="menu-item" href="{{ url('swing-and-slide-window') }}">Swing and Slide Window</a>
                                            </li>
                                            <li><a class="menu-item" href="{{ url('casement-windows') }}">Casement Windows</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            </ul>
                        </li>
                        <!-- changes -->
                        <li class="menu-item menu-item-has-children">   <a href="#">BUYERS GUIDE</a>
                            <ul class="sub-menu">
                                <li class="menu-item">  <a href="{{ url('page/why-tata-pravesh') }}">Why Tata Pravesh</a>
                                </li>
                                <li class="menu-item">  <a href="{{ url('page/comparison') }}">Comparison</a>
                                </li>
                                <li class="menu-item">  <a href="{{ url('page/select-the-best-door') }}">Select the Best Door</a>
                                </li>
                                <li class="menu-item">  <a href="{{ url('page/ask-the-expert') }}">Ask the Expert</a>
                                </li>
                                <li class="menu-item">  <a href="{{ url('store-locator') }}">Store Near You</a>
                                </li>
                                <li class="menu-item">  <a href="{{ url('brochures') }}">Retail Brochure</a>
                                </li>
                                <li class="menu-item">  <a href="{{ url('faq') }}">FAQs</a>
                                </li>
                                <li class="menu-item">  <a href="{{ url('page/testimonials') }}">Testimonials</a></li>
                            </ul>
                        </li>
                        <!-- end changes -->
                        <li class="contact menu-item">  <a class="partner" href="{{ url('page/support') }}">SUPPORT</a></li>
                        <li class="contact menu-item mobOn">    <a class="partner" href="{{ url('about-us') }}">ABOUT US</a>
                        </li>
                        <li class="contact menu-item mobOn">    <a class="partner" href="#">BLOG</a>
                        </li>
                        <li class="contact menu-item mobOn">    <a class="partner" href="{{ url('faq') }}">FAQ</a>
                        </li>
                        <li class="contact menu-item mobOn">    <a class="partner" href="{{ url('contact-us') }}">CONTACT US</a>
                        </li>
                        <li class="contact menu-item mobOn">    <a class="partner" href="#">PRIVACY POLICY</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hamburger-menu">
                <div class="bar"></div>
            </div>
        </nav>
        <div class="search-box">
            <form role="search" action="{{ route('shop.search.index') }}" method="GET" style="display: contents;">               
                <input
                    required
                    name="term"
                    type="search"
                    value="{{ ! $image_search ? $term : '' }}"
                    class="search-field search-input"
                    id="search-bar"
                    placeholder="{{ __('shop::app.header.search-text') }}"
                >
                <button class="search-btn"><i class="fas fa-search"></i>
                    </button>
            </form>
        </div>
        <div class="cart-dropdown-container cart">
            @include('shop::checkout.cart.mini-cart')
        </div>
        <div class="wishlist">
            <a href="{{ route('customer.wishlist.index') }}">
                <img src="{{ asset('/themes/velocity/assets/images/wishlist.svg') }}" alt="Wishlist">                                
            </a>
        </div>
        <div class="account-dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                <a href="{{ url('checkout/cart') }}"><img src="{{ asset('/themes/velocity/assets/images/user.png') }}" alt=""></a> <span class="caret"></span>
            </button>
            
            @guest('customer')
                <ul class="dropdown-list account guest dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li style="margin:10px;">
                        <div>
                            <label style="color: #9e9e9e; font-weight: 700; text-transform: uppercase; font-size: 15px;">
                                {{ __('shop::app.header.title') }}
                            </label>
                        </div>

                        <div style="margin-top: 5px;">
                            <span style="font-size: 12px;">{{ __('shop::app.header.dropdown-text') }}</span>
                        </div>

                        <div style="margin-top: 15px;">
                            <a class="btn btn-primary btn-md" href="{{ route('customer.session.index') }}" style="color: #ffffff">
                                {{ __('shop::app.header.sign-in') }}
                            </a>

                            <a class="btn btn-primary btn-md" href="{{ route('customer.register.index') }}" style="float: right; color: #ffffff">
                                {{ __('shop::app.header.sign-up') }}
                            </a>
                        </div>
                    </li>
                </ul>
            @endguest

            @auth('customer')
                @php
                   $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false;
                @endphp
                <!-- <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="dashboard.html"><img src="images/menu-icon-1.svg" alt="My Account"> My Account</a>
                </li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="orders.html"><img src="images/menu-icon-2.svg" alt="My Account"> My Orders</a>
                </li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="address.html"><img src="images/menu-icon-3.svg" alt="My Account"> My Adressess</a>
                </li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="coupons.html"><img src="images/menu-icon-4.svg" alt="My Account"> My Coupons</a>
                </li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="wishlist.html"><img src="images/menu-icon-5.svg" alt="My Account"> My Wishlist</a>
                </li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="cards.html"><img src="images/menu-icon-6.svg" alt="My Account"> My Saved Cards</a>
                </li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="browsing-history.html"><img src="images/menu-icon-7.svg" alt="My Account"> My Browsing History</a>
                </li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="images/menu-icon-8.svg" alt="My Account"><b> Logout</b></a>
                </li>
              </ul> -->
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="#">{{ auth()->guard('customer')->user()->first_name }}</a>
<!-- 
                            <label style="color: #9e9e9e; font-weight: 700; text-transform: uppercase; font-size: 15px;">
                                {{ auth()->guard('customer')->user()->first_name }}
                            </label> -->
                    </li>  

                        <!-- <ul> -->
                            <li role="presentation">
                                
                                <a href="{{ route('customer.overview.index') }}"><img src="{{ asset('/themes/velocity/assets/images/menu-icon-1.svg') }}" alt="My Account">My Account</a>
                            </li>

                            <li role="presentation">
                                
                                <a href="{{ route('customer.orders.index') }}"><img src="{{ asset('/themes/velocity/assets/images/menu-icon-2.svg') }}" alt="My Orders">My Orders</a>
                            </li>

                            <li role="presentation">
                                
                                <a href="{{ route('customer.address.index') }}"><img src="{{ asset('/themes/velocity/assets/images/menu-icon-3.svg') }}" alt="My Orders">My Addressess</a>
                            </li>
                            @if ($showWishlist)
                                <li role="presentation">                                    
                                    <a href="{{ route('customer.wishlist.index') }}"><img src="{{ asset('/themes/velocity/assets/images/menu-icon-5.svg') }}" alt="My Account">{{ __('shop::app.header.wishlist') }}</a>
                                </li>
                            @endif

                            <li role="presentation">
                                <a href="{{ route('customer.coupon.index') }}"><img src="{{ asset('/themes/velocity/assets/images/menu-icon-4.svg') }}" alt="My Account"> My Coupons</a>
                            </li>

                            <li role="presentation">                                
                                <a href="{{ route('customer.browsinghistory.index') }}"><img src="{{ asset('/themes/velocity/assets/images/menu-icon-7.svg') }}" alt="My Browsing History">My Browsing History</a>
                            </li>

                            <li role="presentation">                                
                                <a href="{{ route('customer.session.destroy') }}"><img src="{{ asset('/themes/velocity/assets/images/menu-icon-8.svg') }}" alt="My Account">{{ __('shop::app.header.logout') }}</a>
                            </li>
                        <!-- </ul> -->
                    <!-- </li> -->
                </ul>
            @endauth
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
</header>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs" defer></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet" defer></script>

<script type="text/x-template" id="image-search-component-template">
<div v-if="image_search_status">
<label class="image-search-container" :for="'image-search-container-' + _uid">
<i class="icon camera-icon"></i>

<input type="file" :id="'image-search-container-' + _uid" ref="image_search_input" v-on:change="uploadImage()"/>

<img :id="'uploaded-image-url-' +  + _uid" :src="uploaded_image_url" alt="" width="20" height="20" />
</label>
</div>
</script>

<script>

Vue.component('image-search-component', {

template: '#image-search-component-template',

data: function() {
return {
    uploaded_image_url: '',
    image_search_status: "{{core()->getConfigData('general.content.shop.image_search') == '1' ? 'true' : 'false'}}" == 'true'
}
},

methods: {
uploadImage: function() {
    var imageInput = this.$refs.image_search_input;

    if (imageInput.files && imageInput.files[0]) {
        if (imageInput.files[0].type.includes('image/')) {
            var self = this;

            if (imageInput.files[0].size <= 2000000) {
                self.$root.showLoader();

                var formData = new FormData();

                formData.append('image', imageInput.files[0]);

                axios.post("{{ route('shop.image.search.upload') }}", formData, {headers: {'Content-Type': 'multipart/form-data'}})
                    .then(function(response) {
                        self.uploaded_image_url = response.data;

                        var net;

                        async function app() {
                            var analysedResult = [];

                            var queryString = '';

                            net = await mobilenet.load();

                            const imgElement = document.getElementById('uploaded-image-url-' +  + self._uid);

                            try {
                                const result = await net.classify(imgElement);

                                result.forEach(function(value) {
                                    queryString = value.className.split(',');

                                    if (queryString.length > 1) {
                                        analysedResult = analysedResult.concat(queryString)
                                    } else {
                                        analysedResult.push(queryString[0])
                                    }
                                });
                            } catch (error) {
                                self.$root.hideLoader();

                                window.flashMessages = [
                                    {
                                        'type': 'alert-error',
                                        'message': "{{ __('shop::app.common.error') }}"
                                    }
                                ];

                                self.$root.addFlashMessages();
                            };

                            localStorage.searched_image_url = self.uploaded_image_url;

                            queryString = localStorage.searched_terms = analysedResult.join('_');

                            self.$root.hideLoader();

                            window.location.href = "{{ route('shop.search.index') }}" + '?term=' + queryString + '&image-search=1';
                        }

                        app();
                    })
                    .catch(function(error) {
                        self.$root.hideLoader();

                        window.flashMessages = [
                            {
                                'type': 'alert-error',
                                'message': "{{ __('shop::app.common.error') }}"
                            }
                        ];

                        self.$root.addFlashMessages();
                    });
            } else {

                imageInput.value = '';

                        window.flashMessages = [
                            {
                                'type': 'alert-error',
                                'message': "{{ __('shop::app.common.image-upload-limit') }}"
                            }
                        ];

                self.$root.addFlashMessages();

            }
        } else {
            imageInput.value = '';

            alert('Only images (.jpeg, .jpg, .png, ..) are allowed.');
        }
    }
}
}
});

</script>

<script>
$(document).ready(function() {

$('body').delegate('#search, .icon-menu-close, .icon.icon-menu', 'click', function(e) {
toggleDropdown(e);
});

@auth('customer')
@php
    $compareCount = app('Webkul\Velocity\Repositories\VelocityCustomerCompareProductRepository')
        ->count([
            'customer_id' => auth()->guard('customer')->user()->id,
        ]);
@endphp

let comparedItems = JSON.parse(localStorage.getItem('compared_product'));
$('#compare-items-count').html({{ $compareCount }});
@endauth

@guest('customer')
let comparedItems = JSON.parse(localStorage.getItem('compared_product'));
$('#compare-items-count').html(comparedItems ? comparedItems.length : 0);
@endguest

function toggleDropdown(e) {
var currentElement = $(e.currentTarget);

if (currentElement.hasClass('icon-search')) {
    currentElement.removeClass('icon-search');
    currentElement.addClass('icon-menu-close');
    $('#hammenu').removeClass('icon-menu-close');
    $('#hammenu').addClass('icon-menu');
    $("#search-responsive").css("display", "block");
    $("#header-bottom").css("display", "none");
} else if (currentElement.hasClass('icon-menu')) {
    currentElement.removeClass('icon-menu');
    currentElement.addClass('icon-menu-close');
    $('#search').removeClass('icon-menu-close');
    $('#search').addClass('icon-search');
    $("#search-responsive").css("display", "none");
    $("#header-bottom").css("display", "block");
} else {
    currentElement.removeClass('icon-menu-close');
    $("#search-responsive").css("display", "none");
    $("#header-bottom").css("display", "none");
    if (currentElement.attr("id") == 'search') {
        currentElement.addClass('icon-search');
    } else {
        currentElement.addClass('icon-menu');
    }
}
}
});
</script>
@endpush 