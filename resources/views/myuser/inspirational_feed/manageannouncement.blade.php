@include('myuser/header_footer/header')
<style>
  .error{color: red !important;}
</style>
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
            <div class="useradmin-title">Manage Announcements
              <button type="button" class="common-btn" data-toggle="modal" data-target="#myModal">Add New</button>
              <div class="container">
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">x</button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ url('addAnnouncement') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <label>Description</label>
                          <textarea type="text" class="form-control" id="" name="description" placeholder="Enter Description"></textarea>
                          <label>Image Upload</label>
                          <input type="file"  name="image[]">
                            <div class="gallery"></div>  
                          <button type="submit" class="common-btn">Submit</button>
                       </form>
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            <table class="manage-table responsive-table">
              <tbody>
              @foreach($agent_announcement as $detail)   
              <tr>
                <td class="utf-title-container">
                  <div class="utf-title2">
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
                    <a href="#" class="view"><i class="las la-edit"></i></a>
                </td>
                <td class="usermypro-action">
                    <a href="#" class="view" onclick="delete_announcement({{$detail->id}});"><i class="las la-trash"></i></a>
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