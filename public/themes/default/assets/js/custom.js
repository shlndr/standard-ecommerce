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
$(document).ready(function () {

    // when the page loads
    autocollapse('#nav',50); 
    
    // when the window is resized
    $(window).on('resize', function () {
        autocollapse('#nav',50); 
    });

});


  /******MENU********/
  /*Get in Touch*/

$(document).ready(function(){
  $(".btn.getin-btn").click(function(){
    $("#slideout").toggleClass("open");
  });
  $(".close").click(function(){   
      $("#slideout").removeClass('open');
  });
});


  $(function()
  {

    //Owl Slider 1
  			// $(document).ready(function() {
     //            $('.owl1').owlCarousel({
  			// 		nav:false,
  			// 		autoplay:true,
  			// 		autoplayTimeout: 8000,
  			// 		smartSpeed: 1500,
  			// 		loop:true,
  			// 		responsive:{
  			// 		0:{
  			// 			items:1
  			// 		}
  			// 	}

  			// });
     //          });
  			//END Owl Slider 1
  			
  			//Owl Slider 2
  			$(document).ready(function() {
          $('.owl2').owlCarousel({
      margin: 30,
      dots: true,
      autoplay: false,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      responsiveClass: true,
      loop: true,
    nav:true,
      navText: ["<img src='themes/default/assets/images/arrow-prev0.png'>", "<img src='themes/default/assets/images/arrow-next0.png'>"],
      responsive: {
        0: {
          items: 1
        },
        480: {
          items: 1
        },
        640: {
          items: 1
        },
        850: {
          items: 1
        },
        1180: {
          items: 1,
        }
      }
    })
  });
  			//END Owl Slider 2
  			
  			//Owl Slider 3
  			$(document).ready(function() {
                $('.owl3').owlCarousel({
                  loop: true,
                  margin: 30,
  				nav: false,
  				dots:  true,				  
                  autoplay: false,
                  autoplayTimeout: 5000,
                  autoplayHoverPause: true,
                  responsiveClass: true,
                  responsive: {
  					0: {
                      items: 1
                    },
                    480: {
                      items: 1
                    },
                    600: {
                      items: 2                    
                    },
                    900: {
                      items: 3                    
                    }
                  }
                })
              });
  			//END Owl Slider 3	
  	
  	
  	
  	//Owl Slider 4 for OTHER SERVICES
  			$(document).ready(function() {
                $('.owl4').owlCarousel({
                  loop: true,
                  margin: 0,
                  autoplay: true,
                  autoplayTimeout: 5000,
                  autoplayHoverPause: true,
                  responsiveClass: true,
                  responsive: {
                    0: {
                      items: 1,
                      nav: true
                    },
                    480: {
                      items: 1,
                      nav: true
                    },
                    640: {
                      items: 2,
                      nav: true,
                      margin: 20
                    },
                    768: {
                      items: 3,
                      nav: true,
                      loop: true,
                      margin: 30
                    },
                    1024: {
                      items: 3,
                      nav: true,
                      loop: true,
                      margin: 30
                    },
                    1225: {
                      items: 4,
                      nav: true,
                      loop: true,
                      margin: 20
                    }
                  }
                })
              });
  			//END Owl Slider 4
	  
	  $(document).ready(function() {
        $('.owl5').owlCarousel({
        margin: 15,
		autoplay: true,
        autoplayTimeout: 110005000,
        autoplayHoverPause: true,
		autoHeight:true,
        nav: true,
        loop: true,
		navText: ["<img src='themes/default/assets/images/arrow-prev.png'>","<img src='themes/default/assets/images/arrow-next.png'>"],
        responsive: {
                0: {
                    items: 1
                },
                776: {
                    items: 1
                },
                991: {
                    items: 2
                },
                1023: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
      })
    });
  	
//Owl Slider 6
$(document).ready(function() {
  $('.owl6').owlCarousel({
    margin: 15,
		autoplay: true,
    autoplayTimeout: 110005000,
    autoplayHoverPause: true,
		autoHeight:true,
    nav: true,
    loop: true,
		navText: ["<img src='themes/default/assets/images/arrow-prev.png'>","<img src='themes/default/assets/images/arrow-next.png'>"],
    responsive: {
      0: {
          items: 1
      },
      776: {
          items: 2
      },
      991: {
          items: 2
      },
      1023: {
          items: 3
      },
      1200: {
          items: 4
      }
    }
  })
});
  			//END Owl Slider 6
	  
	  //Owl Slider 7
  			$(document).ready(function() {
        $('.owl7').owlCarousel({
      margin: 0,
      autoplay: true,
      autoplayTimeout: 110005000,
      autoplayHoverPause: true,
      autoHeight: true,
      nav: false,
      loop: true,
      responsive: {
        0: {
          items: 1
        },
        767: {
          items: 1
        },
        1280: {
          items: 1,
          nav: false
        }
      },
      onTranslate: function (event) {
        var currentSlide, player, command;
        currentSlide = $('.owl-item.active');
        player = currentSlide.find("aside .videoWrapper iframe").get(0);
        command = {
          "event": "command",
          "func": "pauseVideo"
        };
        if (player != undefined) {
          player.contentWindow.postMessage(JSON.stringify(command), "*");
        }
      }
    })
  });
  			//END Owl Slider 7


  	

  // contact us

  // function add()
  // {

  //     var contact_form = $('#contact_form').serialize();

  //     var dataString = contact_form+'&action=add_data';

  //     $.ajax({

  //                 type: "POST",
  //                 url: 'https://www.logicserve.com/ae-en/add.php',
  //                 data: dataString,
  //                 cache: false,

  //                 success: function(result)
  //                 {

  //                     var JSONObject = JSON.parse(result);

  //                     var rslt = JSONObject[0]['status'];

  //                     var msg = JSONObject[0]['msg'];

  //                     if(rslt == '0')
  //                     {
  //                       document.getElementById("error").style.display = "none";
  //                         document.getElementById("success").style.display = "block";
  //                         $("#success").fadeOut(5000);
  //                         $('#contact_form')[0].reset();
  //                     }
  //                     else
  //                     {
  //                         document.getElementById("success").style.display = "none";
  //                         document.getElementById("error").style.display = "block";
  //                         document.getElementById("error").innerHTML = msg;
  //                         $("#error").fadeOut(5000);
  //                     }
  //                 }
  //             });
  // }

  // function newsletter()
  // 	        {

  // 	            var newsletter_form = $('#newsletter_form').serialize();

  // 	            var dataString = newsletter_form+'&action=newsletter';

  // 	            $.ajax({

  // 	                        type: "POST",
  // 	                        url: 'add.php', 
  // 	                        data: dataString,
  // 	                        cache: false,

  // 	                        success: function(result)
  // 	                        {
  // // alert(result);
  // 	                            var JSONObject = JSON.parse(result);

  // 	                            var rslt = JSONObject[0]['status'];

  // 	                            var msg = JSONObject[0]['msg'];
  	                            
  // 	                            if(rslt == '0')
  // 	                            {
  // 	                              document.getElementById("error").style.display = "none";
  // 	                                document.getElementById("success").style.display = "block";
  // 	                                $("#success").fadeOut(5000);
  // 	                                $('#contact_form')[0].reset();
  // 	                            }
  // 	                            else 
  // 	                            {
  // 	                              	document.getElementById("success").style.display = "none";
  // 	                                document.getElementById("error").style.display = "block";
  // 	                                document.getElementById("error").innerHTML = msg;
  // 	                                $("#error").fadeOut(5000);
  // 	                            }
  // 	                        }
  // 	                    });
  // 	        }

  });

//magnify img scroller product page CHANGES /////////////////////////////////////////////////////////////////////////////////////////////
/**
 * by MonsterDuang
 */
if($(window).width() >= 991){
  // do your stuff
  (function($) {
    /**
     * 1, The thumbnail size is the same as the parent container size
     * 2, Parent container href attribute is the HD image path
     */
    $.fn.zoomImage = function(paras) {
        /**
         * Default parameter
         */
        var defaultParas = {
            layerW: 100, // Mask width
            layerH: 100, // Mask height
            layerOpacity: 0.2, // Mask transparency
            layerBgc: '#000', // Mask background color
            showPanelW: 300, // Display magnified area width
            showPanelH: 300, // Display zoom area high
            marginL: 50, // Magnification area from the right side of the thumbnail
            marginT: 0 // Zoom in area from the top side of the thumbnail
        };

        paras = $.extend({}, defaultParas, paras);

        $(this).each(function() {
            var self = $(this).css({position: 'relative'});
            var selfOffset = self.offset();
            var imageW = self.width(); // Picture height
            var imageH = self.height();

            self.find('img').css({
                //width: '100%',
                //height: '100%'
            });

            // Wide magnification
            var wTimes = paras.showPanelW / paras.layerW;
            // High magnification
            var hTimes = paras.showPanelH / paras.layerH;

            // Zoom in picture
            var img = $('<img>').attr('src', self.attr("href")).css({
                position: 'absolute',
                left: '0',
                top: '0',
                width: imageW * wTimes,
                height: imageH * hTimes
            }).attr('id', 'big-img');

            // Mask
            var layer = $('<div>').css({
                display: 'none',
                position: 'absolute',
                left: '0',
                top: '0',
                backgroundColor: paras.layerBgc,
                width: paras.layerW,
                height: paras.layerH,
                opacity: paras.layerOpacity,
                border: '1px solid #ccc',
                cursor: 'crosshair'
            });

            // Magnified area
            var showPanel = $('<div>').css({
                display: 'none',
                position: 'absolute',
                overflow: 'hidden',
                left: imageW + 20,
                top: 0,
                width: paras.showPanelW,
                height: paras.showPanelH
            }).append(img).addClass('zoomShow');

            self.append(layer).append(showPanel);

            self.on('mousemove', function(e) {
                // The coordinates of the mouse relative to the thumbnail container
                var x = e.pageX - selfOffset.left;
                var y = e.pageY - selfOffset.top;

                if(x <= paras.layerW / 2) {
                    x = 0;
                }else if(x >= imageW - paras.layerW / 2) {
                    x = imageW - paras.layerW;
                }else {
                    x = x - paras.layerW / 2;
                }

                if(y < paras.layerH / 2) {
                    y = 0;
                } else if(y >= imageH - paras.layerH / 2) {
                    y = imageH - paras.layerH;
                } else {
                    y = y - paras.layerH / 2;
                }

                layer.css({
                    left: x,
                    top: y
                });

                img.css({
                    left: -x * wTimes,
                    top: -y * hTimes
                });
            }).on('mouseenter', function() {
                layer.show();
                showPanel.show();
            }).on('mouseleave', function() {
                layer.hide();
                showPanel.hide();
            });
        });
    }
  })(jQuery);
} if($(window).width() < 991) {
  ;(function($) {
    /**
     * 1, The thumbnail size is the same as the parent container size
     * 2, Parent container href attribute is the HD image path
     */
    $.fn.zoomImage = function(paras) {
        /**
         * Default parameter
         */
        var defaultParas = {
            layerW: 100, // Mask width
            layerH: 100, // Mask height
            layerOpacity: 0.2, // Mask transparency
            layerBgc: '#000', // Mask background color
            showPanelW: 150, // Display magnified area width
            showPanelH: 150, // Display zoom area high
            marginL: 50, // Magnification area from the right side of the thumbnail
            marginT: 0 // Zoom in area from the top side of the thumbnail
        };

        paras = $.extend({}, defaultParas, paras);

        $(this).each(function() {
            var self = $(this).css({position: 'relative'});
            var selfOffset = self.offset();
            var imageW = self.width(); // Picture height
            var imageH = self.height();

            self.find('img').css({
                //width: '100%',
                //height: '100%'
            });

            // Wide magnification
            var wTimes = paras.showPanelW / paras.layerW;
            // High magnification
            var hTimes = paras.showPanelH / paras.layerH;

            // Zoom in picture
            var img = $('<img>').attr('src', self.attr("href")).css({
                position: 'absolute',
                left: '0',
                top: '0',
                width: imageW * wTimes,
                height: imageH * hTimes
            }).attr('id', 'big-img');

            // Mask
            var layer = $('<div>').css({
                display: 'none',
                position: 'absolute',
                left: '0',
                top: '0',
                backgroundColor: paras.layerBgc,
                width: paras.layerW,
                height: paras.layerH,
                opacity: paras.layerOpacity,
                border: '1px solid #ccc',
                cursor: 'crosshair'
            });

            // Magnified area
            var showPanel = $('<div>').css({
                display: 'none',
                position: 'absolute',
                overflow: 'hidden',
                left: imageW/2,
                top: imageH/2,
                width: paras.showPanelW,
                height: paras.showPanelH
            }).append(img).addClass('zoomShow');

            self.append(layer).append(showPanel);

            self.on('mousemove', function(e) {
                // The coordinates of the mouse relative to the thumbnail container
                var x = e.pageX - selfOffset.left;
                var y = e.pageY - selfOffset.top;

                if(x <= paras.layerW / 2) {
                    x = 0;
                }else if(x >= imageW - paras.layerW / 2) {
                    x = imageW - paras.layerW;
                }else {
                    x = x - paras.layerW / 2;
                }

                if(y < paras.layerH / 2) {
                    y = 0;
                } else if(y >= imageH - paras.layerH / 2) {
                    y = imageH - paras.layerH;
                } else {
                    y = y - paras.layerH / 2;
                }

                layer.css({
                    left: x,
                    top: y
                });

                img.css({
                    left: -x * wTimes,
                    top: -y * hTimes
                });
            }).on('mouseenter', function() {
                layer.show();
                showPanel.show();
            }).on('mouseleave', function() {
                layer.hide();
                showPanel.hide();
            });
        });
    }
  })(jQuery);
}



/// 1more 
$('.show').zoomImage();
$('.show-small-img:first-of-type').css({'border': '1px solid #1a80e6', 'padding': '2px'})
$('.show-small-img:first-of-type').attr('alt', 'now').siblings().removeAttr('alt')
//$('.show-small-img').click(function () { 
$('.show-small-img').mouseover(function () {
  $('#show-img').attr('src', $(this).attr('src'))
  $('#big-img').attr('src', $(this).attr('src'))
  $(this).attr('alt', 'now').siblings().removeAttr('alt')
  $(this).css({'border': '1px solid #1a80e6', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
  if ($('#small-img-roll').children().length > 4) {
    if ($(this).index() >= 3 && $(this).index() < $('#small-img-roll').children().length - 1){
      $('#small-img-roll').css('left', -($(this).index() - 2) * 76 + 'px')
    } else if ($(this).index() == $('#small-img-roll').children().length - 1) {
      $('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
    } else {
      $('#small-img-roll').css('left', '0')
    }
  }
})


//end magnify img scroller product page CHANGES ////////////////////////////////////////////////////////////////////////////////////////////
