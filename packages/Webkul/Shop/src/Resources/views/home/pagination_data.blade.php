
<div class="dealer-sect">
			<div class="dealer-now">
		   <h2>Stores Near you</h2>
			 <div class="top-rt0">
								<input type="text" class="flex-box0" id="city" name="city" placeholder="Enter State / City / Pin Code" style="color:#000">
								<button class="btn go-btn" onclick="getdata(1)" type="button ">GO</button>
							</div></div>
<?php 
			$i = 4;
			
			foreach ($data as $key => $value){
				
			if($i == 4 || $i == 8 || $i == 12 || $i == 16 || $i == 20){ ?>
			<div class="get-row">
			<?php } ?>
			   <div class="get-col">			   	
				 <div class="get-head">
				  <img src="{{ asset('/themes/velocity/assets/images/direction-icon.png') }}" alt=""> 
				   <p class="get-title"><a href="https://www.google.com/maps/search/?api=1&query={{ $value->latitude }},{{ $value->longitude }}" style="color:#C0D143">GET DIRECTION</a></p></div>
				   <p class="sub-new">{{ $value->shop_name }}</p>
					 <p class="address3">{{ $value->address }} <br>
						{{ $value->name }} : <a href="{{ $value->contact_no }}">{{ $value->contact_no }}</a> <a href="{{ $value->email }}">{{ $value->email }}</a></p>
					 
				 </div>
				 <?php if($i == 7 || $i == 11 || $i == 15 || $i == 19 || $i == 23){ ?>
			</div>
			<?php } 
			$i = $i +1;
			 } ?>

			 

		</div>
		<div class="navigation">
				{{ $data->links() }}
			</div>
