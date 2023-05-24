<!--              <div class="useradmin-pic"><img src="{{ asset('images/user-nodefault.jpg') }}" alt=""></div>
 -->   
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        var fileupload = $("#FileUpload1");
        var filePath = $("#spnFilePath");
        var image = $("#imgFileUpload");
        image.click(function () {
            fileupload.click();
        });
        fileupload.change(function () {
            var name = document.getElementById("FileUpload1").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("FileUpload1").files[0]);
  var f = document.getElementById("FileUpload1").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("file", document.getElementById('FileUpload1').files[0]);
   form_data.append("_token", "{{ csrf_token() }}");
   
   $.ajax({
    url:"{{ route('uploadprofile') }}",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
      window.location.reload();   
     //$('#uploaded_image').html(data);
    }
   });
  }
        });
    });
</script>
      @php
        $img = $profileDetails1->profile_pic;
            
        if(!empty($img)){
            //echo $img;
            $final_img = str_replace('/home/devmetrx/public_html/lineon/',$_SERVER['APP_URL'],$img);
      @endphp   
        <img id="imgFileUpload" alt="Select File" title="Select File" src="{{$final_img}}" style="cursor: pointer" />
      @php
        }else{
      @endphp
        <img id="imgFileUpload" alt="Select File" title="Select File" src="{{ asset('images/user-nodefault.jpg') }}" style="cursor: pointer" />
      @php
        }
      @endphp
<br />
<span id="spnFilePath"></span>
<input type="file" id="FileUpload1" style="display: none" />

<script>

</script>