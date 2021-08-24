@extends('shop::layouts.master')

@section('page_title')
@stop
@section('content-wrapper')
<div class="about-banner cf">
	<img src="{{ asset('/themes/velocity/assets/images/about-us/about-us-banner.jpg') }}" alt="Banner">
	<div class="container">
		<h1>Store Locator – Find our dealers near you</h1>
	</div>
</div>
<section class="dealer-locator">
	 <div class="container">
		 

		 
			<div class="post">
			@include('shop::home.pagination_data')

			</div>
			<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
			
			
		 
		 <!-- <div class="navigation">
			
				{{ $data->links() }}
				<ul>
				<li><a href="#" class="active">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
			</ul>
		</div> -->
			 
		 </div>
	</section>
	@endsection	
	@push('scripts')
	<script type="text/javascript">
	$(document).ready(function(){
	// $(document).on('keyup', '#city', function(){
	//   var query = $(this).val();	  
	//   var page = $('#hidden_page').val();
	//   fetch_data(page,query);
	//  });

	

	 });

	function getdata(page)
	{
		var query = $('#city').val();
	  fetch_data(page,query);
	}

	$(document).on('click','.pagination a', function(event){
		event.preventDefault();

		var page = $(this).attr('href').split('page=')[1];
		$('#hidden_page').val(page);
		var query = $('#city').val();
		fetch_data(page,query);
	});

	function fetch_data(page,query)
	{
		var APP_URL = {!! json_encode(url('/')) !!}
		$.ajax({

			url:APP_URL+"/get-dealer?page="+page+"&type=2&param="+query,
			type:'GET',
			success:function(response)
			{
				$('.post').html('');
				$('.post').html(response);
				
			}
		})
	}

		//dealer();
		function dealer(page)
		{
			var APP_URL = {!! json_encode(url('/')) !!}
            var textboxval = $('#city').val();                        
            
            $.ajax({
                  url: APP_URL+"/get-dealer?page="+page,
                  type:"GET",                                    
                  data:{                                    
                    param:textboxval,
                    type:2
                  },
                  beforeSend: function (request) {
                    },
                  success:function(response){
                    
                    var html = '';
                    $('.locator').html('');
                    // console.log(response.data[0])
                    if(response.data.length > 0)
                    {
                    	
	                    $.each(response.data, function(index, value) {
	                    	 // console.log(value.email);
	                    	var url = "https://www.google.com/maps/search/?api=1&query="+value.latitude+","+value.longitude;
	                    	if(index == 0 || index == 4 || index == 8 || index == 12 || index == 16 || index == 20 || index == 24 || index == 28 || index == 32 || index == 36 || index == 40 || index == 44 || index == 48 || index == 52 || index == 56 || index == 60 || index == 64 )
	                    	{
	                    		if(index == 0)
	                    		{
	                    			html += "<div class='get-row'>";
	                    		}
	                    		else
	                    		{
	                    			html += "<div class='clear'></div></div><div class='get-row'>";
	                    		}
	                    		
	                    	}
	                    	html += "<div class='get-col'><div class='get-head'><img src="+APP_URL+"/themes/velocity/assets/images/direction-icon.png alt=''><p class='get-title'><a href="+url+" style=color:#c0d143 '>GET DIRECTION</a></p></div><p class='sub-new'>"+value.shop_name+"</p><p class='address3'>"+value.address+"<br>"+value.name+" : <a href='tel:"+value.contact_no+"'>"+value.contact_no+"</a><br><a href='mailto:"+value.email+"'>"+value.email+"</a></p></div> ";

	                    	if(index == response.data.length -1)
	                    	{
	                    		html += "<div class='clear'></div></div>";
	                    	}
	                    	
	                    });

	                     
	                }
	                else
	                {
	                	html = 'No result found.';
	                }
	                	console.log("testtt");
	                	$('.locator').append(html);
	                	$('.navigation').html(response.data);
                   
                  },
                 });
        }
		</script>
		@endpush