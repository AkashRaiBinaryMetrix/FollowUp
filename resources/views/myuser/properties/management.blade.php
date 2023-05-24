@extends('myuser.layouts.view')

@section('title', 'Home')

@section('content')

<div class="property-management-page">
    
 <div class="property-manage-banner">
    <div class="container">
    <div class="row align-items-center">
        
    <div class="col-md-6">
      <div class="property-manage-text">
        <h3 class="title">Property Management Services</h3>  
        <p>Manage your property records with Lineon, We are one of the best property management companies that handle everything for you.</p>
        <ul>
            <li>24/7 dedicated property manager</li>  
            <li>On-time rental payment</li>  
            <li>Financial records in one click</li>
            <li>Latest rent collection updates</li>  
            <li>All-time referral rent receipt access</li>
          </ul>  
          
      </div>    
    </div>
        
    <div class="col-md-6 text-md-right">
      <div class="property-manage-vector"><img src="images/property-management-vector.png" alt="" data-pagespeed-url-hash="2335450" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
    </div>
        
  </div>
    </div>
    
 </div> 
    
    
<div class="property-manage-form">
  <div class="container">
    <div class="inner-property-manage-form">
      <h3 class="content-title-sub">Fill your property details</h3>  
      
      <form class="common-form" id="" method="get" action="#">
            <fieldset>
         <div class="row"> 

            <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>First Name</label>
                <input class="form-control" name="name" value="" type="text" required="">
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Last Name</label>
                <input class="form-control" name="name" value="" type="text">
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Address</label>
                <input class="form-control" name="name" value="" type="text">
              </div>
            </div>
             
            <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>City</label>
                <input class="form-control" name="name" value="" type="text" required="">
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>State</label>
                <input class="form-control" name="name" value="" type="text">
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Zipcode</label>
                <input class="form-control" name="name" value="" type="text">
              </div>
            </div> 

            <div class="col-12">
             
            <div class="form-group">	
              <label class="mb-3">Type of property</label>

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="typepro1" name="typepro1" checked="">
              <label class="custom-control-label" for="typepro1">Villas</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="typepro2" name="typepro1">
              <label class="custom-control-label" for="typepro2">Apartment</label>
            </div>	

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="typepro3" name="typepro1">
              <label class="custom-control-label" for="typepro3">Commercial Area</label>
            </div>	

            </div>
                
             </div>
             
            
             
             <div class="col-12">
               <div class="form-group">	
                <label class="mb-3">Amenities</label>

                  <div class="five-checkbox-col">

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1" name="example1">
                      <label class="custom-control-label" for="customCheck1">Maintenance Staff</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck2" name="example2">
                      <label class="custom-control-label" for="customCheck2">Club House</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck3" name="example3">
                      <label class="custom-control-label" for="customCheck3">Children's play area</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck4" name="example4">
                      <label class="custom-control-label" for="customCheck4">Car Parking</label>
                    </div>  

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck5" name="example5">
                      <label class="custom-control-label" for="customCheck5">Lift(s)</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck6" name="example6">
                      <label class="custom-control-label" for="customCheck6">Landscaped Gardens</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck7" name="example7">
                      <label class="custom-control-label" for="customCheck7">24 X 7 Security</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck8" name="example8">
                      <label class="custom-control-label" for="customCheck8">Swimming Pool</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck9" name="example9">
                      <label class="custom-control-label" for="customCheck9">Fire Security</label>
                    </div>  

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck10" name="example10">
                      <label class="custom-control-label" for="customCheck10">Full Power Backup</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck11" name="example11">
                      <label class="custom-control-label" for="customCheck11">Sports Facility</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck12" name="example12">
                      <label class="custom-control-label" for="customCheck12">Air Conditioning</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck13" name="example13">
                      <label class="custom-control-label" for="customCheck13">Gymnasium</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck14" name="example14">
                      <label class="custom-control-label" for="customCheck14">Jogging Track</label>
                    </div>  

                  </div>
	
                </div> 
             </div>
             
             <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Phone No.</label>
                <input class="form-control" name="name" value="" type="text" required="">
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Email ID</label>
                <input class="form-control" name="name" value="" type="text">
              </div>
            </div>

            </div>

            <div class="mt-3 mb-2">
              <button type="reset" class="common-btn blank-common-btn">Cancel</button>    
              <button type="submit" class="common-btn">Submit</button>
            </div>	

            </fieldset>
          </form>    
      
    </div> 
    
  </div>       
</div>    
    
    
</div>

@endsection