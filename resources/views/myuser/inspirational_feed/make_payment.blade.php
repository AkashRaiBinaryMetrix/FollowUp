@include('myuser/header_footer/header')
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
            <div class="useradmin-title">Make Other Payments</div>  
            <div class="admin-whybecome-text">
             <h4></h4>   
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
                <label style="width: 200%;">
                   @php
                      $isUserLoggedIn = Session('isUserLoggedIn');
                          if (!empty($isUserLoggedIn)) {
                            $iUserId = $isUserLoggedIn->id;
                            
                            //check if user has any record in agent table or not
                            $checkAgentInfo = DB::table('agent_profile')
                                  ->where('user_id',$iUserId)
                                  ->get();

                            if(empty($checkAgentInfo)){
                              echo "";
                            }else{
                              //check if agent has record in subscription table or not
                              $checkSubscription = DB::table('subscription_master')
                                  ->where('user_id',$iUserId)
                                  ->get();

                             
                              @endphp

                    <div class="modal-body">
                        <p>Please enter following details regarding the payment:-</p>
                        <form action="{{ route('user.makeotherpayment') }}" method="post">
                          
                        @csrf                      
                        
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input placeholder="Enter Your Phone Number" class="form-control" name="phone_number" maxlength="10" id="phone_number" type="text" autocomplete="off" required="" onkeypress="return isNumber(event)">
                        </div>
                        
                        <div class="form-group">
                            <label>Amount To Be paid</label>
                            <input placeholder="Enter Your Amount Paid" class="form-control" name="amount" id="amount" type="text" autocomplete="off" required="" onkeypress="return isNumber(event)">
                        </div>
                        
                        <div class="form-group">
                            <label>PINCODE</label>
                            <input placeholder="Enter Your PIN Number" class="form-control" name="pin" id="pin" type="text" maxlength="5" autocomplete="off" required="" onkeypress="return isNumber(event)">
                        </div>
                        
                        <div class="form-group">
                            <label>PURPOSE OF PAYMENT</label>
                            <textarea placeholder="Enter Your Message" class="form-control" name="message" id="message" type="textarea" autocomplete="off" required=""></textarea>
                        </div>

                        <div class="form-group">
                          <label>SELECT PAYMENT METHOD</label>
                          <input type="radio" name="payment_method" value="moncash">&nbsp;&nbsp;Moncash
                          <br/>
                          <input type="radio" name="payment_method" value="paypal">&nbsp;&nbsp;Paypal
                          <br/>
                          <input type="radio" name="payment_method" value="cc_method">&nbsp;&nbsp;Credit/Debit Card
                        </div>
                        
                        <div class="mt-3 mb-2">
                            <input type="hidden" name="user_id" id="user_id">
                            <button type="submit" name="btnSubmit" class="common-btn">Click here to proceed for Payment Page</button>
                        </div>  

                    </form>
                              </div>
                              @php
                            }
                            
                          }
                      @endphp 
                </label>
              </div>
            </div>
            </div>   
           </div>     
         </div>  
       </div>   
    </div>     
 </div>       
</div>

<script>
  function make_payment(user_id){
    $("#user_id").val(user_id);
  }

  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>

@include('myuser/header_footer/footer')