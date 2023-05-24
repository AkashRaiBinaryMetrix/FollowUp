@include('myuser/header_footer/header')

<form class="common-form" id="updateForm" method="post" action="{{ route('update.process') }}">
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
            <div class="useradmin-title">My Profile</div>     
                @if(!empty($message))
  <div class="alert alert-success"> {{ $message }}</div>
@endif
            <div class="row"> 
             
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Your Name</label>
                <input class="form-control" name="full_name" id="full_name" value="{{$profileDetails->name}}" placeholder="" type="text" required="">
              </div>
            </div>    
                
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Your Title</label>
                <input class="form-control" name="title" id="title" value="{{$profileDetails->title}}" placeholder="" type="text" required="">
              </div>
            </div>
                
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Position</label>
                <input class="form-control" name="position" id="position" value="{{$profileDetails->position}}" placeholder="" type="text" required="">
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
                <label>Phone Number</label>
                <input class="form-control" name="phone_number" id="phone_number" value="{{$profileDetails->mobile}}" placeholder="" type="text" required="">
              </div>
            </div>
                
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Email Address</label>
                <input class="form-control" name="email" id="email" value="{{$profileDetails->email}}" placeholder="" type="text" required="">
              </div>
            </div>
                
            <div class="col-12">
              <div class="form-group">
                <label>Address</label>
                <input class="form-control" name="address" id="address" value="{{$profileDetails->address}}" placeholder="" type="text" required="">
              </div>
            </div>

             <div class="col-12">
              <div class="form-group">
                <label>Preferred Language</label>
                <select name="preflang" id="preflang" class="form-control">
                  <option value="English">English</option>
                  <option value="Haitian Creole">Haitian Creole</option>
                  <opion value="Spanish">Spanish</opion>
                </select>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Country</label>
                <input class="form-control" name="country" id="country" value="{{$profileDetails->country}}" placeholder="" type="text">
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>State</label>
                <input class="form-control" name="state" id="state" value="{{$profileDetails->state}}" placeholder="" type="text">
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>City</label>
                <input class="form-control" name="city" id="city" value="{{$profileDetails->city}}" placeholder="" type="text">
              </div>
            </div>

           
             
            <div class="col-12">
              <div class="form-group">
                <label>Zipcode</label>
                <input class="form-control" name="zipcode" id="zipcode" value="{{$profileDetails->zipcode}}" placeholder="" type="number">
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Gender</label>
                <select name="gender" id="gender" class="form-control">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Your Bio</label>
                <textarea class="form-control" name="bio" id="bio" id="message" placeholder="" rows="4">{{$profileDetails->bio}}</textarea>
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