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
               @if(!empty($message))
                <div class="alert alert-success"> {{ $message }}</div>
               @endif
               @if(!empty($error))
                <div class="alert alert-danger"> {{ $error }}</div>
               @endif
                
            <h5 style="text-align:center;margin-left: -83px;">Make payment of $10 to subscribe successfully</h5>
            <div class="row"> 
            <div class="col-12">
              <div class="form-group">
               <div class="container">
                <div class="pro-box">
                <div class="body">
                    <form action="{{ route('user.makeprocesspaymentccmethod') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name on Card</label>
                            <input placeholder="Enter card holder name" class="form-control" name="card_holder_name" id="card_holder_name" type="text" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Card Number</label>
                            <input placeholder="Enter Credit Card Number" class="form-control" name="card_number" id="card_number" type="text" autocomplete="off" required>
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
                            <input placeholder="Enter CVV" class="form-control" name="card_cvv" id="card_cvv" type="password" autocomplete="off" required>
                        </div>

                        <h6 class="useradmin-title">Other Details</h6>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input placeholder="Enter Your Phone Number" class="form-control" name="phone" id="phone" type="number" autocomplete="off" required>
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
                            <button type="submit" name="btnSubmit" class="common-btn">Click here to proceed for payment</button>
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