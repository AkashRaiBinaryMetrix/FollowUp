@include('myuser/header_footer/header')
<style>
  .error{color: red !important;}
</style>
<form class="common-form" id="signupForm" method="post" action="{{ route('user.listnewaddprocess') }}" enctype="multipart/form-data">
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
            <div class="useradmin-title">Saved Add</div>  
             
            <table class="manage-table responsive-table">
              <tbody>
              
              @foreach($propertyDetails as $detail) 
               @php
               
                 //get property details
                 $getPropdetail = DB::table('create_add')
                                ->where('id',$detail->add_id)
                                ->get();

                 $getPropImageById = DB::table('create_add_list_images')
                                ->where('list_id',$detail->add_id)
                                ->limit(1)
                                ->first();

                 $final_image = str_replace("/home/devmetrx/public_html/lineon/public/","",$getPropImageById->url);
               @endphp     
              <tr>
                <td class="utf-title-container"><img src="{{ asset($final_image) }}" alt="" data-pagespeed-url-hash="274459189" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                  <div class="utf-title2">
                    <h4><a href="#">{{$getPropdetail[0]->property_title}}</a></h4>
                    <span>{{$getPropdetail[0]->address}},{{$getPropdetail[0]->city}},{{$getPropdetail[0]->state}} - {{$getPropdetail[0]->zipcode}}</span> <span class="table-property-price">${{$getPropdetail[0]->price}}/month</span> 
                  </div>
                </td>
                <td class="utf-expire-date">
                  @php
                    $originalDate = $getPropdetail[0]->created_on;
                    $newDate = date("d F, Y", strtotime($originalDate));
                  @endphp
                  {{$newDate}}
                </td>
                <td class="usermypro-action">
                    <a href="{{ url('view-user-addlisting/'.$detail->add_id) }}" class="view"><i class="las la-eye"></i></a>
                    <a href="#" class="delete" onclick="remove_add_From_WishList({{$detail->id}});"><i class="las la-trash-alt"></i></a>
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