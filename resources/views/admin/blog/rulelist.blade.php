@if (!empty($aLists))
     @foreach ($aLists as $aList)
          <tr id="tr_{{$aList->id}}">
            <td>{{$aList->house_rule_name}}</td>
            <td>
                <a onclick="edit_houserrule({{$aList->id}},{{$aList->house_rule_name}});">Edit</a> |
                <a onclick="delete_houserrule({{$aList->id}});">Delete</a>
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
  <script>
    function delete_houserrule(id){
        var form_data = new FormData();

        form_data.append("id", id);
        form_data.append("_token", "{{ csrf_token() }}");
        
        if (confirm('Are you sure you want to delete?')) {
          // Save it!
           $.ajax({
            url:"{{ url('admin/deleteHouseRule') }}",
            method:"POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {  
               alert("Record deleted successfully");
               window.location.reload();
            }
          });
        } else {
          // Do nothing!
        }
      }
    </script>