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
            <div class="useradmin-title">List New Property</div>  

               @if(!empty($message))
                <div class="alert alert-success"> {{ $message }}</div>
               @endif
               @if(!empty($error))
                <div class="alert alert-danger"> {{ $error }}</div>
               @endif
             
            <div class="row"> 

            <div class="col-12">
              <div class="form-group">
                <label>Property Title</label>
                <input placeholder="Enter Property Title" class="form-control" name="property_title" id="property_title" value="" type="text" autocomplete="off">
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Property For</label>
                <input class="" onclick="show_hide_rental('sell');" name="property_for" id="property_for" value="sell" type="radio"> Sell
                <input class="" onclick="show_hide_rental('rent');" name="property_for" id="property_for" value="rent" type="radio"> Rent
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" id="status">
                  <option>Select an Option</option>
                  <option value="0">Active</option>
                  <option value="1">In-Active</option>
                </select>
              </div>
            </div>
                
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Property Type</label>
                 <select class="form-control" name="ptype" id="ptype" onchange="set_textbox();">
                  <option>Select an Option</option>
                  <option value="Residential">Residential</option>
                  <option value="Commercial">Commercial</option>
                  <option value="Apartment">Apartment</option>
                  <option value="Villa">Villa</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>    

            <div class="col-12 col-sm-6" id="property_type_other_div" style="display:none;">
              <div class="form-group">
                <label>Property Type(Other)</label>
                <input type="text" class="form-control" name="property_type_other" id="property_type_other">
              </div>
            </div>    

             <div class="col-12 col-sm-4 col-md-4">
              <div class="form-group">
                <label>Price</label>
               <input placeholder="Enter Property Price" class="form-control" name="price" id="price" value="" type="text" maxlength="10" autocomplete="off" autocomplete="off">
              </div>
            </div>  
            <div class="col-12 col-sm-4 col-md-4" style="display: none;" id="time_period_div">
              <div class="form-group">
                <label>Payment Time Period</label>
                <select class="form-control" name="time_period" id="time_period">
                  <option>Select an Option</option>
                  <option value="Monthly">Monthly</option>
                  <option value="Quaterly">Quaterly</option>
                  <option value="Half-Yearly">Half-Yearly</option>
                  <option value="Yearly">Yearly</option>
                </select>
              </div>
            </div>  
            <div class="col-12 col-sm-4 col-md-4">
              <div class="form-group">
                <label>Currencies</label>
                <select class="form-control" name="currency" id="currency">
                  <option>Select an Option</option>
                  <option value="USD">USD</option>
                  <option value="HTG">HTG</option>
                  <option value="DOP">DOP</option>
                </select>
              </div>
            </div>   
             <div class="col-12 col-sm-4 col-md-4">
              <div class="form-group">
                <label>Area(In sq.ft.)</label>
                <input placeholder="Enter Prperty Covered Area(In sq.ft.)" class="form-control" name="area" id="area" value="" type="text" maxlength="10" autocomplete="off">
              </div>
            </div>   
                
            </div>   
             
           </div>
             
           <div class="useramdin-form1 whitebox">
            <div class="useradmin-title">Property Gallery</div>  
             <input type="file" multiple id="gallery-photo-add" name="upload[]">
<div class="gallery"></div>

             
            <!-- <div class="upload-file-right">
          
            <div class="file-loading">
              <input id="file-1" name="file" multiple type="file" accept="image/*" class="file" >
            

</div> 
             
            </div>   --> 
             
           </div>         
             
           <div class="useramdin-form1 whitebox">
            <div class="useradmin-title">Property Location</div>  
             
            <div class="row"> 

            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Address</label>
                <input class="form-control" name="address" id="address" value="" placeholder="Enter Address" type="text" maxlength="100" autocomplete="off">
              </div>
            </div>

            <div class="col-12 col-sm-6 ">
              <div class="form-group">
              <label>Country</label>
                  <select class="form-control" id="country-dropdown" name="country" class="Form-control" onchange="test(this.value)">
                    <option value="" id="Country">Select Country</option>
                    @foreach($country_data as $cresult)
                      <option value="{{$cresult->id}}">{{$cresult->country_name}}</option>
                      @endforeach
                    </option>
                  </select>
              </div>
            </div>

            <div class="col-12 col-sm-6" >
              <div class="form-group">
              <label>State</label>
                  <select class="form-control" id="state-dropdown" name="state" class="Form-control" onchange="city1(this.value)">
                    <option value="" id="State">Select State</option>
                  </select>
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>City</label>
                <select class="form-control" id="city-dropdown" name="city" class="Form-control">
                    <option value="" id="city">Select City</option>
                  </select>
              </div>
            </div>
                
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Zip-Code</label>
                <input class="form-control" name="zipcode" id="zipcode" value="" placeholder="Enter Zipcode" type="text" autocomplete="off">
              </div>
            </div>
                
            </div>   
             
           </div>
             
           <div class="useramdin-form1 whitebox">
            <div class="useradmin-title">Property Information</div>  
             
            <div class="row"> 

              <div class="col-12">
              <div class="form-group">
                <label>Is Featured</label>
                <select class="form-control" name="is_featured" id="is_featured" required>
                  <option>Select an Option</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Property Description</label>
                <textarea class="form-control" name="desc" id="desc" placeholder="" rows="4"></textarea>
              </div>
            </div>
                
             <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Building Age</label>
                <input class="form-control" name="buildage" id="buildage" value="" placeholder="Enter Building Age" type="text" maxlength="5" autocomplete="off">
              </div>
            </div>
                
           <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Bedrooms</label>
                <select class="form-control" name="rooms" id="rooms">
                  <option>Select an Option</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5+">5+</option>
                </select>
              </div>
            </div>     

             <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Bath Rooms</label>
                <select class="form-control" name="bath" id="bath">
                  <option>Select an Option</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5+">5+</option>
                </select>
              </div>
            </div> 
                
            <div class="col-12">
               <div class="form-group"> 
                <label class="mb-3">Amenities</label>

                  <div class="five-checkbox-col">

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1" name="ameni[]" value="Maintenance Staff">
                      <label class="custom-control-label" for="customCheck1">Maintenance Staff</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck2" name="ameni[]" value="Club House">
                      <label class="custom-control-label" for="customCheck2">Club House</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck3" name="ameni[]" value="Children's play area">
                      <label class="custom-control-label" for="customCheck3">Children's play area</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck4" name="ameni[]" value="Car Parking">
                      <label class="custom-control-label" for="customCheck4">Car Parking</label>
                    </div>  

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck5" name="ameni[]" value="Lift(s)">
                      <label class="custom-control-label" for="customCheck5">Lift(s)</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck6" name="ameni[]" value="Landscaped Gardens">
                      <label class="custom-control-label" for="customCheck6">Landscaped Gardens</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck7" name="ameni[]" value="24 X 7 Security">
                      <label class="custom-control-label" for="customCheck7">24 X 7 Security</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck8" name="ameni[]" value="Swimming Pool">
                      <label class="custom-control-label" for="customCheck8">Swimming Pool</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck9" name="ameni[]" value="Fire Security">
                      <label class="custom-control-label" for="customCheck9">Fire Security</label>
                    </div>  

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck10" name="ameni[]" value="Full Power Backup">
                      <label class="custom-control-label" for="customCheck10">Full Power Backup</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck11" name="ameni[]" value="Sports Facility">
                      <label class="custom-control-label" for="customCheck11">Sports Facility</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck12" name="ameni[]" value="Air Conditioning">
                      <label class="custom-control-label" for="customCheck12">Air Conditioning</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck13" name="ameni[]" value="Gymnasium">
                      <label class="custom-control-label" for="customCheck13">Gymnasium</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck14" name="ameni[]" value="Jogging Track">
                      <label class="custom-control-label" for="customCheck14">Jogging Track</label>
                    </div>
                    
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck15" name="ameni[]" value="Kitchen">
                      <label class="custom-control-label" for="customCheck15">Kitchen</label>
                    </div>

                  </div>

                  <div class="form-group">
                    <label>Cancellation Policy</label>
                    <textarea class="form-control" name="cancellation" id="cancellation" placeholder="" rows="4"></textarea>
                  </div>
  
                </div> 

             </div> 

             <div class="col-12">
               <div class="form-group"> 
                <label class="mb-3">House Rules</label>

                  <div class="five-checkbox-col">

                    <div class="custom-control" style="margin-left: -3%;">
                      @foreach($house_rules as $rules)
                      <label class="">{{$rules->house_rule_name}}</label>
                      <select name="house_rules[]" class="form-control" style="margin-top: -15%;margin-left: 40%;">
                        <option value="{{$rules->id}}_No">No</option>
                        <option value="{{$rules->id}}_Yes">Yes</option>
                      </select>
                      <br/>
                      @endforeach
                    </div>
                    <br/>
                    
                  </div>
  
                </div> 

             </div>   
                
            </div>   
             
           </div>     
           
           <div class="mt-3 mb-2x">
              <input type="hidden" name="file_array" value="">
              <button type="submit" class="common-btn">Submit</button>
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
<script>
   function show_hide_rental(typec){
      if(typec == "sell"){
        $("#time_period_div").hide();
      }else if(typec == "rent"){
        $("#time_period_div").show();
      }
   }

   $("#area").keypress(function (e) {
            if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
   });

   $('#price').keyup(function(e) {
    var regex = /^\d+(\.\d{0,2})?$/g;
    if (!regex.test(this.value)) {
        this.value = '';
    }
   });

   $("#zipcode").keypress(function (e) {
            if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
   });

   $("#buildage").keypress(function (e) {
            if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
   });
</script>  
<script>
  $.validator.setDefaults({
    submitHandler: function() {
      //alert("submitted!");
      document.getElementById("signupForm").submit();
    }
  });

  $().ready(function() {
    // validate signup form on keyup and submit
    $("#signupForm").validate({
      rules: {
        property_title: "required",
      },
      messages: {
        property_title: "Please enter property title",
      }
    });
  });
</script>
<script>
  function set_textbox(){
    if($("#ptype").val() == "Other"){
      $("#property_type_other_div").show();
    }else if($("#ptype").val() != "Other"){
      $("#property_type_other_div").hide();
    }
  }
</script>
<script>
 function test(name){
  var form_data = new FormData();

    form_data.append("name", name);
    form_data.append("_token", "{{ csrf_token() }}");

  $.ajax({
        url:"{{ route('getstatemaster') }}",
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false, 
        success:function(data)
        {
          //alert(data);
          $("#state-dropdown").empty().html(data);
        }
     });
 }
  </script>

<script>
 function city1(name){
    var form_data = new FormData();
    
    //alert(name);
    
    form_data.append("name", name);
    form_data.append("_token", "{{ csrf_token() }}");

    $.ajax({
        url:"{{ route('getcitymaster') }}",
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false, 
        success:function(data)
        {
          //alert(data);
          $("#city-dropdown").empty().html(data);
        }
     });
 }
</script>
