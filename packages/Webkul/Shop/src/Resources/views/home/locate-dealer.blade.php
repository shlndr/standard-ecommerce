<?php

// echo"<pre>";print_r($sliderData);die; 


?>
<section class="locate-dealers">
			<div class="container">
				<h2>Locate <strong>The Store</strong></h2>
				<div class="locate-row animated zoomIn wow">
					<aside>
						<picture>
						  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/map-img.webp') }}">
						  <img src="{{ asset('/themes/velocity/assets/images/map-img.jpg') }}" alt="">
						</picture>
					</aside>
					<article>
						<div class="top-title">
							<div class="top-lt1"><strong>Store</strong> Near you</div>
							<div class="top-rt1">
								<input type="text" class="flex-box0" autocomplete="off" id="city" value="" name="city" placeholder="City / Pin Code">
								<button class="btn go-btn" onclick="dealer()" type="button ">GO</button>
							</div>
						</div>
					<div id="storelocator" style="color:#fff">	
						<?php 
						if(!empty($sliderData['store'])){
						foreach ($sliderData['store'] as $key => $value) { ?>
							
						
						<div class="dealer-row">
							<div class="deal-lt">
								<p class="loc-icon">
									<img src="{{ asset('/themes/velocity/assets/images/location-icon.png') }}" alt="">
								</p>
								<p class="loc-text"><strong>{{ $value->shop_name }}</strong> 
									<br>{{ $value->address }}
									<br>{{ $value->name }}
									<br>{{ $value->contact_no }}</p>
							</div>
							<div class="deal-rt">
								<!-- <p class="ten-km">10KM</p> -->
								<p class="ten-green"><a href="https://www.google.com/maps/search/?api=1&query={{ $value->latitude }},{{ $value->longitude }}" style="color:#C0D143;">GET DIRECTION </a></p>
							</div>
						</div>

						<?php } } ?>
					</div>
						<!-- <div class="dealer-row">
							<div class="deal-lt">
								<p class="loc-icon">
									<img src="{{ asset('/themes/velocity/assets/images/location-icon.png') }}" alt="">
								</p>
								<p class="loc-text"><strong>Dealer Name</strong> 
									<br>Address goes here, landmark, city
									<br>state and pin code.
									<br>Name Of Manager
									<br>Contact No.</p>
							</div>
							<div class="deal-rt">
								<p class="ten-km">15KM</p>
								<p class="ten-green">GET DIRECTION</p>
							</div>
						</div>  -->
						<a href="{{ url('store-locator') }}" class="view-btn">VIEW ALL STORES</a>
					</article>
				</div>
				<div class="view-now"><a href="{{ url('store-locator') }}" class="view-all-btn">Go To Store Locator </a>                  </div>
			</div>
		</section>
		<script type="text/javascript">

		function dealer()
		{
			var APP_URL = {!! json_encode(url('/')) !!}
            var textboxval = $('#city').val(); 

            if(textboxval == '')
            {
            	alert('Please enter pincode');
            	return false;
            }                       
            
            $.ajax({
                  url: APP_URL+"/get-dealer",
                  type:"GET",                                    
                  data:{                                    
                    param:textboxval,
                    type:1
                  },
                  beforeSend: function (request) {
                    },
                  success:function(response){
                    
                    var html = '';
                    $('#storelocator').html('');
                    if(response.data.length > 0 && response.data.other == 0)
                    {
                    	
	                    $.each(response.data, function(index, value) {
	                    	var url = "https://www.google.com/maps/search/?api=1&query="+value.latitude+","+value.longitude;

	                    	html += "<div class='dealer-row'><div class='deal-lt'><p class='loc-icon'><img src="+APP_URL+"/themes/velocity/assets/images/location-icon.png alt=''></p><p class='loc-text'><strong>"+value.shop_name+"</strong><br>"+value.address+"<br>"+value.name+"<br>"+value.contact_no+"</p></div><div class='deal-rt'><p class='ten-green'><a href="+url+" target='_blank' style='color:#C0D143;'>GET DIRECTION </a></p></div></div>";
	                    });	                     
	                }
	                else
	                {
	                	html = '<p style="padding: 0 0 10px 0;">Dealers not available in your region. Checkout other dealers.</p>';

	                	$.each(response.data, function(index, value) {
	                		var url = "https://www.google.com/maps/search/?api=1&query="+value.latitude+","+value.longitude;

	                		html += "<div class='dealer-row'><div class='deal-lt'><p class='loc-icon'><img src="+APP_URL+"/themes/velocity/assets/images/location-icon.png alt=''></p><p class='loc-text'><strong>"+value.shop_name+"</strong><br>"+value.address+"<br>"+value.name+"<br>"+value.contact_no+"</p></div><div class='deal-rt'><p class='ten-green'><a href="+url+" target='_blank' style='color:#C0D143;'>GET DIRECTION </a></p></div></div>";
	                	});
	                }
	                	$('#storelocator').append(html);
                   
                  },
                 });
        }
		</script>