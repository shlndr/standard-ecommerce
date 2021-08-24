<?php

?>
<section class="door-sect">
			<div class="container">
				<div class="door-col">
					<a href="{{ url('/residential-doors') }}"><picture>
					  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/residential-doors-img.webp') }}">
					  <img src="{{ asset('/themes/velocity/assets/images/residential-doors-img.jpg') }}" alt="">
					</picture></a>
					<div class="overlay"></div>
				</div>
				<div class="door-col">
					<a href="{{ url('/commercial-doors') }}"><picture>
					  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/commercial-doors-img.webp') }}">
					  <img src="{{ asset('/themes/velocity/assets/images/commercial-doors-img.jpg') }}" alt="">
					</picture></a>
					<div class="overlay"></div>
				</div>
				<div class="door-col">
					<a href="{{ url('/windows') }}"><picture>
					  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/window-img.webp') }}">
					  <img src="{{ asset('/themes/velocity/assets/images/window-img.jpg') }}" alt="">
					</picture></a>
					<div class="overlay"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</section>