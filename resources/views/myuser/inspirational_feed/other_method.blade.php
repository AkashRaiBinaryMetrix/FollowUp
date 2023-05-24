@include('myuser/header_footer/header')
<div class="useradmin-pages">
 <div class="container">
     <div class="row">               
       <div class="col-md-12">
         <div class="useradmin-right">
           <div class="useramdin-form1 whitebox">
            <div class="admin-whybecome-text">
             <h4></h4>   
            </div>   
               @if(!empty($error))
                <div class="alert alert-danger"> {{ $error }}</div>
               @endif
            <div class="row"> 
            <div class="col-12 col-sm-12">
              <div class="form-group">
               <div class="container">
            <div class="pro-box">
            <div class="body" style="margin-left: 53px;margin-top: -23px;">
                @php
                    if($payment_method == "paypal"){
                @endphp
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="merchantakash@gmail.com">
                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">
                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="{{$message}}">
                    <input type="hidden" name="item_number" value="{{$phone_number}}">
                    <input type="hidden" name="amount" value="{{$amount}}">
                    <input type="hidden" name="currency_code" value="USD">
                    <!-- Specify URLs -->
                    <input type="hidden" name="return" value="https://binarymetrix-dev.com/lineon/getandsetpaypalresponsereturn">
                    <input type="hidden" name="cancel_return" value="https://binarymetrix-dev.com/lineon/getandsetpaypalresponsecancel">
                    <input type="hidden" name="notify_url" value="https://binarymetrix-dev.com/lineon/ipnverify">
                    <!-- Display the payment button. -->
                    <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/webstatic/mktg/merchant/pages/express-checkout/express-checkout-hero-sg.png" style="margin-left: 252px;margin-top: 20px;">
                  </form>
                  @php
                   }else if($payment_method == "moncash"){
                  @endphp
                    <a style="margin-right: 68px;" href="https://binarymetrix-dev.com/lineon/ecelestin-Moncash-sdk-php-master/sample/index.php?amount={{$amount}}&orderid={{$phone_number}}"><img style="margin-left:75%;" src="https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware/resources/assets/images/MC_button.png"/></a>
                  @php
                   }else if($payment_method == "cc_method"){
                  @endphp
                     <form action="{{ route('user.makeprocesspaymentccmethod') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name on Card</label>
                            <input placeholder="Enter card holder name" class="form-control" name="card_holder_name" id="card_holder_name" type="text" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Card Number</label>
                            <input placeholder="Enter Credit Card Number" class="form-control" name="card_number" id="card_number" type="text" autocomplete="off" required onkeypress="return isNumber(event)">
                        </div>
                        <div class="form-group">
                            <label>Expiry Month</label>
                            <select class="form-control" name="card_month" id="card_month">
                                @php
                                    for($month=1;$month<=12;$month++){
                                @endphp
                                    <option value="{{$month}}">{{$month}}</option>
                                @php
                                 }
                                @endphp
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Expiry Year</label>
                            <select class="form-control" name="card_year" id="card_year">
                                @php
                                    for($year=2001;$year<=(date('Y')+10);$year++){
                                @endphp
                                    <option value="{{$year}}">{{$year}}</option>
                                @php
                                 }
                                @endphp
                            </select>
                        </div>
                        <div class="form-group">
                            <label>CVV</label>
                            <input placeholder="Enter CVV" class="form-control" name="card_cvv" id="card_cvv" type="password" autocomplete="off" required onkeypress="return isNumber(event)">
                        </div>
                    <div class="form-group">
                        <input name="phone" value="{{$phone_number}}" id="phone" type="hidden">  <input name="amount" value="{{$amount}}" id="amount" type="hidden">
                        <input name="pin" value="{{$pin}}" id="pin" type="hidden">
                        <input name="message" id="message" type="hidden" value="{{$message}}">
                        </div>
                        <div class="mt-3 mb-2">
                            <input type="hidden" name="user_id" id="user_id"/>
                            <button type="submit" name="btnSubmit" class="common-btn">Click here to proceed for payment</button>
                        </div>  
                    </form>
                  @php
                   }
                  @endphp
                    </div>
                </div>
              </div>
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
    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>