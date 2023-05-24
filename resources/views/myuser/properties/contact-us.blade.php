<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
<meta name="csrf_token" content="{{ csrf_token() }}" />

<title>LINEON Group</title>       
    
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    
<!-- Owl Stylesheets -->
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">    
    
<link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/developer.css') }}" type="text/css" />
<style>
	.error{color: red !important;}
</style>
    
</head>

<body>
        
<header>    
      @extends('myuser.header_footer.language')

<div id="google_translate_element"></div>
<div class="main-header">    
  <div class="container">

    <div class="inner-main-header">
        
    <div class="left-header"><div class="logo"><a href="/lineon"><img src="{{ asset('images/logo.png') }}" alt=""></a></div></div>
    
    <div class="right-header">
      <div class="list-pro-btn"><a href="{{url('user-listnewproperty')}}" class="common-btn">List your property</a></div>
      
       <div class="pro-manage-btn"><a href="{{url('properties-management')}}"><i class="las la-home"></i> Properties Management</a></div>

      @php
        $isUserLoggedIn = Session('isUserLoggedIn');
        if (!empty($isUserLoggedIn)) {
      @endphp
        <div class="login-btn">
          <a href="{{url('user-logout')}}"><i class="las la-sign-out-alt"></i> Log out</a> 
        </div>
      @php   
        }else{
      @endphp
        <div class="login-btn">
          <a href="{{url('sign-up')}}"><i class="las la-sign-out-alt"></i> Sign Up</a> 
          <a href="{{url('login')}}"><i class="las la-user"></i> Log In</a>
        </div>
      @php
        }
      @endphp
      
      <div class="header-menubar"><img src="{{ asset('images/menu-ico.png') }}" alt=""></div>     
    </div>
        
    </div><!--inner-header-->    
      
  </div>
</div>    
</header>
  
<div class="inner-bannerbar"></div>    
    
<div class="staticpg-wrapper">
  <div class="container">
    
    <div class="static-banner">
      <div class="static-banner-left">
       <h1>Contact Us</h1>  
       <p>Your search for the best property management company in Haiti ends here. Contact Lineon now and we’ll take care of the rest.</p>    
      </div>  
      <div class="static-banner-right"><img src="{{ asset('images/contact-vector.jpg') }}" alt="" data-pagespeed-url-hash="621689601" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>      
      
    </div>   
    
    <div class="contact-dt-sec">    
      <div class="row g-4">
                
                <div class="col-lg-7">
                    <div class="materialContainer">
                            @if(!empty($message))
  <div class="alert alert-success"> {{ $message }}</div>
@endif
      <form class="common-form" id="signupForm" method="post" action="{{ route('contact.process') }}" enctype="multipart/form-data">
         @csrf
                        <div class="row g-4 mt-md-1 mt-2">
                            <div class="col-md-6">
                                <label for="first" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first" name="first_name" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="last" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last" name="last_name" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="email2" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="email2" name="phone_no" required="">
                            </div>

                            <div class="col-12">
                                <label for="comment" class="form-label">Message</label>
                                <textarea class="form-control" id="comment" name="message" rows="3" required=""></textarea>
                            </div>

                            <div class="col-auto mt-4">
                                <div class="common-box">
                                  <!-- <a href="#" class="common-btn">Submit</a> -->
                                  <button type="submit" class="common-btn">Submit</button>
                                </div>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="contact-details">
              
                            <div class="contact-box">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                </div>
                                <div class="contact-title">
                                    <h4>Address :</h4>
                                    <p>Rue 90, Cap-haitien, Haiti, 1110.</p>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                </div>
                                <div class="contact-title">
                                    <h4>Phone Number :</h4>
                                    <p><a href="mailto: +509 40 79 15 15">+509 40 79 15 15</a></p>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                </div>
                                <div class="contact-title">
                                    <h4>Email Address :</h4>
                                    <p><a href="mailto:info@lineongroup.com">info@lineongroup.com</a></p>
                                    <p><a href="mailto:contact@lineongroup.com">contact@lineongroup.com</a></p>
                                    <p><a href="mailto:grouplineon@gmail.com">grouplineon@gmail.com</a></p>
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>  
      
    </div>  
    
  </div>
    
<div class="static-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d71457.07122174137!2d-72.24561739939467!3d19.733913580387743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sRue%2090%2C%20Cap-haitien%2C%20Haiti%2C%201110!5e0!3m2!1sen!2sin!4v1681449456648!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
</div>    
    
    
</div>
    
    
  
    
    
</div>
    
<div class="footer-cities-list">
  <div class="container">
    <div class="title-col"><h3 class="title">We’ve got Homes and Apartments <br> in Popular Cities.</h3></div>
    
    <div class="cities-list5">
      <ul>

        <li><a href="{{url('search_city_property/42')}}">Arcahaie Properties</a></li>  
        <li><a href="{{url('search_city_property/17')}}">Boca Chica Properties</a></li>
        <li><a href="{{url('search_city_property/61')}}">Cap-haitien Properties</a></li>

        <li><a href="{{url('search_city_property/67')}}">Cayes Properties</a></li>  
        <li><a href="{{url('search_city_property/81')}}">Croix-des-Bouquets Properties</a></li>
        <li><a href="{{url('search_city_property/61')}}">Dajabon Properties</a></li>

        <li><a href="{{url('search_city_property/83')}}">Delmas Properties</a></li>  
        <li><a href="{{url('search_city_property/96')}}">Fort-Liberté Properties</a></li>
        <li><a href="{{url('search_city_property/99')}}">Gonaïves Properties</a></li>

        <li><a href="{{url('search_city_property/108')}}">Hinche Properties</a></li>  
        <li><a href="{{url('search_city_property/110')}}">Jacmel Properties</a></li>
        <li><a href="{{url('search_city_property/112')}}">Jérémie Properties</a></li>

        <li><a href="{{url('search_city_property/127')}}">Limonade Properties</a></li>  
        <li><a href="{{url('search_city_property/134')}}">Milot Properties</a></li>
        <li><a href="{{url('search_city_property/319')}}">Mirago Properties</a></li>

      </ul>
      
    </div>    
  </div>      
</div>

    
<div class="footer-about">
 <div class="container">
 <h5>About Lineon Group</h5>   
<p>LINEON Group is a tech real estate marketplace that connect property owners, real estate agencies, brokers, buyers, Notaries, Architects, Engineers and tenant in all the 145 cities of Haiti and in the Dominican Republic Only with internet connection, we make real estate transactions possible across the Hispaniola Island from anywhere in the world.</p>  
 </div>      
</div>    
    
<div class="footer-linksbar">
 <div class="container">
 <div class="footer-leftlinks">
 <a href="{{url('about-us')}}">About us</a>
<a href="{{url('user-listnewproperty')}}">List you property</a>
<a href="{{url('login')}}">Login</a>
<a href="{{url('sign-up')}}">Sign up</a>
<a href="blog.html">Blog</a>
<a href="{{url('contact-us')}}">Contact us</a>
<a href="{{url('privacy-policy')}}">Privacy Policy</a>
<a href="{{url('terms-and-conditions')}}">Terms & Conditions</a>       
 </div>    
     
<div class="footer-social">
@php
       $facebook_value = DB::table('cms_content')
                              ->where('cms_key','facebook')
                              ->get();

        $linkedin_value = DB::table('cms_content')
                              ->where('cms_key','linkedin')
                              ->get();

        $twitter_value = DB::table('cms_content')
                              ->where('cms_key','twitter')
                              ->get();

        $instagram_value = DB::table('cms_content')
                              ->where('cms_key','instagram')
                              ->get();

        $youtube_value = DB::table('cms_content')
                              ->where('cms_key','youtube')
                              ->get();

        $tiktok_value = DB::table('cms_content')
                              ->where('cms_key','tiktok')
                              ->get();

@endphp
<a href="{{$facebook_value[0]->value}}"><i class="lab la-facebook-f"></i></a>     

<a href="{{$twitter_value[0]->value}}"><i class="lab la-twitter"></i></a>     

<a href="{{$linkedin_value[0]->value}}"><i class="lab la-linkedin-in"></i></a>     

<a href="{{$instagram_value[0]->value}}"><i class="lab la-instagram"></i></a>     

<a href="{{$youtube_value[0]->value}}"><i class="lab la-youtube"></i></a>  

<a href="{{$tiktok_value[0]->value}}"><i class="fa-brands fa-tiktok"></i></a>  

     
</div>     
     
 </div>      
</div>    
    
<div class="copyright"><div class="container"><p>Lineon Group © 2023 | All rights reserved <span><a href=" https://www.binarymetrix.com/website-designing/" target="_blank">Website Designed</a> &amp; <a href="https://www.binarymetrix.com/website-development/" target="_blank">Developed</a> by  <a href="https://www.binarymetrix.com/" target="_blank">BinaryMetrix Technologies</a></span></p></div></div>    
    
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>      
<script src="{{ asset('js/jquery.validate.js') }}"></script>   

<script>
function myFunction(x) {
  x.classList.toggle("las");
}
</script>  
 <script>
        let sBASEURL = '<?php Config::get('app.url'); ?>';
    </script>
</body>
</html>