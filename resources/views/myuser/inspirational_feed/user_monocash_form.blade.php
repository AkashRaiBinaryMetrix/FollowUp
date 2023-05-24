@include('myuser/header_footer/header')
<div class="useradmin-pages">
 <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="useradmin-right">
           <div class="useramdin-form1 whitebox">
            <div class="useradmin-title">MonCash Entry Page</div>  

            <div class="row"> 
            <div class="col-12">
              <div class="form-group">
               <div class="container">
                <div class="pro-box">
                <div class="body">
                    <form action="{{ route('user.usermonocashform') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input placeholder="Enter Your Phone Number" class="form-control" name="phone_number" id="phone_number" type="text" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>The Amount To Be paid</label>
                            <input placeholder="Enter Your Amount Paid" class="form-control" name="amount" id="amount" type="text" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>PIN</label>
                            <input placeholder="Enter Your PIN Number" class="form-control" name="pin" id="pin" type="text" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Reason For The Payment</label>
                            <textarea placeholder="Enter Your Message" class="form-control" name="message" id="message" type="textarea" autocomplete="off" required></textarea>
                        </div>
                        
                        <div class="mt-3 mb-2">
                            <input type="hidden" name="user_id" id="user_id"/>
                            <button type="submit" name="btnSubmit" class="common-btn">Click here to proceed for Moncash Payment Page</button>
                        </div>  
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