<div class="footer">
   <div class="container">
      <div class="row">
         <div class="col-lg-5 col-md-5 col-sm-12 newsletter">
            <div class="subscribe_now">
               <form class="subscribe_form">
                  <p>Subscribe email to
                     <br>get special offers in your inbox
                  </p>
                  <div class="input-group">
                     <input type="text" class="form-control" name="email" placeholder="Enter Your Email Address" id="ft_email" required> <span class="input-group-btn">
                     <button class="btn btn-default" onclick="check()" type="button">SUBMIT</button>
                     </span>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-lg-2 col-md-2 col-xs-6 list">
            <p>Quick Links</p>
            <ul>
               <li><a href="{{ url('/category/residential-doors') }}">Residential Doors</a>
               </li>
               <li><a href="{{ url('windows') }}">Windows</a>
               </li>
               <li><a href="{{ url('/category/commercial-doors') }}">Commercial Doors</a>
               </li>
               <!-- <li><a href="#">Buyer’s Guide</a>
                  </li>
                  -->                            
               <li><a href="{{ url('about-us') }}">About Us</a>
               </li>
               <li><a href="https://showroom.tatapravesh.com/">Virtual Showroom</a>
               </li>
            </ul>
         </div>
         <div class="col-lg-2 col-md-2 col-xs-6 list">
            <p>Other Links</p>
            <ul>
               <li><a href="#">Privacy Policy </a>
               </li>
               <li><a href="{{ url('/page/blog') }}">Blogs</a>
               </li>
               <li><a href="{{ url('/page/testimonials') }}">Testimonials</a>
               </li>
               <li><a href="{{ url('faq') }}">FAQ’s</a>
               </li>
            </ul>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 social-media">
            <ul>
               <li>
                  <a href="https://www.facebook.com/tatapravesh/">
                  <img src="{{ asset('/themes/velocity/assets/images/facebook-footer.svg') }}" alt="">
                  </a>
               </li>
               <li>
                  <a href="https://twitter.com/TataPravesh">
                  <img src="{{ asset('/themes/velocity/assets/images/twitter-footer.svg') }}" alt="">
                  </a>
               </li>
               <li>
                  <a href="https://www.instagram.com/Tatapravesh/">
                  <img src="{{ asset('/themes/velocity/assets/images/instagram-footer.svg') }}" alt="">
                  </a>
               </li>
               <li>
                  <a href="https://www.linkedin.com/showcase/tatasteel-pravesh">
                  <img src="{{ asset('/themes/velocity/assets/images/linkedin-footer.svg') }}" alt="">
                  </a>
               </li>
            </ul>
            <p class="copyright">© 2020, All rights reserved.</p>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
function check()
{
    var email = document.getElementById("ft_email");
  
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
  
    if (!filter.test(email.value)) 
    {  
        alert('Please provide a valid email address');  
        return false;  
    } 
    else
    {
      callMeIfValid(email.value);
    }
}

function callMeIfValid(email)
{
    var APP_URL = {!! json_encode(url('/')) !!}
                          
    
    $.ajax({
          url: APP_URL+"/newsletter",
          type:"POST",                                    
          data:{                                    
            param:email
          },
          beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
          success:function(response){
            alert(response); 
            $("#ft_email").val('');              
           
          },
         });
}
</script>