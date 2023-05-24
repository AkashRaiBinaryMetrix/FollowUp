@include('myuser/header_footer/header')

<form class="common-form" id="updateForm" method="post" action="{{ route('update.becomeagentprocess') }}" enctype="multipart/form-data">
@csrf
   
   @php
    if(!empty($profileDetails)){
   @endphp
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
                <div class="useradmin-title">Become an Agent</div>  
                 
                <div class="admin-whybecome-text">
                 <h4>Why Become a Real Estate Agent? </h4>   
                 <p>Working as a real estate agent offers a great deal of variety. From working with different clients and visiting many homes, you won’t be doing the same thing every day. You get to be your own boss and enjoy the satisfaction of helping buyers and sellers navigate through one of life’s major milestones.</p>  
                </div>   
                   @if(!empty($message))
                    <div class="alert alert-success"> {{ $message }}</div>
                   @endif
                   @if(!empty($error))
                    <div class="alert alert-danger"> {{ $error }}</div>
                   @endif
                <div class="row"> 
      
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>You are</label>
                    <select class="form-control" name="comp" id="comp" required>
                      <option value="Company" {{ ( $profileDetails->comp == "Company") ? 'selected' : '' }}>Company</option>
                      <option value="Individual" {{ ( $profileDetails->comp == "Individual") ? 'selected' : '' }}>Individual</option>
                    </select>
                  </div>
                </div>    
                    
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>Company Name</label>
                    <input class="form-control" name="company_name" id="company_name" value="{{$profileDetails->company_name}}" placeholder="" type="text" required="">
                  </div>
                </div>

                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>License No.</label>
                    <input class="form-control" name="license_no" name="license_no" value="{{$profileDetails->license_no}}" placeholder="" type="text" required="">
                  </div>
                </div>

                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>Services</label>
                    <input class="form-control"  name="services" value="{{$profileDetails->services}}" placeholder="" type="text" required="">
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label>Attachment</label>
                    <div class="custom-file">
                        <input type="file" name="filenames[]" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <br/>
                    @php
                     if(!empty($profileDetails->file)){
                    @endphp
                      <a href="{{url('/public/agentfiles/'.$profileDetails->file)}}" target="_blank" id="click_here">Click to open!</a>
                    @php  
                     }
                    @endphp
                  </div>
                </div>
                </div>   
                 
               </div>     
               
               <div class="mt-3 mb-2">
                  <input type="hidden" name="agent_id" value="{{$profileDetails->id}}"/>
                  <button type="submit" class="common-btn">Update</button>
                </div>     
                 
             </div>  
           </div>   
             
        </div>     
     </div>       
    </div>
   @php
    }else{
   @endphp
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
                <div class="useradmin-title">Become an Agent</div>  
                 
                <div class="admin-whybecome-text">
                 <h4>Why Become a Real Estate Agent? </h4>   
                 <p>Working as a real estate agent offers a great deal of variety. From working with different clients and visiting many homes, you won’t be doing the same thing every day. You get to be your own boss and enjoy the satisfaction of helping buyers and sellers navigate through one of life’s major milestones.</p>  
                </div>   
                   @if(!empty($message))
                    <div class="alert alert-success"> {{ $message }}</div>
                   @endif
                   @if(!empty($error))
                    <div class="alert alert-danger"> {{ $error }}</div>
                   @endif
                <div class="row"> 
      
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>You are</label>
                    <select class="form-control" name="comp" id="comp" required>
                      <option value="Company">Company</option>
                      <option value="Individual">Individual</option>
                    </select>
                  </div>
                </div>    
                    
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>Company Name</label>
                    <input class="form-control" name="company_name" id="company_name" value="" placeholder="" type="text" required="">
                  </div>
                </div>

                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>License No.</label>
                    <input class="form-control" name="license_no" name="license_no" value="" placeholder="" type="text" required="">
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label>Attachment</label>
                    <div class="custom-file">
                        <input type="file" name="filenames[]" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <br/>
                  </div>
                </div>
                </div>   
               </div>     
               <div class="mt-3 mb-2">
                  <button type="submit" class="common-btn">Submit</button>
                </div>              
             </div>  
           </div>   
        </div>     
     </div>       
    </div>
   @php
      }
   @endphp

</form>

@include('myuser/header_footer/footer')