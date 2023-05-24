@include('myuser/header_footer/header')
<style>
  .error{color: red !important;}
</style>
<form class="common-form" id="signupForm" method="post" action="{{ route('user.createanaddprocess') }}" enctype="multipart/form-data">
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
            <div class="useradmin-title">Add Listing</div>  
             
            <table class="manage-table responsive-table">
              <tbody>
              
              @foreach($propertyDetails as $detail) 
               @php
                 $getPropImageById = DB::table('create_add_list_images')
                                ->where('list_id',$detail->id)
                                ->limit(1)
                                ->first();

                 $final_image = str_replace("/home/devmetrx/public_html/lineon/public/","",$getPropImageById->url);
               @endphp     
              <tr>
                <td class="utf-title-container"><img src="{{ asset($final_image) }}" alt="" data-pagespeed-url-hash="274459189" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                  <div class="utf-title2">
                    <h4><a href="#">{{$detail->property_title}}</a></h4>
                    <span>{{$detail->address}},{{$detail->city}},{{$detail->state}} - {{$detail->zipcode}}</span> <span class="table-property-price">${{$detail->price}}/month</span> 
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
                    <a href="{{ url('view-user-addlisting/'.$detail->id) }}" class="view"><i class="las la-eye"></i></a>
                    <a href="{{ url('edit-user-addlisting/'.$detail->id) }}" class="edit"><i class="las la-edit"></i></a> 
                    <a href="#" class="delete" onclick="delete_addlisting({{$detail->id}});"><i class="las la-trash-alt"></i></a>
                </td>
              </tr>
              @endforeach
      
            </tbody>
               </table>   
             
           </div>     
           
           <div class="mt-3 mb-2">
              <a href="{{url('user-createanadd')}}">
                <button type="button" class="common-btn">Submit New Create Add</button>
              </a>
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