<?php
?>
<section class="locate-dealers">
			<div class="container">
				<h2>Locate <strong>The Dealers</strong></h2>
				<div class="locate-row">
					<aside>
						<picture>
						  <source type="image/webp" srcset="{{ asset('/themes/velocity/assets/images/map-img.webp') }}">
						  <img src="{{ asset('/themes/velocity/assets/images/map-img.jpg') }}" alt="">
						</picture>
					</aside>
					<article>
						<div class="top-title">
							<div class="top-lt1"><strong>Dealer Locator</strong> Near you</div>
							<div class="top-rt1">
								<input type="text" class="flex-box0" name="city" placeholder="City / Pin Code">
								<button class="btn go-btn" type="button ">GO</button>
							</div>
						</div>
						<div class="dealer-row">
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
								<p class="ten-km">10KM</p>
								<p class="ten-green">GET DIRECTION</p>
							</div>
						</div>
						<div class="dealer-row">
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
						</div> <a href="#" class="view-btn">VIEW ALL DEALERS</a>
					</article>
				</div>
				<div class="view-now"><a href="#" class="view-all-btn">Go To Dealer Locator  -></a>                  </div>
			</div>
		</section>