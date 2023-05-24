@include('myuser/header_footer/header')
<style>
  .error{color: red !important;}
</style>
<form class="common-form" id="signupForm" method="post" action="{{ route('user.listnewpropertyprocess') }}" enctype="multipart/form-data">
@csrf
   
<div class="useradmin-pages">
 <div class="container">
     <div class="row">
         
       <div class="col-md-3">
         <div class="useradmin-left">
           <aside>
             @include('myuser/header_footer/useradminpic')
             <div class="useradmin-listlink">
              @include('myuser/header_footer/leftmenu')
             </div>   
               
           </aside>  
         </div>  
       </div>

       <div class="col-md-9">
         <div class="useradmin-right">
             
           <div class="useramdin-form1 whitebox">
            <div class="useradmin-title">My Reviews</div>  
             
            <table class="manage-table responsive-table">
              <tbody>
              
              @foreach($getAgentReviews as $detail) 
               @php
                 $getPropImageById = DB::table('agent_profile')
                                ->where('id',$detail->agent_id)
                                ->get();

                 $userProfilePic =  DB::table('users')
                                ->where('id',$getPropImageById[0]->user_id)
                                ->get();              

                 $final_image = str_replace("/home/devmetrx/public_html/lineon/public/","",$userProfilePic[0]->profile_pic);
               @endphp     
              <tr>
                <td class="utf-title-container"><img src="{{ asset($final_image) }}" alt="" data-pagespeed-url-hash="274459189" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                  <div class="utf-title2">
                    <h4><a href="#">{{$detail->name}}</a></h4>
                    <span>{{$detail->email}}</span> 
                    <span class="table-property-price">{{$detail->description}}</span> 
                  </div>
                </td>
                <td class="utf-expire-date">
                  @php
                    $originalDate = $detail->created_on;
                    $newDate = date("d F, Y", strtotime($originalDate));
                  @endphp
                  {{$newDate}}
                </td>
                <td class="usermypro-action">
                    <a href="{{ url('view-agent-detail/'.$detail->agent_id) }}" class="view" target="_blank"><i class="las la-eye"></i></a>
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
</div> 

</form>

@include('myuser/header_footer/footer')
<script src="{{ asset('js/jquery.js') }}"></script>      
<script src="{{ asset('js/jquery.validate.js') }}"></script>