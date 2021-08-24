@extends('shop::layouts.master')

@section('page_title')
Contact Us
@stop

@push('styles')
<style>
	.tabs{background: inherit;}
</style>
@endpush

@section('content-wrapper')
<style>
	.tabs{background: inherit;}
</style>
<div class="about-banner cf">
			<img src="/themes/default/assets/images/about-us/about-us-banner.jpg" alt="Banner">
			<div class="container">
				<h1>Contact Us</h1>
			</div>
		</div>

	<section class="contact-us">
		<div class="container">
		  	<div class="contact-sect">  		
				<ul class="tabs" style="background: inherit;">
					<li class="tab-link current" data-tab="tab-1">For Sales Enquiry</li>
					<li class="tab-link" data-tab="tab-2">For Dealership Enquiry</li>
					<li class="tab-link" data-tab="tab-3">For Projects</li>
				</ul>
				<div id="tab-1" class="tab-content current">
					<form action="" id="contact1" method="post" novalidate="novalidate">
						<div class="form-border">
							<h2>Let’s Be in Touch</h2>
							<p>In case you have any query, please leave your details and we will get back to you shortly:</p>
							<div class="from-row">
								<div class="left-from">
								  <input type="text" data-name="name" name="name" id="name" placeholder="Your Name" class="flex-input">
								</div>
								<div class="left-from">
								  <input type="text" data-name="pin" name="pin" id="pin" placeholder="Pincode" class="flex-input">
								</div>
							</div>
							<div class="from-row">
								<div class="left-from">
								  <input type="text" data-name="email" name="email" id="email" placeholder="Email Address" class="flex-input">
								</div>
								<div class="left-from">
								  <input type="text" data-name="phone" name="phone" id="phone" placeholder="Phone Number" class="flex-input">
								</div>
						  	</div>
							<div class="from-row">
								<lable>Message</lable>
								<textarea name="description" id="description" maxlength="32000" rows="5" placeholder="Type Your Message Here" class="flex-input0"></textarea>
							</div>
							<input type="hidden" id="type" name="type" value="customer">
						</div>
						<div class="from-row">
							 <button id="contactBtn" type="button" onclick="saveContact('contact1')" class="sub-btn">Submit</button>
						</div>
					</form>
				</div>
				<div id="tab-2" class="tab-content">
					<form action="" id="contact2" method="post" novalidate="novalidate">
						<div class="form-border">
							<h2>Let’s Be in Touch</h2>
							<p>In case you have any query, please leave your details and we will get back to you shortly:</p>
							<div class="from-row">
								<div class="left-from">
								  <input type="text" data-name="name" name="name" id="name" placeholder="Your Name" class="flex-input">
								</div>
								<div class="left-from">
								  <input type="text" data-name="pin" name="pin" id="pin" placeholder="Pincode" class="flex-input">
								</div>
							</div>
							<div class="from-row">
								<div class="left-from">
								  <input type="text" data-name="email" name="email" id="email" placeholder="Email Address" class="flex-input">
								</div>
								<div class="left-from">
								  <input type="text" data-name="phone" name="phone" id="phone" placeholder="Phone Number" class="flex-input">
								</div>
						  	</div>
							<div class="from-row">
								<lable>Message</lable>
								<textarea name="description" id="description" maxlength="32000" rows="5" placeholder="Type Your Message Here" class="flex-input0"></textarea>
							</div>
							<input type="hidden" id="type" name="type" value="dealer">
						</div>
						<div class="from-row">
							 <button id="contactBtn" type="button"  onclick="saveContact('contact2')" class="sub-btn">Submit</button>
						</div>
					</form>
				</div>
				<div id="tab-3" class="tab-content">
					<form action="" id="contact3" method="post" novalidate="novalidate">
						<div class="form-border">
							<h2>Let’s Be in Touch</h2>
							<p>In case you have any query, please leave your details and we will get back to you shortly:</p>
							<div class="from-row">
								<div class="left-from">
								  <input type="text" data-name="name" name="name" id="name" placeholder="Your Name" class="flex-input">
								</div>
								<div class="left-from">
								  <input type="text" data-name="pin" name="pin" id="pin" placeholder="Pincode" class="flex-input">
								</div>
							</div>
							<div class="from-row">
								<div class="left-from">
								  <input type="text" data-name="email" name="email" id="email" placeholder="Email Address" class="flex-input">
								</div>
								<div class="left-from">
								  <input type="text" data-name="phone" name="phone" id="phone" placeholder="Phone Number" class="flex-input">
								</div>
						  	</div>
							<div class="from-row">
								<lable>Message</lable>
								<textarea name="description" id="description" maxlength="32000" rows="5" placeholder="Type Your Message Here" class="flex-input0"></textarea>
							</div>
							<input type="hidden" name="type" id="type" value="projects">
						</div>
						<div class="from-row">
							 <button id="contactBtn" type="button"  onclick="saveContact('contact3')" class="sub-btn">Submit</button>
						</div>
					</form>
				</div>			
			</div>
		</div>
	</section>	
		
		
	<section class="chat-section">
		  <div class="container">
			 <div class="chat-sect">
			   <img src="/themes/default/assets/images/fusion-door-payment/support.png" alt="">
				 <p class="chat-title0">PHONE</p>
				 <span class="chat-title1">SUPPORT</span>
			     <p class="chat-title2">Speak directly to a member<br> of our support team</p>
				 <a href="#" class="toll-no">1800 4199 200</a>
			  </div>
			<div class="chat-sect">
			   <img src="/themes/default/assets/images/fusion-door-payment/chat.png" alt="">
				 <p class="chat-title0">LIVE</p>
				 <span class="chat-title1">CHAT</span>
			     <p class="chat-title2">Neque porro quisquam est qui dolorem ipsum quia</p>
				 <a href="#" class="chat-box">CHAT WITH US</a>
			  </div>
			  
			  <!-- <div class="chat-sect">
			   <img src="/themes/default/assets/images/fusion-door-payment/whatsapp.png" alt="">
				 <p class="chat-title0">TALK WITH US ON</p>
				 <span class="chat-title1">Whatsapp</span>
			     <p class="chat-title2">Neque porro quisquam est qui dolorem ipsum quia</p>
				 <a href="#" class="chat-box">TALK WITH US</a>
			  </div> -->
			  
			  <div class="chat-sect">
			   <img src="/themes/default/assets/images/fusion-door-payment/mail.png" alt="">
				 <p class="chat-title0">ESCALATION</p>
				 <span class="chat-title1">Mail us</span>
			     <p class="chat-title2">Neque porro quisquam est qui dolorem ipsum quia</p>
				 <a href="#" class="chat-box">EMAIL TO US</a>
			  </div>
			</div>
		</section>	
		
		
		
		

		<section class="door-sect">
			<div class="container">
				<div class="door-col">
					<a href="{{ url('category/residential-doors') }}"><img src="/themes/default/assets/images/residential-doors-img.webp" alt=""></a>
					<div class="overlay"></div>
				</div>
				<div class="door-col">
					<a href="{{ url('category/commercial-doors') }}">
					<img src="/themes/default/assets/images/commercial-doors-img.webp" alt=""></a>
					<div class="overlay"></div>
				</div>
				<div class="door-col">
					<a href="{{ url('windows') }}">
					<img src="/themes/default/assets/images/window-img.webp" alt=""></a>
					<div class="overlay"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</section>
@endsection
@push('scripts')
<script>
	
//tab-script-in-contac-us-start
$(document).ready(function(){
	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})
})

function saveContact(form)
{
alert('hii');
var name = $('#'+form+' #name').val();
var email = $('#'+form+' #email').val();
var phone = $('#'+form+' #phone').val();
var pin = $('#'+form+' #pin').val();
var type = $('#'+form+' #type').val();
var description = $('#'+form+' #description').val();

if(name == '' || email == '' || phone == '' || pin == '' || description == '')
{
	alert('Please fill all details');
	return false;
}
else
{
	var APP_URL = {!! json_encode(url('/')) !!}
	$.ajax({
	      url: APP_URL+"/save-contact-us",
	      type:"POST",                                    
	      data:{                                    
	        name:name,
	        email:email,
	        phone:phone,
	        type:type,
	        pin:pin,
	        description:description,
	      },
	      beforeSend: function (request) {
	      	return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
	        },
	      success:function(response){	        
	        
	        alert(response.success);
	        location.reload();
	       
	      },
	     });
}
}

// $('#contactBtn').click(function(){


// });
//tab-script-in-contac-us-end
</script>
@endpush