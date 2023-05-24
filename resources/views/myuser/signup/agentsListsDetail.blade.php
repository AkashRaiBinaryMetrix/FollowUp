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
    
<div class="agent-detail-sec">
 <div class="inner-agentdetail-sec">
    <div class="site-breadcrum">
      <div class="container">
        <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Agents</a></li>

    @php
      $agent_id = $id;

      //get agent details
      $getAgentInfo = DB::table('agent_profile')->where('id',$agent_id)->get();
    
      //get user details
      $getUserInfo = DB::table('users')->where('id',$getAgentInfo[0]->user_id)->get();

       $originalDate = $getAgentInfo[0]->created_on;
       $newDate = date("d F, Y", strtotime($originalDate));

       $img = $getUserInfo[0]->profile_pic;
       $final_img = str_replace('/home/devmetrx/public_html/lineon/',$_SERVER['APP_URL'],$img);
    @endphp
    <li class="breadcrumb-item active" aria-current="page">Luann McLawhorn</li>
    </ol>
      </div>      
    </div>    
    
    <div class="top-agent-detail">
      <div class="container">
        <div class="propagent-popup">            
          <div class="row">
            <div class="col-md-4 col-sm-5">
             <div class="agentteam-pic"><img src="{{$final_img}}" class="img-responsive" alt="" data-pagespeed-url-hash="4075839195" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>   
            </div>
            <div class="col-md-8 col-sm-7">
              <div class="agentmember-content">
                <h3>{{$getUserInfo[0]->name}}</h3>
                  
                <div class="agent-revieno"><span>4.90 / 5</span> ( 237 Review )</div>  
                  
                <div class="agent-det-bio">{{$getAgentInfo[0]->company_name}}</div>
                  
                <p><i class="las la-user-check"></i> From {{$newDate}}</p>
                <p><i class="las la-map-marked-alt"></i> {{$getUserInfo[0]->address}}</p>
                <p><a href="tel:1234569874"><i class="las la-phone"></i> <strong>Mobile:</strong> {{$getUserInfo[0]->mobile}}</a></p>
                <p><a href="#"><i class="las la-envelope"></i> <strong>Email:</strong> {{$getUserInfo[0]->email}}</a></p>  
                
                <div class="contact-agibtn">

                   <a href="#" class="common-btn"><img src="images/msgme-icon.png" alt="" data-pagespeed-url-hash="1569978282" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"> Message Me</a>&nbsp;&nbsp;
                   
                   @php
                    if(count($getFollowUnfollowDetails) == 0){
                   @endphp
                      <a href="#" class="common-btn" onclick="follow_unfollow(1,{{$agent_id}});"><img src="images/msgme-icon.png" alt="" data-pagespeed-url-hash="1569978282" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"> Follow</a>
                   @php
                    }else{
                   @endphp
                      <a href="#" class="common-btn" onclick="follow_unfollow(2,{{$agent_id}});"><img src="images/msgme-icon.png" alt="" data-pagespeed-url-hash="1569978282" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">Un-Follow</a>
                   @php
                      }
                   @endphp

                    <div class="contact-sharebtns">
                     <a href="#"><i class="lab la-facebook-f"></i></a>
                     <a href="#"><i class="lab la-twitter"></i></a>
                     <a href="#"><i class="lab la-linkedin-in"></i></a>
                     <a href="#"><i class="lab la-instagram"></i></a>
                     <a href="#"><i class="lab la-youtube"></i></a>
                    </div>
                </div>  
                  
              </div>  
              
            </div>  
          </div>
        </div>
        
      </div>
    </div><!--top-agent-detail--> 
     
    <div class="prop-detamiddle-sec">
  <div class="container">
  
  <div class="row">
    <div class="col-lg-8 custom-left">
          
    <div class="agent-detail-3tabs">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="agentallpro-tab" data-toggle="tab" href="#agentallpro" role="tab" aria-controls="agentallpro" aria-selected="true">All Property (27)</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="agentbuy-tab" data-toggle="tab" href="#agentbuy" role="tab" aria-controls="agentbuy" aria-selected="false">For Buy (10)</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="agentrent-tab" data-toggle="tab" href="#agentrent" role="tab" aria-controls="agentrent" aria-selected="false">For Rent (18)</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="followers-tab" data-toggle="tab" href="#followers" role="tab" aria-controls="followers" aria-selected="false">Followers ({{count($getFollowUnfollowDetails)}})</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade" id="agentallpro" role="tabpanel" aria-labelledby="agentallpro-tab">
                <div class="agent-det-tab-pro">
                   <div class="container-fluid p-0"> 
                   <div class="row no-gutters">
         
                     <div class="col-lg-4 col-md-4 col-sm-6">
                       <div class="pro-list-col">
                         <a href="#">
                          <div class="pro-listpic"><img src="images/listing-5.jpg" class="img-responsive" alt="" data-pagespeed-url-hash="1452458873" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>

                            <div class="pro-list-text">
                            <h3 class="proper-price">$4,000,000</h3>    
                             <h4 class="proper-title">Park Avenue</h4>    
                             <p class="proper-name"><i class="las la-map-marker"></i> 4450 E Perry Parkway Greenwood Village, CO 80121</p>
                               <div class="pro-area">
                                 <div class="pro-area-col"><i class="las la-shower"></i> <strong>3</strong> Baths</div>
                                 <div class="pro-area-col"><i class="las la-bed"></i> <strong>5</strong> Beds</div>
                                 <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>25264.8</strong> Acres</div>  
                              </div>
                            </div>

                         </a>
                        <div class="whislist-icon"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
                       </div>
                     </div>

                     <div class="col-lg-4 col-md-4 col-sm-6">
                       <div class="pro-list-col">
                         <a href="#">
                          <div class="pro-listpic"><img src="images/listing-6.jpg" class="img-responsive" alt="" data-pagespeed-url-hash="1746958794" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>

                            <div class="pro-list-text">
                            <h3 class="proper-price">$4,000,000</h3>    
                             <h4 class="proper-title">Park Avenue</h4>    
                             <p class="proper-name"><i class="las la-map-marker"></i> 4450 E Perry Parkway Greenwood Village, CO 80121</p>
                               <div class="pro-area">
                                 <div class="pro-area-col"><i class="las la-shower"></i> <strong>3</strong> Baths</div>
                                 <div class="pro-area-col"><i class="las la-bed"></i> <strong>5</strong> Beds</div>
                                 <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>25264.8</strong> Acres</div>  
                              </div>
                            </div>

                         </a>
                        <div class="whislist-icon"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
                       </div>
                     </div>

                     <div class="col-lg-4 col-md-4 col-sm-6">
                       <div class="pro-list-col">
                         <a href="#">
                          <div class="pro-listpic"><img src="images/listing-7.jpg" class="img-responsive" alt="" data-pagespeed-url-hash="2041458715" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>

                            <div class="pro-list-text">
                            <h3 class="proper-price">$4,000,000</h3>    
                             <h4 class="proper-title">Park Avenue</h4>    
                             <p class="proper-name"><i class="las la-map-marker"></i> 4450 E Perry Parkway Greenwood Village, CO 80121</p>
                               <div class="pro-area">
                                 <div class="pro-area-col"><i class="las la-shower"></i> <strong>3</strong> Baths</div>
                                 <div class="pro-area-col"><i class="las la-bed"></i> <strong>5</strong> Beds</div>
                                 <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>25264.8</strong> Acres</div>  
                              </div>
                            </div>

                         </a>
                        <div class="whislist-icon"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
                       </div>
                     </div>

                  </div>
                       
                    <div class="pagination-col">
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="las la-arrow-left"></i></a></li>  
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>  
                        <li class="page-item"><a class="page-link" href="#"><i class="las la-arrow-right"></i></a></li>
                      </ul>
                    </div>   
                       
                  </div>
                </div>  
              </div>
                
              <div class="tab-pane fade" id="agentbuy" role="tabpanel" aria-labelledby="agentbuy-tab">
                 <div class="agent-det-tab-pro">
                   <div class="container-fluid p-0"> 
                   <div class="row no-gutters">
         
                     <div class="col-lg-4 col-md-4 col-sm-6">
                       <div class="pro-list-col">
                         <a href="#">
                          <div class="pro-listpic"><img src="images/listing-5.jpg" class="img-responsive" alt="" data-pagespeed-url-hash="1452458873" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>

                            <div class="pro-list-text">
                            <h3 class="proper-price">$4,000,000</h3>    
                             <h4 class="proper-title">Park Avenue</h4>    
                             <p class="proper-name"><i class="las la-map-marker"></i> 4450 E Perry Parkway Greenwood Village, CO 80121</p>
                               <div class="pro-area">
                                 <div class="pro-area-col"><i class="las la-shower"></i> <strong>3</strong> Baths</div>
                                 <div class="pro-area-col"><i class="las la-bed"></i> <strong>5</strong> Beds</div>
                                 <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>25264.8</strong> Acres</div>  
                              </div>
                            </div>

                         </a>
                        <div class="whislist-icon"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
                       </div>
                     </div>

                     <div class="col-lg-4 col-md-4 col-sm-6">
                       <div class="pro-list-col">
                         <a href="#">
                          <div class="pro-listpic"><img src="images/listing-6.jpg" class="img-responsive" alt="" data-pagespeed-url-hash="1746958794" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>

                            <div class="pro-list-text">
                            <h3 class="proper-price">$4,000,000</h3>    
                             <h4 class="proper-title">Park Avenue</h4>    
                             <p class="proper-name"><i class="las la-map-marker"></i> 4450 E Perry Parkway Greenwood Village, CO 80121</p>
                               <div class="pro-area">
                                 <div class="pro-area-col"><i class="las la-shower"></i> <strong>3</strong> Baths</div>
                                 <div class="pro-area-col"><i class="las la-bed"></i> <strong>5</strong> Beds</div>
                                 <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>25264.8</strong> Acres</div>  
                              </div>
                            </div>

                         </a>
                        <div class="whislist-icon"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
                       </div>
                     </div>

                     <div class="col-lg-4 col-md-4 col-sm-6">
                       <div class="pro-list-col">
                         <a href="#">
                          <div class="pro-listpic"><img src="images/listing-7.jpg" class="img-responsive" alt="" data-pagespeed-url-hash="2041458715" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>

                            <div class="pro-list-text">
                            <h3 class="proper-price">$4,000,000</h3>    
                             <h4 class="proper-title">Park Avenue</h4>    
                             <p class="proper-name"><i class="las la-map-marker"></i> 4450 E Perry Parkway Greenwood Village, CO 80121</p>
                               <div class="pro-area">
                                 <div class="pro-area-col"><i class="las la-shower"></i> <strong>3</strong> Baths</div>
                                 <div class="pro-area-col"><i class="las la-bed"></i> <strong>5</strong> Beds</div>
                                 <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>25264.8</strong> Acres</div>  
                              </div>
                            </div>

                         </a>
                        <div class="whislist-icon"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
                       </div>
                     </div>

                  </div>
                       
                    <div class="pagination-col">
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="las la-arrow-left"></i></a></li>  
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>  
                        <li class="page-item"><a class="page-link" href="#"><i class="las la-arrow-right"></i></a></li>
                      </ul>
                    </div>   
                       
                  </div>
                </div>
              </div><!--tab-pane-->
                
              <div class="tab-pane fade active show" id="agentrent" role="tabpanel" aria-labelledby="agentrent-tab">
                <div class="agent-det-tab-pro">
                   <div class="container-fluid p-0"> 
                   <div class="row no-gutters">
         
                     <div class="col-lg-4 col-md-4 col-sm-6">
                       <div class="pro-list-col">
                         <a href="#">
                          <div class="pro-listpic"><img src="images/listing-5.jpg" class="img-responsive" alt="" data-pagespeed-url-hash="1452458873" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>

                            <div class="pro-list-text">
                            <h3 class="proper-price">$4,000,000</h3>    
                             <h4 class="proper-title">Park Avenue</h4>    
                             <p class="proper-name"><i class="las la-map-marker"></i> 4450 E Perry Parkway Greenwood Village, CO 80121</p>
                               <div class="pro-area">
                                 <div class="pro-area-col"><i class="las la-shower"></i> <strong>3</strong> Baths</div>
                                 <div class="pro-area-col"><i class="las la-bed"></i> <strong>5</strong> Beds</div>
                                 <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>25264.8</strong> Acres</div>  
                              </div>
                            </div>

                         </a>
                        <div class="whislist-icon"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
                       </div>
                     </div>

                     <div class="col-lg-4 col-md-4 col-sm-6">
                       <div class="pro-list-col">
                         <a href="#">
                          <div class="pro-listpic"><img src="images/listing-6.jpg" class="img-responsive" alt="" data-pagespeed-url-hash="1746958794" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>

                            <div class="pro-list-text">
                            <h3 class="proper-price">$4,000,000</h3>    
                             <h4 class="proper-title">Park Avenue</h4>    
                             <p class="proper-name"><i class="las la-map-marker"></i> 4450 E Perry Parkway Greenwood Village, CO 80121</p>
                               <div class="pro-area">
                                 <div class="pro-area-col"><i class="las la-shower"></i> <strong>3</strong> Baths</div>
                                 <div class="pro-area-col"><i class="las la-bed"></i> <strong>5</strong> Beds</div>
                                 <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>25264.8</strong> Acres</div>  
                              </div>
                            </div>

                         </a>
                        <div class="whislist-icon"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
                       </div>
                     </div>

                     <div class="col-lg-4 col-md-4 col-sm-6">
                       <div class="pro-list-col">
                         <a href="#">
                          <div class="pro-listpic"><img src="images/listing-7.jpg" class="img-responsive" alt="" data-pagespeed-url-hash="2041458715" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>

                            <div class="pro-list-text">
                            <h3 class="proper-price">$4,000,000</h3>    
                             <h4 class="proper-title">Park Avenue</h4>    
                             <p class="proper-name"><i class="las la-map-marker"></i> 4450 E Perry Parkway Greenwood Village, CO 80121</p>
                               <div class="pro-area">
                                 <div class="pro-area-col"><i class="las la-shower"></i> <strong>3</strong> Baths</div>
                                 <div class="pro-area-col"><i class="las la-bed"></i> <strong>5</strong> Beds</div>
                                 <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>25264.8</strong> Acres</div>  
                              </div>
                            </div>

                         </a>
                        <div class="whislist-icon"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
                       </div>
                     </div>

                  </div>
                       
                    <div class="pagination-col">
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="las la-arrow-left"></i></a></li>  
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>  
                        <li class="page-item"><a class="page-link" href="#"><i class="las la-arrow-right"></i></a></li>
                      </ul>
                    </div>   
                       
                  </div>
                </div>
              </div><!--tab-pane-->

              <div class="tab-pane fade active show" id="followers" role="tabpanel" aria-labelledby="followers-tab">
                <div class="agent-det-tab-pro">
                   <div class="container-fluid p-0"> 
                   <div class="row no-gutters">
                      <div class="expert-review">
                        @foreach($getFollowUnfollowDetails as $result)
                          @php
                              //get user details
                              $getUserInfo = DB::table('users')->where('id',$result->user_id)->get();
                              $img = $getUserInfo[0]->profile_pic;
                              $final_img = str_replace('/home/devmetrx/public_html/lineon/',$_SERVER['APP_URL'],$img);
                          @endphp
                        <div class="review-col">
                          <div class="row">
                          <div class="col-2 p-0"><div class="review-star"><img src="{{$final_img}}" alt="" data-pagespeed-url-hash="1588999250" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div></div>
                          <div class="col-10 pl-0">
                            <div class="review-namedate"><strong>{{$getUserInfo[0]->name}}</strong></div>
                            <p></p>  
                          </div>
                          </div>
                        </div>
                        @endforeach
                      </div>      
                  </div>
                  </div>
                </div>
              </div><!--tab-pane-->
            </div>  
          
        </div>
          
        <div class="agent-detail-reviewlist">
          <h3 class="pro-mid-title">User Reviews</h3>
          <div class="expert-review">
            
            @foreach($getAgentReviews as $result)
            <div class="review-col">
              <div class="row">
              <div class="col-2 p-0"><div class="review-star"><img src="images/reiview-user.jpg" alt="" data-pagespeed-url-hash="1588999250" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div></div>
              <div class="col-10 pl-0">
                <div class="review-namedate"><strong>{{$result->name}}</strong> | {{$result->created_on}}</div>
                <p>{{$result->description}}</p>  
              </div>
              </div>
            </div>
            @endforeach
      
          </div>      
        </div>  
     
        <div class="agent-dtreviewform">
          <h3 class="pro-mid-title">Write A Review</h3>  
          <div class="review-form">
                @if(!empty($message))
                  <div class="alert alert-success"> {{ $message }}</div>
                @endif
                @if(!empty($error))
                  <div class="alert alert-danger"> {{ $error }}</div>
                @endif
            <form class="common-form" id="updateForm" method="post" action="{{ route('savereview') }}">
            @csrf
            <div class="row">
                    <div class="col-12 mb-3">
                        <label for="comment" class="form-label">Your Review</label>
                        <textarea class="form-control" name="comment" id="comment" rows="5" required=""></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="first" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="first" name="full_name" required="">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" required="">
                    </div>

                    <div class="col-auto mt-4">
                         <input type="hidden" name="agent_id" value="{{$id}}">
                         @php
                            $isUserLoggedIn = Session('isUserLoggedIn');
                            if (!empty($isUserLoggedIn)) {
                         @endphp
                        <button class="common-btn" type="submit" name="btnReviewSubmit">Submit</button>
                        @php
                          }else{
                            echo "Please login to submit review";
                          }
                        @endphp
                    </div>
              </div>
            </form>
            </div>      
         </div>  
          
    </div>  
    
    <div class="col-lg-4 custom-right">
    
        <div class="proprequest-col">
      <h3 class="pro-mid-title">Ask Me</h3>
      
      <div class="proprequest-form">
      <form class="query-form" name="cform" method="post">
         
         <div class="row">
         
        <div class="col-sm-12">
          <div class="form-group">
          <input type="text" class="form-control" name="" id="" placeholder="Enter Name" required="">
          </div>
        </div>   
         
        <div class="col-sm-12">  
         <div class="form-group">
        <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" required="">
        </div>
        </div>  
         
        <div class="col-sm-12">  
        <div class="form-group">
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone No." required="">
        </div>
        </div>   
       
        <div class="col-sm-12">  
        <div class="form-group">
        <textarea class="form-control" id="message" placeholder="Your Message" rows="4"></textarea>
        </div>
        </div>  
        
        <div class="col-sm-12 mt-1">     
         <div class="form-group mb-0">
        <button type="submit" class="common-btn">Submit</button>
        </div>
        </div>
           
      </div>

        </form> 
      
    </div>  
        
        
      </div>
          
        <div class="agentdt-recentcol">
      <h3 class="pro-mid-title">Recent Property</h3>
      
      <div class="agentdt-recent-right">
            
             <div class="agentdt-recent-right-col"><a href="#">
               <div class="agentdt-recent-right-pic"><img src="images/listing-1.jpg" alt="" data-pagespeed-url-hash="274459189" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>   
                <div class="agentdt-recent-right-txt">  
                 <h5>Nirala Appartment</h5>
                 <h4><span>$3200</span> ( Monthly )</h4>
                 <p>6500 Sqft</p>    
                </div> 
               </a>
             </div>
                
             <div class="agentdt-recent-right-col"><a href="#">
               <div class="agentdt-recent-right-pic"><img src="images/listing-2.jpg" alt="" data-pagespeed-url-hash="568959110" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>   
                <div class="agentdt-recent-right-txt">  
                 <h5>Nirala Appartment</h5>
                 <h4><span>$3200</span> ( Monthly )</h4>
                 <p>6500 Sqft</p>    
                </div> 
               </a>
             </div>
                
             <div class="agentdt-recent-right-col"><a href="#">
               <div class="agentdt-recent-right-pic"><img src="images/listing-3.jpg" alt="" data-pagespeed-url-hash="863459031" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>   
                <div class="agentdt-recent-right-txt">  
                 <h5>Nirala Appartment</h5>
                 <h4><span>$3200</span> ( Monthly )</h4>
                 <p>6500 Sqft</p>    
                </div> 
               </a>
             </div>
                
             <div class="agentdt-recent-right-col"><a href="#">
               <div class="agentdt-recent-right-pic"><img src="images/listing-4.jpg" alt="" data-pagespeed-url-hash="1157958952" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>   
                <div class="agentdt-recent-right-txt">  
                 <h5>Nirala Appartment</h5>
                 <h4><span>$3200</span> ( Monthly )</h4>
                 <p>6500 Sqft</p>    
                </div> 
               </a>
             </div>    


            </div>  
        
        
      </div>  
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> 

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
    function follow_unfollow(condition,agent_id){
      var form_data = new FormData();

      form_data.append("condition", condition);
      form_data.append("agent_id", agent_id);
      form_data.append("_token", "{{ csrf_token() }}");
   
      $.ajax({
          url:"{{ route('followunfollow') }}",
          method:"POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,  
          success:function(data)
          {
            if(condition == 1){
              var message = "You started following the agent";
            }else{
              var message = "You have unfollowed the agent";
            }

            $.confirm({
              title: 'Confirm!',
              content: message,
              buttons: {
                  somethingElse: {
                      text: 'OK',
                      btnClass: 'btn-blue',
                      keys: ['enter', 'shift'],
                      action: function(){
                          window.location.reload();
                      }
                  }
              }
          });   
          }
       });
    }
  </script>
  
</body>
</html>