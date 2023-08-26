@extends('admin.layouts.master')

@section('title','Create Plots')

@section('content')       

  <div class="content-wrapper">

    <div class="row">

      <div class="col-md-2"></div>

      <div class="col-md-8 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">

            <div class="row">

              <div class="col-md-9">

                <h4 class="card-title">Create New Plots</h4>

              </div>

              <!-- <div class="col-md-3"><a href="{{url('admin/cms-page-list')}}">Back To List</a></div> -->

            </div>

            <form action="{{ url('admin/create-plot-process') }}" enctype="multipart/form-data" method="post" class="forms-sample">

              @csrf

              <div class="form-group row">

                <label for="title" class="col-sm-3 col-form-label">Select Project<span style="color:red">*</span></label>

                <div class="col-sm-9">

                    <select class="form-control" id="project_id" name="project_id" required>
                      <option value="" selected>-----Select-----</option>
                      <option value="36">KANAK VIHAR</option>
                      <option value="37">IMPERIAL TOWN</option>
                      <option value="38">GORAKHDHAM YOJNA</option>
                      <option value="39">ROYAL AWADH</option>
                      <option value="40">GOMTI VIHAR</option>
                    </select>
                
                  @error('title')

                    <div class="invalid-error">{{ $message }}</div>

                  @enderror

                </div>

              </div>

              <div class="form-group row">

                <label for="long_description" class="col-sm-3 col-form-label">Enter number of plots to add<span style="color:red">*</span></label>

                <div class="col-sm-9">

                 <select id="ddlSelect" name="ddlSelect" class="form-control" required>
                    <option value="" selected>-----Select-----</option>
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                 </select>

                  <br/>
                  <label>Plot details</label>
                  <div id='divTxtGroup' style="margin-left: -35%;"></div>

                  @error('long_description')

                   <div class="invalid-error">{{ $message }}</div>

                  @enderror

                </div>

              </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>

            </form>

          </div>

        </div>

      </div>

      <div class="col-md-2"></div>

    </div>

  </div>

  <!-- content-wrapper ends -->

  <script type="text/javascript">
        $(document).ready(function ()
        {
            $("#ddlSelect").change(function ()
            {
                $("#divTxtGroup").empty();             
                var num = this.value;
                if (num > 0) {
                    for (i = 1; i <= num; i++) {
                        var newTextBoxDiv1 = $(document.createElement('div')).attr("id", 'divTxt' + i);
                        newTextBoxDiv1.after().html('<input placeholder="Plot No." type="text" name="plot_no[]' + i + '" id="textbox' + i + '" value="" >&nbsp;'+ '<input placeholder="Gata No." type="text" name="gata_no[]' + i + '" id="textbox' + i + '" value="" >&nbsp;' +
                        '<select name="booking_status[]"><option value="Booked">Booked</option><option value="Available">Available</option><option value="Hold">Hold</option></select><br/>');
                        newTextBoxDiv1.appendTo("#divTxtGroup");
                    }
                }
            });
        });
    </script>

@endsection