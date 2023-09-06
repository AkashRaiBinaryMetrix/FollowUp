@extends('admin.layouts.master')

@section('title','Users List')

@section('content')
 

  <div class="content-wrapper">

    <div class="row">

      <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">

            <h4 class="card-title">View Assigned Leads List</h4>

  
           

  
  

            <!-- <div class="row">

                <div class="col-md-3">

                   <input type="text" class="form-control" name="search" id="search" placeholder="search">

                </div>

                <div class="col-md-3">

                   <select class="form-control" onchange="filterByStatus(this.value)" name="status" id="status">

                         <option value="">Filter By Status</option>

                         <option value="<?=ACTIVE?>">Active</option>

                         <option value="<?=INACTIVE?>">Inactive</option>

                   </select>

                </div>

                <div class="col-md-3">

                   <a href="{{url('admin/users-list')}}" class="btn btn-primary">Clear Filter</a>

                </div>

            </div> -->

            <div class="table-responsive">

<table class="table" id="example" data-ordering="false" class="display" style="width:100%">

                <thead>

                  <tr>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Other Details</th>

                    <th>Associate Name</th>

                    <th>Action</th>

<!--                     <th>Status</th>
 -->
                    <!-- <th>Action</th> -->

                  </tr>

                </thead>

                <tbody>

                   @if (!empty($aLists))

     @foreach ($aLists as $aList)

          <tr id="tr_{{$aList->id}}">

            <td>{{ !empty($aList->name) ? Str::replace('_*_',' ',$aList->name): ''}}</td>

            <td>{{ !empty($aList->mobile) ? $aList->mobile: ''}}</td>

            <td>{{ !empty($aList->other_details) ? $aList->other_details: ''}}</td>

            <td>
              @php
                $users = DB::table('users')->where('id','=',$aList->assoc_id)->get();
                echo $users[0]->name;
              @endphp
            </td>

            <td>
                <a href="{{ url('admin/viewfollowupdetails',[$aList->id]) }}"><i class="fa fa-eye" title="View Follow-Up Details"></i></a>               
            </td>

           <!--  <td>

               <form id="changeStatus{{$aList->id}}" method="post" onsubmit="return ajax_change_status('changeStatus{{$aList->id}}','{{url('admin/changeStatus')}}','',{{$aList->id}})">

                 @csrf

                 <input type="hidden" name="table" id="table{{$aList->id}}" value="users">

                 <input type="hidden" name="status" id="status{{$aList->id}}" value="{{$aList->status}}">

                 <input type="hidden" name="id" id="id{{$aList->id}}" value="{{$aList->id}}">

                 <div id="statusChange{{$aList->id}}" onclick="submitUpdateStatus('changeStatus{{$aList->id}}')">

                  <a href="javascript:void(0)" class="badge badge-{{ !empty($aList->status) ? 'success' : 'danger'}}">{{ !empty($aList->status) ? 'Active' : 'Inactive'}}</a>

                 </div>

              </form>

            </td>

            <td>

               <div class="row">

                <form  class

                ="icons-list" id="delete{{$aList->id}}" method="post" onsubmit="return ajax_delete_record('delete{{$aList->id}}','{{url('admin/delete')}}','',{{$aList->id}})">

                    @csrf

                    <input type="hidden" name="table" id="table{{$aList->id}}" value="users">

                    <input type="hidden" name="id" id="id{{$aList->id}}" value="{{$aList->id}}">

                    <div class="col-md-12">

                        <i class="mdi mdi-delete" onclick="submitForm('{{$aList->id}}')" title="Delete"></i>

                    </div>

                  </form>

               </div>

            </td> -->

          </tr>

     @endforeach

@endif

@if ($aLists && $aLists->hasPages())

{{-- <tr>

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

</tr> --}}



@endif



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
   <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script>
  //var db = new DataTable('#example');
  $('#example').DataTable({
    "bSort" : false
});

</script>

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