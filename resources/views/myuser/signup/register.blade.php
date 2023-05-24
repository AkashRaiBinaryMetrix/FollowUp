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
      <div class="list-pro-btn"><a href="list-property.html" class="common-btn">List your property</a></div>
      <div class="pro-manage-btn"><a href="property-management.html"><i class="las la-home"></i> Properties Management</a></div>
      <div class="login-btn"><a href="{{url('sign-up')}}"><i class="las la-sign-out-alt"></i> Sign Up</a> <a href="{{url('login')}}"><i class="las la-user"></i> Log In</a></div>
      
      <div class="header-menubar"><img src="{{ asset('images/menu-ico.png') }}" alt=""></div>     
    </div>
        
    </div><!--inner-header-->    
      
  </div>
</div>    
</header>
  
<div class="inner-bannerbar"></div>    
    
<div class="login-page">
 <div class="container">   
   <div class="inner-login-page">

    <div class="login-w60">
      <div class="login-figure-sec">
        <img src="{{ asset('images/login.jpg') }}" alt="" class="img-responsive">
         <div class="login-text">
           <h1>Create an account to unlock these benefits</h1>
           <ul>
            <li>Get latest updates about Properties and Projects.</li>
            <li>Access millions of advertiser details in one click.</li>
            <li>Get market information, reports and price trends.</li>
            <li>Advertise your property for free!</li>  
           </ul>     
         </div> 
      </div>
    </div>
    
    <div class="login-w40">
    
    <div class="login-sec">
        
        <h3>Sign Up</h3>

        <div class="toast success" data-autohide="false" style="display: none">
    <div class="toast-header">
        <strong class="mr-auto">Success</strong>
        <small></small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body"
        style="background: green;
                                                                  color: white;">

    </div>
</div>
<div class="toast failure" data-autohide="false" style="display: none">
    <div class="toast-header">
        <strong class="mr-auto">Failure</strong>
        <small></small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body"
        style="background: red;
                                                                  color: white;">

    </div>
</div>

        
        <form  id="signUpForm" class="login-form" name="cform" method="post">
<img id="loading-image" src="{{ asset('images/please-wait.gif') }}" style="display:none;"/>
        <div class="form-group">
            <input class="form-control" minlength="15" maxlength="30" placeholder="Full Name" type="text" name="fullName" id="fullName" required="">
            <p class="formError fullName"></p>
            <div class="login-user-ico"><i class="las la-user"></i></div>
        </div>
            
        <div class="form-group">
            <input class="form-control" minlength="20" maxlength="30" placeholder="Email" type="email" name="email" id="email" required="">
            <p class="formError email"></p>
            <div class="login-user-ico"><i class="las la-envelope"></i></div>
        </div>
            
        <div class="form-group">
            <input class="form-control" minlength="10" maxlength="10" placeholder="Mobile No." type="phone" name="phone" id="phone" required="">
            <p class="formError phone"></p>
            <div class="login-user-ico"><i class="las la-phone"></i></div>
        </div>    

        <div class="form-group">
            <input class="form-control" placeholder="Password" type="password" name="password" id="password" required="">
            <p class="formError password"></p>
            <div class="login-user-ico"><i class="las la-lock"></i></div>
        </div>  

        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">


        <div id="register"><div class="form-group mb-0"><button type="button" class="common-btn" id="signUp">Register</button></div></div>

        <div class="signup-ter">By clicking you will be agreeing to <a href="#">Terms & Conditions</a></div>    
            
        </form>
    </div>
    
  </div>
    
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
 <script>
        let sBASEURL = '<?php Config::get('app.url'); ?>';
    </script>

 <script>
        $('#fullName').keypress(function (e) {
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

        let fullNameError = 0,
            emailError = 0,
            phoneError = 0,
            passwordError = 0;

        $('#signUp').on('click', function() {
            const re =
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            let fullName = $('#fullName').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let phone = $('#phone').val();
            
            if (fullName == '' || fullName == undefined || fullName == null) {
                $('.fullName').html('Full name is required');
                fullNameError++;
            } else {
                $('.fullName').html('');
                fullNameError = 0;
            }

            if (email == '' || email == undefined || email == null) {
                $('.email').html('Email is required');
                emailError++;
            } else if (email != '' && email != undefined && email != null && !re.test(email)) {
                $('.email').html('Please enter valid email');
                return false;
            } else {
                $('.email').html('');
                emailError = 0;
            }

            if (password == '' || password == undefined || password == null) {
                $('.password').html('Password is required');
                passwordError++;
            } else if (password && password.length < 6) {
                $('.password').html('Password must have contain atleast six character');
                passwordError++;
            } else {
                $('.password').html(``);
                passwordError = 0;
            }

            if (phone == '' || phone == undefined || phone == null) {
                $('.phone').html('Phone number is required');
                phoneError++;
            } else {
                $('.phone').html(``);
                phoneError = 0;
            }

            
            if (fullNameError > 0  || emailError > 0 || passwordError > 0 ||
                phoneError > 0) {
                return false;
            } else {
                $('#register').html(`<i class = "fa fa-circle-o-notch fa-spin" style = "font-size:24px"> 
                    </i>`);
                $.ajax({
                    url: sBASEURL + "signIn",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        fullName,
                        email,
                        password,
                        phone,
                    },
                    beforeSend: function() {
                        $("#loading-image").show();
                    },
                    success: function(response) {
                        let result = JSON.parse(response);
                        if (result.status == 'success') {
                            $("#loading-image").hide();
                            $('.success').show();
                            $('.success').toast('show');
                            $('.success .toast-body').html(`${result.msg}`);
                            $('#signUpForm')[0].reset();
                            setTimeout(function(){
                               window.location.reload(1);
                            }, 2000);
                        } else {
                            $("#loading-image").hide();
                            $('.failure').show();
                            $('.failure').toast('show');
                            $('.failure .toast-body').html(`${result.msg}`);
                        }
                        $('#register').html(
                            `<input type="button" name="submit" class="common-btn w-100"
                                    id="signUp" value="Sign In">`
                        );
                    }
                });
            }
        });
    </script>  
    
</body>
</html>