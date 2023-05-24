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

      <div class="pro-manage-btn"><a href="{{url('House-in-Dominican-Republic')}}"><i class="las la-home"></i>House in Dominican Republic</a></div>

      @php
        $isUserLoggedIn = Session('isUserLoggedIn');
        if (!empty($isUserLoggedIn)) {
      @endphp
        <div class="login-btn">
          <a href="{{url('user-listnewproperty')}}"><i class="las la-sign-out-alt"></i> My Account</a> 
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
     <p><a href="{{url('terms-and-conditions')}}">Terms & Conditions</a></p>
     <p><a href="{{url('login')}}">Log In</a></p>    
      
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
          <p><a href="{{url('agents-list')}}">Agents List</a></p>          
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

  

<div class="featured-pro-sec">

 <div class="title-col"><h3 class="title">Rent or by an House in Dominican Republic</h3></div>    

    

 <div class="inner-featured-pro">

   <div class="container">

     <div class="row">

         
     		@foreach($propertyDetails as $detail) 
               @php
                 $getPropImageById = DB::table('property_list_images')
                                ->where('list_id',$detail->id)
                                ->limit(1)
                                ->first();

                  if(isset($getPropImageById->url)){
                 	$final_image = str_replace("/home/devmetrx/public_html/lineon/public/","",$getPropImageById->url);
                 }else{
                 	$final_image = "";
                 }
               @endphp     
        <div class="col-lg-3 col-md-4 col-sm-6">
			   <div class="pro-list-col">
			     <a href="{{ url('view-user-property/'.$detail->id) }}">
				   <div class="pro-listpic"><img src="{{ asset($final_image) }}" class="img-responsive" alt=""></div>

					 <div class="pro-list-text">
                    <h3 class="proper-price">${{$detail->price}}</h3>    
                    <h4 class="proper-title">{{$detail->property_title}}</h4>    
					 <p class="proper-name">
             <i class="las la-map-marker"></i> 
             @php
              //get city name
              $city_name_newly = DB::table('city_master')->where('id','=',$detail->city)->get();

              //get state name
              $state_name_newly = DB::table('state_master')->where('id','=',$detail->state)->get();

              $address_featured = rtrim($detail->address, ',');
             @endphp
             {{$address_featured}},
             {{$city_name_newly[0]->city_name}},
             {{$state_name_newly[0]->state_name}} - {{$detail->zipcode}}</p>
					   <div class="pro-area">
						 <div class="pro-area-col"><i class="las la-shower"></i> <strong>{{$detail->bath}}</strong> Baths</div>
						 <div class="pro-area-col"><i class="las la-bed"></i> <strong>{{$detail->rooms}}</strong> Beds</div>
						 <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>{{$detail->area}}</strong> Acres</div>  
					  </div>
					 </div>
				   </a>
           <div class="whislist-icon"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
           <div class="whatapp-icon"class="whatapp_details"><a href="https://api.whatsapp.com/send?phone=+50940791515&text=Hello I am intersted in this property : {{$detail->property_title}}"><i onclick="myFunction(this)" class="lab la-whatsapp"></i></a></div> 
           <div class="messenger-icon"class="messenger_details"><a href="fb-messenger://share/?link= https://www.facebook.com/lineonimmobilier"><i onclick="myFunction(this)" class="lab la-facebook-messenger"></i></a></div> 
           <div class="email-icon"class="email_details"><a href="mailto:info@lineongroup.com?subject=Hello I am intersted in this property : {{$detail->property_title}}"title="Share by Email"><i onclick="myFunction(this)" class="las la-envelope"></i></a></div>  
			   </div>
			  </div>
			  @endforeach		  

		  </div>

     

     

   </div>    

 </div>   

    

    

</div>    

      

  

  

@yield('content')

  

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





    