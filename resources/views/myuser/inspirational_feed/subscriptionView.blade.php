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
            <div class="useradmin-title">Subscription Management</div>  
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
                <label style="width: 143%;">Your Current Active Plan:-
                   @php
                      $isUserLoggedIn = Session('isUserLoggedIn');
                          if (!empty($isUserLoggedIn)) {
                            $iUserId = $isUserLoggedIn->id;
                            
                            //check if user has any record in agent table or not
                            $checkAgentInfo = DB::table('agent_profile')
                                  ->where('user_id',$iUserId)
                                  ->get();

                            if(empty($checkAgentInfo)){
                              echo "Please fill the agent form first and then subscribe";
                            }else{
                              //check if agent has record in subscription table or not
                              $checkSubscription = DB::table('subscription_master')
                                  ->where('user_id',$iUserId)
                                  ->get();

                              if(count($checkSubscription) == 0){
                                echo "Free Subscription";
                              @endphp
                                <!-- <div class="mt-3 mb-2">
                                  <button data-toggle="modal" data-target="#myModal" type="button" class="common-btn" onclick="make_payment({{$iUserId}});">Subscribe to monthly plan with $10/month</button>
                                </div>   -->

                                <div class="modal-body">
                                <p>Please select any one of the following subscription method and click on submit button</p>
                                <form action="{{ route('user.makeprocesspayment') }}" method="post">
                                  @csrf
                                  <input type="radio" name="payment_method" value="moncash">&nbsp;&nbsp;Moncash
                                  <br/>
                                  <input type="radio" name="payment_method" value="paypal">&nbsp;&nbsp;Paypal
                                  <br/>
                                  <input type="radio" name="payment_method" value="cc_method">&nbsp;&nbsp;Credit/Debit Card
                                  <div class="mt-3 mb-2">
                                      <input type="hidden" name="user_id" id="user_id"/>
                                      <button type="submit" name="btnSubmit" class="common-btn">Click here to proceed for payment</button>
                                  </div>  
                                </form>
                              </div>
                              @php
                              }else{
                                echo "Your monthly plan is currently active."; 
                              }
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

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- <div class="modal-body">
          <p>Please select any one of the following payments method and click on submit button</p>
          <form action="{{ route('user.makeprocesspayment') }}" method="post">
            @csrf
            <input type="radio" name="payment_method" value="moncash">&nbsp;&nbsp;Moncash
            <br/>
            <input type="radio" name="payment_method" value="paypal">&nbsp;&nbsp;Paypal
            <br/>
            <input type="radio" name="payment_method" value="cc_method">&nbsp;&nbsp;Credit/Debit Card
            <div class="mt-3 mb-2">
                <input type="hidden" name="user_id" id="user_id"/>
                <button type="submit" name="btnSubmit" class="common-btn">Click here to proceed for payment</button>
            </div>  
          </form>
        </div> -->
      </div>
    </div>
</div>
<!-- Modal -->
  
<script>
  function make_payment(user_id){
    $("#user_id").val(user_id);
  }
</script>

@include('myuser/header_footer/footer')