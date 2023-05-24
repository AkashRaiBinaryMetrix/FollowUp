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

<!-- Owl Stylesheets -->
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">	
<link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css" />

</head>
<body>  
<header>    

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

        <div class="header-menubar"><img src="{{ asset('images/menu-ico.png') }}" alt=""></div>   
      @php   
        }else{
      @endphp
        <div class="login-btn">
          <a href="{{url('sign-up')}}"><i class="las la-sign-out-alt"></i> Sign Up</a> 
          <a href="{{url('login')}}"><i class="las la-user"></i> Log In</a>
        </div>
        <div class="header-menubar"><img src="{{ asset('images/menu-ico.png') }}" alt=""></div>     
      @php
        }
      @endphp

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
     <p><a href="{{url('privacy-policy')}}">Privacy Policy</a></p>
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
          <p><a href="{{url('about-us')}}">About us</a></p> 

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

          <p><a href="{{url('contact-us')}}">Contact us</a></p>
          <p><a href="#">Rent House in Haiti</a></p>
          <p><a href="#">Atlanta Apartments</a></p>     
         </div>  
        </div>
          
        <div class="col-md-4">
         <div class="mainmenu-links">
          <h5>&nbsp;</h5>     
          <p><a href="#">Properties Management</a></p>
          <p><a href="{{url('blog')}}">Blog</a></p>

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


<div class="mlslisting-wrapper">  
 <div class="container-fluid">
   <div class="row">

     <div class="col-lg-6 p-0 mls-listing-map-main">
     <div class="mls-listing-map">
           <div id="map" style="width: auto; height: 550px; position: relative; overflow: hidden;"></div>

       @php


         foreach($result as $booking){
            //get city name
            $city_name_newly = DB::table('city_master')->where('id','=',$booking->city)->get();

            //get state name
            $state_name_newly = DB::table('state_master')->where('id','=',$booking->state)->get();
            
            //get state name
            $country_name_newly = DB::table('country_master')->where('id','=',$booking->country)->get();

            $address_featured = rtrim($booking->address, ',');
            $add_string = $address_featured.','.$city_name_newly.','.$state_name_newly.','.$country_name_newly;

            $address1 = str_replace(" ", "+", $add_string);
            $final_add = str_replace(",", "", $address1);
          
            $json    = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$final_add&sensor=false&key=AIzaSyDZnxTq1Q3JoH-_Levv413d_eeOiVfU9CE");
            
            $json    = json_decode($json);
            $lat     = $json->results[0]->geometry->location->lat;
            $long    = $json->results[0]->geometry->location->lng;
           
            $locations[]  =   array($booking->address, $lat, $long);
          }

          //echo "<pre>";
          //print_r($locations);
          //exit;
       @endphp

       @php
        if(isset($locations)){
       @endphp
        <script type="text/javascript">
          function initMap() {

              const myLatLng = { lat: 19.0331126, lng: -74.4347675 };
              const map = new google.maps.Map(document.getElementById("map"), {
                  zoom: 2,
                  center: myLatLng,
              });
    
              var locations = {{ Js::from($locations) }};
              var infowindow = new google.maps.InfoWindow();
              var marker, i;
                
              for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                      map: map
                    });
                      
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                      return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                      }
                    })(marker, i));
              }
          }
    
          window.initMap = initMap;
    </script>

    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyCr3RaCsH1MBQ9fCbpQg3JQ48RuHVOezcM&callback=initMap" ></script>
        @php
     }
    @endphp
     </div>
     </div>
     
     
     <div class="col-lg-6 p-0">
      <div class="mls-listing-sec">
      
       <div class="mls-title-bar">
       <h3> Real Estate Listings <small>

       @php
          echo count($result);
       @endphp
       Search results</small></h3>
       </div>
       
       <div class="mls-listing">
      
      <div class="row">
      
        
        @foreach($result as $booking)
               @php
                 $getPropImageById = DB::table('property_list_images')
                                ->where('list_id',$booking->id)
                                ->limit(1)
                                ->first();

                 $final_image = str_replace("/home/devmetrx/public_html/lineon/public/","",$getPropImageById->url);
               @endphp  
       <div class="col-lg-6 col-md-4 col-sm-6">
         <div class="pro-list-col">
          <a href="{{ url('view-user-property/'.$booking->id) }}">
          <div class="pro-listpic"><img src="{{ asset($final_image) }}" class="img-responsive" alt=""></div>
          <div class="pro-list-text">
                    <h3 class="proper-price">${{$booking->price}}</h3>    
                     <h4 class="proper-title">{{$booking->property_title}}</h4>    
           <p class="proper-name">
             <i class="las la-map-marker"></i> 
             @php
              //get city name
              $city_name_newly = DB::table('city_master')->where('id','=',$booking->city)->get();

              //get state name
              $state_name_newly = DB::table('state_master')->where('id','=',$booking->state)->get();

              $address_featured = rtrim($booking->address, ',');
             @endphp
             {{$address_featured}},
             {{$city_name_newly[0]->city_name}},
             {{$state_name_newly[0]->state_name}} - {{$booking->zipcode}}</p>
             <div class="pro-area">
             <div class="pro-area-col"><i class="las la-shower"></i> <strong>{{$booking->bath}}</strong> Baths</div>
             <div class="pro-area-col"><i class="las la-bed"></i> <strong>{{$booking->rooms}}</strong> Beds</div>
             <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>{{$booking->area}}</strong> Sq. ft.</div>  
            </div>
          </div>        
         </a>
         <div class="whislist-icon"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
         </div>
       </div>
       @endforeach
      
   
 
    
      
      </div>
         
     <!--  <div class="pagination-col">
        <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#"><i class="las la-arrow-left"></i></a></li>  
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>  
        <li class="page-item"><a class="page-link" href="#"><i class="las la-arrow-right"></i></a></li>
        </ul>
      </div>    -->
      
       </div> 
      
      
      
      
       
    </div>
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

<a href="{{url('blog')}}">Blog</a>

<a href="{{url('contact-us')}}">Contact us</a>

<a href="{{url('privacy-policy')}}">Privacy Policy</a>

<a href="terms.html">Terms & Conditions</a>        

 </div>    

     

<div class="footer-social">

<a href="#"><i class="lab la-facebook-f"></i></a>     

<a href="#"><i class="lab la-twitter"></i></a>     

<a href="#"><i class="lab la-linkedin-in"></i></a>     

<a href="#"><i class="lab la-instagram"></i></a>     

<a href="#"><i class="lab la-youtube"></i></a>     

     

</div>     

     

 </div>      

</div>    

    

<div class="copyright"><div class="container"><p>Lineon Group © 2022 | All rights reserved <span><a href=" https://www.binarymetrix.com/website-designing/" target="_blank">Website Designed</a> &amp; <a href="https://www.binarymetrix.com/website-development/" target="_blank">Developed</a> by  <a href="https://www.binarymetrix.com/" target="_blank">BinaryMetrix Technologies</a></span></p></div></div>    

    

    

    

    

    

    

    

    

    

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="{{ asset('js/owl.carousel.js') }}"></script>

<script src="{{ asset('js/wow.min.js') }}"></script>

<script src="{{ asset('js/custom.js') }}"></script>     

  

<script>

function myFunction(x) {

  x.classList.toggle("las");

}

</script>    

    

</body>

</html>





    