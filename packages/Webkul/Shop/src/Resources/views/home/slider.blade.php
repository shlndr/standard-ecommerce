
<div class="banner-slider cf">
			<div class="owl-carousel owl-theme owl1">
				<div class="item">
					<!-- <a href=""> -->
					<div class="banner-content">
						  <source type="image/webp" srcset="{{ asset('storage/slider_images/Default/Fig0x9dT93hRqsZG2HfTWqUIYbS6Ke5g1TQ7fzFn.webp') }}">
						<picture>
						  <img src="{{ asset('storage/slider_images/Default/Fig0x9dT93hRqsZG2HfTWqUIYbS6Ke5g1TQ7fzFn.jpeg') }}" alt="Banner 1" class="" width="100%" height="300">
						</picture>
					</div>
					<!-- </a> -->
				</div>
				<div class="item">
					<div class="banner-content">
						  <source type="image/webp" srcset="{{ asset('storage/slider_images/Default/book-a-demo.webp') }}">
						<picture>
						  <img src="{{ asset('storage/slider_images/Default/book-a-demo.jpeg') }}" alt="Banner 1" class="" width="100%" height="300">
						</picture>
					</div>
				</div>
				<div class="item">
					<div class="banner-content">
						  <source type="image/webp" srcset="{{ asset('storage/slider_images/Default/door-banner.webp') }}">
						<picture>
						  <img src="{{ asset('storage/slider_images/Default/door-banner.jpeg') }}" alt="Banner 1" class="" width="100%" height="300">
						</picture>
					</div>
				</div>
				<div class="item">
					<a href="https://showroom.tatapravesh.com/" target="_blank">
					<div class="banner-content">
						  <source type="image/webp" srcset="{{ asset('storage/slider_images/Default/Virtual-Showroom.webp') }}">
						<picture>
						  <img src="{{ asset('storage/slider_images/Default/Virtual-Showroom.jpeg') }}" alt="Banner 1" class="" width="100%" height="300">
						</picture>
					</div>
					</a>
				</div>
				<?php 
				if(!empty($sliderData['slide'])){
				foreach ($sliderData['slide'] as $key => $value) {
						$path = url('/')."/storage/".$value['path'];
						
					// echo"<pre>";print_r($value['path']);die;
					?>
				<!--  <div class="item">
					<div class="banner-content">
						<-- <picture>
						  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/banner-1.webp') }}">
						  <img src="<?php echo $path;?>" alt="Banner 1" class="" width="100%" height="300">
						</picture> ->
						<picture>
						  <-- <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/banner-1.webp') }}"> ->
						  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/Header Banner2.jpg') }}">
						  <img src="<?php echo $path;?>" alt="Banner 1" class="" width="100%" height="300">
						</picture>
						
						<div class="txt">
							<div class="middle">
								<div class="lt0">
									<h2 class="title0">We make every home</h2>
									<span class="title1">Beautiful and secure</span>
									<div class="flat-text">
										<img src="{{ asset('/themes/velocity/assets/images/hdfc-bank-logo.jpg') }}" alt=""> <span class="parsent">5% flat cashback</span>
									</div>	<a href="#" class="enquire-btn">ENQUIRE NOW</a>
								</div>
								<div class="rt0">
									<picture>
									  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/top-door-img.webp') }}">
									  <img src="{{ asset('/themes/velocity/assets/images/top-door-img.png') }}" alt="">
									</picture>
									<div class="dics">
										<img src="{{ asset('/themes/velocity/assets/images/discount.svg') }}" alt="">
										<div class="cash0"><strong>5%</strong>
											<br>----- FLAT -----
											<br>CASHBACK</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->

				<?php } } ?>
				
			</div>
		</div>