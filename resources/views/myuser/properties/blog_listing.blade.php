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
    
  <div class="middle-blog-sec">
   <div class="container">
     <div class="row">
       <div class="col-lg-7 col-md-6">
        <div class="middle-blog-left">
         <a href="#">
          <div class="middle-blog-left-pic"><img src="https://binarymetrix.in/lineon/html/images/middle-blog-1.jpg" alt="" data-pagespeed-url-hash="3871980011" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>   
             <div class="middle-blog-left-txt">
              <h4>Take A Look at These Ultra Luxury Apartments in Haiti and Pick Your Dream Home</h4>
              <p>Nov 10, 2022</p>     
             </div>    
         </a>   
           
        </div> 
         
       </div>  
       
       <div class="col-lg-5 col-md-6">
        <div class="middle-blog-right">
            
         <div class="middle-blog-right-col"><a href="#">
           <div class="middle-blog-right-pic"><img src="https://binarymetrix.in/lineon/html/images/middle-blog-2.jpg" alt="" data-pagespeed-url-hash="4166479932" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>   
            <div class="middle-blog-right-txt">  
             <h4>25+ Gazebo Design Ideas That Will Take Your Outdoor Decor To The Next Level</h4>
             <p>Sep 10, 2022</p>    
            </div> 
           </a>
         </div>
            
         <div class="middle-blog-right-col"><a href="#">
           <div class="middle-blog-right-pic"><img src="https://binarymetrix.in/lineon/html/images/middle-blog-3.jpg" alt="" data-pagespeed-url-hash="166012557" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>   
            <div class="middle-blog-right-txt">  
             <h4>Bring The Stunning Haiti to Your Home with Stone Flooring</h4>
             <p>Sep 10, 2022</p>    
            </div> 
           </a>
         </div>
            
         <div class="middle-blog-right-col"><a href="#">
           <div class="middle-blog-right-pic"><img src="https://binarymetrix.in/lineon/html/images/middle-blog-4.jpg" alt="" data-pagespeed-url-hash="460512478" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>   
            <div class="middle-blog-right-txt">  
             <h4>Everything You Need to Know About Feng Shui Frog</h4>
             <p>Sep 10, 2022</p>    
            </div> 
           </a>
         </div>
            
          <div class="middle-blog-right-col"><a href="#">
           <div class="middle-blog-right-pic"><img src="https://binarymetrix.in/lineon/html/images/middle-blog-5.jpg" alt="" data-pagespeed-url-hash="755012399" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>   
            <div class="middle-blog-right-txt">  
             <h4>The Most Comfortable Reading Chair Designs of 2022</h4>
             <p>Sep 10, 2022</p>    
            </div> 
           </a>
         </div>            
            
        </div> 
       </div>     
         
     </div>
     
   </div>     
 </div>
  
  <div class="bottom-blog-sec">
  <div class="container">
    
    <div class="row">
    
          @foreach($blogResult as $result)

          @php
            $o_date = date_create($result->created_on);
            $c_date = date_format($o_date,"d F Y");
          @endphp
          <div class="col-lg-4 col-md-4 col-sm-6">
              <div class="blog-col">
                <a href="{{ url('blog-detail/'.$result->id) }}">
                  <div class="blog-pic"><img src="{{ asset('blog/'.$result->file) }}" alt="" data-pagespeed-url-hash="691971383" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                  <div class="blog-content">
                     <p class="blog-date">{{$c_date}}</p> 
                      <h3 class="bodo-title">{{$result->title}}</h3>
                      <p>{!! \Illuminate\Support\Str::limit($result->long_description, $limit = 50, $end = '...') !!}</p>
                      <div class="read-link">Read More</div>
                  </div>
                </a>
            </div>  
           </div>
           @endforeach
  
    </div>  
     
    <!-- <div class="pagination-col">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#"><i class="las la-arrow-left"></i></a></li>  
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>  
        <li class="page-item"><a class="page-link" href="#"><i class="las la-arrow-right"></i></a></li>
      </ul>
    </div> -->  
      
  </div>     
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