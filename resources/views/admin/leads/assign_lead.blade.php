@extends('admin.layouts.master')

@section('title','Assign Lead')

@section('content')

<script language="JavaScript">
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>

       
  <form action="{{ url('admin/assign-lead-toassociate') }}" method="post">
     @csrf
  <div class="content-wrapper">

    <div class="row">

      <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">

            <p style="color:green;">{{$msg}}</p> 
 
            <p style="color:red;">{{$er}}</p> 

            <h4 class="card-title">Assign Lead</h4>

            <label>Select Associate</label>

            <select name="assoc_id">
            @foreach($userListData as $users)
              <option value="{{$users->id}}">{{$users->name}}</option>
            @endforeach
            </select>

            <button type="submit">Submit</button>

            <div class="table-responsive">

              <table class="table">

                <thead>

                  <tr>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Other Details</th>

                    <th>Select All<input type="checkbox" onclick="toggle(this);" />

</th>

<!--                     <th>Status</th>
 -->
                    <!-- <th>Action</th> -->

                  </tr>

                </thead>

                <tbody>
                   @foreach ($aLists as $aList)

                   <tr id="tr_{{$aList->id}}">

            <td>{{ !empty($aList->name) ? Str::replace('_*_',' ',$aList->name): ''}}</td>

            <td>{{ !empty($aList->mobile) ? $aList->mobile: ''}}</td>

            <td>{{ !empty($aList->other_details) ? $aList->other_details: ''}}</td>

            <td><input type="checkbox" id="lead_name" name="lead_name[]" value="{{$aList->id}}"></td>



    

          </tr>

                   @endforeach

                </tbody>

                <input type="hidden" id="route" name="route" value="admin/fetchUserData">

                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />

                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />

              </table>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>
</form>

  <script>

           /*--------------------- filter by menu, category, sub category and status ------------------------- */

$(document).on('keyup', '#search', function() {



    var query = $('#search').val();

    var column_name = $('#hidden_column_name').val();

    var sort_type = $('#hidden_sort_type').val();

    var page = $('#hidden_page').val();

    var status = $('#status').val();

    fetchData(page, sort_type, column_name, query,status);

});



function fetchData(page, sort_type, sort_by, search = '', filterStatus = '') {

let sRoute = $('#route').val();

$.ajax({

    url: BASE_URL + sRoute + "?page=" + page + "&sortby=" + sort_by + "&sorttype=" +

        sort_type + "&search=" + search + "&filterStatus=" + filterStatus,

    success: function(data) {

        $('tbody').html('');

        $('tbody').html(data);

    }

   })

}



/*-------------- filter by status ------------------------------------*/

function filterByStatus(filterStatus) {

    var sort_by = $('#hidden_column_name').val();

    var sort_type = $('#hidden_sort_type').val();

    var query = $('#search').val();

    fetchData(1, sort_type, sort_by, query,filterStatus);

}

/*-------------- filter by status ------------------------------------*/



/*--------------------- filter by menu, category, sub category and status ------------------------- */



    $(document).on('click', '.pagination a', function(event) {

  

        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('#hidden_page').val(page);

        var column_name = $('#hidden_column_name').val();

        var sort_type = $('#hidden_sort_type').val();

        var query = $('#search').val();

        var status = $('#status').val();



        $('li').removeClass('active');

        $(this).parent().addClass('active');

        fetchData(page, sort_type, column_name, query,status);

    });

  </script>

@endsection