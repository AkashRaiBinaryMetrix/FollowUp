@include('myuser/header_footer/header')
<style>
  .error{color: red !important;}
</style>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #f2c103;
  color: white;
}
a.delete_image {
    padding: 6px 9px;
    line-height: 27px;
    font-size: 20px;
    border-radius: 30px;
    margin: 0;
    display: inline-block;
    width: 38px;
    height: 38px;
    text-align: center;
    background-color: #dc3139;
}
</style>

<form class="common-form" id="signupForm" method="POST" action="{{ route('user.usereditpropertyprocess') }}" enctype="multipart/form-data">

@csrf

<input type="hidden" value="{{$getPropById->id}}" name="prop_id">   

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
                <input placeholder="Enter Property Title" class="form-control" name="property_title" id="property_title" type="text" autocomplete="off" value="{{$getPropById->property_title}}">
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" id="status">
                  <option>Select an Option</option>
                  <option value="0" {{ ($getPropById->status == "0" ? "selected":"") }}>Active</option>
                  <option value="1" {{ ($getPropById->status == "1" ? "selected":"") }}>In-Active</option>
                </select>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Property For</label>
                <input {{ ($getPropById->property_for == "sell" ? "checked":"") }} class="" onclick="show_hide_rental('sell');" name="property_for" id="property_for" value="sell" type="radio"> Sell
                <input {{ ($getPropById->property_for == "rent" ? "checked":"") }} class="" onclick="show_hide_rental('rent');" name="property_for" id="property_for" value="rent" type="radio"> Rent
              </div>
            </div>
                
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Property Type</label>
                 <select class="form-control" name="ptype" id="ptype" onchange="set_textbox();">
                  <option>Select an Option</option>
                  <option value="Residential" {{ ($getPropById->ptype == "Residential" ? "selected":"") }}>Residential</option>
                  <option value="Commercial" {{ ($getPropById->ptype == "Commercial" ? "selected":"") }}>Commercial</option>
                  <option value="Apartment" {{ ($getPropById->ptype == "Apartment" ? "selected":"") }}>Apartment</option>
                  <option value="Villa" {{ ($getPropById->ptype == "Villa" ? "selected":"") }}>Villa</option>
                  <option value="Other" {{ ($getPropById->ptype == "Other" ? "selected":"") }}>Other</option>
                </select>
              </div>
            </div>  

            @php
              if($getPropById->ptype == "Other"){
            @endphp
            <div class="col-12 col-sm-6" id="property_type_other_div">
              <div class="form-group">
                <label>Property Type(Other)</label>
                <input type="text" class="form-control" name="property_type_other" id="property_type_other" value="{{$getPropById->property_type_other}}">
              </div>
            </div>
            @php
             }else{
            @endphp
            <div class="col-12 col-sm-6" id="property_type_other_div" style="display:none;">
              <div class="form-group">
                <label>Property Type(Other)</label>
                <input type="text" class="form-control" name="property_type_other" id="property_type_other" value="{{$getPropById->property_type_other}}">
              </div>
            </div>
            @php
             }
            @endphp 

             <div class="col-12 col-sm-4 col-md-4">
              <div class="form-group">
                <label>Price</label>
               <input placeholder="Enter Property Price" class="form-control" name="price" id="price" type="text" maxlength="10" autocomplete="off" autocomplete="off" value="{{$getPropById->price}}">
              </div>
            </div> 
            
            <div class="col-12 col-sm-4 col-md-4">
              <div class="form-group">
                <label>Currencies</label>
                <select class="form-control" name="currency" id="currency">
                  <option>Select an Option</option>
                  <option value="USD" {{ ($getPropById->currency == "USD" ? "selected":"") }}>USD</option>
                  <option value="HTG" {{ ($getPropById->currency == "HTG" ? "selected":"") }}>HTG</option>
                  <option value="DOP" {{ ($getPropById->currency == "DOP" ? "selected":"") }}>DOP</option>
                </select>
              </div>
            </div>   
            
            <div class="col-12 col-sm-4 col-md-4"style="display: none;" id="time_period_div">
              <div class="form-group">
                <label>Payment Time Period</label>
                <select class="form-control" name="time_period" id="time_period">
                  <option>Select an Option</option>
                  <option value="Monthly"     {{ ($getPropById->time_period == "Monthly" ? "selected":"") }}>Monthly</option>
                  <option value="Quaterly"    {{ ($getPropById->time_period == "Quaterly" ? "selected":"") }}>Quaterly</option>
                  <option value="Half-Yearly" {{ ($getPropById->time_period == "Half-Yearly" ? "selected":"") }}>Half-Yearly</option>
                  <option value="Yearly"      {{ ($getPropById->time_period == "Yearly" ? "selected":"") }}>Yearly</option>
                </select>
              </div>
            </div>  


             <div class="col-12 col-sm-4 col-md-4">
              <div class="form-group">
                <label>Area(In sq.ft.)</label>
                <input placeholder="Enter Prperty Covered Area(In sq.ft.)" class="form-control" name="area" id="area" value="{{$getPropById->area}}" type="text" maxlength="10" autocomplete="off">
              </div>
            </div>   
                
            </div>   
             
           </div>
             
           <div class="useramdin-form1 whitebox">
            <div class="useradmin-title">Upload New Photos</div>  
             <input type="file" multiple id="gallery-photo-add" name="upload[]">
            <div class="gallery"></div>
            <div class="useradmin-title">Delete Previous Photos</div>
            
            @php
               $getPropImageById = DB::table('property_list_images')
                              ->where('list_id',$getPropById->id)
                              ->get();
            @endphp
            <table id="customers">
              
              @foreach($getPropImageById as $detail)
              @php
                 $final_image = str_replace("/home/devmetrx/public_html/lineon/public/","",$detail->url);
              @endphp
              <tr id="image{{$detail->id}}">
                <td>
                  <img src="{{ asset($final_image) }}" style="width:100px;" />
                </td>
                <td>
                  <a href="#" class="delete_image" onclick="deletePropImageById({{$detail->id}});">
                    <i class="las la-trash-alt" style="color: white;"></i>
                  </a>
                </td>
              </tr>
              @endforeach

            </table>
             
           </div>         
             
           <div class="useramdin-form1 whitebox">
            <div class="useradmin-title">Property Location</div>  
             
            <div class="row"> 

            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Address</label>
                <input class="form-control" name="address" id="address" value="{{$getPropById->address}}" placeholder="Enter Address" type="text" maxlength="100" autocomplete="off">
              </div>
            </div>

            <div class="col-12 col-sm-6 ">
              <div class="form-group">
              <label>Country</label>
                  <select class="form-control" id="country-dropdown" name="country" class="Form-control" onchange="test(this.value)">
                    <option value="" id="Country">Select Country</option>
                    @foreach($country_data as $cresult)
                      <option value="{{$cresult->id}}" {{ ($getPropById->country == $cresult->id ? "selected":"") }}>{{$cresult->country_name}}</option>
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
                <input class="form-control" name="zipcode" id="zipcode" value="{{$getPropById->zipcode}}" placeholder="Enter Zipcode" type="text" autocomplete="off">
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
                <textarea class="form-control" name="desc" id="desc" placeholder="" rows="4">{{$getPropById->description}}</textarea>
              </div>
            </div>
                
             <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Building Age</label>
                <input class="form-control" name="buildage" id="buildage" value="{{$getPropById->buildage}}" placeholder="Enter Building Age" type="text" maxlength="5" autocomplete="off">
              </div>
            </div>
                
           <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Bedrooms</label>
                <select class="form-control" name="rooms" id="rooms">
                  <option>Select an Option</option>
                  <option value="1" {{ ($getPropById->rooms == "1" ? "selected":"") }}>1</option>
                  <option value="2" {{ ($getPropById->rooms == "2" ? "selected":"") }}>2</option>
                  <option value="3" {{ ($getPropById->rooms == "3" ? "selected":"") }}>3</option>
                  <option value="4" {{ ($getPropById->rooms == "4" ? "selected":"") }}>4</option>
                  <option value="5+" {{ ($getPropById->rooms == "5+" ? "selected":"") }}>5+</option>
                </select>
              </div>
            </div>     

            <div class="col-12 col-sm-6 col-md-4">
              <div class="form-group">
                <label>Bath Rooms</label>
                <select class="form-control" name="bath" id="bath">
                  <option>Select an Option</option>
                  <option value="1" {{ ($getPropById->bath == "1" ? "selected":"") }}>1</option>
                  <option value="2" {{ ($getPropById->bath == "2" ? "selected":"") }}>2</option>
                  <option value="3" {{ ($getPropById->bath == "3" ? "selected":"") }}>3</option>
                  <option value="4" {{ ($getPropById->bath == "4" ? "selected":"") }}>4</option>
                  <option value="5+" {{ ($getPropById->bath == "5+" ? "selected":"") }}>5+</option>
                </select>
              </div>
            </div> 
                
            <div class="col-12">
               <div class="form-group"> 
                <label class="mb-3">Amenities</label>

                  <div class="five-checkbox-col">

                    @php
                      $ameni = $getPropById->ameni;
                      $arr = explode(",",$ameni);
                    @endphp 

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1" name="ameni[]" value="Maintenance Staff" {{in_array('Maintenance Staff',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck1">Maintenance Staff</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck2" name="ameni[]" value="Club House" {{in_array('Club House',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck2">Club House</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck3" name="ameni[]" value="Children's play area" {{in_array('Children\'s play area',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck3">Children's play area</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck4" name="ameni[]" value="Car Parking" {{in_array('Car Parking',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck4">Car Parking</label>
                    </div>  

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck5" name="ameni[]" value="Lift(s)" {{in_array('Lift(s)',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck5">Lift(s)</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck6" name="ameni[]" value="Landscaped Gardens" {{in_array('Landscaped Gardens',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck6">Landscaped Gardens</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck7" name="ameni[]" value="24 X 7 Security" {{in_array('24 X 7 Security',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck7">24 X 7 Security</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck8" name="ameni[]" value="Swimming Pool" {{in_array('Swimming Pool',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck8">Swimming Pool</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck9" name="ameni[]" value="Fire Security" {{in_array('Fire Security',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck9">Fire Security</label>
                    </div>  

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck10" name="ameni[]" value="Full Power Backup" {{in_array('Full Power Backup',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck10">Full Power Backup</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck11" name="ameni[]" value="Sports Facility" {{in_array('Sports Facility',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck11">Sports Facility</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck12" name="ameni[]" value="Air Conditioning" {{in_array('Air Conditioning',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck12">Air Conditioning</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck13" name="ameni[]" value="Gymnasium" {{in_array('Gymnasium',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck13">Gymnasium</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck14" name="ameni[]" value="Jogging Track" {{in_array('Jogging Track',$arr)?'checked':''}}>
                      <label class="custom-control-label" for="customCheck14">Jogging Track</label>
                    </div> 
                    
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck15" name="ameni[]" value="Kitchen">
                      <label class="custom-control-label" for="customCheck15">Kitchen</label>
                    </div>

                  </div>

                   <div class="form-group">
                    <label>Cancellation Policy</label>
                    <textarea class="form-control" name="cancellation" id="cancellation" placeholder="" rows="4">{{$getPropById->cancellation}}</textarea>
                  </div>
  
                </div> 
             </div>   

              <div class="col-12">
               <div class="form-group"> 
                <label class="mb-3">House Rules</label>

                  <div class="five-checkbox-col">

                    <div class="custom-control" style="margin-left: -3%;">
                      @foreach($house_rules as $rules)
                        @php
                          $get_property_houserule = DB::table('property_list_house_rules')
                                                    ->where('property_list_id',$getPropById->id)
                                                    ->where('house_rule_id',$rules->id)
                                                    ->get();

                          $hvalue = $get_property_houserule[0]->option_value;
                        @endphp
                      <label class="">{{$rules->house_rule_name}}</label>
                      <select name="house_rules[]" class="form-control" style="margin-top: -15%;margin-left: 40%;">
                        <option value="{{$rules->id}}_No" {{ $hvalue == 'No'  ? 'selected' : '' }}>No</option>
                        <option value="{{$rules->id}}_Yes" {{ $hvalue == 'Yes' ? 'selected' : '' }}>Yes</option>
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
              <button type="submit" name="btnUpdate" class="common-btn">Submit</button>
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
     function show_hide_rental(typec){
      if(typec == "sell"){
        $("#time_period_div").hide();
      }else if(typec == "rent"){
        $("#time_period_div").show();
      }
   }
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