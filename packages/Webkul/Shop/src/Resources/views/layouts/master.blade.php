<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <title>@yield('page_title')</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#000000">
    <link rel="icon" href="http://onlinereviews.org.uk/tatapraveshuat/wp-content/uploads/2019/07/cropped-Tata-Pravesh-Favicon-512-X-512-32x32.png" sizes="32x32" />
    <link rel="icon" href="http://onlinereviews.org.uk/tatapraveshuat/wp-content/uploads/2019/07/cropped-Tata-Pravesh-Favicon-512-X-512-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="http://onlinereviews.org.uk/tatapraveshuat/wp-content/uploads/2019/07/cropped-Tata-Pravesh-Favicon-512-X-512-180x180.png" />
    <!-- <meta name="_token" content="{{{ csrf_token() }}}"/> -->
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">

    <!-- <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/ui.css') }}"> -->


    

    @if(Request::url() == URL::to('/checkout/onepage'))

    <link rel="stylesheet" href="{{ bagisto_asset('css/shop.css') }}">

    @endif

    <link rel="stylesheet" href="{{ bagisto_asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ bagisto_asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bagisto_asset('css/door.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bagisto_asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bagisto_asset('css/animate.css') }}"><!-- changes -->

    @if ($favicon = core()->getCurrentChannel()->favicon_url)
        <link rel="icon" sizes="16x16" href="{{ $favicon }}" />
    @else
        <link rel="icon" sizes="16x16" href="{{ bagisto_asset('images/favicon.ico') }}" />
    @endif

    @yield('head')

    @section('seo')
        @if (! request()->is('/'))
            <meta name="description" content="{{ core()->getCurrentChannel()->description }}"/>
        @endif
    @show

    @stack('css')

    {!! view_render_event('bagisto.shop.layout.head') !!}

    <style>
        {!! core()->getConfigData('general.content.custom_scripts.custom_css') !!}
    </style>

</head>

<!-- //nanorep floating widget -->
<script>!function(t,e,o,c,n,a){var s=window.nanorep=window.nanorep||{};s=s[e]=s[e]||{},s.apiHost=a,s.host=n,s.path=c,s.account=t,s.protocol="https:"===location.protocol?"https:":"http:",s.on=s.on||function(){s._calls=s._calls||[],s._calls.push([].slice.call(arguments))};var p=s.protocol+"//"+n+c+o+"?account="+t,l=document.createElement("script");l.async=l.defer=!0,l.setAttribute("src",p),document.getElementsByTagName("head")[0].appendChild(l)}("tatasteelmarketing","floatingWidget","floating-widget.js","/web/","tatasteelmarketing.nanorep.co");</script>
<!-- //nanorep floating widget -->
<body id="home" @if (core()->getCurrentLocale() && core()->getCurrentLocale()->direction == 'rtl') class="rtl" @endif style="scroll-behavior: smooth;">

    {!! view_render_event('bagisto.shop.layout.body.before') !!}


    {!! view_render_event('bagisto.shop.layout.header.before') !!}

    @include('shop::layouts.header.index')

    {!! view_render_event('bagisto.shop.layout.header.after') !!}
    
    @yield('slider')
    <!-- <div id="sidebar" class="sidebar">
     <a href="#" class="chat-new">
      <img src="{{ asset('/themes/velocity/assets/images/chat-img.png') }}" alt="Images">
       </a>
    </div>    
    
    <div class="book-demo">
     <a href="#" class="book-btn">BOOK A DEMO
       </a>
    </div> -->
    
    <div class="main" id="app">
        <flash-wrapper ref='flashes'></flash-wrapper>
        {!! view_render_event('bagisto.shop.layout.content.before') !!}
        
        @yield('content-wrapper')

        {!! view_render_event('bagisto.shop.layout.content.after') !!}

        {!! view_render_event('bagisto.shop.layout.footer.before') !!}

        @include('shop::layouts.footer.footer')

        {!! view_render_event('bagisto.shop.layout.footer.after') !!}
        <!-- <overlay-loader :is-open="show_loader"></overlay-loader> -->
    </div>

    <script type="text/javascript">
        window.flashMessages = [];

        @if ($success = session('success'))
            window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
        @elseif ($warning = session('warning'))
            window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
        @elseif ($error = session('error'))
            window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }];
        @elseif ($info = session('info'))
            window.flashMessages = [{'type': 'alert-info', 'message': "{{ $info }}" }];
        @endif

        window.serverErrors = [];

        @if (isset($errors))
            @if (count($errors))
                window.serverErrors = @json($errors->getMessages());
            @endif
        @endif

    </script>




      <script type="text/javascript" src="{{ bagisto_asset('js/jquery-1.12.0.min.js') }}"></script>
      
    <script type="text/javascript" src="{{ bagisto_asset('js/bootstrap.min.js') }}"></script>
    <script defer src="{{ bagisto_asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ bagisto_asset('js/main.js') }}" type="text/javascript"></script>
    <script src="{{ bagisto_asset('js/custom.js') }}"></script>
    <script src="{{ bagisto_asset('js/jquery.validate.min.js') }}"></script> 
    <script src="{{ bagisto_asset('js/jquery.popupoverlay.js') }}"></script> 
    <script src="{{ bagisto_asset('js/wow.js') }}"></script> 
    <script src="{{ bagisto_asset('js/jquery.scrolling-tabs.js') }}"></script> 

<!--     <script>window._bcvma = window._bcvma || [];
//   _bcvma.push(["setAccountID", "116458097399148554"]);
//   _bcvma.push(["setParameter", "WebsiteID", "117786546486123707"]);
//   _bcvma.push(["setParameter", "VisitName", ""]);
//   _bcvma.push(["setParameter", "VisitPhone", ""]);
//   _bcvma.push(["setParameter", "VisitEmail", ""]);
//   _bcvma.push(["setParameter", "VisitRef", ""]);
//   _bcvma.push(["setParameter", "VisitInfo", ""]);
//   _bcvma.push(["setParameter", "CustomUrl", ""]);
//   _bcvma.push(["setParameter", "WindowParameters", ""]);
//   _bcvma.push(["addFloat", {type: "chat", id: "117786544054837068"}]);
//   _bcvma.push(["pageViewed"]);
//   var bcLoad = function(){
//     if(window.bcLoaded) return; window.bcLoaded = true;
//     var vms = document.createElement("script"); vms.type = "text/javascript"; vms.async = true;
//     vms.src = ('https:'==document.location.protocol?'https://':'http://') + "vmss-eu.boldchat.com/aid/116458097399148554/bc.vms4/vms.js";
//     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vms, s);
//   };
//   if(window.pageViewer && pageViewer.load) pageViewer.load();
//   else if(document.readyState=="complete") bcLoad();
//   else if(window.addEventListener) window.addEventListener('load', bcLoad, false);
//   else window.attachEvent('onload', bcLoad);


// //Opens the widget after 5000 milliseconds
// setTimeout(function(){
// var bcFloat = document.getElementsByClassName("bcFloat");
// bcFloat[0].getElementsByTagName('img')[0].click();},5000);</script>  

-->

<script>jQuery(function($){
jQuery('.button').click(function() {
jQuery('.popup').css('display', 'block');
});
jQuery('.close').click(function() {
jQuery('.popup').css('display', 'none');
});});</script> <script>jQuery(function($){
jQuery('.button2').click(function() {
jQuery('.popup2').css('display', 'block');
});
jQuery('.close2').click(function() {
jQuery('.popup2').css('display', 'none');
});});</script>

    <script type="application/javascript">
    
    //TESTIMONIAL POPUP changes
    $(document).ready(function () {
        $('.well').popup({
          transition: 'all 0.3s',
          closebutton: true
        });
        
        $('.closePop').click(function(){
          $('.well').popup('hide');
        });
      });
    //TESTIMONIAL POPUP END

    $(document).ready(function(){          
         $(function(){
                $.validator.addMethod("lettersonly", function(value, element) {
                  return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
                }, "Letters only please.");
                 $.validator.addMethod("startw", function(value, element) {
                   return this.optional(element) || /(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[6789]\d{0}|(\d[ -]?){10}\d$/i.test(value);
                 }, "start with 6, 7, 8, 9");
                 $.validator.addMethod("valEmail", function(value, element) {
                     // allow any non-whitespace characters as the host part
                     return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
                     },"Invalid mail ID");
         
         
         
                     $.validator.addMethod("zipcode", function(value, element) {
                         return this.optional(element) || /^[0-9]{6}$/.test(value);
                       }, "Please provide a pincode.");
         
         
                
               


               $("#regFormLpVal").validate({
                     highlight: function(element) {
                         $(element).parent('div').addClass('error');
                     },
                     unhighlight: function(element) {
                         $(element).parent('div').removeClass('error');
                     },
                     errorPlacement: function(error, element) {
                       if (element.is(':checkbox')) {
                             $(element).next().addClass('error');
                             error.appendTo(".chkeror");
                       }
                       else {
                             $(element).after(error);
                       }
                 },
                 errorElement: 'b',
                 onfocusout: function(e) {
                   this.element(e);
                 },
                 errorClass: 'help-block',
                   rules:{
                         fName:{required: true, lettersonly: true},
                         phone:{ required: true, startw:true,minlength:10,  maxlength:11},
                         pin:{required: true, minlength:6,  maxlength:7},
                         email:{required: true, valEmail: true},
                         // 'tnc':{required: true},
                         product:{required: true},
                         category:{required: true},
                         support:{required: true},
                         
         
         
                   },
                   messages:{
                       fName:{ required: 'Field is required'},
                       email:{ required: 'Field is required'},
                       phone:{ required: 'Mobile is required.', minlength: '10 digit number only', maxlength: '11 digit number only'},
                       pin:{ required: 'Pin Code is required.', minlength: '6 digit number only', maxlength: '7 digit number only'},
                       // 'tnc':{required: 'Accept term and condition'},
                       category:{ required: 'Select Floor Size'},
                       product:{ required: 'Select Planned Installation'},
                       support:{ required: 'Select Support Required'},
         
                   },
                   submitHandler: function(form) 
                   {
                        
                        var APP_URL = {!! json_encode(url('/')) !!}
                        var name = $('#fName').val();
                        var email = $('#email').val();
                        var phone = $('#phone').val();
                        var pincode = $('#pin').val();
                        var category = $('#category option:selected').text();
                        var product = $('#product option:selected').text();
                        var support = $('#support option:selected').text();
                        var description = $('#description').val();
                        
                             $.ajax({
                                  url: APP_URL+"/reach-out",
                                  type:"POST",                                    
                                  data:{
                                    
                                    name:name,
                                    email:email,
                                    mobile:phone,
                                    pincode:pincode,
                                    floorsize:category,
                                    date_of_installation:product,
                                    support:support,
                                    description:description,
                                  },
                                  beforeSend: function (request) {
                                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                                    },
                                  success:function(response){
                                    console.log(response);
                                    alert(response.success);
                                    $("#regFormLpVal").trigger("reset");
                                  },
                                 });
                           
                   }
                 });
           });
         })/* Ready END */


         function onlyNumbersAndPlus(evt) {
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
/***** END FORM VALIDATION *********/
        
        $(document).ready(function () {
            $('.owl-carousel.owl1').owlCarousel({
                autoplay: true,
                autoplayTimeout: 5000,
                smartSpeed: 1500,
                autoHeight: true,
                loop: true,
                dots: true,
                nav: false,
                margin: 20,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
            
        });
        
        $(document).ready(function(){
            var str = location.href.toLowerCase();
            $('#cd-primary-nav li a').each(function() {
                if (str.indexOf(this.href.toLowerCase()) > -1) {
                    $("li.act").removeClass("act");
                    $("li.actSb").removeClass("actSb");
                    $(this).parent().addClass("act");
                    // $(this).parent().parent()..parent().addClass("actSb");
                }
            });
        
            $('.menu-item-has-children li a').each(function() {
                    if (str.indexOf(this.href.toLowerCase()) > -1) {
                             $("li.act").removeClass("act");
                            $("li.actSb").removeClass("actSb");
                            // $(this).parent().addClass("act");
                            $(this).parent().parent().parent().addClass("actSb");
                    }
            });
            $('.partner').click(function(){
                $("li").removeClass("act");
                $("li").removeClass("actSb");
                $("li.actSb").removeClass("actSb");
                $(this).parent().prev().removeClass('actSb');
                $(this).parent().parent().parent().removeClass('actSb');
                $(this).parent().addClass('act');
            })
        });


        //CATEGORY TABS SCROLL
                var autocollapse = function (menu,maxHeight) {
                    var nav = $(menu)
                    var navHeight = nav.innerHeight()
                    if (navHeight >= maxHeight) {
                        
                        $(menu + ' .dropdown').removeClass('d-none');
                        $(".navbar-nav").removeClass('w-auto').addClass("w-100");
                        
                        while (navHeight > maxHeight) {
                            //  add child to dropdown
                            var children = nav.children(menu + ' li:not(:last-child)');
                            var count = children.length;
                            $(children[count - 1]).prependTo(menu + ' .dropdown-menu');
                            navHeight = nav.innerHeight();
                        }
                        $(".navbar-nav").addClass("w-auto").removeClass('w-100');
                        
                    }
                    else {
                        
                        var collapsed = $(menu + ' .dropdown-menu').children(menu + ' li');
                      
                        if (collapsed.length===0) {
                          $(menu + ' .dropdown').addClass('d-none');
                        }
                      
                        while (navHeight < maxHeight && (nav.children(menu + ' li').length > 0) && collapsed.length > 0) {
                            //  remove child from dropdown
                            collapsed = $(menu + ' .dropdown-menu').children('li');
                            $(collapsed[0]).insertBefore(nav.children(menu + ' li:last-child'));
                            navHeight = nav.innerHeight();
                        }

                        if (navHeight > maxHeight) { 
                            autocollapse(menu,maxHeight);
                        }
                        
                    }
                };


                //Popular Blog Tabs
                function openCity(evt, cityName) {
                  var i, tabcontent, tablinks;
                  tabcontent = document.getElementsByClassName("tabcontent");
                  for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                  }
                  tablinks = document.getElementsByClassName("tablinks");
                  for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                  }
                  document.getElementById(cityName).style.display = "block";
                  evt.currentTarget.className += " active";
                }

    </script> 
    
    @if(Request::url() !== URL::to('/') && Request::url() !== URL::to('/page/testimonials') && Request::url() !== URL::to('/customer/account/addresses') && Request::url() !== URL::to('/checkmobileexist') && Request::url() !== URL::to('/page/support'))
    <script type="text/javascript" src="{{ bagisto_asset('js/shop.js') }}"></script>
    @endif
    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>
    @stack('scripts')

    {!! view_render_event('bagisto.shop.layout.body.after') !!}

    <div class="modal-overlay"></div>

    <script>
        {!! core()->getConfigData('general.content.custom_scripts.custom_javascript') !!}
    </script>
    
</body>

</html>