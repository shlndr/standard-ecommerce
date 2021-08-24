@extends('shop::layouts.master')
@section('content-wrapper')
<div class="about-banner cf">
	<img src="{{ asset('/themes/velocity/assets/images/about-us/about-us-banner.jpg') }}" alt="Banner">
	<div class="container">
		<h1>Downloadables</h1>
	</div>
</div>
<section class="downloads">
	<div class="container">
		<?php foreach ($data as $key => $value) { 

			$dirname = dirname($value->text_value); 
			// print_r($value);
			$dirname = $dirname.'/41';
			?>
		<div class="indi-sections cf">
			<div class="imgSec">
				<img src="{{ asset('/themes/velocity/assets/images/dowloads/pdf-preview.png') }}" alt="">
			</div>
			<div class="textSec">
				<div class="content">
					<p class="heading">{{ $value->name }}</p>
					<p class="sub-heading">{!! $value->short_description !!}</p>
					<p>{!! $value->description !!}</p>
					<a href="{{ asset('storage/'.$value->text_value) }}" class="border-btn">VIEW PDF ONLINE</a>
					<a href="/<?php echo trim($dirname);?>" target="_blank" download class="wht-btn"><img src="{{ asset('/themes/velocity/assets/images/dowloads/pdf-icon.png') }}" alt=""> DOWNLOAD PDF</a>

				</div>
			</div>
		</div>
		<?php } ?>
		 <div class="indi-sections cf">
			<div class="imgSec">
				<img src="{{ asset('/themes/velocity/assets/images/dowloads/pdf-preview.png') }}" alt="">
			</div>
			<div class="textSec">
				<div class="content">
					<p class="heading">H & C</p>
					<p class="sub-heading">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
					<a href="{{ asset('storage/brochure/H_and_C Brochure aw Final Jan21.pdf') }}" target="_blank" class="border-btn">VIEW PDF ONLINE</a>
					<a href="{{ asset('storage/brochure/H_and_C Brochure aw Final Jan21.pdf') }}" target="_blank" class="wht-btn"><img src="{{ asset('/themes/velocity/assets/images/dowloads/pdf-icon.png') }}" alt=""> DOWNLOAD PDF</a>
				</div>
			</div>
		</div>
		<!--<div class="indi-sections cf">
			<div class="imgSec">
				<img src="{{ asset('/themes/velocity/assets/images/dowloads/pdf-preview.png') }}" alt="">
			</div>
			<div class="textSec">
				<div class="content">
					<p class="heading">DOORS</p>
					<p class="sub-heading">Highest Security, Maximum Beauty</p>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
					<a href="#" target="_blank" class="border-btn">VIEW PDF ONLINE</a>
					<a href="#" target="_blank" class="wht-btn"><img src="{{ asset('/themes/velocity/assets/images/dowloads/pdf-icon.png') }}" alt=""> DOWNLOAD PDF</a>
				</div>
			</div>
		</div>
		<div class="indi-sections cf">
			<div class="imgSec">
				<img src="{{ asset('/themes/velocity/assets/images/dowloads/pdf-preview.png') }}" alt="">
			</div>
			<div class="textSec">
				<div class="content">
					<p class="heading">DOORS</p>
					<p class="sub-heading">Highest Security, Maximum Beauty</p>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
					<a href="#" target="_blank" class="border-btn">VIEW PDF ONLINE</a>
					<a href="#" target="_blank" class="wht-btn"><img src="{{ asset('/themes/velocity/assets/images/dowloads/pdf-icon.png') }}" alt=""> DOWNLOAD PDF</a>
				</div>
			</div>
		</div> -->
		<!-- <div class="navigation">
			<ul>
				<li><a href="#" class="active">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
			</ul>
		</div> -->
	</div>
</section>
@endsection	
