@extends('admin.layouts.master')

@section('title','Users List')

@section('content')
 

  <div class="content-wrapper">

    <div class="row">

      <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">

            <h4 class="card-title">Associates List</h4>

            <button style="float: right;margin-top: -38px;border-radius: 6px;border-color: darkolivegreen;" data-toggle="modal" data-target="#myModal">Add New Associate</button>

            <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Associate</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('admin/save-users-list')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="email">Name:</label>
              <input type="text" name="assoc_name" class="form-control" id="email" required>
            </div>
            <div class="form-group">
              <label for="pwd">Email:</label>
              <input type="email" name="email" class="form-control" id="pwd" required>
            </div>
            <div class="form-group">
              <label for="pwd">Mobile:</label>
              <input type="number" name="mobile" class="form-control" id="pwd" required>
            </div>
            <button type="submit" style="border-color: #f2c103 !important;background:#f2c103 !important" name="btnSubmit" class="btn btn-default">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

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

              <table class="table">

                <thead>

                  <tr>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Mobile</th>

                    <th>Action</th>

<!--                     <th>Status</th>
 -->
                    <!-- <th>Action</th> -->

                  </tr>

                </thead>

                <tbody>

                   @include('admin.users.list')

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