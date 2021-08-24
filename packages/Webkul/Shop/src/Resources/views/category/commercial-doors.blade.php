@extends('shop::layouts.master')

@section('page_title')
    {{ __('Commercial Doors') }}
@stop

@section('content-wrapper')

<div class="banner-slider residential cf">
	<div class="banner-content">
				<img src="{{ asset('/themes/velocity/assets/images/commercial-doors/commercial-doors-bg.jpg') }}" alt="Banner 1" class="">
			</div>
	<!-- <div class="owl-carousel owl-theme owl1">
		<div class="item">
			<div class="banner-content">
				<picture>
				  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/commercial-doors-bg.webp') }}">
				  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/commercial-doors-bg.jpg') }}" alt="Banner 1" class="" width="100%" height="285">
				</picture>
				<div class="txt">
					<div class="middle">
						
						<div class="rt0">
							<picture class="deskOn">
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/fusion-doors.webp') }}">
							  
							</picture>
							<picture class="mobOn">
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/fusion-doors-mb.webp') }}">
							  
							</picture>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="banner-content">
				<picture>
				  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/commercial-doors-bg.webp') }}">
				  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/commercial-doors-bg.jpg') }}" alt="Banner 1" class="" width="100%" height="285">
				</picture>
				<div class="txt">
					<div class="middle">
						
						<div class="rt0">
							<picture class="deskOn">
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/fusion-doors.webp') }}">
							 
							</picture>
							<picture class="mobOn">
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/fusion-doors-mb.webp') }}">
							  
							</picture>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="banner-content">
				<picture>
				  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/commercial-doors-bg.webp') }}">
				  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/commercial-doors-bg.jpg') }}" alt="Banner 1" class="" width="100%" height="285">
				</picture>
				<div class="txt">
					<div class="middle">
						
						<div class="rt0">
							<picture class="deskOn">
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/fusion-doors.webp') }}">
							  
							</picture>
							<picture class="mobOn">
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/fusion-doors-mb.webp') }}">
							  
							</picture>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="banner-content">
				<picture>
				  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/commercial-doors-bg.webp') }}">
				  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/commercial-doors-bg.jpg') }}" alt="Banner 1" class="" width="100%" height="285">
				</picture>
				<div class="txt">
					<div class="middle">
						
						<div class="rt0">
							<picture class="deskOn">
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/fusion-doors.webp') }}">
							  
							</picture>
							<picture class="mobOn">
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/fusion-doors-mb.webp') }}">
							  
							</picture>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
</div>

<section class="top-sect">
    <div class="container">
	<h2><strong>Commercial Doors</strong></h2> 
	  <p>Tata Pravesh has introduced a revolutionary range of steel doors to keep your loved ones safe and secure. These doors are made to be durable, secure, long lasting, termite proof, fire resistant as well as environment friendly. At the same time, they are aesthetically suited for both residential and commercial spaces as they combine the strength of steel with elegance of wood.</p>
	</div>
</section>

<?php 
	$i = 2;
	foreach ($categoryData as $key => $value) { 
	$length = count($categoryData);
	if($length > 0){
	if($i % 2 == 0){
?>
<section class="every-door residential">
	<div class="container">
		<div class="every-row">
			<div class="lt wow animated bounceInLeft">	
				<h2>{{ $value->name }}</h2>
				<span>{{ strip_tags($value->short_description) }}</span>
				<p>{{ strip_tags($value->description) }}</p>	
				<div class="buy-sect">
					<p class="prices">Starts From <span>Rs. {{ round($value->min_price,2) }}</span></p>
					<a href="{{ url($value->url_key) }}" class="buy-btn">BUY NOW</a>
				</div>
			</div>
			<div class="rt wow animated bounceInRight">
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
			<div class="clearfix"></div>
		</div>
	</div>
</section>
<?php }else{ ?>
<section class="every-door residential">
	<div class="container">
		<div class="every-row">
			<div class="rt rt0 wow animated bounceInLeft">
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
			<div class="lt0 wow animated bounceInRight">
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

<section class="commercial-door-application">
	<div class="container">
		<h2><strong>Commercial Doors Application</strong></h2> 
		 <div  class="col-sm-12 col-xs-12 tab-sliders">
	        <div class="col-md-3 col-sm-12 col-xs-12 deskOn">
	          <!-- Nav tabs -->
	          <ul class="nav nav-tabs tabs-left sideways">
	            <li class="active"><a href="#home-v" data-toggle="tab"><img src="{{ asset('/themes/velocity/assets/images/icon-home.svg') }}" alt="Residential"> Residential</a></li>
	            <li><a href="#profile-v" data-toggle="tab"><img src="{{ asset('/themes/velocity/assets/images/icon-hospital.svg') }}" alt="Hospital"> Hospital</a></li>
	            <li><a href="#messages-v" data-toggle="tab"><img src="{{ asset('/themes/velocity/assets/images/icon-institute.svg') }}" alt="Institute"> Institute</a></li>
	            <li><a href="#settings-v" data-toggle="tab"><img src="{{ asset('/themes/velocity/assets/images/icon-office.svg') }}" alt="Office"> Office</a></li>
	          </ul>
	        </div>
	        <div class="col-md-9 col-sm-12 col-xs-12">
	          <!-- Tab panes -->
	          <div class="tab-content">
	            <div class="tab-pane active" id="home-v">
	            	<div class="outer">
					  <div id="big" class="owl-carousel owl-theme big">
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					  </div>
					  <div class="thumbnails">
						  <div id="thumbs" class="owl-carousel owl-theme thumbs">
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						  </div>
						</div>
					</div>
	            </div>
	            <div class="tab-pane" id="profile-v">
	            	<div class="outer">
					  <div id="big" class="owl-carousel owl-theme big">
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					  </div>
					  <div class="thumbnails">
						  <div id="thumbs" class="owl-carousel owl-theme thumbs">
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						  </div>
						</div>
					</div>
	            </div>
	            <div class="tab-pane" id="messages-v">
	            	<div class="outer">
					  <div id="big" class="owl-carousel owl-theme big">
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					  </div>
					  <div class="thumbnails">
						  <div id="thumbs" class="owl-carousel owl-theme thumbs">
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						  </div>
						</div>
					</div>
	            </div>
	            <div class="tab-pane" id="settings-v">
	            	<div class="outer">
					  <div id="big" class="owl-carousel owl-theme big">
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					    <div class="item">
					      	<picture>
							  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.webp') }}">
							  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-lg.png') }}" alt="Banner 1" class="" width="100%" height="514">
							</picture>
					    </div>
					  </div>
					  <div class="thumbnails">
						  <div id="thumbs" class="owl-carousel owl-theme thumbs">
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						    <div class="item">
						      <img src="{{ asset('/themes/velocity/assets/images/commercial-doors/slider-11-sm.png') }}">
						    </div>
						  </div>
						</div>
					</div>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-3 col-sm-12 col-xs-12 mobOn">
	          <!-- Nav tabs -->
	          <ul class="nav nav-tabs tabs-left sideways">
	            <li class="active"><a href="#home-v" data-toggle="tab"><img src="{{ asset('/themes/velocity/assets/images/icon-home.svg') }}" alt="Residential"> Residential</a></li>
	            <li><a href="#profile-v" data-toggle="tab"><img src="{{ asset('/themes/velocity/assets/images/icon-hospital.svg') }}" alt="Hospital"> Hospital</a></li>
	            <li><a href="#messages-v" data-toggle="tab"><img src="{{ asset('/themes/velocity/assets/images/icon-institute.svg') }}" alt="Institute"> Institute</a></li>
	            <li><a href="#settings-v" data-toggle="tab"><img src="{{ asset('/themes/velocity/assets/images/icon-office.svg') }}" alt="Office"> Office</a></li>
	          </ul>
	        </div>
	        <div class="clearfix"></div>
	      </div>
	</div>
</section>


<section class="faqs">
	<div class="container demo">
		<h2>
			<strong>Frequently Asked Questions</strong>
			<a href="faqs.html" class="btn-blue">View All</a>
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
			<a href="{{ url('category/residential-doors') }}"><img src="{{ asset('/themes/velocity/assets/images/residential-doors-img.webp') }}" alt=""></a>
			<div class="overlay"></div>
		</div>
		<div class="door-col">
			<a href="{{ url('windows') }}"><img src="{{ asset('/themes/velocity/assets/images/window-img.jpg') }}" alt=""></a>
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

		
  			$(document).ready(function() {

  				  var bigimage = $(".big");
		  var thumbs = $(".thumbs");
		  //var totalslides = 10;
		  var syncedSecondary = true;

		  bigimage
		    .owlCarousel({
		      items: 1,
		      slideSpeed: 2000,
		      nav: false,
		      autoplay: true,
		      dots: false,
		      loop: true,
		      responsiveRefreshRate: 200,
		      navText: [
		        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
		        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
		      ]
		    })
		    .on("changed.owl.carousel", syncPosition);

		  thumbs
		    .on("initialized.owl.carousel", function () {
		      thumbs.find(".owl-item").eq(0).addClass("current");
		    })
		    .owlCarousel({
		      items: 8,
		      dots: false,
		      nav: true,
		      navText: [
		        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
		        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
		      ],
		      smartSpeed: 200,
		      slideSpeed: 500,
		      slideBy: 1,
		      responsiveRefreshRate: 100,
		      responsive: {
                0: {
                    items: 4
                },
                448: {
                    items: 5
                },
                776: {
                    items: 6
                },
                991: {
                    items: 6
                },
                1023: {
                    items: 8
                },
                1200: {
                    items: 8
                }
            }
		    })
		    .on("changed.owl.carousel", syncPosition2);

		  function syncPosition(el) {
		    //if loop is set to false, then you have to uncomment the next line
		    //var current = el.item.index;

		    //to disable loop, comment this block
		    var count = el.item.count - 1;
		    var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

		    if (current < 0) {
		      current = count;
		    }
		    if (current > count) {
		      current = 0;
		    }
		    //to this
		    thumbs
		      .find(".owl-item")
		      .removeClass("current")
		      .eq(current)
		      .addClass("current");
		    var onscreen = thumbs.find(".owl-item.active").length - 1;
		    var start = thumbs.find(".owl-item.active").first().index();
		    var end = thumbs.find(".owl-item.active").last().index();

		    if (current > end) {
		      thumbs.data("owl.carousel").to(current, 100, true);
		    }
		    if (current < start) {
		      thumbs.data("owl.carousel").to(current - onscreen, 100, true);
		    }
		  }

		  function syncPosition2(el) {
		    if (syncedSecondary) {
		      var number = el.item.index;
		      bigimage.data("owl.carousel").to(number, 100, true);
		    }
		  }

		  thumbs.on("click", ".owl-item", function (e) {
		    e.preventDefault();
		    var number = $(this).index();
		    bigimage.data("owl.carousel").to(number, 300, true);
		  });
		});

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