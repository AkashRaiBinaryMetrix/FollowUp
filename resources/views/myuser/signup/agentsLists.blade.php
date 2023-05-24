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
    
<div class="container">
     <div class="row">
         
       <div class="col-md-12">
         <div class="useradmin-right">
           <div class="useramdin-form1 whitebox">
            <div class="useradmin-title">Agents Lists</div>  
            <table class="manage-table responsive-table">
              <tbody>
              
              @foreach($result as $data)
                @php
                  $originalDate = $data->created_on;
                  $newDate = date("d F, Y", strtotime($originalDate));

                  //get user details
                  $getUserInfo = DB::table('users')->where('id',$data->user_id)->get();
                  $img = $getUserInfo[0]->profile_pic;
                  $final_img = str_replace('/home/devmetrx/public_html/lineon/',$_SERVER['APP_URL'],$img);
                @endphp      
              <tr>
                <td class="utf-title-container"><img src="{{$final_img}}" alt="" data-pagespeed-url-hash="274459189" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                  <div class="utf-title2">
                    <h4><a href="#">dfdsfdsfsfsdffgdfg333</a></h4>
                    <h4><a href="#">Agent Type:- {{$data->comp}}</a></h4>
                    <h4><a href="#">Company Name:- {{$data->company_name}}</a></h4>
                  </div>
                </td>
                <td class="utf-expire-date">
                                    {{$newDate}}
                </td>
                <td class="usermypro-action">
                    <a href="{{ url('view-agent-detail/'.$data->id) }}" class="view"><i class="las la-eye"></i></a>
                </td>
              </tr>
              @endforeach
                    
            </tbody>
               </table>   
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
   <a href="about-us.html">About us</a>
<a href="list-property.html">List you property</a>
<a href="{{url('login')}}">Login</a>
<a href="sign-up.html">Sign up</a>
<a href="blog.html">Blog</a>
<a href="contact-us.html">Contact us</a>
<a href="privacy-policy.html">Privacy Policy</a>
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
  
    
</body>
</html>