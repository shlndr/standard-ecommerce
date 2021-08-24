@extends('shop::layouts.master')

@section('page_title')
    {{ __('Windows') }}
@stop

@section('content-wrapper')
<section class="every-door door-new">
	<div class="container">
		<div class="every-row green-bg">
			<div class="lt lt-0"><span>Add a Dose of Style with our</span>
				<h2>Wide Range Of Windows</h2>
				<p>On a journey to bring you the timeless stories<br> behind the best windows for your room</p>
			</div>
			<div class="rt rt0">
				<img src="{{ asset('/themes/velocity/assets/images/wide-range-windows.jpg') }}" alt="">
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</section>
<div class="door-categories">
	<div class="container">
		<div class="">
			<h2><strong>Windows</strong></h2>
			<p>Combining the strength of steel and the beauty of wood, Tata Pravesh doors and windows offer complete peace of mind to its users in terms of price, quality, durability and security.</p>
			<div class="col-lg-12 col-sm-12 catDtl">
				<div class="img">
					<img src="{{ asset('/themes/velocity/assets/images/catDtlWin-1.png') }}" alt="">
				</div>
				<div class="txt">
					<p>Tata Pravesh has introduced a revolutionary range of steel doors to keep your loved ones safe and secure. These doors are made to be durable, secure, long lasting, termite proof, fire resistant as well as environment friendly. At the same time, they are aesthetically suited for both residential and commercial spaces as they combine the strength of steel with elegance of wood.</p>
					<a href="{{ url('category/aluminium-windows') }}"><span>Aluminium</span> Windows</a><i class="fas fa-arrow-right"></i>
				</div>
				<div class="clear"></div>
			</div>
			<div class="col-lg-12 col-sm-12 catDtl">
				<div class="img">
					<img src="{{ asset('/themes/velocity/assets/images/catDtlWin-2.png') }}" alt="">
				</div>
				<div class="txt">
					<p>Tata Pravesh Doors offer range of products and services to cater all kind of big scale project needs. We have the expertise and product range to serve residential complexes, institutions like hospitals, hotels, educational institutes and office & retail spaces. We are present across country through our distribution network.</p>
					<a href="{{ url('category/steel-windows') }}"><span>Steel</span> Windows</a><i class="fas fa-arrow-right"></i>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
<section class="door-sect prodect-rang">
	<div class="container">
		<h2>Explore <strong>Product Range</strong></h2>  
		<div class="door-col">
			<a href="{{ url('category/residential-doors') }}"><img src="{{ asset('/themes/velocity/assets/images/residential-doors-img.webp') }}" alt=""></a>
			<div class="overlay"></div>
		</div>
		<div class="door-col">
			<a href="{{ url('category/commercial-doors') }}"><img src="{{ asset('/themes/velocity/assets/images/commercial-doors-img.webp') }}" alt=""></a>
			<div class="overlay"></div>
		</div>
		<div class="door-col">
			<a href="{{ url('windows') }}"><img src="{{ asset('/themes/velocity/assets/images/window-img.webp') }}" alt=""></a>
			<div class="overlay"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<section class="reach-sect">
	<div class="container">
		<div class="container-980">
			<div class="inner-from">
				<h3><strong>Reach out</strong> to us!</h3>
				<p>Looking for advice to choose the doors and windows?</p>
				<div class="formbx frmp">
					<form method="post" id="windowFormLpVal" novalidate="novalidate">
						<div class="formbx">
							<div class="input-field">
								<label for="">Full Name*</label>
								<input type="text" placeholder="" name="fName" id="fName" required onkeypress="return onlyCharacters(event);" maxlength="80">
							</div>
							<div class="input-field">
								<label for="">Mobile</label>
								<input type="text" placeholder="" name="phone" id="phone" required onkeypress="return onlyNumbersAndPlus(event);" maxlength="20">
							</div>
							<div class="input-field">
								<label for="">Pincode*</label>
								<input type="text" placeholder="" name="pin" id="pin" onkeypress="return onlyNumbersAndPlus(event);" maxlength="7">
							</div>
							<div class="input-field">
								<label for="">Email Address</label>
								<input type="text" placeholder="" name="email" id="email"  maxlength="80">
							</div>
							<div class="input-field">
								<label for="">Select Product Category</label>
								<select name="category" id="category">
									<option value="" disabled selected></option>
									<?php foreach ($categoryData as $key => $value) { ?>
									<option value="<?php echo $value->category_id;?>"><?php echo $value->name;?></option>
									<?php } ?>
									<!-- <option value=""></option>
									<option value="Commercial Doors">Commercial Doors</option>
									<option value="Commercial Doors">Commercial Doors</option>
									<option value="Commercial Doors">Commercial Doors</option> -->
								</select>
							</div>
							<div class="input-field">
								<label for="">Select Product</label>
								<select name="product" id="product">
									<!-- <option value=""></option>
									<option value="Double Leaf Doors">Double Leaf Doors</option>
									<option value="Double Leaf Doors">Double Leaf Doors</option>
									<option value="Double Leaf Doors">Double Leaf Doors</option> -->
								</select>
							</div>
						</div>
						<div class="termcnd">
							<div class="check-lt clearfix chkbx">
								<input class="styled-checkbox" id="styled-checkbox-5" type="checkbox" value="value4" name="tnc" checked>
								<label for="styled-checkbox-5">I accept privacy policy by sharing my contact details, I authorize TATA STEEL & its representatives to call me or SMS me. This consent will override any registration for DNC / NDNC.
								</label>
								<p class="chkeror"></p>
							</div>
							<div class="check-rt">
								<button>Submit</button>
							</div>
							<div class="clear"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

<script type="text/javascript" src="{{ bagisto_asset('js/jquery-1.12.0.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){          
         $(function(){

         	
			$("#windowFormLpVal").validate({
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
                   },
                   messages:{
                       fName:{ required: 'Field is required'},
                       email:{ required: 'Field is required'},
                       phone:{ required: 'Mobile is required.', minlength: '10 digit number only', maxlength: '11 digit number only'},
                       pin:{ required: 'Pin Code is required.', minlength: '6 digit number only', maxlength: '7 digit number only'},
                       // 'tnc':{required: 'Accept term and condition'},
                       category:{ required: 'Select Category'},
                       product:{ required: 'Select Product'},
         
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
                        
                             $.ajax({
                                  url: APP_URL+"/door-form",
                                  type:"POST",                                    
                                  data:{
                                    
                                    name:name,
                                    email:email,
                                    mobile:phone,
                                    pincode:pincode,
                                    category:category,
                                    product:product,
                                  },
                                  beforeSend: function (request) {
                                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                                    },
                                  success:function(response){
                                    
                                    $("#windowFormLpVal").trigger("reset");
                                  },
                                 });
                           
                   }
                 });
 });
         })/* Ready END */


	function getProduct(){  
            var value = document.getElementById("category").value;
            var APP_URL = {!! json_encode(url('/')) !!}
            $.ajax({
            	url: APP_URL+"/getProductByCategory",
                  type:"GET",                                    
                  data:{                                    
                    param:value
                  },
                  beforeSend: function (request) {
                    },
                  success:function(response){
                    console.log(response);
                    var html = '';
                    $('#product').html('');
                    if(response.success.length > 0)
                    {
                    	
	                    $.each(response.success, function(index, value) {
	                    	

	                    	html += "<option value="+value.id+">"+value.name+"</option>";
	                    });

	                     
	                }
	                	$('#product').append(html);
                   
                  },
        	});
        }

      

    </script>