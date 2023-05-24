@include('myuser/header_footer/header')

<form class="common-form" id="updateForm" method="post" action="{{ route('changepasswordprocess') }}">
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
            <div class="useradmin-title">Change Password</div>     
                @if(!empty($message))
                  <div class="alert alert-success"> {{ $message }}</div>
                @endif
                @if(!empty($error))
                  <div class="alert alert-danger"> {{ $error }}</div>
                @endif
            <div class="row"> 
             
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>New Password</label>
                <input class="form-control" name="new_password" id="new_password" placeholder="Enter new password" type="password" required="" autocomplete="off">
              </div>
            </div>    
                
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Confirm Password</label>
                <input class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter confirm password" type="password" required="" autocomplete="off">
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

 </form>

@include('myuser/header_footer/footer')