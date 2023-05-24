@include('myuser/header_footer/header')

<form class="common-form" id="updateForm" method="post" action="{{ route('update.becomeagentprocess') }}" enctype="multipart/form-data">
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
            <div class="useradmin-title">My Messages</div>     
               
             <div class="row">
                
                @php
                    if(!empty($propertyDetails)){
                @endphp
                <div class="col-lg-5 col-xxl-4">
                    <div class="use-on-chat p-30 border bg-white rounded">
                        <div class="widget_search" style="position: relative;">
                            <form role="search" method="get" class="search-form" action="">
                                <label>
                                <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                            </label>
                                <input type="submit" class="search-submit" value="Search">
                            </form>
                        </div>
                        <ul class="active-chat-list pe-3">
                           <!--  <li class="new-message">
                                <div class="avata">
                                    <img class="rounded-circle" src="images/1.jpg" alt="" data-pagespeed-url-hash="1595872198" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                    <span class="user-status text-success">•</span>
                                </div>
                                <div class="chat-info py-1">
                                    <span class="mb-1 d-block">Malerie G. Terrones</span>
                                    <div class="last-msg font-small">How may I get help?</div>
                                </div>
                                <div class="chat-time ms-auto text-end">
                                    <div class="mb-1">8:30 AM</div>
                                    <div class="un-read">5</div>
                                </div>
                            </li> -->
                            @foreach($propertyDetails as $detail)
                              @php

                                $isUserLoggedIn = Session('isUserLoggedIn');
                                $loggedInUserId = $isUserLoggedIn->id;                                

                                $getUserDetails = DB::table('users')
                                        ->where('id',$detail->sendingto_user_id)
                                        ->first();
                                $recordUserId = $getUserDetails->id;

                                if($loggedInUserId == $recordUserId){
                                  $getUserDetails = DB::table('users')
                                        ->where('id',$detail->who_issending_iUserId)
                                        ->first();
                                }

                                $time = date('h:i A', strtotime($detail->created_on));

                                $final_image = str_replace("/home/devmetrx/public_html/lineon/public/","",$getUserDetails->profile_pic);

                            @endphp
                            <li onclick="open_chat({{$detail->id}});">
                                <div class="avata">
                                    <img class="rounded-circle" src="{{ asset($final_image) }}" alt="" data-pagespeed-url-hash="1890372119" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                    <span class="user-status text-success">•</span>
                                </div>
                                <div class="chat-info py-1">
                                    <span class="mb-1 d-block">{{$getUserDetails->name}}</span>
                                    <div class="last-msg font-small">You: Come</div>
                                </div>
                                <div class="chat-time ms-auto text-end">
                                    <div class="mb-1">{{$time}}</div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                 
                <div class="col-lg-7 col-xxl-8 p-0 pl-2">
                    <div class="use-on-chat bg-white rounded mb-30">
                        <div id="chatbox_head"></div>
                        <div class="chat-body">
                            <ul class="msg-history pe-3" id="msg_history">
                                
                            </ul>
                        </div>
                        <div class="chat-write-box pt-4">
                            <form class="form-boder" action="#" method="POST">
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control h-auto" id="chat_message" name="chat_message" placeholder="Write" rows="1"></textarea>
                                            <div id="chat_button_dynamic_render"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
</form>

@include('myuser/header_footer/footer')