<!-- <div class="footer">
    <div class="footer-content">

        @include('shop::layouts.footer.newsletter-subscription')
        @include('shop::layouts.footer.footer-links')

        {{-- @if ($categories)
            @include('shop::layouts.footer.top-brands')
        @endif --}}

        @if (core()->getConfigData('general.content.footer.footer_toggle'))
            @include('shop::layouts.footer.copy-right')
        @endif
    </div>
</div> -->
<div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 newsletter">
                        <div class="subscribe_now">
                            <form class="subscribe_form">
                                <p>Subscribe email to
                                    <br>get special offers in your inbox</p>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="email" placeholder="Enter Your Email Address"> <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">SUBMIT</button>
                               </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-6 list">
                        <p>Quick Links</p>
                        <ul>
                            <li><a href="#">Residential Doors</a>
                            </li>
                            <li><a href="#">Windows</a>
                            </li>
                            <li><a href="#">Commercial Doors</a>
                            </li>
                            <li><a href="#">Buyer’s Guide</a>
                            </li>
                            <li><a href="#">About Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-6 list">
                        <p>Other Links</p>
                        <ul>
                            <li><a href="#">Privacy Policy </a>
                            </li>
                            <li><a href="#">Blogs</a>
                            </li>
                            <li><a href="#">Testimonials</a>
                            </li>
                            <li><a href="#">FAQ’s</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 social-media">
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="images/facebook-footer.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="images/twitter-footer.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="images/instagram-footer.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="images/linkedin-footer.svg" alt="">
                                </a>
                            </li>
                        </ul>
                        <p class="copyright">© 2020, All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>

