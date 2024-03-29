@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.onepage.title') }}
@stop

@section('content-wrapper')
    <checkout></checkout>
@endsection

@push('scripts')
    @include('shop::checkout.cart.coupon')

    <script type="text/x-template" id="checkout-template">
    
        <div id="checkout" class="checkout-process">
            <div class="col-main">
                <ul class="checkout-steps">
                    <li class="active" :class="[completed_step >= 0 ? 'active' : '', completed_step > 0 ? 'completed' : '']" @click="navigateToStep(1)">
                        <div class="decorator address-info"></div>
                        <span>{{ __('shop::app.checkout.onepage.information') }}</span>
                    </li>

                    <div class="line mb-25"></div>

                    @if (!$cart->haveStockableItems())
                        <li :class="[current_step == 2 || completed_step > 1 ? 'active' : '', completed_step > 1 ? 'completed' : '']" @click="navigateToStep(2)">
                            <div class="decorator shipping"></div>
                            <span>{{ __('shop::app.checkout.onepage.shipping') }}</span>
                        </li>

                        <div class="line mb-25"></div>
                    @endif

                    <li :class="[current_step == 3 || completed_step > 2 ? 'active' : '', completed_step > 2 ? 'completed' : '']" @click="navigateToStep(3)">
                        <div class="decorator payment"></div>
                        <span>{{ __('shop::app.checkout.onepage.payment') }}</span>
                    </li>

                    <div class="line mb-25"></div>

                    <li :class="[current_step == 4 ? 'active' : '']">
                        <div class="decorator review"></div>
                        <span>{{ __('shop::app.checkout.onepage.review') }}</span>
                    </li>
                </ul>
                <div class="step-content information container" v-show="current_step == 1" id="address-section">
                    <section class="products-payment cart">
                        <div class="left-sect">                            
                                @include('shop::checkout.onepage.customer-info')
                        </div>
                        <div class="right-sect">
                            <div class="right-sect2">
                                <div class="coupons-sect">

                                    <p class="pay-title"><img src="../../themes/velocity/assets/images/deliver-icon.png" alt="">Deliver</p>
                                    <p class="est-head">estimated delivery by</p>
                                    <span class="est-head2"><?php echo date('d M Y',strtotime("+60 days"));?></span><br><br>

                                    <p class="pay-title">
                                        <img src="../../themes/default/assets/images/fusion-door-payment/coupons.svg" alt="">Apply Coupons</p>
                                    <div class="inputgroup3">
                                        <coupon-component></coupon-component>
                                    </div>
                                </div>
                                <div class="price-details">
                                    @include('shop::checkout.total.summary', ['cart' => $cart])
                                
                                    <button type="button" class="contbtn" @click="validateForm('address-form')" :disabled="disable_button" id="checkout-address-continue-button">
                                        {{ __('shop::app.checkout.onepage.continue') }}
                                    </button>
                                </div>                        
                            </div>
                        </div>
                    </section>
                </div>
                <div class="step-content shipping" v-show="current_step == 2" id="shipping-section">
                    <section class="products-payment cart">
                        <div class="left-sect">
                                <shipping-section v-if="current_step == 2" @onShippingMethodSelected="shippingMethodSelected($event)"></shipping-section>
                        </div>
                        <div class="right-sect">
                            <div class="right-sect2">
                                <div class="price-details">
                                    @include('shop::checkout.total.summary', ['cart' => $cart])
                                
                                    <button type="button" class="contbtn" @click="validateForm('shipping-form')" :disabled="disable_button" id="checkout-shipping-continue-button">
                                        {{ __('shop::app.checkout.onepage.continue') }}
                                    </button>
                                </div>                        
                            </div>
                        </div>
                    </section>
                </div>
                <div class="step-content payment" v-show="current_step == 3" id="payment-section">
                    <section class="products-payment cart">
                        <div class="left-sect">
                            <payment-section v-if="current_step == 3" @onPaymentMethodSelected="paymentMethodSelected($event)"></payment-section>
                        </div>
                        <div class="right-sect">
                            <div class="right-sect2">
                                <div class="price-details">
                                    @include('shop::checkout.total.summary', ['cart' => $cart])
                                
                                    <button type="button" class="contbtn" @click="validateForm('payment-form')" :disabled="disable_button" id="checkout-payment-continue-button">
                                        {{ __('shop::app.checkout.onepage.continue') }}
                                    </button>
                                </div>                        
                            </div>
                        </div>
                    </section>
                </div>

                <div class="step-content review" v-show="current_step == 4" id="summary-section">
                    <review-section v-if="current_step == 4" :key="reviewComponentKey">
                        <div slot="summary-section">
                            
                            @include('shop::checkout.total.summary', ['cart' => $cart])

                            

                        
                             <input type="hidden" id="total_cost" name="total_cost" value="{{ core()->currency($cart->base_grand_total) }}">
                           
                        </div>
                    </review-section>

                    <div class="button-group">
                    
                    
                      
                       
                    
                        <div class="paypal-button-container"></div>
                    </div>
                </div>
            </div>

            
        </div>
    
    </script>

    <script>
        var shippingHtml = '';
        var paymentHtml = '';
        var reviewHtml = '';
        var summaryHtml = '';
        var customerAddress = '';
        var shippingMethods = '';
        var paymentMethods = '';

        @auth('customer')
            @if(auth('customer')->user()->addresses)
                customerAddress = @json(auth('customer')->user()->addresses);
                customerAddress.email = "{{ auth('customer')->user()->email }}";
                customerAddress.first_name = "{{ auth('customer')->user()->first_name }}";
                customerAddress.last_name = "{{ auth('customer')->user()->last_name }}";
            @endif
        @endauth

        Vue.component('checkout', {
            template: '#checkout-template',
            inject: ['$validator'],

            data: function() {
                return {
                    step_numbers: {
                        'information': 1,
                        'shipping': 2,
                        'payment': 3,
                        'review': 4
                    },

                    current_step: 1,

                    completed_step: 0,

                    address: {
                        billing: {
                            address1: [''],

                            use_for_shipping: true,
                        },

                        shipping: {
                            address1: ['']
                        },
                    },

                    selected_shipping_method: '',

                    selected_payment_method: '',

                    disable_button: false,

                    new_shipping_address: false,

                    new_billing_address: false,

                    allAddress: {},

                    countryStates: @json(core()->groupedStatesByCountries()),

                    country: @json(core()->countries()),

                    summeryComponentKey: 0,

                    reviewComponentKey: 0,

                    is_customer_exist: 0
                }
            },

            created: function() {
                this.getOrderSummary();

                if(! customerAddress) {
                    this.new_shipping_address = true;
                    this.new_billing_address = true;
                } else {
                    this.address.billing.first_name = this.address.shipping.first_name = customerAddress.first_name;
                    this.address.billing.last_name = this.address.shipping.last_name = customerAddress.last_name;
                    this.address.billing.email = this.address.shipping.email = customerAddress.email;

                    if (customerAddress.length < 1) {
                        this.new_shipping_address = true;
                        this.new_billing_address = true;
                    } else {
                        this.allAddress = customerAddress;

                        for (var country in this.country) {
                            for (var code in this.allAddress) {
                                if (this.allAddress[code].country) {
                                    if (this.allAddress[code].country == this.country[country].code) {
                                        this.allAddress[code]['country'] = this.country[country].name;
                                    }
                                }
                            }
                        }
                    }
                }
            },

            methods: {
                navigateToStep: function(step) {
                    if (step <= this.completed_step) {
                        this.current_step = step
                        this.completed_step = step - 1;
                    }
                },

                haveStates: function(addressType) {
                    if (this.countryStates[this.address[addressType].country] && this.countryStates[this.address[addressType].country].length)
                        return true;

                    return false;
                },

                validateForm: async function(scope) {
                    var this_this = this;

                    await this.$validator.validateAll(scope).then(function (result) {
                        if (result) {
                            if (scope == 'address-form') {
                                this_this.saveAddress();
                            } else if (scope == 'shipping-form') {
                                this_this.saveShipping();
                            } else if (scope == 'payment-form') {
                                this_this.savePayment();
                            }
                        }
                    });
                },

                isCustomerExist: function() {
                    this.$validator.attach({ name: "email", rules: "required|email" });

                    var this_this = this;

                    this.$validator.validate('email', this.address.billing.email)
                        .then(function(isValid) {
                            if (! isValid)
                                return;

                            this_this.$http.post("{{ route('customer.checkout.exist') }}", {email: this_this.address.billing.email})
                                .then(function(response) {
                                    this_this.is_customer_exist = response.data ? 1 : 0;
                                })
                                .catch(function (error) {})

                        })
                },

                loginCustomer: function() {
                    var this_this = this;

                    this_this.$http.post("{{ route('customer.checkout.login') }}", {
                            email: this_this.address.billing.email,
                            password: this_this.address.billing.password
                        })
                        .then(function(response) {
                            if (response.data.success) {
                                window.location.href = "{{ route('shop.checkout.onepage.index') }}";
                            } else {
                                window.flashMessages = [{'type': 'alert-error', 'message': response.data.error }];

                                this_this.$root.addFlashMessages()
                            }
                        })
                        .catch(function (error) {})
                },

                getOrderSummary () {
                    var this_this = this;

                    this.$http.get("{{ route('shop.checkout.summary') }}")
                        .then(function(response) {
                            summaryHtml = Vue.compile(response.data.html)

                            this_this.summeryComponentKey++;
                            //this_this.reviewComponentKey++;
                        })
                        .catch(function (error) {})
                },

                saveAddress: async function() {
                    var this_this = this;

                    this.disable_button = true;

                    if (this.allAddress.length > 0) {
                        let address = this.allAddress.forEach(address => {
                            if (address.id == this.address.billing.address_id) {
                                this.address.billing.address1 = [address.address1];
                            }

                            if (address.id == this.address.shipping.address_id) {
                                this.address.shipping.address1 = [address.address1];
                            }
                        });
                    }

                    this.$http.post("{{ route('shop.checkout.save-address') }}", this.address)
                        .then(function(response) {
                            this_this.disable_button = false;

                            if (this_this.step_numbers[response.data.jump_to_section] == 2)
                                shippingHtml = Vue.compile(response.data.html)
                                //paymentHtml = Vue.compile(response.data.html)
                            else
                                paymentHtml = Vue.compile(response.data.html)

                            this_this.completed_step = this_this.step_numbers[response.data.jump_to_section] - 1;
                            this_this.current_step = this_this.step_numbers[response.data.jump_to_section];

                            shippingMethods = response.data.shippingMethods;
                            paymentMethods  = response.data.paymentMethods;

                            this_this.getOrderSummary();
                        })
                        .catch(function (error) {
                            this_this.disable_button = false;

                            this_this.handleErrorResponse(error.response, 'address-form')
                        })
                },

                saveShipping: async function() {
                    var this_this = this;

                    this.disable_button = true;

                    this.$http.post("{{ route('shop.checkout.save-shipping') }}", {'shipping_method': this.selected_shipping_method})
                        .then(function(response) {
                            this_this.disable_button = false;

                            paymentHtml = Vue.compile(response.data.html)
                            this_this.completed_step = this_this.step_numbers[response.data.jump_to_section] - 1;
                            this_this.current_step = this_this.step_numbers[response.data.jump_to_section];

                            paymentMethods = response.data.paymentMethods;

                            this_this.getOrderSummary();
                        })
                        .catch(function (error) {
                            this_this.disable_button = false;

                            this_this.handleErrorResponse(error.response, 'shipping-form')
                        })
                },

                savePayment: async function() {
                    var this_this = this;

                    this.disable_button = true;

                    this.$http.post("{{ route('shop.checkout.save-payment') }}", {'payment': this.selected_payment_method})
                    .then(function(response) {
                        this_this.disable_button = false;

                        reviewHtml = Vue.compile(response.data.html)
                        this_this.completed_step = this_this.step_numbers[response.data.jump_to_section] - 1;
                        this_this.current_step = this_this.step_numbers[response.data.jump_to_section];

                        this_this.getOrderSummary();
                    })
                    .catch(function (error) {
                        this_this.disable_button = false;

                        this_this.handleErrorResponse(error.response, 'payment-form')
                    });
                },

                placeOrder: async function() {
                    var this_this = this;

                    this.disable_button = true;

                    var first_name = $('#first_name').val();
                    var last_name = $('#last_name').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var address1 = $('#address1').val();
                    var postcode = $('#postcode').val();
                    var city = $('#city').val();
                    var state = $('#state').val();
                    var country = $('#country').val();        
                    var address2 = $('#address2').val();
                    var cost = $('#total_cost').val();
                    var productName = $('#product_name').val();

                  

                    this.$http.post("{{ route('shop.checkout.save-order') }}", {'_token': "{{ csrf_token() }}"})
                    .then(function(response) {
                        if (response.data.success) {
                            if (response.data.redirect_url) {
                                window.location.href = response.data.redirect_url;
                            } else {
                                window.location.href = "{{ route('shop.checkout.success') }}";
                            }
                        }
                    })
                    .catch(function (error) {
                        this_this.disable_button = true;

                        window.flashMessages = [{'type': 'alert-error', 'message': "{{ __('shop::app.common.error') }}" }];

                        this_this.$root.addFlashMessages()
                    })
                },

                handleErrorResponse: function(response, scope) {
                    if (response.status == 422) {
                        serverErrors = response.data.errors;
                        this.$root.addServerErrors(scope)
                    } else if (response.status == 403) {
                        if (response.data.redirect_url) {
                            window.location.href = response.data.redirect_url;
                        }
                    }
                },

                shippingMethodSelected: function(shippingMethod) {
                    this.selected_shipping_method = shippingMethod;
                },

                paymentMethodSelected: function(paymentMethod) {
                    this.selected_payment_method = paymentMethod;
                },

                newBillingAddress: function() {
                    this.new_billing_address = true;
                    this.address.billing.address_id = null;
                },

                newShippingAddress: function() {
                    this.new_shipping_address = true;
                    this.address.shipping.address_id = null;
                },

                backToSavedBillingAddress: function() {
                    this.new_billing_address = false;
                },

                backToSavedShippingAddress: function() {
                    this.new_shipping_address = false;
                },
            }
        })

        var shippingTemplateRenderFns = [];

        Vue.component('shipping-section', {
            inject: ['$validator'],

            data: function() {
                return {
                    templateRender: null,

                    selected_shipping_method: '',

                    first_iteration : true,
                }
            },

            staticRenderFns: shippingTemplateRenderFns,

            mounted: function() {
                for (method in shippingMethods) {
                    if (this.first_iteration) {
                        for (rate in shippingMethods[method]['rates']) {
                            this.selected_shipping_method = shippingMethods[method]['rates'][rate]['method'];
                            this.first_iteration = false;
                            this.methodSelected();
                        }
                    }
                }

                this.templateRender = shippingHtml.render;
                for (var i in shippingHtml.staticRenderFns) {
                    shippingTemplateRenderFns.push(shippingHtml.staticRenderFns[i]);
                }

                eventBus.$emit('after-checkout-shipping-section-added');
            },

            render: function(h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                    ]);
            },

            methods: {
                methodSelected: function() {
                    this.$emit('onShippingMethodSelected', this.selected_shipping_method)

                    eventBus.$emit('after-shipping-method-selected', this.selected_shipping_method);
                }
            }
        })

        var paymentTemplateRenderFns = [];

        Vue.component('payment-section', {
            inject: ['$validator'],

            data: function() {
                return {
                    templateRender: null,

                    payment: {
                        method: ""
                    },

                    first_iteration : true,
                }
            },

            staticRenderFns: paymentTemplateRenderFns,

            mounted: function() {
                for (method in paymentMethods) {
                    if (this.first_iteration) {
                        this.payment.method = paymentMethods[method]['method'];
                        this.first_iteration = false;
                        this.methodSelected();
                    }
                }

                this.templateRender = paymentHtml.render;
                for (var i in paymentHtml.staticRenderFns) {
                    paymentTemplateRenderFns.push(paymentHtml.staticRenderFns[i]);
                }

                eventBus.$emit('after-checkout-payment-section-added');
            },

            render: function(h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                    ]);
            },

            methods: {
                methodSelected: function() {
                    this.$emit('onPaymentMethodSelected', this.payment);

                    $('.paypal-button-container').empty();

                    eventBus.$emit('after-payment-method-selected', this.payment);
                }
            }
        })

        var reviewTemplateRenderFns = [];

        Vue.component('review-section', {
            data: function() {
                return {
                    templateRender: null,

                    error_message: ''
                }
            },

            staticRenderFns: reviewTemplateRenderFns,

            render: function(h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                    ]);
            },

            mounted: function() {
                this.templateRender = reviewHtml.render;

                for (var i in reviewHtml.staticRenderFns) {
                    // reviewTemplateRenderFns.push(reviewHtml.staticRenderFns[i]);
                    reviewTemplateRenderFns[i] = reviewHtml.staticRenderFns[i];
                }

                this.$forceUpdate();
            }
        });


        var summaryTemplateRenderFns = [];

        Vue.component('summary-section', {
            inject: ['$validator'],

            data: function() {
                return {
                    templateRender: null
                }
            },

            staticRenderFns: summaryTemplateRenderFns,

            mounted: function() {
                this.templateRender = summaryHtml.render;

                for (var i in summaryHtml.staticRenderFns) {
                    // summaryTemplateRenderFns.push(summaryHtml.staticRenderFns[i]);
                    summaryTemplateRenderFns[i] = summaryHtml.staticRenderFns[i];
                }

                this.$forceUpdate();
            },

            render: function(h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                    ]);
            }
        })
    </script>
    <script type="text/javascript">

    function frmsubmit()
    {
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var address1 = $('#address1').val();
        var postcode = $('#postcode').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var country = $('#country').val();        
        var address2 = $('#address2').val();
        var cost = $('#total_cost').val();
        var productName = $('#product_name').val();
        
        var APP_URL = {!! json_encode(url('/')) !!}       
            
            $.ajax({
                  url: APP_URL+"/payu_payment",
                  type:"POST",                                    
                  data:{                                    
                    email:email,
                    productinfo:productName,
                    amount:cost,
                    address2:address2,
                    phone:phone,
                    country:country,
                    state:state,
                    city:city,
                    Zipcode:postcode,
                    address1:address1,
                    Lastname:last_name,
                    firstname:first_name
                  },
                  beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                  success:function(response){
                    
                    
                    $('body').append(response);
                        
                   
                  },
                 });


    }

    </script>

@endpush
