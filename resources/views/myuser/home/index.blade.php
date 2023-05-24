@extends('myuser.layouts.view')

@section('title', 'Home')

@section('content')

<div class="home-howwork">

 <div class="container">

   <div class="title-col"><h3 class="title">See How Lineon Can Help</h3></div>  

   
    @extends('myuser.header_footer.language')

    <div class="inner-home-howwork">

      <div class="row">

        <div class="col-md-3">

          <div class="home-howwork-col">

            <div class="home-howwork-ico"><img src="{{ asset('images/home-ico-1.jpg') }}" alt=""></div>  

            <div class="home-howwork-text">

                <h3><a href="buy-rent-property-list">Buy a Home</a></h3>

                <p>Find listed properties for sale in one click around Haiti and Dominican Republic. </p></div>

          </div>  

        </div>

          

        <div class="col-md-3">

          <div class="home-howwork-col">

            <div class="home-howwork-ico"><img src="{{ asset('images/home-ico-2.jpg') }}" alt=""></div>  

            <div class="home-howwork-text">

                <h3><a href="buy-rent-property-list">Rent a Home</a></h3>

                <p>A lot of listed properties for rent in different town and cities in Haiti and Dominican Republic. </p></div>

          </div>  

        </div>


        <div class="col-md-3">

          <div class="home-howwork-col">

            <div class="home-howwork-ico"><a href="sale-property-list"><img src="{{ asset('images/home-ico-4.jpg') }}" alt=""></a></div>  

            <div class="home-howwork-text">

                <h3><a href="sale-property-list">Sale a Property</a></h3>

                <p><a href="sale-property-list">Click here to list all kind of property for sale. Be your own real estate agent. </a></p></div>

          </div>  

        </div>

          

        <div class="col-md-3">

          <div class="home-howwork-col">

            <div class="home-howwork-ico"><a href="user-becomeanagent"><img src="{{ asset('images/home-ico-3.jpg') }}" alt=""></a></div>  

            <div class="home-howwork-text">

                <h3><a href="user-becomeanagent">Experience Agent</a></h3>

                <p><a href="user-becomeanagent">Register to become a professional real estate agent or broker. You get to be your own boss and enjoy the satisfaction of helping buyers and sellers navigate through one of life’s major milestones.</a></p></div>

          </div>  

        </div>  

        

      </div>  

    </div>    

    

 </div>       

</div> 

    

<div class="featured-pro-sec">

 <div class="title-col"><h3 class="title">Featured Properties</h3></div>    

    

 <div class="inner-featured-pro">

   <div class="container">

    <div class="row">
    	@foreach($propertyDetailsFeatured as $detail) 
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
			     	@php
			     		if(!empty($final_image)){
			     	@endphp
				   <div class="pro-listpic"><img src="{{ asset($final_image) }}" class="img-responsive" alt=""></div>
				   @php
				    }else{}
				   @endphp
					 <div class="pro-list-text">
                    <h3 class="proper-price">${{$detail->price}}</h3>    
                    <h4 class="proper-title">{{$detail->property_title}}</h4>    
					 <p class="proper-name">
					 	 <i class="las la-map-marker"></i> 
             @php
              //get city name
              $city_name_featured = DB::table('city_master')->where('id','=',$detail->city)->get();

              //get state name
              $state_name_featured = DB::table('state_master')->where('id','=',$detail->state)->get();

              $address_featured = rtrim($detail->address, ',');
             @endphp
             {{$address_featured}},
             {{$city_name_featured[0]->city_name}},
             {{$state_name_featured[0]->state_name}} - {{$detail->zipcode}}</p>
					   <div class="pro-area">
						 <div class="pro-area-col"><i class="las la-shower"></i> <strong>{{$detail->bath}}</strong> Baths</div>
						 <div class="pro-area-col"><i class="las la-bed"></i> <strong>{{$detail->rooms}}</strong> Beds</div>
						 <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>{{$detail->area}}</strong> Acres</div>  
					  </div>
					 </div>
				   </a>
           <div class="whislist-icon"class="update_wishlist"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
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

    

<div class="neighborhoods-sec">

 <div class="title-col"><h3 class="title">Explore Neighborhoods</h3></div> 

   

 <div class="inner-neighborhoods">

   <div class="container">

     <div class="row no-gutters">

       <div class="col-md-3">

          <div class="neighborhoods-col1"><a href="{{url('search_city_property/199')}}"><img src="{{ asset('images/neighborhoods-1.jpeg') }}" alt=""><span>Cap-Haitien, Nord</span></a></div>

       </div>  

       

       <div class="col-md-6">

          <div class="row no-gutters">

            <div class="col-sm-12">

               <div class="row no-gutters"> 

              <div class="col-sm-6">

                <div class="neighborhoods-col1"><a href="{{url('search_city_property/144')}}"><img src="{{ asset('images/neighborhoods-2.jpeg') }}" alt=""><span>Petion-Ville, Ouest</span></a></div>

              </div>

                

              <div class="col-sm-6">

                <div class="neighborhoods-col1"><a href="{{url('search_city_property/110')}}"><img src="{{ asset('images/neighborhoods-3.jpeg') }}" alt=""><span>Jacmel, Sud</span></a></div>

              </div>    

              </div>  

            </div>

              

            <div class="col-sm-12">

               <div class="row no-gutters"> 

              <div class="col-sm-6">

                <div class="neighborhoods-col1"><a href="{{url('search_city_property/96')}}"><img src="{{ asset('images/neighborhoods-4.jpeg') }}" alt=""><span>Fort-Liberté, Nord-Est</span></a></div>

              </div>

                

              <div class="col-sm-6">

                <div class="neighborhoods-col1"><a href="{{url('search_city_property/2')}}"><img src="{{ asset('images/neighborhoods-5.jpeg') }}" alt=""><span>Santiago de Los Caballeros</span></a></div>

              </div>    

              </div>  

            </div>  

           

          </div>

       </div>     

       

       <div class="col-md-3">

          <div class="neighborhoods-col1"><a href="{{url('search_city_property/2')}}"><img src="{{ asset('images/neighborhoods-6.jpeg') }}" alt=""><span>Santo-Domingo</span></a></div>

       </div>     

         

     </div>

     

   </div>    

 </div>        

</div>

    

<div class="aboutus-sec mt-8">

		<div class="container-fluid">

			<div class="row align-self-stretch align-items-center">

				

				<div class="col-lg-6 p-0">

					<div class="about-service"><img src="{{ asset('images/home-living-banner.jpg') }}" class="img-responsive" alt=""></div>

				</div>

				

				<div class="col-lg-6 p-0">

				  <div class="about-txt">			

                    <h4 class="title">Living Where You Love Means Loving Your Life</h4>



                    <p>
With LINEON Group, the place where you want to live is next to you. With one click, you will find several propositions in interesting neighborhoods in Haiti and Dominican Republic.  
</p>	  

					  

                    <div class="common-box"><a href="#" class="black-common-btn">Explore Properties</a></div>  

                      

			       </div>

				</div>

			</div>

		</div>

	</div>    

       

<div class="featured-pro-sec">

 <div class="title-col"><h3 class="title">Newly Listed Property</h3></div>    

    

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
			     	@php
			     		if(!empty($final_image)){
			     	@endphp
				   <div class="pro-listpic"><img src="{{ asset($final_image) }}" class="img-responsive" alt=""></div>
				   @php
				    }else{}
				   @endphp
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
           <div class="whislist-icon"class="update_wishlist"><i onclick="myFunction(this)" class="lar la-heart"></i></div>   
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

    

<div class="home-blogsec">

 <div class="container">

    <div class="title-col"><h3 class="title">Latest Property News</h3></div>

    

    <div class="inner-home-blogsec">

      <div class="row">

        <div class="col-md-4">

         <div class="left-blogcol">

           <h4>Interesting Articles Updated Daily</h4>    

           <ul>

             <li><a href="#">Opening a new store in NYC</a></li>

             <li><a href="#">5 Famous Progressive Web Apps</a></li>

             <li><a href="#">How to Create an Effective Elevator Pitch</a></li>

             <li><a href="#">Top Strategic Technology Trends for 2022</a></li>

             <li><a href="#">The Quest for Better Web Accessibility</a></li>

             <li><a href="#">Create an Effective Elevator Pitch</a></li>

             <li><a href="#">Strategic Technology Trends</a></li>  

           </ul> 

         </div>   

        </div>

        

        <div class="col-md-8">

          <div class="row">

	

             <div class="col-lg-6">

              <div class="blog-col">

                <a href="#">

                  <div class="blog-pic"><img src="{{ asset('images/blog-1.jpg') }}" alt=""></div>

                  <div class="blog-content">

                     <p class="blog-date">25 April 2023</p> 

                      <h3 class="bodo-title">Best All-Inclusive Resorts in the Dominican Republic for a Relaxing Getaway</h3>

                      <p>The Dominican Republic has long been a destination for all-inclusive resorts. Travelers seeking budget-friendly accommodations, secluded luxury, and energetic parties can easily find their fair share of hotel options in this Caribbean country.</p>

                      <div class="read-link">Read More</div>

                  </div>

                </a>

            </div>	

             </div>	



             <div class="col-lg-6">

              <div class="blog-col">

                <a href="#">

                  <div class="blog-pic"><img src="{{ asset('images/blog-2.jpg') }}" alt=""></div>

                  <div class="blog-content">

                      <p class="blog-date">25 April 2023</p>

                      <h3 class="bodo-title">Real estate experts say that the time to invest is now/</h3>

                      <p>Santo Domingo, DR. Despite the uncertainty created by the post-pandemic stage with its inflationary wave and the recessionary trend of the economy, the real estate sector struggles to maintain its dynamism by creating new proposals for investors of any income level.</p>

                      <div class="read-link">Read More</div>

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

<div class="home-blogsec">

 <div class="container">

    <div class="title-col"><h3 class="title">Announcements</h3></div>

    

    <div class="inner-home-blogsec">

      <div class="row">

        <div class="col-md-12">

          <div class="row">
          @foreach($AnnDetails as $detail) 
               @php
                 $final_image = str_replace("/home/devmetrx/public_html/lineon/public/","",$detail->image);
               @endphp   
             <div class="col-lg-4">
             

              <div class="blog-col">

                <a href="#">

                  <div class="blog-pic"><img src="{{ asset($final_image) }}" class="img-responsive" alt=""></div>

                  <div class="blog-content">
                    
                    
                     <?php
                     $timestamp = time();
                     
                     ?>
                      <p class="blog-date"><?php echo(date("F d, Y", $timestamp));?></p>  

                      <!-- <h3 class="bodo-title">Dummy Title is Coming.</h3> -->

                      <p>{{ $detail->description}}</p>

                  </div>

                </a>

            </div>	

             </div>	
              @endforeach	

             </div>			

            </div>  

        </div>  

      </div>

    </div> 
 </div>       

</div> 

<div class="home-blogsec">

 <div class="container">

    <div class="title-col"><h3 class="title">Testimonials</h3></div>
  
    <div class="inner-home-blogsec">

      <div class="row">

        <!-- <div class="col-md-8"> -->

          <div class="row">

          	 @foreach($aLists as $aResult)
             <div class="col-lg-4">

              <div class="blog-col">

                <a href="#">

                  <div class="blog-pic"><img src="{{ asset('images/blog-1.jpg') }}" alt=""></div>

                  <div class="blog-content">

                      <h3 class="bodo-title">{{$aResult->title}}</h3>

                      <p>{{$aResult->description}}</p>

                  </div>

                </a>

             </div>	

             </div>
             @endforeach

            <!-- </div>   -->

        </div>  

      </div>

    </div> 
      
 </div>       

</div>  

<!-- <div class="featured-pro-sec">

 <div class="title-col"><h3 class="title">Latest offers</h3></div>    

    

 <div class="inner-featured-pro">

   <div class="container">

     <div class="row">

         
     		@foreach($addlistingDetails as $detail) 
               @php
                 $getPropImageById = DB::table('create_add_list_images')
                                ->where('list_id',$detail->id)
                                ->limit(1)
                                ->first();

                 $final_image = str_replace("/home/devmetrx/public_html/lineon/public/","",$getPropImageById->url);
               @endphp     
        <div class="col-lg-3 col-md-4 col-sm-6">
			   <div class="pro-list-col">
			     <a href="{{ url('view-user-addlisting/'.$detail->id) }}">
				   <div class="pro-listpic"><img src="{{ asset($final_image) }}" class="img-responsive" alt=""></div>

					 <div class="pro-list-text">
                    <h3 class="proper-price">${{$detail->price}}</h3>    
                    <h4 class="proper-title">{{$detail->property_title}}</h4>    
					 <p class="proper-name">
					 	 <i class="las la-map-marker"></i> {{$detail->address}},{{$detail->city}},{{$detail->state}} - {{$detail->zipcode}}</p>
					   <div class="pro-area">
						 <div class="pro-area-col"><i class="las la-shower"></i> <strong>{{$detail->bath}}</strong> Baths</div>
						 <div class="pro-area-col"><i class="las la-bed"></i> <strong>{{$detail->rooms}}</strong> Beds</div>
						 <div class="pro-area-col"><i class="las la-arrows-alt"></i> <strong>{{$detail->area}}</strong> Acres</div>  
					  </div>
					 </div>
				   </a>
           <div class="whislist-icon "><i class="lar la-heart" onclick="select_deselect_wishlist({{$detail->id}});remove_add_From_WishList({{$detail->id}});"></i></div>   

			   </div>
			  </div>
			  @endforeach		  

                    <script>
              function select_deselect_wishlist(id){
                var form_data = new FormData();

            form_data.append("id", id);
            form_data.append("_token", "{{ csrf_token() }}");
                $.ajax({
                                    url:"{{ route('AddFromWishList') }}",
                                    method:"POST",
                                    data: form_data ,
                                    contentType: false,
                                    cache: false,
                                    processData: false,

                                    success:function(data)
                                    {  
                                    }
                                });
                
              }
            </script>

		  </div>
    

   </div>    

 </div>   

</div>  -->
    

<div class="home-contactbar">

 <div class="container">

    <div class="row align-items-center">

     

        <div class="col-md-8">

          <div class="right-homecontact">

            <h4>For more information about our services, <strong>get in touch</strong> with our expert consultants</h4>

            <p>Get in touch with our support team for fast resolution of your query.</p>

          </div>

        </div>

        

        <div class="col-md-4">

          <div class="left-homecontact">

            <div class="homecont-icon"><i class="las la-phone"></i></div>  

            <p>CALL FOR HELP NOW!</p>

            <h3><a href="tel:+509 40 79 15 15">+509 40 79 15 15</a></h3>

            <a href="{{url('contact-us')}}" class="common-btn">Contact Us</a>  

          </div>

        </div>

     

    </div>

 </div>       

</div>    

    

    

<div class="home-appbar">

 <div class="container">

    <div class="row align-items-center">

     

        <div class="col-md-8">

          <div class="left-appmobile">

            <h4>Find A New Home On The Go</h4>

            <h5>Download our app</h5>  

            <p>LINEON Group is a tech real estate marketplace that connect property owners, real estate agencies, brokers, buyers, Notaries, Architects, Engineers and tenant in all the 145 cities of Haiti and in the Dominican Republic Only with internet connection, we make real estate transactions possible across the Hispaniola Island from anywhere in the world.</p>

            <div class="app-btns"><a href="#"><img src="{{ asset('images/ios-btn.png') }}" alt=""></a> <a href="#" class="ml-2"><img src="{{ asset('images/playstore-btn.png') }}" alt=""></a></div>  

              

          </div>

        </div>

        

        <div class="col-md-4">

          <div class="right-appmobile">

            <div class="app-mobile-pic"><img src="{{ asset('images/app-mobile.png') }}" alt=""></div>  

          </div>

        </div>

     

    </div>

 </div>       

</div>   

@endsection