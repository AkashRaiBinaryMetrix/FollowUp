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
    
<div class="property-management-page">
    
 <div class="property-manage-banner">
    <div class="container">
    <div class="row align-items-center">
        
    <div class="col-md-6">
      <div class="property-manage-text">
        <h3 class="title">Property Management Services</h3>  
        <p>Manage your property records with Lineon, We are one of the best property management companies that handle everything for you.</p>
        <ul>
            <li>24/7 dedicated property manager</li>  
            <li>On-time rental payment</li>  
            <li>Financial records in one click</li>
            <li>Latest rent collection updates</li>  
            <li>All-time referral rent receipt access</li>
          </ul>  
          
      </div>    
    </div>
        
    <div class="col-md-6 text-md-right">
      <div class="property-manage-vector"><img src="{{ asset('images/property-management-vector.png') }}" alt="" data-pagespeed-url-hash="2335450" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
    </div>
        
  </div>
    </div>
    
 </div> 
    
    
<div class="property-manage-form">
  <div class="container">
    <div class="inner-property-manage-form">
      <h3 class="content-title-sub">Fill your property details</h3>  
      @if(!empty($message))
  <div class="alert alert-success"> {{ $message }}</div>
@endif
      <form class="common-form" id="signupForm" method="post" action="{{ route('signup.process') }}" enctype="multipart/form-data">
      	 @csrf
            <fieldset>
         <div class="row"> 

            <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>First Name</label>
                <input maxlength="50" class="form-control" name="firstname" id="firstname" value="" type="text" required="">
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Last Name</label>
                <input maxlength="50" class="form-control" name="lastname" id="lastname" value="" type="text">
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Address</label>
                <input maxlength="50" class="form-control" name="address" id="address" value="" type="text">
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="form-group">
              <label>Country</label>
                  <select class="form-control" id="country-dropdown" name="country" class="Form-control" onchange="test(this.value)">
                    <option value="" id="Country">Select Country</option>
                    @foreach($country_data as $cresult)
                      <option value="{{$cresult->id}}">{{$cresult->country_name}}</option>
                    @endforeach
                    </option>
                  </select>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3" >
              <div class="form-group">
              <label>State</label>
                  <select class="form-control" id="state-dropdown" name="state" class="Form-control" onchange="city1(this.value)">
                    <option value="" id="State">Select State</option>
                  </select>
              </div>
            </div>
             
            <div class="col-12 col-sm-6 col-md-3">
              <div class="form-group">
                <label>City</label>
                <select class="form-control" id="city-dropdown" name="city" class="Form-control">
                    <option value="" id="city">Select City</option>
                  </select>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="form-group">
                <label>Zipcode</label>
                <input maxlength="6" class="form-control" name="zipcode" id="zipcode" value="" type="text">
              </div>
            </div> 

            <div class="col-12">
             
            <div class="form-group">	
              <label class="mb-3">Type of property</label>

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="typepro1" name="typepro" value="Villas">
              <label class="custom-control-label" for="typepro1">Villas</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="typepro2" name="typepro" value="Apartment">
              <label class="custom-control-label" for="typepro2">Apartment</label>
            </div>	

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="typepro3" name="typepro" value="Commercial Area">
              <label class="custom-control-label" for="typepro3">Commercial Area</label>
            </div>	

            </div>
                
             </div>
             
             <div class="col-12">
               <div class="form-group">	
                <label class="mb-3">Amenities</label>

                  <div class="five-checkbox-col">

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1" name="example[]" value="Maintenance Staff">
                      <label class="custom-control-label" for="customCheck1">Maintenance Staff</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck2" name="example[]" value="Club House">
                      <label class="custom-control-label" for="customCheck2">Club House</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck3" name="example[]" value="Children's play area">
                      <label class="custom-control-label" for="customCheck3">Children's play area</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck4" name="example[]" value="Car Parking">
                      <label class="custom-control-label" for="customCheck4">Car Parking</label>
                    </div>  

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck5" name="example[]" value="Lift(s)">
                      <label class="custom-control-label" for="customCheck5">Lift(s)</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck6" name="example[]" value="Landscaped Gardens">
                      <label class="custom-control-label" for="customCheck6">Landscaped Gardens</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck7" name="example[]" value="24 X 7 Security">
                      <label class="custom-control-label" for="customCheck7">24 X 7 Security</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck8" name="example[]" value="Swimming Pool">
                      <label class="custom-control-label" for="customCheck8">Swimming Pool</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck9" name="example[]" value="Fire Security">
                      <label class="custom-control-label" for="customCheck9">Fire Security</label>
                    </div>  

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck10" name="example[]" value="Full Power Backup">
                      <label class="custom-control-label" for="customCheck10">Full Power Backup</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck11" name="example[]" value="Sports Facility">
                      <label class="custom-control-label" for="customCheck11">Sports Facility</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck12" name="example[]" value="Air Conditioning">
                      <label class="custom-control-label" for="customCheck12">Air Conditioning</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck13" name="example[]" value="Gymnasium">
                      <label class="custom-control-label" for="customCheck13">Gymnasium</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck14" name="example[]" value="Jogging Track">
                      <label class="custom-control-label" for="customCheck14">Jogging Track</label>
                    </div>  

                  </div>
	
                </div> 
             </div>
             
             <div class="col-12 col-sm-6 col-md-5">
              <div class="form-group">
                <label>Phone No.</label>
                <input maxlength="10" class="form-control" name="phone" id="phone" value="" type="text" required="">
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-5">
              <div class="form-group">
                <label>Email ID</label>
                <input maxlength="50" class="form-control" name="email" id="email" value="" type="text">
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-5">
              <div class="form-group">
                <label>Upload property images(*Only jpg,jpeg and png)</label>
                <input class="form-control" type="file" name="filenames[]" multiple>
              </div>
            </div>

            </div>

            <div class="mt-3 mb-2">
              <button type="reset" class="common-btn blank-common-btn">Cancel</button>    
              <button type="submit" class="common-btn">Submit</button>
            </div>	

            </fieldset>
          </form>    
      
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

 <script>
        $('#firstname').keypress(function (e) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var strigChar = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(strigChar)) {
                return true;
            }
            return false
        });

        $('#lastname').keypress(function (e) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var strigChar = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(strigChar)) {
                return true;
            }
            return false
        });

        $('#city').keypress(function (e) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var strigChar = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(strigChar)) {
                return true;
            }
            return false
        });

        $('#state').keypress(function (e) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var strigChar = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(strigChar)) {
                return true;
            }
            return false
        });

        $("#phone").keypress(function (e) {
            if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
        });

        $("#zipcode").keypress(function (e) {
            if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
        });
    </script>

    <script>
	$.validator.setDefaults({
		submitHandler: function() {
			//alert("submitted!");
			document.getElementById("signupForm").submit();
		}
	});

	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				address: "required",
				city: "required",
        country: "required",
				state: "required",
				zipcode: "required",
				phone: "required",
				email: {
					required: true,
					email: true
				},
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				address: "Please enter property address",
				city: "Please enter property city",
        country: "Please enter property country",
				state: "Please enter property state",
				zipcode: "Please enter property zipcode",
				phone: "Please enter your phone number",
				email: "Please enter a valid email address",
				topic: "Please select at least 2 topics"
			}
		});

		// propose username by combining first- and lastname
		$("#username").focus(function() {
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			if (firstname && lastname && !this.value) {
				this.value = firstname + "." + lastname;
			}
		});

		//code to hide topic selection, disable for demo
		var newsletter = $("#newsletter");
		// newsletter topics are optional, hide at first
		var inital = newsletter.is(":checked");
		var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
		var topicInputs = topics.find("input").attr("disabled", !inital);
		// show when newsletter is checked
		newsletter.click(function() {
			topics[this.checked ? "removeClass" : "addClass"]("gray");
			topicInputs.attr("disabled", !this.checked);
		});
	});
	</script>

<script>
 function test(name){
  var form_data = new FormData();

    form_data.append("name", name);
    form_data.append("_token", "{{ csrf_token() }}");

  $.ajax({
        url:"{{ route('getstatemaster') }}",
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false, 
        success:function(data)
        {
          //alert(data);
          $("#state-dropdown").empty().html(data);
        }
     });
 }
  </script>

<script>
 function city1(name){
    var form_data = new FormData();
    
    //alert(name);
    
    form_data.append("name", name);
    form_data.append("_token", "{{ csrf_token() }}");

    $.ajax({
        url:"{{ route('getcitymaster') }}",
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false, 
        success:function(data)
        {
          //alert(data);
          $("#city-dropdown").empty().html(data);
        }
     });
 }
</script>

</body>
</html>