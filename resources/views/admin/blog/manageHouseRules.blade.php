@extends('admin.layouts.master')

@section('title','Manage House Rules')

@section('content')

<div class="container">

  <div class="content-wrapper">

    <div class="row">

      <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">

            <h4 class="card-title">Manage House Rules</h4>

            <div class="invalid-success">{{ isset($message) ? $message : '' }}</div>
            
             <!-- Trigger the modal with a button -->
             <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="float:right;background:#f2c103;border:#f2c103;">Open Modal</button>

              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <p>Add New Rule</p>
                      <form action="{{ url('admin/create-houserule-process') }}" method="post">
                        @csrf
                        <input type="text" class="form-group" name="rule_name" id="rule_name"/>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- Modal -->

            <div class="table-responsive">

              <table class="table">

                <thead>

                  <tr>

                    <th>Rule Name</th>

                    <th>Action</th>

                  </tr>

                </thead>

                <tbody>

                   @include('admin.blog.rulelist')

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