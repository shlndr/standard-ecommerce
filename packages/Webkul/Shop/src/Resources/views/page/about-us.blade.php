@extends('shop::layouts.master')

@section('page_title')
@stop
@section('content-wrapper')
<div class="about-banner cf">
	<img src="{{ asset('/themes/velocity/assets/images/about-us/about-us-banner.jpg') }} " alt="Banner">
	<div class="container">
		<h1>About Us</h1>
	</div>
</div>
<section class="about-sect">
	<div class="container">
		<div class="wrapper">
			<div class="tab-wrapper">
				<ul class="tabs">
					<li class="tab-link active" data-tab="1">Tata Pravesh</li>
					<li class="tab-link" data-tab="2">tata steel</li>	
				</ul>
			</div>
			<div class="content-wrapper">
				<div id="tab-1" class="tab-content active">
					<div class="tab-row">
						<div class="lt0"><img src="{{ asset('/themes/velocity/assets/images/about-us/about-tata-pravesh.jpg') }} " alt="">
							<img src="{{ asset('/themes/velocity/assets/images/about-us/about-tata-pravesh2.png') }} " alt="">	
						</div>
						<div class="rt0">
							<p>Tata Pravesh, the new stalwart brand in Tata Steel’s portfolio, offers you the complete range of stunning and strong home solutions-from steel doors to windows with inclusion of ventilators. Each product of this range has the strength of steel and the beauty of wood. The cutting-edge products are long lasting and ensure ultimate security for your home so that you can keep your loved ones secure.</p>

							<p> Combining the strength of steel and the beauty of wood, Tata Pravesh doors and windows offer complete peace of mind to its users in terms of price, quality, durability and security. The doors are manufactured from high grade steel using state-of-the-art technology to ensure supreme resistance to fire and other hazards commonly experienced in the case of wooden doors. Factory-engineered to perfection, every product is uniform in quality and finish; the texture resembles that of real wood.</p>

							<p> Free accessories, delivery (T&C apply), installation and 5 years warranty (T&C apply) further add to the popularity of Tata Pravesh doors. It offers a one stop solution for all your wall opening needs. Keep your loved ones secure with the power of steel.</p>
						</div>
					</div>
				</div>
				<div id="tab-2" class="tab-content">
					<div class="tab-row2">
						<div class="lt2">
							<img src="{{ asset('/themes/velocity/assets/images/about-us/about-us-tata-steel1.jpg') }} " alt="">
						</div>
						<div class="rt2">
							<p>The world of Tata Steel is one without boundaries – growing, changing and challenging every day. Tata – a world that embraces different skills, continuous innovation, financial investment, responsible use of natural resources. And above all, there is the enduring commitment of giving back to society that helps make the vision of sustainable growth a reality.</p>
						</div>
					</div>
					<div class="tab-row2">
						<div class="rt2">
							<p>Operations In 26 Countries. Commercial Presence In Over 50 Countries. 80,000 Employees Across Five Continents. What Sets The Tata Steel Group Apart Is Not Just Extent Or Magnitude Of Its Operations – It Is The Excellence Of Its People, Innovative Approach, And Overall Conduct. Established In 1907 As Asia’s First Integrated Private Sector Steel Company, Tata Steel Group Is Among The Top-Ten Global Steel Companies With An Annual Crude Steel Capacity Of Nearly 25 Million Tonnes Per Annum. It Is Now The World’s Second-Most Geographically-Diversified Steel Producer. The Group Recorded A Turnover Of ₹139,504 Crores In FY 15.</p>
						</div>
						<div class="lt2 about-gap">
							<img src="{{ asset('/themes/velocity/assets/images/about-us/about-us-tata-steel2.jpg') }} " alt="">
						</div>
					</div>
					<div class="tab-row2">	
						<p>Over The Years Tata Steel Has Enriched The Glorious Legacy Handed Over By Its Founder J.N. Tata, By Placing Equal Emphasis On Stakeholder Value Creation And Corporate Citizenship. Underpinning This Vision Is A Performance Culture Committed To Aspiration Targets, Safety And Social Responsibility, Continuous Improvement, Openness And Transparency. What Binds Together Every Member Of The Global Tata Steel Family Today Is A Shared Corporate Culture, Shaped By Value-Based Guiding Principles And The Lineage Of Some Of The World’s Most Pioneering And Respected Entities – The Tata Group Itself, British Steel, Koninklijke Hoogovens And Natsteel.</p>
						<div class="view-now view-n">
							<a href="#" class="view-all-btn view-s">Go To Tata Steel</a>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>	

<section class="sldbg wood-sld">
	<div class="container">
		<div class="sldh2">
			<h2 class="title2">Tata Pravesh Doors <strong>Benefits</strong></h2>
		</div>
		<div class="wooden-row-dsk">
			<div class="whyFdbx about-n cf">
				<div class="fdIcoBx fd1">
					<img src="{{ asset('/themes/velocity/assets/images/strenght.png') }} " alt="">
				</div>
				<div class="ben-title">Strength</div>
				<p>Tata Pravesh doors are 4 times more <br>secure than wooden doors*</p>
			</div>
			<div class="whyFdbx about-n cf">
				<div class="fdIcoBx fd1">
					<img src="{{ asset('/themes/velocity/assets/images/value-for-money.png') }}  " alt="">
				</div>
				<div class="ben-title">Value for Money</div>
				<p>Superior products at <br>reasonable prices</p>
			</div>
			<div class="whyFdbx about-n cf">
				<div class="fdIcoBx fd1">
					<img src="{{ asset('/themes/velocity/assets/images/fire-resistant.png') }}" alt="">
				</div>
				<div class="ben-title">Fire-resistant</div>
				<p>Since Tata Pravesh doors are made of <br>steel they automatically resist fire</p>
			</div>
			<div class="whyFdbx about-n cf">
				<div class="fdIcoBx fd1">
					<img src="{{ asset('/themes/velocity/assets/images/environment-friendly.png') }} " alt="">
				</div>
				<div class="ben-title">Environment Friendly</div>
				<p>Every 2 Tata Pravesh doors <br>save a tree.</p>
			</div>
			<div class="whyFdbx about-n cf">
				<div class="fdIcoBx fd1">
					<img src="{{ asset('/themes/velocity/assets/images/weather-proof.png') }} " alt="">
				</div>
				<div class="ben-title">Weather-proof</div>
				<p>High quality of steel lasts long and <br>endures every weather condition</p>
			</div>
			<div class="whyFdbx about-n cf">
				<div class="fdIcoBx fd1">
					<img src="{{ asset('/themes/velocity/assets/images/termite-resistant.png') }} " alt="">
				</div>
				<div class="ben-title">Termite-resistant</div>
				<p>Tata Pravesh doors are made of steel <br>which is naturally resistant to termites</p>
			</div>
			<div class="whyFdbx about-n cf">
				<div class="fdIcoBx fd1">
					<img src="{{ asset('/themes/velocity/assets/images/high-quality-finish.png') }} " alt="">
				</div>
				<div class="ben-title">High Quality Finish</div>
				<p>The finish of Tata Pravesh doors is 12 <br>times superior to wooden doors*</p>
			</div>
			<div class="whyFdbx about-n cf">
				<div class="fdIcoBx fd1">
					<img src="{{ asset('/themes/velocity/assets/images/35-designs-to-choose-from.png') }} " alt="">
				</div>
				<div class="ben-title">35 designs to choose from</div>
				<p>Wide array of styles that enhances every <br>modern home decor</p>
			</div>
		</div>
		<div class="wooden-row-mb">
			<div class="owl-carousel owl-theme owl5">
				<div class="item">
					<div class="whyFdbx cf">
						<div class="fdIcoBx fd1">
							<img src="{{ asset('/themes/velocity/assets/images/strenght.png') }} " alt="">
						</div>
						<div class="ben-title">Strength</div>
						<p>Tata Pravesh doors are 4 times more
							<br>secure than wooden doors*</p>
						</div>
					</div>
		<div class="item">
			<div class="whyFdbx cf">
				<div class="fdIcoBx fd1">
					<img src="{{ asset('/themes/velocity/assets/images/value-for-money.png') }} " alt="">
				</div>
				<div class="ben-title">Value for Money</div>
				<p>Superior products at
					<br>reasonable prices</p>
				</div>
			</div>
			<div class="item">
				<div class="whyFdbx cf">
					<div class="fdIcoBx fd1">
						<img src="{{ asset('/themes/velocity/assets/images/fire-resistant.png') }} " alt="">
					</div>
					<div class="ben-title">Fire-resistant</div>
					<p>Since Tata Pravesh doors are made of
						<br>steel they automatically resist fire</p>
					</div>
				</div>
				<div class="item">
					<div class="whyFdbx cf">
						<div class="fdIcoBx fd1">
							<img src="{{ asset('/themes/velocity/assets/images/environment-friendly.png') }} " alt="">
						</div>
						<div class="ben-title">Environment Friendly</div>
						<p>Every 2 Tata Pravesh doors
							<br>save a tree.</p>
						</div>
					</div>
					<div class="item">
						<div class="whyFdbx cf">
							<div class="fdIcoBx fd1">
								<img src="{{ asset('/themes/velocity/assets/images/weather-proof.png') }} " alt="">
							</div>
							<div class="ben-title">Weather-proof</div>
							<p>High quality of steel lasts long and
								<br>endures every weather condition</p>
							</div>
						</div>
						<div class="item">
							<div class="whyFdbx cf">
								<div class="fdIcoBx fd1">
									<img src="{{ asset('/themes/velocity/assets/images/termite-resistant.png') }} " alt="">
								</div>
								<div class="ben-title">Termite-resistant</div>
								<p>Tata Pravesh doors are made of steel
									<br>which is naturally resistant to termites</p>
								</div>
							</div>
							<div class="item">
								<div class="whyFdbx cf">
									<div class="fdIcoBx fd1">
										<img src="{{ asset('/themes/velocity/assets/images/high-quality-finish.png') }} " alt="">
									</div>
									<div class="ben-title">High Quality Finish</div>
									<p>The finish of Tata Pravesh doors is 12
										<br>times superior to wooden doors*</p>
									</div>
								</div>
								<div class="item">
									<div class="whyFdbx cf">
										<div class="fdIcoBx fd1">
											<img src="{{ asset('/themes/velocity/assets/images/35-designs-to-choose-from.png') }} " alt="">
										</div>
										<div class="ben-title">35 designs to choose from</div>
										<p>Wide array of styles that enhances every
											<br>modern home decor</p>
										</div>
									</div>
									<div class="item">
										<div class="whyFdbx cf">
											<div class="fdIcoBx fd1">
												<img src="{{ asset('/themes/velocity/assets/images/maintenance-free.png') }} " alt="">
											</div>
											<div class="ben-title">Maintenance-free</div>
											<p>Tata Pravesh doors are7 times more
												<br>resistant to warpage than wooden doors*</p>
											</div>
										</div>
										<div class="item">
											<div class="whyFdbx cf">
												<div class="fdIcoBx fd1">
													<img src="{{ asset('/themes/velocity/assets/images/longevity.png') }} " alt="">
												</div>
												<div class="ben-title">Longevity</div>
												<p>Tata Pravesh doors have 5 years warranty
													<br>on paint and polish on wooden doors*
													<br>fade away in 2-3 years</p>
												</div>
											</div>
										</div> 
									</div>
								</div>
							</section>		

	<section class="door-sect">
		<div class="container">
			<div class="door-col">
				<img src="{{ asset('/themes/velocity/assets/images/residential-doors-img.jpg') }} " alt="">
				<div class="overlay"></div>
			</div>
			<div class="door-col">
				<img src="{{ asset('/themes/velocity/assets/images/commercial-doors-img.jpg') }} " alt="">
				<div class="overlay"></div>
			</div>
			<div class="door-col">
				<img src="{{ asset('/themes/velocity/assets/images/window-img.jpg') }} " alt="">
				<div class="overlay"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</section>
@endsection	
@push('scripts')
<script type="text/javascript">
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
		
		//tab-script
		$(document).ready(function(){
		$('.tab-link').click( function() {
		
			var tabID = $(this).attr('data-tab');
			$(this).addClass('active').siblings().removeClass('active');
			$('#tab-'+tabID).addClass('active').siblings().removeClass('active');
			
			});
		});
     //tab-script
	</script>
	@endpush