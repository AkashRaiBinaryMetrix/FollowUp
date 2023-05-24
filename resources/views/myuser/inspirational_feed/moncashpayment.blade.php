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
                <a href="https://binarymetrix-dev.com/lineon/ecelestin-Moncash-sdk-php-master/sample/index.php?amount=10&orderid=12345"><img style="margin-left:75%;" src="https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware/resources/assets/images/MC_button.png"/></a>
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