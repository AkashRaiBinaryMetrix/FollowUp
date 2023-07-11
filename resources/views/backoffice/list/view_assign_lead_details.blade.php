@extends('backoffice.layouts.master')

@section('title','Users List')

@section('content')
 
  <div class="content-wrapper">

    <div class="row">

      <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">

            <h4 class="card-title">Leads Details</h4>

            <button style="float: right;margin-top: -38px;border-radius: 6px;border-color: darkolivegreen;" data-toggle="modal" data-target="#myModal">Add New Follow-Up</button>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add New</h4>
                </div>
                <div class="modal-body">
                  <form action="{{url('backoffice/save-follow-details')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="email">Name:</label>
                      <input type="text" name="p_name" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                      <label for="pwd">Other Details:</label>
                      <input type="text" name="p_details" class="form-control" id="pwd" required>
                    </div>
                    <div class="form-group">
                      <label for="pwd">Next Date:</label>
                      <input type="date" name="p_date" class="form-control" id="other_details" required>
                    </div>
                    <input type="hidden" name="frecord_id" value="{{$id}}">
                    <button type="submit" style="border-color: #f2c103 !important;background:#f2c103 !important" name="btnSubmit" class="btn btn-default">Submit</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

            <div class="table-responsive">

              <table class="table">

                <thead>

                  <tr>

                    <th>Property Name</th>

                    <th>Details</th>

                    <th>Current Follow-up Date</th>

                    <th>Next Follow-up Date</th>

                  </tr>

                </thead>

                <tbody>

                   @if (!empty($aLists))

                    @foreach ($aLists as $aList)

                      <tr id="tr_{{$aList->id}}">

                        <td>{{$aList->property_name}}</td>

                        <td>{{$aList->other_details}}</td>

                        <td>{{$aList->followup_date}}</td>

                        <td>{{$aList->next_followup_date}}</td>
                       
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