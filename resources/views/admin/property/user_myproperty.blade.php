@extends('admin.layouts.master')

@section('title','View Property')

@section('content')    

  <div class="content-wrapper">

    <div class="row">

      <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">

            <h4 class="card-title">Property List</h4>

            <div class="table-responsive">

            <table class="table" id="example" data-ordering="false" class="display" style="width:100%">

                <thead>

                  <tr>

                    <th>Property Name</th>

                    <th>Property Address</th>

                    <th>Price</th>

                    <th>Action</th>

                  </tr>

                </thead>

                <tbody>

                  @foreach ($propertyDetails as $aList)
                    
                    <tr id="tr_{{$aList->id}}">

                    <td>{{$aList->property_title}}</td>

                    <td>{{$aList->address}}</td>

                    <td>{{$aList->price}}</td>

                    <td>
                         <a href="{{ url('admin/adminedit-user-property/'.$aList->id) }}" class="edit"><i class="fa fa-pencil" title="Edit"></i></a>

                    </td>

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