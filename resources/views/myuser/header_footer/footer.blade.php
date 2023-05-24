<div class="footer-cities-list">
  <div class="container">
    <div class="title-col"><h3 class="title">We’ve got Homes and Apartments <br> in Popular Cities.</h3></div>
    
    <div class="cities-list5">
      <ul>

        <li><a href="{{url('search_city_property/42')}}">Arcahaie Properties</a></li>  
        <li><a href="{{url('search_city_property/17')}}">Boca Chica Properties</a></li>
        <li><a href="{{url('search_city_property/61')}}">Cap-haitien Properties</a></li>

        <li><a href="{{url('search_city_property/67')}}">Cayes Properties</a></li>  
        <li><a href="{{url('search_city_property/81')}}">Croix-des-Bouquets Properties</a></li>
        <li><a href="{{url('search_city_property/61')}}">Dajabon Properties</a></li>

        <li><a href="{{url('search_city_property/83')}}">Delmas Properties</a></li>  
        <li><a href="{{url('search_city_property/96')}}">Fort-Liberté Properties</a></li>
        <li><a href="{{url('search_city_property/99')}}">Gonaïves Properties</a></li>

        <li><a href="{{url('search_city_property/108')}}">Hinche Properties</a></li>  
        <li><a href="{{url('search_city_property/110')}}">Jacmel Properties</a></li>
        <li><a href="{{url('search_city_property/112')}}">Jérémie Properties</a></li>

        <li><a href="{{url('search_city_property/127')}}">Limonade Properties</a></li>  
        <li><a href="{{url('search_city_property/134')}}">Milot Properties</a></li>
        <li><a href="{{url('search_city_property/319')}}">Mirago Properties</a></li>

      </ul>
      
    </div>    
  </div>      
</div>
    
<div class="footer-about">
 <div class="container">
 <h5>About Lineon Group</h5>   
<p>LINEON Group is a tech real estate marketplace that connect property owners, real estate agencies, brokers, buyers, Notaries, Architects, Engineers and tenant in all the 145 cities of Haiti and in the Dominican Republic Only with internet connection, we make real estate transactions possible across the Hispaniola Island from anywhere in the world.</p>   
 </div>      
</div>    
    
<div class="footer-linksbar">
 <div class="container">
 <div class="footer-leftlinks">
   <a href="{{url('about-us')}}">About us</a>
<a href="{{url('user-listnewproperty')}}">List you property</a>
<a href="{{url('login')}}">Login</a>
<a href="{{url('sign-up')}}">Sign up</a>
<a href="{{url('blog')}}">Blog</a>
<a href="{{url('contact-us')}}">Contact us</a>
<a href="{{url('privacy-policy')}}">Privacy Policy</a>
<a href="{{url('terms-and-conditions')}}">Terms & Conditions</a> 
</div>    
     
<div class="footer-social">
@php
       $facebook_value = DB::table('cms_content')
                              ->where('cms_key','facebook')
                              ->get();

        $linkedin_value = DB::table('cms_content')
                              ->where('cms_key','linkedin')
                              ->get();

        $twitter_value = DB::table('cms_content')
                              ->where('cms_key','twitter')
                              ->get();

        $instagram_value = DB::table('cms_content')
                              ->where('cms_key','instagram')
                              ->get();

        $youtube_value = DB::table('cms_content')
                              ->where('cms_key','youtube')
                              ->get();

        $tiktok_value = DB::table('cms_content')
                              ->where('cms_key','tiktok')
                              ->get();

@endphp

<a href="{{$facebook_value[0]->value}}"><i class="lab la-facebook-f"></i></a>     

<a href="{{$twitter_value[0]->value}}"><i class="lab la-twitter"></i></a>     

<a href="{{$linkedin_value[0]->value}}"><i class="lab la-linkedin-in"></i></a>     

<a href="{{$instagram_value[0]->value}}"><i class="lab la-instagram"></i></a>     

<a href="{{$youtube_value[0]->value}}"><i class="lab la-youtube"></i></a>   

<a href="{{$tiktok_value[0]->value}}"><i class="fa-brands fa-tiktok"></i></a>  
     
</div>     
     
 </div>      
</div>    
    
<div class="copyright"><div class="container"><p>Lineon Group © 2023 | All rights reserved <span><a href=" https://www.binarymetrix.com/website-designing/" target="_blank">Website Designed</a> &amp; <a href="https://www.binarymetrix.com/website-development/" target="_blank">Developed</a> by  <a href="https://www.binarymetrix.com/" target="_blank">BinaryMetrix Technologies</a></span></p></div></div>    
      
    
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>     
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script> 
<script src="{{ asset('js/theme.js') }}" type="text/javascript"></script> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img style="width: 291px;padding: 1px;height:182px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>
    
<script>
function myFunction(x) {
  x.classList.toggle("las");
}
</script>    
    
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script> 

<script>
function delete_property(id){
    var form_data = new FormData();

    form_data.append("id", id);
    form_data.append("_token", "{{ csrf_token() }}");
   
    $.ajax({
        url:"{{ route('deleteUserProperty') }}",
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        // beforeSend:function(){
        //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
        // },   
        success:function(data)
        {
          $.confirm({
            title: 'Confirm!',
            content: 'Property deleted successfully',
            buttons: {
                // confirm: function () {
                //     $.alert('Confirmed!');
                // },
                // cancel: function () {
                //     $.alert('Canceled!');
                // },
                somethingElse: {
                    text: 'OK',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function(){
                        //$.alert('Something else?');
                        window.location.reload();
                    }
                }
            }
        });   
        }
     });
  }
</script>

<script>
function delete_addlisting(id){
    var form_data = new FormData();

    form_data.append("id", id);
    form_data.append("_token", "{{ csrf_token() }}");
   
    $.ajax({
        url:"{{ route('deleteUserAddlisting') }}",
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        // beforeSend:function(){
        //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
        // },   
        success:function(data)
        {
          $.confirm({
            title: 'Confirm!',
            content: 'Property deleted successfully',
            buttons: {
                // confirm: function () {
                //     $.alert('Confirmed!');
                // },
                // cancel: function () {
                //     $.alert('Canceled!');
                // },
                somethingElse: {
                    text: 'OK',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function(){
                        //$.alert('Something else?');
                        window.location.reload();
                    }
                }
            }
        });   
        }
     });
  }
</script>


<script>
  function deletePropImageById(id){
     $.confirm({
            title: 'Are you sure, you want to delete?',
            content: '',
            buttons: {
                confirm: function () {
                    //$.alert('Confirmed!');
                    var form_data = new FormData();

                    form_data.append("id", id);
                    form_data.append("_token", "{{ csrf_token() }}");
                   
                    $.ajax({
                        url:"{{ route('deleteUserPropertyImageById') }}",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        // beforeSend:function(){
                        //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                        // },   
                        success:function(data)
                        {
                          $.confirm({
                            title: 'Confirm!',
                            content: 'Image deleted successfully',
                            buttons: {
                                // confirm: function () {
                                //     $.alert('Confirmed!');
                                // },
                                // cancel: function () {
                                //     $.alert('Canceled!');
                                // },
                                somethingElse: {
                                    text: 'OK',
                                    btnClass: 'btn-blue',
                                    keys: ['enter', 'shift'],
                                    action: function(){
                                        //$.alert('Something else?');
                                        $("#image"+id).remove();

                                    }
                                }
                            }
                        });   
                        }
                     });
                },
                cancel: function () {
                    //$.alert('Canceled!');
                },
                // somethingElse: {
                //     text: 'OK',
                //     btnClass: 'btn-blue',
                //     keys: ['enter', 'shift'],
                //     action: function(){
                //         //$.alert('Something else?');
                //         window.location.reload();
                //     }
                // }
            }
        });
    
  }
</script>

<script>
  function deletePropImageById(id){
     $.confirm({
            title: 'Are you sure, you want to delete?',
            content: '',
            buttons: {
                confirm: function () {
                    //$.alert('Confirmed!');
                    var form_data = new FormData();

                    form_data.append("id", id);
                    form_data.append("_token", "{{ csrf_token() }}");
                   
                    $.ajax({
                        url:"{{ route('deleteUserPropertyImageById') }}",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        // beforeSend:function(){
                        //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                        // },   
                        success:function(data)
                        {
                          $.confirm({
                            title: 'Confirm!',
                            content: 'Image deleted successfully',
                            buttons: {
                                // confirm: function () {
                                //     $.alert('Confirmed!');
                                // },
                                // cancel: function () {
                                //     $.alert('Canceled!');
                                // },
                                somethingElse: {
                                    text: 'OK',
                                    btnClass: 'btn-blue',
                                    keys: ['enter', 'shift'],
                                    action: function(){
                                        //$.alert('Something else?');
                                        $("#image"+id).remove();

                                    }
                                }
                            }
                        });   
                        }
                     });
                },
                cancel: function () {
                    //$.alert('Canceled!');
                },
                // somethingElse: {
                //     text: 'OK',
                //     btnClass: 'btn-blue',
                //     keys: ['enter', 'shift'],
                //     action: function(){
                //         //$.alert('Something else?');
                //         window.location.reload();
                //     }
                // }
            }
        });
    
  }
</script>

<script>
  function delete_property_from_wishlist(id){
     $.confirm({
            title: 'Are you sure, you want to delete?',
            content: '',
            buttons: {
                confirm: function () {
                    //$.alert('Confirmed!');
                    var form_data = new FormData();

                    form_data.append("id", id);
                    form_data.append("_token", "{{ csrf_token() }}");
                   
                    $.ajax({
                        url:"{{ route('removeFromWishList') }}",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                         
                        success:function(data)
                        {
                          $.confirm({
                            title: 'Confirm!',
                            content: 'Property removed from wishlist',
                            buttons: {
                                // confirm: function () {
                                //     $.alert('Confirmed!');
                                // },
                                // cancel: function () {
                                //     $.alert('Canceled!');
                                // },
                                somethingElse: {
                                    text: 'OK',
                                    btnClass: 'btn-blue',
                                    keys: ['enter', 'shift'],
                                    action: function(){
                                        //$.alert('Something else?');
                                        //$("#image"+id).remove();
                                        window.location.reload();
                                    }
                                }
                            }
                        });   
                        }
                     });
                },
                cancel: function () {
                    //$.alert('Canceled!');
                },
                // somethingElse: {
                //     text: 'OK',
                //     btnClass: 'btn-blue',
                //     keys: ['enter', 'shift'],
                //     action: function(){
                //         //$.alert('Something else?');
                //         window.location.reload();
                //     }
                // }
            }
        });
    
  }
</script>


<script>
  function remove_add_From_WishList(id){
     $.confirm({
            title: 'Are you sure, you want to delete?',
            content: '',
            buttons: {
                confirm: function () {
                    //$.alert('Confirmed!');
                    var form_data = new FormData();

                    form_data.append("id", id);
                    form_data.append("_token", "{{ csrf_token() }}");
                   
                    $.ajax({
                        url:"{{ route('removeaddFromWishList') }}",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                         
                        success:function(data)
                        {
                          $.confirm({
                            title: 'Confirm!',
                            content: 'Property removed from wishlist',
                            buttons: {
                                // confirm: function () {
                                //     $.alert('Confirmed!');
                                // },
                                // cancel: function () {
                                //     $.alert('Canceled!');
                                // },
                                somethingElse: {
                                    text: 'OK',
                                    btnClass: 'btn-blue',
                                    keys: ['enter', 'shift'],
                                    action: function(){
                                        //$.alert('Something else?');
                                        //$("#image"+id).remove();
                                        window.location.reload();
                                    }
                                }
                            }
                        });   
                        }
                     });
                },
                cancel: function () {
                    //$.alert('Canceled!');
                },
                // somethingElse: {
                //     text: 'OK',
                //     btnClass: 'btn-blue',
                //     keys: ['enter', 'shift'],
                //     action: function(){
                //         //$.alert('Something else?');
                //         window.location.reload();
                //     }
                // }
            }
        });
    
  }
</script>

<script>
    function open_chat(id){
        var chat_id = id;
        
        var form_data = new FormData();

        form_data.append("id", chat_id);
        form_data.append("_token", "{{ csrf_token() }}");
                   
        $.ajax({
                        url:"{{ route('getChatHistory') }}",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        // beforeSend:function(){
                        //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                        // },   
                        success:function(data)
                        {
                            $("#msg_history").empty().html(data);
                        }
        });

        $.ajax({
                        url:"{{ route('getChatHistoryButton') }}",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(data)
                        {
                            $("#chat_button_dynamic_render").empty().html(data);
                        }
        });
        
    }

    function send_message(chat_id,loggedin_userid,sending_to_userid,prop_id){
        var chat_id = chat_id;
        var loggedin_userid = loggedin_userid;
        var sending_to_userid = sending_to_userid;
        var chat_message = $("#chat_message").val();
        var prop_id = prop_id;

        var form_data = new FormData();

        form_data.append("chat_id", chat_id);
        form_data.append("loggedin_userid", loggedin_userid);
        form_data.append("sending_to_userid", sending_to_userid);
        form_data.append("chat_message", chat_message);
        form_data.append("prop_id", prop_id);
        form_data.append("_token", "{{ csrf_token() }}");
                   
        $.ajax({
                        url:"{{ route('saveMessageReply') }}",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        // beforeSend:function(){
                        //  $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                        // },   
                        success:function(data)
                        {
                                 $.confirm({
                            title: 'Confirm!',
                            content: 'You message has been sent successfully',
                            buttons: {
                                // confirm: function () {
                                //     $.alert('Confirmed!');
                                // },
                                // cancel: function () {
                                //     $.alert('Canceled!');
                                // },
                                somethingElse: {
                                    text: 'OK',
                                    btnClass: 'btn-blue',
                                    keys: ['enter', 'shift'],
                                    action: function(){
                                        //$.alert('Something else?');
                                        //$("#image"+id).remove();
                                        window.location.reload();
                                    }
                                }
                            }
                        });                       
                    }
        });
    }

    function delete_announcement(id){
         var form_data = new FormData();

        form_data.append("id", id);
        form_data.append("_token", "{{ csrf_token() }}");
       
        $.ajax({
            url:"{{ route('deleteAnnouncement') }}",
            method:"POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,  
            success:function(data)
            {
              $.confirm({
                title: 'Confirm!',
                content: 'Announcement Deleted successfully',
                buttons: {
                    somethingElse: {
                        text: 'OK',
                        btnClass: 'btn-blue',
                        keys: ['enter', 'shift'],
                        action: function(){
                            window.location.reload();
                        }
                    }
                }
            });   
            }
         });
    }
</script>

<script>
   function select_deselect_wishlist(){
    alert("test");
   }
</script>

</body>
</html>