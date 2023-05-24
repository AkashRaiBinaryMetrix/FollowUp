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
       <h1>About Us</h1>  
       <p>
       LINEON Group is a tech real estate marketplace that connect property owners, real estate agencies, brokers, buyers, Notaries, Architects, Engineers and tenantin all the 145 cities of Haiti and in the Dominican Republic Only with internet connection, we make real estate transactions possible across the Hispaniola Island  fromanywhere in the world. 
<br>
We aim to become the largest real estate services company in Haiti in terms of geographic coverage and referencing services.
<br>
If you don’t live in Haiti and you have a house there, we offer ‘property management services” where we take care of all the tasks and make sure you receive your rent payment on time.
<br>
Also, we promote real estate project development to build modern, sustainable and smart cities in Haiti. 


       </p>    
      </div>  
      <div class="static-banner-right"><img src="{{ asset('images/aboutus-vector.jpg') }}" alt="" data-pagespeed-url-hash="1460959282" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>      
      
    </div>   
    
     <div class="about-sec1">
  <div class="title-box"><h2 class="title">Our Story</h2></div> 
  @php
      $data_privacy = DB::table('cms_content')
                              ->where('cms_key','privacy_policy')
                              ->get();
      @endphp

      {{$data_privacy[0]->value}}
     </div> 
    
      <div class="about-sec2">
  
  <div class="nos" id="counter">
    <div class="counter-value counter" data-count="10000">10000</div>
    <h4>Coming Soon</h4>  
  </div>
    
  <div class="nos">
    <div class="counter-value counter" data-count="2000">2000</div>
    <h4>Qualified Experts</h4>  
  </div>
    
  <div class="nos">
    <div class="counter-value counter" data-count="400">400</div>
    <h4>Coming Soon</h4>  
  </div>
    
  <div class="nos">
    <div class="counter-value counter" data-count="80">80</div>
    <h4>Coming Soon</h4>  
  </div>
    
  <div class="nos">
    <div class="counter-value counter" data-count="70">70</div>
    <h4>Coming Soon</h4>  
  </div>  
      
      </div>
      
      <div class="about-sec3">
     
      <div class="row align-items-center">
      
      <div class="col-lg-6 wow slideInLeft" style="visibility: visible; animation-name: slideInLeft;">
        <div class="welcome-pic"><img src="{{ asset('images/home-living-banner.jpg') }}" alt="" data-pagespeed-url-hash="1669582675" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div></div>
      
      <div class="col-lg-6 wow slideInRight" style="visibility: visible; animation-name: slideInRight;">
      @php
      $data_about = DB::table('cms_content')
                            ->where('cms_key','about_us')
                            ->get();
      @endphp

      {{$data_about[0]->value}}
      
      </div>   
     
   </div>
      
      <div class="about-sec4">
      <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block wow slideInUp" style="visibility: visible; animation-name: slideInUp;">
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><img src="{{ asset('images/about-ico-1.png') }}" alt="" data-pagespeed-url-hash="4226679278" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                            <h4>Dummy Heading</h4>
                            <p>Lorem ipsum dolor sit amet adipelit sed eiusmte.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 feature-block wow slideInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInUp;">
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><img src="{{ asset('images/about-ico-2.png') }}" alt="" data-pagespeed-url-hash="226211903" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                            <h4>Dummy Heading</h4>
                            <p>Lorem ipsum dolor sit amet adipelit sed eiusmte.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 feature-block wow slideInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: slideInUp;">
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><img src="{{ asset('images/about-ico-3.png') }}" alt="" data-pagespeed-url-hash="520711824" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                            <h4>Dummy Heading</h4>
                            <p>Lorem ipsum dolor sit amet adipelit sed eiusmte.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 feature-block wow slideInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: slideInUp;">
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><img src="{{ asset('images/about-ico-4.png') }}" alt="" data-pagespeed-url-hash="815211745" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                            <h4>Dummy Heading</h4>
                            <p>Lorem ipsum dolor sit amet adipelit sed eiusmte.</p>
                        </div>
                    </div>
                </div>

            </div>
      </div>
      
  </div>
</div>

@php
  //$data_about = DB::table('cms_content')
                              //->where('cms_key','about_us')
                              //->get();

  //echo html_entity_decode($data_about[0]->value);
@endphp
    
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
<a href="{{url('blog')}}">Blog</a>
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