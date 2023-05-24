@if (!empty($aLists))

     @foreach ($aLists as $aList)

          <tr id="tr_{{$aList->id}}">

            <td>{{$aList->title}}</td>

            <td>{{ !empty($aList->description) ? $aList->description: ''}}</td>
            
            <td>

                <a href="{{ url('admin/testimonialedit/') }}/{{$aList->id}}">Edit</a> | 
                
                <button onclick="delete_testimonial({{$aList->id}});">Delete</button>
                
            </td>

          </tr>

     @endforeach

@endif

@if ($aLists && $aLists->hasPages())

<tr>

    <td colspan="8" style="border:0px;">

        <nav aria-label="Page navigation example">

            <ul class="pagination">

                Showing {{ ($aLists->currentpage() - 1) * $aLists->perpage() + 1 }} to

                {{ $aLists->currentpage() != $aLists->lastpage() ? $aLists->currentpage() * $aLists->perpage() : $aTotalData }}

                of {{ $aTotalData }} Records

            <div class="">{!! $aLists->links() !!} </div>

            </ul>

        </div>

    </td>

</tr>

@endif

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
    function delete_testimonial(id){
        var r = confirm("Are you sure, you want to delete?");

        if (r == true) {  
                    var form_data = new FormData();

                    form_data.append("id", id);
                    form_data.append("_token", "{{ csrf_token() }}");
                   
                    $.ajax({
                        url:"{{ route('deleteTestimonial') }}",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false, 
                        success:function(data)
                        {
                          window.location.reload();  
                        }
                     });  
        } else {  
            //Do nothing 
        }             
    }
</script>