<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{$webSetting->website_name ? "$webSetting->website_name":"Website Name"}}</h4>
                    <div class="footer-underline"></div>
                    <p>
                        {{$webSetting->page_title ? "$webSetting->page_title":"Website Page Title"}}
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="" class="text-white">Blogs</a></div>
                    <div class="mb-2"><a href="" class="text-white">Sitemaps</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="" class="text-white">Trending Products</a></div>
                    <div class="mb-2"><a href="" class="text-white">New Arrivals Products</a></div>
                    <div class="mb-2"><a href="" class="text-white">Featured Products</a></div>
                    <div class="mb-2"><a href="" class="text-white">Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{$webSetting->address ? "$webSetting->address":"Website Address"}}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{$webSetting->phone1 ? "$webSetting->phone1":"Website Phone"}}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{$webSetting->email1 ? "$webSetting->email1":"Website Email"}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 -{{$webSetting->website_name ? "$webSetting->website_name":"Website Name"}} . All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        <a href=""><i class="fa fa-facebook"></i>{{$webSetting->facebook}}</a>
                        <a href=""><i class="fa fa-twitter"></i>{{$webSetting->twitter}}</a>
                        <a href=""><i class="fa fa-instagram"></i>{{$webSetting->instagram}}</a>
                        <a href=""><i class="fa fa-youtube"></i>{{$webSetting->youtube}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
