<?php
    $term = request()->input('term');
    $image_search = request()->input('image-search');

    if (! is_null($term)) {
        $serachQuery = 'term='.request()->input('term');
    }
?>

<div id="wrap" class="cf">
        <div class="top-header cf">
            <div class="container">
                <ul class="contact-link">
                    <li>Call us toll free: <a href="tel:18004199200"> 1800 4199 200</a>
                    </li>
                    <li>Email us: <a href="mailto:18004199200"> all.tsl_support@connectcorp.com</a>
                    </li>
                </ul>
                <ul class="quick-link">
                    <li><a href="#">About Us</a>
                    </li>
                    <li><a href="#">Blogs</a>
                    </li>
                    <li><a href="#">FAQ's</a>
                    </li>
                    <li><a href="#">Contact Us</a>
                    </li>
                    <li><a href="#"><img src="{{ asset('/themes/velocity/assets/images/top-menu-icon.svg') }}" alt="Icon"></a>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
        <header class="header cf" id="header-sroll">
            <div class="over-menu"></div>
            <div class="container">
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
                                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Doors</a>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Residential Doors</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Fusion Doors</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Pearl Doors</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Coral Doors</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Oyster Doors</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Fly Mesh Doors</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Reflections – Natura Series</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Double Leaf Doors</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Commercial Doors</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Vision Panel Doors</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Full Glass Doors</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Louver Doors</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Shaft Duck Doors</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Windows</a>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Aluminium Windows</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Canvas Windows</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Steel Windows</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Vista Windows</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Coral & Oyster Windows</a>
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
                                        <li class="menu-item menu-item-has-children mobOn"> <a href="#">PRODUCTS</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item menu-item-has-children">   <a href="#">DOORS</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">  <a href="#">Residential Doors</a>
                                                        </li>
                                                        <li class="menu-item">  <a href="#">Commercial Doors</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children">   <a href="#">WINDOWS</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">  <a href="#">Aluminium Windows</a>
                                                        </li>
                                                        <li class="menu-item">  <a href="#">Steel Windows </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-has-children">   <a href="#">BUYERS GUIDE</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item">  <a href="#">Why Tata Pravesh</a>
                                                </li>
                                                <li class="menu-item">  <a href="#">Store Near You</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-has-children">   <a href="#">SUPPORT</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item">  <a href="#">Support 1</a>
                                                </li>
                                                <li class="menu-item">  <a href="#">Support 2</a>
                                                </li>
                                                <li class="menu-item">  <a href="#">Support 3</a>
                                                </li>
                                                <li class="menu-item">  <a href="#">Support 4</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="contact menu-item mobOn">    <a class="partner" href="#">ABOUT US</a>
                                        </li>
                                        <li class="contact menu-item mobOn">    <a class="partner" href="#">BLOG</a>
                                        </li>
                                        <li class="contact menu-item mobOn">    <a class="partner" href="#">FAQ</a>
                                        </li>
                                        <li class="contact menu-item mobOn">    <a class="partner" href="#">CONTACT US</a>
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
                            <form role="search" action="{{ route('shop.search.index') }}" method="GET" style="display: inherit;">
                                <label for="search-bar" style="position: absolute; z-index: -1;">Search</label>
                                <input
                                    required
                                    name="term"
                                    type="search"
                                    value="{{ ! $image_search ? $term : '' }}"
                                    class="search-field search-input"
                                    id="search-bar"
                                    placeholder="{{ __('shop::app.header.search-text') }}"
                                >

                                <!-- <image-search-component></image-search-component> -->

                                <div class="search-icon-wrapper">

                                    <!-- <button class="" class="background: none;" aria-label="Search">
                                        <i class="icon icon-search"></i>
                                    </button> -->
                                    <button class="search-btn"><i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="cart-dropdown-container">
                            <!-- <a href="#">
                                <img src="{{ asset('/themes/velocity/assets/images/cart.svg') }}" alt="Cart"><span>3</span>
                            </a> -->
                            @include('shop::checkout.cart.mini-cart')
                        </div>
                        <div class="wishlist">
                            <a href="#">
                                <img src="{{ asset('/themes/velocity/assets/images/wishlist.svg') }}" alt="Wishlist">
                                <!-- <span>3</span> -->
                            </a>
                        </div>
                        <div class="account-dropdown">
                            <span class="dropdown-toggle">
                                <img src="{{ asset('/themes/velocity/assets/images/user.png') }}" alt=""> <!-- <span class="caret"></span> -->
                                <span class="name">{{ __('shop::app.header.account') }}</span>
                                <i class="icon arrow-down-icon"></i>
                            </span>
                            
                            @guest('customer')
                                <ul class="dropdown-list account guest">
                                    <li>
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

                                <ul class="dropdown-list account customer">
                                    <li>
                                        <div>
                                            <label style="color: #9e9e9e; font-weight: 700; text-transform: uppercase; font-size: 15px;">
                                                {{ auth()->guard('customer')->user()->first_name }}
                                            </label>
                                        </div>

                                        <ul>
                                            <li>
                                                <a href="{{ route('customer.profile.index') }}">{{ __('shop::app.header.profile') }}</a>
                                            </li>

                                            @if ($showWishlist)
                                                <li>
                                                    <a href="{{ route('customer.wishlist.index') }}">{{ __('shop::app.header.wishlist') }}</a>
                                                </li>
                                            @endif

                                            <li>
                                                <a href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.header.cart') }}</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('customer.session.destroy') }}">{{ __('shop::app.header.logout') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            @endauth
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </header>
    </div>












<!-- <div class="header" id="header">
    <div class="header-top">
        <div class="left-content">
            <ul class="logo-container">
                <li>
                    <a href="{{ route('shop.home.index') }}" aria-label="Logo">
                        @if ($logo = core()->getCurrentChannel()->logo_url)
                            <img class="logo" src="{{ $logo }}" alt="" />
                        @else
                            <img class="logo" src="{{ bagisto_asset('images/logo.svg') }}" alt="" />
                        @endif
                    </a>
                </li>
            </ul>

            <ul class="search-container">
                <li class="search-group">
                    <form role="search" action="{{ route('shop.search.index') }}" method="GET" style="display: inherit;">
                        <label for="search-bar" style="position: absolute; z-index: -1;">Search</label>
                        <input
                            required
                            name="term"
                            type="search"
                            value="{{ ! $image_search ? $term : '' }}"
                            class="search-field"
                            id="search-bar"
                            placeholder="{{ __('shop::app.header.search-text') }}"
                        >

                        <image-search-component></image-search-component>

                        <div class="search-icon-wrapper">

                            <button class="" class="background: none;" aria-label="Search">
                                <i class="icon icon-search"></i>
                            </button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>

        <div class="right-content">

            <span class="search-box"><span class="icon icon-search" id="search"></span></span>

            <ul class="right-content-menu">

                {!! view_render_event('bagisto.shop.layout.header.comppare-item.before') !!}

                @php
                    $showCompare = core()->getConfigData('general.content.shop.compare_option') == "1" ? true : false
                @endphp

                @if ($showCompare)
                    <li class="compare-dropdown-container">
                        <a
                            @auth('customer')
                                href="{{ route('velocity.customer.product.compare') }}"
                            @endauth

                            @guest('customer')
                                href="{{ route('velocity.product.compare') }}"
                            @endguest
                            style="color: #242424;"
                            >

                            <i class="icon compare-icon"></i>
                            <span class="name">
                                {{ __('shop::app.customer.compare.text') }}
                                <span class="count">(<span id="compare-items-count"></span>)<span class="count">
                            </span>
                        </a>
                    </li>
                @endif

                {!! view_render_event('bagisto.shop.layout.header.compare-item.after') !!}

                {!! view_render_event('bagisto.shop.layout.header.currency-item.before') !!}

                @if (core()->getCurrentChannel()->currencies->count() > 1)
                    <li class="currency-switcher">
                        <span class="dropdown-toggle">
                            {{ core()->getCurrentCurrencyCode() }}

                            <i class="icon arrow-down-icon"></i>
                        </span>

                        <ul class="dropdown-list currency">
                            @foreach (core()->getCurrentChannel()->currencies as $currency)
                                <li>
                                    @if (isset($serachQuery))
                                        <a href="?{{ $serachQuery }}&currency={{ $currency->code }}">{{ $currency->code }}</a>
                                    @else
                                        <a href="?currency={{ $currency->code }}">{{ $currency->code }}</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif

                {!! view_render_event('bagisto.shop.layout.header.currency-item.after') !!}


                {!! view_render_event('bagisto.shop.layout.header.account-item.before') !!}

                <li>
                    <span class="dropdown-toggle">
                        <i class="icon account-icon"></i>

                        <span class="name">{{ __('shop::app.header.account') }}</span>

                        <i class="icon arrow-down-icon"></i>
                    </span>

                    @guest('customer')
                        <ul class="dropdown-list account guest">
                            <li>
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

                        <ul class="dropdown-list account customer">
                            <li>
                                <div>
                                    <label style="color: #9e9e9e; font-weight: 700; text-transform: uppercase; font-size: 15px;">
                                        {{ auth()->guard('customer')->user()->first_name }}
                                    </label>
                                </div>

                                <ul>
                                    <li>
                                        <a href="{{ route('customer.profile.index') }}">{{ __('shop::app.header.profile') }}</a>
                                    </li>

                                    @if ($showWishlist)
                                        <li>
                                            <a href="{{ route('customer.wishlist.index') }}">{{ __('shop::app.header.wishlist') }}</a>
                                        </li>
                                    @endif

                                    <li>
                                        <a href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.header.cart') }}</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('customer.session.destroy') }}">{{ __('shop::app.header.logout') }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endauth
                </li>

                {!! view_render_event('bagisto.shop.layout.header.account-item.after') !!}


                {!! view_render_event('bagisto.shop.layout.header.cart-item.before') !!}

                <li class="cart-dropdown-container">

                    @include('shop::checkout.cart.mini-cart')

                </li>

                {!! view_render_event('bagisto.shop.layout.header.cart-item.after') !!}

            </ul>

            <span class="menu-box" ><span class="icon icon-menu" id="hammenu"></span>
        </div>
    </div>

    <div class="header-bottom" id="header-bottom">
        @include('shop::layouts.header.nav-menu.navmenu')
    </div>

    <div class="search-responsive mt-10" id="search-responsive">
        <form role="search" action="{{ route('shop.search.index') }}" method="GET" style="display: inherit;">
            <div class="search-content">
                <button style="background: none; border: none; padding: 0px;">
                    <i class="icon icon-search"></i>
                </button>

                <image-search-component></image-search-component>

                <input type="search" name="term" class="search">
                <i class="icon icon-menu-back right"></i>
            </div>
        </form>
    </div>
</div> -->

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