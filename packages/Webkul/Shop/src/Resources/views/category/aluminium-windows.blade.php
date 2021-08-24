@extends('shop::layouts.master')

@section('page_title')
    {{ __('Aluminium Windows') }}
@stop

@section('content-wrapper')
<div class="banner-slider residential cf">
	<div class="owl-carousel owl-theme owl1">
		<div class="item">
			<div class="banner-content">
				<img src="{{ asset('/themes/velocity/assets/images/steel-windows/steel-windows-bg.png') }}" alt="Banner 1" class="">
				<div class="txt">
					<div class="middle">
						<div class="lt0">
							<span class="title1">Canvas Windows</span>
							<h2 class="title0">One Liner</h2>
							
								<a href="#" class="enquire-btn">ENQUIRE NOW</a>
						</div>
						<div class="rt0">
							<img src="{{ asset('/themes/velocity/assets/images/fusion-doors.png') }}" alt="" class="deskOn">
							<img src="{{ asset('/themes/velocity/assets/images/fusion-doors-mb.png') }}" alt="" class="mobOn">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="banner-content">
				<img src="{{ asset('/themes/velocity/assets/images/steel-windows/steel-windows-bg.png') }}" alt="Banner 1" class="">
				<div class="txt">
					<div class="middle">
						<div class="lt0">
							<span class="title1">Canvas Windows</span>
							<h2 class="title0">One Liner</h2>
							
								<a href="#" class="enquire-btn">ENQUIRE NOW</a>
						</div>
						<div class="rt0">
							<img src="{{ asset('/themes/velocity/assets/images/fusion-doors.png') }}" alt="" class="deskOn">
							<img src="{{ asset('/themes/velocity/assets/images/fusion-doors-mb.png') }}" alt="" class="mobOn">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="banner-content">
				<img src="{{ asset('/themes/velocity/assets/images/steel-windows/steel-windows-bg.png') }}" alt="Banner 1" class="">
				<div class="txt">
					<div class="middle">
						<div class="lt0">
							<span class="title1">Canvas Windows</span>
							<h2 class="title0">One Liner</h2>
							
								<a href="#" class="enquire-btn">ENQUIRE NOW</a>
						</div>
						<div class="rt0">
							<img src="{{ asset('/themes/velocity/assets/images/fusion-doors.png') }}" alt="" class="deskOn">
							<img src="{{ asset('/themes/velocity/assets/images/fusion-doors-mb.png') }}" alt="" class="mobOn">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="banner-content">
				<img src="{{ asset('/themes/velocity/assets/images/steel-windows/steel-windows-bg.png') }}" alt="Banner 1" class="">
				<div class="txt">
					<div class="middle">
						<div class="lt0">
							<span class="title1">Canvas Windows</span>
							<h2 class="title0">One Liner</h2>
							
								<a href="#" class="enquire-btn">ENQUIRE NOW</a>
						</div>
						<div class="rt0">
							<img src="{{ asset('/themes/velocity/assets/images/fusion-doors.png') }}" alt="" class="deskOn">
							<img src="{{ asset('/themes/velocity/assets/images/fusion-doors-mb.png') }}" alt="" class="mobOn">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="top-sect">
  <div class="container">
	<h2><strong>Aluminium Windows</strong></h2> 
	  <p>Tata Pravesh has introduced a revolutionary range of steel doors to keep your loved ones safe and secure. These doors are made to be durable, secure, long lasting, termite proof, fire resistant as well as environment friendly. At the same time, they are aesthetically suited for both residential and commercial spaces as they combine the strength of steel with elegance of wood. </p>
	</div>
</section>
<?php 
	$i = 2;
	foreach ($categoryData as $key => $value) { 
	$length = count($categoryData);
	if($length > 0){
	if($i % 2 == 0){
?>
<section class="every-door residential last">
	<div class="container">
		<div class="every-row">
			<div class="lt">	
				<h2>{{ $value->name }}</h2>
				<span>{{ strip_tags($value->short_description) }}</span>
				<p>{{ strip_tags($value->description) }}</p>	
				<div class="buy-sect">
					<p class="prices">Starts From <span>Rs. {{ round($value->min_price,2) }}</span></p>
					<a href="{{ url($value->url_key) }}" class="buy-btn">BUY NOW</a>
				</div>
			</div>
			<div class="rt">
				<div class="door-slider">
					<div class="owl-carousel owl-theme owldoors">
						<?php foreach ($value->images as $key => $result) {
							
							$imgUrl = str_replace('public','', url('/'));
							
							?>
						
						<div class="item">
							<img src="{{ asset($imgUrl.'storage/app/public/'.$result->path) }}" alt="Banner 1" class="">
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</section>
<?php }else{ ?>
<section class="every-door residential">
	<div class="container">
		<div class="every-row">
			<div class="rt rt0">
				<div class="door-slider">
					<div class="owl-carousel owl-theme owldoors">
						<?php foreach ($value->images as $key => $result) {
							
							$imgUrl = str_replace('public','', url('/'));
							$imagePath = trim($result->path);
							
							?>
						<div class="item">
							<img src="{{ asset($imgUrl.'/storage/'.$imagePath) }}" alt="Banner 1" style="width:160px;height:350px;" class="">
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="lt0">
				<h2>{{ $value->name }}</h2>
				<span>{{ strip_tags($value->short_description) }}</span>
				<p>{{ strip_tags($value->description) }}</p>	
				<div class="buy-sect">
					<p class="prices">Starts From <span>Rs. {{ round($value->min_price,2) }}</span></p>
					<a href="{{ url($value->url_key) }}" class="buy-btn">BUY NOW</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</section>

<?php } $i=$i+1; } } ?>


<section class="faqs">
	<div class="container demo">
		<h2>
			<strong>Frequently Asked Questions</strong>
			<a href="#" class="btn-blue">View All</a>
		</h2> 
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							<i class="more-less glyphicon glyphicon-plus"></i>
							How to book Tata Pravesh doors and what are the payment options available?
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						  One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
					</div>
				</div>
			</div>
			<div class="panel panel-default in">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							<i class="more-less glyphicon glyphicon-plus"></i>
							Can I cancel my order?
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">
						 One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							<i class="more-less glyphicon glyphicon-plus"></i>
							Can I change or modify my order after placing it?
						</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						 One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFour">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
							<i class="more-less glyphicon glyphicon-plus"></i>
							Can I get the size Tata Pravesh door(s) customised as per my requirement(s)?
						</a>
					</h4>
				</div>
				<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
					<div class="panel-body">
						 One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading5">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
							<i class="more-less glyphicon glyphicon-plus"></i>
							Tata Pravesh doors are available in how many sizes?
						</a>
					</h4>
				</div>
				<div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
					<div class="panel-body">
						 One has to pay 30% advance at the time of booking. The rest is payable 3 days before the installation date.
					</div>
				</div>
			</div>
		</div><!-- panel-group -->
	</div><!-- container -->
</section>

<section class="door-sect grey">
	<div class="container">
		<div class="door-col">
			<a href="{{ url('category/residential-doors') }}"><img src="{{ asset('/themes/velocity/assets/images/residential-doors-img.jpg') }}" alt=""></a>
			<div class="overlay"></div>
		</div>
		<div class="door-col">
			<a href="{{ url('category/commercial-doors') }}"><img src="{{ asset('/themes/velocity/assets/images/commercial-doors-img.jpg') }}" alt=""></a>
			<div class="overlay"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>

@endsection

@push('scripts')
<script type="application/javascript">
		// start js for animation effects CHANGES
		wow = new WOW(
		  {
		  boxClass:     'wow',      // default
		  animateClass: 'animated', // default
		  offset:       0,          // default
		  mobile:       true,       // default
		  live:         true        // default
		}
		)
		wow.init();
		// end js for animation effects CHANGES

		//Owl Slider Door
  			$(document).ready(function() {
                $('.owldoors').owlCarousel({
  					nav:true,
  					dots:  true,
  					autoplay:true,
  					autoplayTimeout: 8000,
 					autoplayHoverPause: true,
  					smartSpeed: 1500,
  					loop:true,
  					navText: ["<img src='/themes/velocity/assets/images/arrow-prev.png'>","<img src='/themes/velocity/assets/images/arrow-next.png'>"],
  					responsiveClass: true,
  					responsive:{
	  					0:{
	  						items:1
	  					}
	  				}
  				});
              });
  			//END Owl Slider 1
		
	</script>
@endpush