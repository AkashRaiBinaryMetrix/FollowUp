<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

<title>LINEON Group</title>     
    
    
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>    
    
<!-- Owl Stylesheets -->
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">    
    
<link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/developer.css') }}" type="text/css" />
    
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
      @php
        $isUserLoggedIn = Session('isUserLoggedIn');
        if (!empty($isUserLoggedIn)) {
      @endphp
        <div class="login-btn">
          <a href="{{url('user-listnewproperty')}}"><i class="las la-sign-out-alt"></i> My Account</a> 
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

<div class="mainmenu-bar">
  <div class="manumenu-close"><i class="las la-times"></i></div>  
  
  <div class="mainmenu-left">
    <div class="mainmenu-logo"><a href="#"><img src="images/menu-logo.png" alt=""></a></div>
      
    <div class="main-menu-search">
      <h4>Search Lineon</h4>
    <form class="main-search-form" name="cform" method="post">
      <div class="form-group">
      <input type="text" class="form-control" name="name" id="name" placeholder="What are you looking for?" required="">
      </div>
      <button type="submit" class="search-ico">Search</button>  
    </form>
     </div>
      
    <div class="main-menu-exlink">
     <p><a href="#">Privacy Policy</a></p>
     <p><a href="#">Terms & Conditions</a></p>
     <p><a href="#">Log In</a></p>    
      
     <div class="footer-social">
        <a href="#"><i class="lab la-facebook-f"></i></a>     
        <a href="#"><i class="lab la-twitter"></i></a>     
        <a href="#"><i class="lab la-linkedin-in"></i></a>     
        <a href="#"><i class="lab la-instagram"></i></a>     
        <a href="#"><i class="lab la-youtube"></i></a>     
      </div>    
        
    </div> 
      
  </div>
    
  <div class="mainmenu-right">
   <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
         <div class="mainmenu-links">
          <h5>Main Links</h5>     
          <p><a href="#">List your property</a></p>   
          <p><a href="#">About us</a></p>   

           @php
           $isUserLoggedIn = Session('isUserLoggedIn');
           if (!empty($isUserLoggedIn)) {
           @endphp
            <p><a href="{{url('user-listnewproperty')}}">Dashboard</a></p>
            <p><a href="{{url('user-logout')}}">Log out</a></p> 
           @php   
              }else{
           @endphp
             <p><a href="{{url('login')}}">Log In Now</a></p>
           @php
              }
           @endphp
          
          <p><a href="#">Contact us</a></p>
          <p><a href="#">Rent House in Haiti</a></p>
          <p><a href="#">Atlanta Apartments</a></p>     
         </div>  
        </div>
          
        <div class="col-md-4">
         <div class="mainmenu-links">
          <h5>&nbsp;</h5>     
          <p><a href="#">Properties Management</a></p>
          <p><a href="#">Blog</a></p>   

          @php
           $isUserLoggedIn = Session('isUserLoggedIn');
           if (!empty($isUserLoggedIn)) {
           @endphp
           @php   
              }else{
           @endphp
                <p><a href="{{url('sign-up')}}">Sign Up Now</a></p>
           @php
              }
           @endphp

          <p><a href="#">New Listed Properties</a></p> 
          <p><a href="#">Austin Apartments</a></p>
          <p><a href="#">Buy House in Haiti</a></p>     
         </div>  
        </div>
          
        <div class="col-md-4">
         <div class="mainmenu-links">
          <h5>Explore Neighborhoods</h5>  
          <p><a href="#">Austin, TX</a></p>
          <p><a href="#">Boston, MA</a></p>
          <p><a href="#">Atlanta, GA</a></p>
          <p><a href="#">Oakland, CA</a></p>
          <p><a href="#">Scottsdale, AZ</a></p>
          <p><a href="#">Sandy Springs, GA</a></p>     
         </div>  
        </div>  
       
      </div>
   </div>   
  </div>    
    
    
</div>  
  
<div class="inner-bannerbar"></div>    
    
<div class="admin-yellowbar">    
</div>