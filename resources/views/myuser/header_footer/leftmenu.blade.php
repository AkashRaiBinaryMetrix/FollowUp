 @php
 
 $path = $_SERVER['REQUEST_URI'];
 
 //echo $path;

 if(str_contains($path, '/lineon/user-dashboard') || str_contains($path, '/lineon/update-process')){
    $link_class_1 = "user-listlink-active";
 }else if(str_contains($path, '/lineon/user-becomeanagent') || str_contains($path, '/lineon/update-becomeagentprocess')){
    $link_class_2 = "user-listlink-active";
 }else if(str_contains($path, '/lineon/user-listnewproperty') || str_contains($path, '/lineon/update-listnewpropertyprocess')){
    $link_class_3 = "user-listlink-active";
 }else if(str_contains($path, '/lineon/user-myproperty') || str_contains($path, '/lineon/update-mypropertyprocess')){
    $link_class_4 = "user-listlink-active";
 }else if(str_contains($path, '/lineon/saved-myproperty')){
    $link_class_5 = "user-listlink-active";
 }else if(str_contains($path, '/lineon/messagelist') || str_contains($path, '/lineon/messagelist-process')){
    $link_class_6 = "user-listlink-active";
 }else if(str_contains($path, '/lineon/subscription') || str_contains($path, '/lineon/subscription-process')){
    $link_class_7 = "user-listlink-active";
 }else if(str_contains($path, '/lineon/changepassword') || str_contains($path, '/lineon/changepasswordprocess')){
    $link_class_8 = "user-listlink-active";
 }else if(str_contains($path, '/lineon/myreview') || str_contains($path, '/lineon/myreviewprocess')){
    $link_class_9 = "user-listlink-active";
 }else if(str_contains($path, '/lineon/manageannouncement') || str_contains($path, '/lineon/addAnnouncement')){
    $link_class_10 = "user-listlink-active";
 }else if(str_contains($path, '/lineon/make_payment')){
    $link_class_111 = "user-listlink-active";
 }

$isUserLoggedIn = Session('isUserLoggedIn');
$detail = DB::table('agent_profile')->where('user_id',$isUserLoggedIn->id)->get();
 
@endphp

<ul>

                <li class="{{ $link_class_111 ?? '' }}"><a href="{{url('make_payment')}}"><span class="useradmin-listlink-ico"><i class="las la-home"></i></span> Make Other Payments</a></li>

                <li class="{{ $link_class_3 ?? '' }}"><a href="{{url('user-listnewproperty')}}"><span class="useradmin-listlink-ico"><i class="las la-home"></i></span> List new property</a></li>

                <li class="{{ $link_class_4 ?? '' }}"><a href="{{url('user-myproperty')}}"><span class="useradmin-listlink-ico"><i class="las la-building"></i></span> My Property</a></li>
                
                <li class="{{ $link_class_5 ?? '' }}"><a href="{{url('saved-myproperty')}}"><span class="useradmin-listlink-ico"><i class="lar la-star"></i></span> Saved Property</a></li>
                
                <li class="{{ $link_class_2 ?? '' }}"><a href="{{url('user-becomeanagent')}}"><span class="useradmin-listlink-ico"><i class="las la-user-tie"></i></span> Become an Agent</a></li>
                
                <li class="{{ $link_class_6 ?? '' }}"><a href="{{url('messagelist')}}"><span class="useradmin-listlink-ico"><i class="las la-sms"></i></span> Messages</a></li>  

                <li class="{{ $link_class_11 ?? '' }}"><a href="{{url('user-createanadd')}}"><span class="useradmin-listlink-ico"><i class="las la-plus"></i></span> Create an add</a></li>

                <li class="{{ $link_class_12 ?? '' }}"><a href="{{url('user-addlisting')}}"><span class="useradmin-listlink-ico"><i class="las la-plus"></i></span> Add Listing</a></li>

                <li class="{{ $link_class_13 ?? '' }}"><a href="{{url('saved-add')}}"><span class="useradmin-listlink-ico"><i class="lar la-star"></i></span> Saved Add</a></li>
                
                <li class="{{ $link_class_7 ?? '' }}"><a href="{{url('subscription')}}"><span class="useradmin-listlink-ico"><i class="las la-dollar-sign"></i></span> My Subscription</a></li>

               <!--  <li class=""><a href="#"><span class="useradmin-listlink-ico"><i class="las la-sms"></i></span> Property Enquiries</a></li> -->
                
                <li class="{{ $link_class_1 ?? '' }}"><a href="{{url('user-dashboard')}}"><span class="useradmin-listlink-ico"><i class="las la-lock"></i></span> My Profile</a></li>

                <li class="{{ $link_class_8 ?? '' }}"><a href="{{url('changepassword')}}"><span class="useradmin-listlink-ico"><i class="las la-lock"></i></span> Change Password</a></li>

                <li class="{{ $link_class_9 ?? '' }}"><a href="{{url('myreview')}}"><span class="useradmin-listlink-ico"><i class="las la-lock"></i></span> My Reviews</a></li>

                <li class="{{ $link_class_10 ?? '' }}"><a href="{{url('manageannouncement')}}"><span class="useradmin-listlink-ico"><i class="las la-lock"></i></span> Announcements</a></li>
                
                <li><a href="{{url('user-logout')}}"><span class="useradmin-listlink-ico"><i class="las la-power-off"></i></span> Logout</a></li>
</ul>