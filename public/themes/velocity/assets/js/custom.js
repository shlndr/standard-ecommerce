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
  			$(document).ready(function() {
                $('.owl1').owlCarousel({
  					nav:false,
  					autoplay:true,
  					autoplayTimeout: 8000,
  					smartSpeed: 1500,
  					loop:true,
  					responsive:{
  					0:{
  						items:1
  					}
  				}

  			});
              });
  			//END Owl Slider 1
  			
  			//Owl Slider 2
  			$(document).ready(function() {
  $('.owl2').owlCarousel({
  loop: true,
  margin: 30,
  nav: false,
  dots:  true,
  autoplay: true,
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
  640: {
  items: 2
  },
  850: {
  items: 3
  },
  1180: {
  items: 4
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
		navText: ["<img src='images/arrow-prev.png'>","<img src='images/arrow-next.png'>"],
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
		navText: ["<img src='images/arrow-prev.png'>","<img src='images/arrow-next.png'>"],
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
		autoHeight:true,
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
