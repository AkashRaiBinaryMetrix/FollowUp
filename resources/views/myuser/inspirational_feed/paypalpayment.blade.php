@include('myuser/header_footer/header')

<div class="useradmin-pages">
 <div class="container">
     <div class="row">
               
       <div class="col-md-12">
         <div class="useradmin-right">
             
           <div class="useramdin-form1 whitebox">
            <div class="useradmin-title">Subscription Payment Page</div>  
            <div class="admin-whybecome-text">
             <h4></h4>   
            </div>   
               @if(!empty($error))
                <div class="alert alert-danger"> {{ $error }}</div>
               @endif
            <div class="row"> 
  
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <div class="container">
        <div class="pro-box">
            <div class="body" style="padding: 20px;margin-left: 42%;">
                <h5 style="text-align:center;width: 800px;margin-left: -83px;">Make payment of $10 to subscribe successfully</h5>
        
                <!-- PayPal payment form for displaying the buy button -->
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="merchantakash@gmail.com">
          
                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">
          
                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="test">
                    <input type="hidden" name="item_number" value="12345">
                    <input type="hidden" name="amount" value="10">
                    <input type="hidden" name="currency_code" value="USD">
          
                    <!-- Specify URLs -->
                    <input type="hidden" name="return" value="https://binarymetrix-dev.com/lineon/getandsetpaypalresponsereturn">
                    <input type="hidden" name="cancel_return" value="https://binarymetrix-dev.com/lineon/getandsetpaypalresponsecancel">
                    <input type="hidden" name="notify_url" value="https://binarymetrix-dev.com/lineon/ipnverify">
          
                    <!-- Display the payment button. -->
                    <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" style="margin-left: 252px;margin-top: 20px;">
                        </form>
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